<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\KumpulTugas;
use Auth;
use Illuminate\Support\Facades\Validator;

class KumpulTugasController extends Controller
{
    public function index(){
        
        return view('backend.kumpul_tugas.index');
    }

    public function data(){

        $data_user = Auth::user();

        $produk = DB::table('kumpul_tugas')
                    ->join('users', 'users.id', '=', 'kumpul_tugas.id_user')
                    ->join('tugas', 'tugas.id', '=', 'kumpul_tugas.id_tugas')
                    ->select(
                        'kumpul_tugas.*', 
                        'users.name', 
                        'tugas.gambar as gambar_tugas',
                        'tugas.judul_tugas',
                    )
                    ->orderByRaw('kumpul_tugas.status = ? desc', ['Diproses']);

        if($data_user->role == 'Admin'){
            $produk = $produk->get();
        }else{
            $produk = $produk->where('id_user', $data_user->id)->get();
        }

        return response()->json([
            'data'  => $produk, 
            'user'  => $data_user
        ]);
    }

    public function store(Request $request){

        //wajib
        $gambar       = $request->file_tugas;
        $nama_gambar  = date('YmdHis.').$gambar->extension();
        $gambar->move('gambar_kumpul_tugas', $nama_gambar);

        //proses insert
        $insert = KumpulTugas::create([
            'id_user'   => Auth::user()->id ?? 1, 
            'id_tugas'  => $request->id_tugas, 
            'file_tugas'=> $nama_gambar, 
            'status'    => 'Diproses'
        ]);

        return redirect('koin')->with([
            'sukses'    => 'Tugas Berhasil Dikumpulkan'
        ]);
    }

    public function tinjauTugas(Request $request){

        $validator = Validator::make($request->all(), [
            'id'    => 'required'
        ]);

        // dd($request->all());

        if($validator->fails()){
            $data = [
                'responCode'    => 0,
                'respon'        => $validator->errors()
            ];
        }else{

            $user = KumpulTugas::find($request->id);
            $data = $user->update([
                'status'              => $request->status,
                'keterangan_ditolak'  => $request->keterangan_ditolak
            ]);

            if($request->status == 'Diterima'){
                //tambah koin

                $tugas = DB::table('tugas')->where('id', $user->id_tugas)->value('koin');

                $data = DB::table('users')->where('id', $user->id_user)->first();

                DB::table('users')->where('id', $user->id_user)->update([
                    'koin'  => $data->koin + $tugas
                ]);

                $tugas = DB::table('tugas')->where('id', $user->id_tugas)->value('kuota');

                DB::table('tugas')->where('id', $user->id_tugas)->update([
                    'kuota' => $tugas - 1
                ]);
            }

            $data = [
                'responCode'    => 1,
                'respon'        => 'Data Sukses Disimpan'
            ];
        }

        return response()->json($data);
    }
}
