<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Wisata;
use Auth;
use Illuminate\Support\Facades\Validator;

class WisataController extends Controller
{
    public function index(){

        return view('backend.wisata.index');
    }

    public function data(){

        $data_user = Auth::user();

        $wisata = DB::table('wisatas');

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

    public function store(Request $request){

        // dd($request->all());

        $validator = Validator::make($request->all(), [
            'gambar_1'      => 'required|mimes:png,jpg,JPEG,PNG|max: 1024',
            'gambar_2'      => 'nullable|mimes:png,jpg,JPEG,PNG|max: 1024',
            'gambar_3'      => 'nullable|mimes:png,jpg,JPEG,PNG|max: 1024',
            'gambar_4'      => 'nullable|mimes:png,jpg,JPEG,PNG|max: 1024',

            'judul_wisata'  => 'required',
            'keterangan'    => 'required', 
            'kadaluarsa'    => 'required', 
            // 'interest'      => 'required',
            'koin'          => 'required',     
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        //wajib
        $gambar_1       = $request->gambar_1;
        $nama_gambar_1  = '1'.date('YmdHis.').$gambar_1->extension();
        $gambar_1->move('gambar_wisata', $nama_gambar_1);

        if($request->gambar_2){
            $gambar_2       = $request->gambar_2;
            $nama_gambar_2  = '2'.date('YmdHis.').$gambar_2->extension();
            $gambar_2->move('gambar_wisata', $nama_gambar_2);
        }

        if($request->gambar_3){
            $gambar_3       = $request->gambar_3;
            $nama_gambar_3  = '3'.date('YmdHis.').$gambar_3->extension();
            $gambar_3->move('gambar_wisata', $nama_gambar_3);
        }

        if($request->gambar_4){
            $gambar_4       = $request->gambar_4;
            $nama_gambar_4  = '4'.date('YmdHis.').$gambar_4->extension();
            $gambar_4->move('gambar_wisata', $nama_gambar_4);
        }

        if($request->gambar_5){
            $gambar_5       = $request->gambar_5;
            $nama_gambar_5  = '5'.date('YmdHis.').$gambar_5->extension();
            $gambar_5->move('gambar_wisata', $nama_gambar_5);
        }

        //proses insert
        $insert = Wisata::insert([
            'judul_wisata'  => $request->judul_wisata, 
            'keterangan'    => $request->keterangan, 
            'id_user'       => Auth::user()->id ?? 2,
            'koin'          => $request->koin, 
            'kadaluarsa'    => $request->kadaluarsa, 

            'gambar_1'      => $nama_gambar_1,
            'gambar_2'      => $nama_gambar_2 ?? "",
            'gambar_3'      => $nama_gambar_3 ?? "",
            'gambar_4'      => $nama_gambar_4 ?? "",
            'gambar_5'      => $nama_gambar_5 ?? "",
        ]);

        return response()->json([
            'responCode'  => 1,
            'message'       => 'Success!',
            'data'          => $insert 
        ]);
    }

    public function update(Request $request){

        $validator = Validator::make($request->all(), [

            'id'            => 'required',

            'gambar_1'      => 'nullable|mimes:png,jpg,JPEG,PNG|max: 500',
            'gambar_2'      => 'nullable|mimes:png,jpg,JPEG,PNG|max: 500',
            'gambar_3'      => 'nullable|mimes:png,jpg,JPEG,PNG|max: 500',
            'gambar_4'      => 'nullable|mimes:png,jpg,JPEG,PNG|max: 500',

            'judul_wisata'  => 'required',
            'keterangan'    => 'required', 
            'kadaluarsa'    => 'required',     
            'koin'          => 'required',     
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        if($request->gambar_1){
            $gambar_1       = $request->gambar_1;
            $nama_gambar_1  = '1'.date('YmdHis.').$gambar_1->extension();
            $gambar_1->move('gambar_wisata', $nama_gambar_1);
        }

        if($request->gambar_2){
            $gambar_2       = $request->gambar_2;
            $nama_gambar_2  = '2'.date('YmdHis.').$gambar_2->extension();
            $gambar_2->move('gambar_wisata', $nama_gambar_2);
        }

        if($request->gambar_3){
            $gambar_3       = $request->gambar_3;
            $nama_gambar_3  = '3'.date('YmdHis.').$gambar_3->extension();
            $gambar_3->move('gambar_wisata', $nama_gambar_3);
        }

        if($request->gambar_4){
            $gambar_4       = $request->gambar_4;
            $nama_gambar_4  = '4'.date('YmdHis.').$gambar_4->extension();
            $gambar_4->move('gambar_wisata', $nama_gambar_4);
        }

        if($request->gambar_5){
            $gambar_5       = $request->gambar_5;
            $nama_gambar_5  = '5'.date('YmdHis.').$gambar_5->extension();
            $gambar_5->move('gambar_wisata', $nama_gambar_5);
        }

        //proses insert
        $produk = Wisata::find($request->id);
        $insert = $produk->update([
            'judul_wisata'  => $request->judul_wisata, 
            'keterangan'    => $request->keterangan,
            'koin'          => $request->koin, 
            'kadaluarsa'    => $request->kadaluarsa, 
            'gambar_1'      => $nama_gambar_1 ?? $produk->gambar_1,
            'gambar_2'      => $nama_gambar_2 ?? $produk->gambar_2,
            'gambar_3'      => $nama_gambar_3 ?? $produk->gambar_3,
            'gambar_4'      => $nama_gambar_4 ?? $produk->gambar_4,
            'gambar_5'      => $nama_gambar_5 ?? $produk->gambar_5,
        ]);

        return response()->json([
            'responCode'  => 1,
            'message'       => 'Success!',
            'data'          => $insert 
        ]);
    }

    public function delete(Request $request){

        $data = Wisata::find($request->id)->delete();

        $data = [
            'responCode'    => 1,
            'respon'        => 'Data Sukses Dihapus'
        ];

        return response()->json($data);
    }

    
    public function detail($id){

        //detail produk
        $detail = Wisata::join('users', 'users.id', '=', 'wisatas.id_user')
                        ->where('wisatas.id', $id)
                        ->select(
                            'wisatas.*', 
                            'users.koin as user_koin'
                        )
                        // ->where('users.id', Auth::user()->id)
                        ->first();

        //list produk
        $produk = Wisata::join('users', 'users.id', '=', 'wisatas.id_user')
                    ->select(
                        'users.name', 
                        'wisatas.*'
                    )
                    ->inRandomOrder()->limit(8)->get();


        return view('frontend.detail-wisata', [
            'produk' => $produk, 
            'detail' => $detail
        ]);
    }

    public function list(){

        $cari   = request('cari');
        $data   = DB::table('wisatas');

        

        if($cari == 'hot'){
            $data   = $data->orderBy('koin', 'DESC')->paginate(8);

        }else if($cari == 'up'){    
            $data   = $data->orderBy('koin', 'DESC')->paginate(8);

        }else if($cari == 'down'){
            $data   = $data->orderBy('koin', 'ASC')->paginate(8);
            
        }else if($cari == 'all'){
            $data   = $data->inRandomOrder()->limit(8)->get();

        }else{
            $data   = $data->where('judul_wisata', 'like', '%'.$cari.'%')->paginate(8);
        }

        return view('frontend.list-wisata', [
            'data'  => $data
        ]);
    }

    public function show(Request $request){

        $cari = $_GET['cari'] ?? 'all';

        //list produk
        $produk = Produk::join('users', 'users.id', '=', 'produks.id_user')
                    ->select(
                        'users.name', 
                        'produks.*'
                    );

        if($cari == 'all'){
            $produk = $produk->paginate(8);

        }else{

            $produk = $produk->where('judul_produk', 'like', '%'.$cari.'%')->paginate(8);
            $produk->appends($request->all());
        }

        return view('frontend.produk', [
            'produk' => $produk, 
        ]);
    }
}
