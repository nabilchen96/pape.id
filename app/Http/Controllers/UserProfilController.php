<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\UserProfil;
use App\Models\Produk;
use Auth;

class UserProfilController extends Controller
{
    public function detail($id){

        $data = DB::table('users')
                ->leftjoin('user_profils', 'user_profils.id_user', '=', 'users.id')
                ->select(
                    'users.name', 
                    'users.id as user_id',
                    'user_profils.*'
                )
                ->where('users.id', $id)
                ->first();

        return view('backend.user-profil.detail', ['data'    => $data]);
    }

    public function store(Request $request){

        // dd($request->all());

        if($request->foto_profil){
            $foto_profil       = $request->foto_profil;
            $nama_foto_profil  = date('YmdHis.').$foto_profil->extension();
            $foto_profil->move('foto_profil', $nama_foto_profil);
        }
        
        //proses insert
        $data   = UserProfil::where('id_user', $request->id_user)->first();
        $insert = UserProfil::updateOrCreate(
            [
                'id_user'           => $request->id_user
            ],
            [
                'foto_profil'       => $nama_foto_profil ?? @$data->foto_profil, 
                'deskripsi_toko'    => $request->deskripsi_toko, 
                'wa'                => $request->wa, 
                'facebook'          => $request->facebook, 
                'instagram'         => $request->instagram, 
                'tiktok'            => $request->tiktok, 
                'youtube'           => $request->youtube, 
                'alamat'            => $request->alamat
            ]
        );

        return back();
    }

    public function show(){

        $user = Auth::user()->id;

        $data = DB::table('users')
                ->leftjoin('user_profils', 'user_profils.id_user', '=', 'users.id')
                ->select(
                    'users.name', 
                    'users.id as user_id',
                    // 'user_profils.*',
                    'users.email', 
                    'users.koin'
                )
                ->where('users.id', $user)
                ->first();

        $tugas = [];

        //RIWAYAT TUGAS
        if(request('cari') == 'riwayat-koin'){

            $tugas = DB::table('tukar_koins')
                        ->join('wisatas', 'wisatas.id', '=', 'tukar_koins.id_wisata')
                        ->join('users', 'users.id', '=', 'tukar_koins.id_user')
                        ->where('tukar_koins.id_user', $user)
                        ->select(
                            'wisatas.*'
                        )
                        ->paginate(3);

        }else{

            $tugas  = DB::table('kumpul_tugas')
                        ->join('tugas', 'tugas.id', '=', 'kumpul_tugas.id_tugas')
                        ->where('kumpul_tugas.id_user', $user)
                        ->orderByRaw('kumpul_tugas.status = ? desc', ['Diproses'])
                        ->paginate(3);
        }

        //RIWAYAT PENUKARAN KOIN

        return view('frontend.user-profil', [
            'data'      => $data,
            'tugas'     => $tugas 
        ]);
    }
}
