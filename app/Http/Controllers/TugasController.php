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
        }else{
            // $wisata = $wisata->where('id_user', $data_user->id)->get();
        }
        
        $wisata = $wisata->get();
        
        return response()->json([
            'data'  => $wisata, 
            'user'  => $data_user
        ]);

    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'gambar'        => 'required|mimes:png,jpg,JPEG,PNG|max: 1024',

            'keterangan'    => 'required',
            'kuota'         => 'required', 
            'koin'          => 'required',
            'judul_tugas'   => 'required' 
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        //wajib
        $gambar       = $request->gambar;
        $nama_gambar  = date('YmdHis.').$gambar->extension();
        $gambar->move('gambar_tugas', $nama_gambar);

        //proses insert
        $insert = Tugas::create([
            'keterangan_tugas'  => $request->keterangan,  
            'judul_tugas'       => $request->judul_tugas, 
            'gambar'            => $nama_gambar,
            'koin'              => $request->koin,
            'kuota'             => $request->kuota,
        ]);

        return response()->json([
            'responCode'  => 1,
            'message'       => 'Success!',
            'data'          => $insert 
        ]);
    }

    public function update(Request $request){

        $validator = Validator::make($request->all(), [
            // 'gambar'        => 'required|mimes:png,jpg,JPEG,PNG|max: 1024',

            'keterangan'    => 'required',
            'kuota'         => 'required', 
            'koin'          => 'required',
            'judul_tugas'   => 'required' 
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        if($request->gambar){

            $gambar       = $request->gambar;
            $nama_gambar  = date('YmdHis.').$gambar->extension();
            $gambar->move('gambar_tugas', $nama_gambar);
        }

        $produk = Tugas::find($request->id);
        $insert = $produk->update([
            'keterangan_tugas'  => $request->keterangan,  
            'judul_tugas'       => $request->judul_tugas, 
            'gambar'            => $nama_gambar ?? $produk->gambar,
            'koin'              => $request->koin,
            'kuota'             => $request->kuota,
        ]);

        return response()->json([
            'responCode'  => 1,
            'message'       => 'Success!',
            'data'          => $insert 
        ]);
    }

    public function delete(Request $request){
        
        $data = Tugas::find($request->id)->delete();

        $data = [
            'responCode'    => 1,
            'respon'        => 'Data Sukses Dihapus'
        ];

        return response()->json($data);
    }

    public function detail($id){

         //detail produk
         $detail = Tugas::where('tugas.id', $id)->first();

         //list produk
         $produk = Tugas::where('kuota', '>', 0)->inRandomOrder()->limit(8)->get();
 
 
         return view('frontend.detail-tugas', [
             'produk' => $produk, 
             'detail' => $detail
         ]);
    }
}
