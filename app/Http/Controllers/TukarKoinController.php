<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\TukarKoin;
use Auth;
use Illuminate\Support\Facades\Validator;

class TukarKoinController extends Controller
{
    public function index(){

        return view('backend.tukar_koin.index');
    }

    public function data(){

        $data_user = Auth::user();

        $wisata = DB::table('tukar_koins')
                    ->join('wisatas', 'wisatas.id', '=', 'tukar_koins.id_wisata')
                    ->join('users', 'users.id', '=', 'tukar_koins.id_user')
                    ->select(
                        'users.name', 
                        'wisatas.*'
                    );
        
        $wisata = $wisata->get();
        
        return response()->json([
            'data'  => $wisata, 
            'user'  => $data_user
        ]);

    }

    public function store(){

        $id_wisata = request('id');
        $user      = Auth::user();


        $wisata    = DB::table('wisatas')->where('id', $id_wisata)->first();


        //SIMPAN TUKAR KOIN
        TukarKoin::insert([
            'id_user'   => $user->id, 
            'id_wisata' => $id_wisata,
        ]);

        //KURANGI KOIN DARI USER
        DB::table('users')->where('id', $user->id)->update([
            'koin'  => $user->koin - $wisata->koin
        ]);

        return redirect('/home')->with([
            'sukses'   => 'Koin Berhasil Ditukarkan'
        ]);
    }  
}
