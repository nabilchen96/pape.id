<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Tugas;
use Auth;
use Illuminate\Support\Facades\Validator;

class TugasController extends Controller
{
    public function index(){

        return view('backend.tugas.index');
    }

    public function data(){

        $data_user = Auth::user();

        $wisata = DB::table('tugas');

        if($data_user->role == 'Admin'){
            $wisata = $wisata->get();
        }else{
            $wisata = $wisata->where('id_user', $data_user->id)->get();
        }

        return response()->json([
            'data'  => $wisata, 
            'user'  => $data_user
        ]);

    }
}
