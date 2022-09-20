<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//LOGIN & REGISTER
Route::get('/login', 'App\Http\Controllers\AuthController@login')->name('login');
Route::get('/', 'App\Http\Controllers\AuthController@login')->name('login');
Route::post('/loginProses', 'App\Http\Controllers\AuthController@loginProses');
Route::get('/register', 'App\Http\Controllers\AuthController@register');
Route::post('/registerProses', 'App\Http\Controllers\AuthController@registerProses');

//HOME OR LANDING PAGE
Route::get('/home', 'App\Http\Controllers\WelcomeController@index');

//FILTER WISATA
Route::get('/list-wisata', 'App\Http\Controllers\WisataController@list');

//LIST PRODUK
Route::get('/list-produk', function(){ return view('frontend.list-produk'); });

//DETAIL WISATA
Route::get('/detail-wisata/{id}', 'App\Http\Controllers\WisataController@detail');

//DETAIL PRODUK
Route::get('/detail-produk/{id}', 'App\Http\Controllers\ProdukController@detail');

//TUKAR KOIN
Route::get('/tukar-koin', function(){ return view('frontend.tukar-koin'); });
Route::get('/store-tukar-koin', 'App\Http\Controllers\TukarKoinController@store');

//KOIN
Route::get('/koin', function(){ return view('frontend.koin'); });

//DETAIL TUGAS ATAU KOIN
Route::get('/detail-tugas/{id}', 'App\Http\Controllers\TugasController@detail');
Route::post('/store-kumpul-task', 'App\Http\Controllers\KumpulTugasController@store');

//PELATIHAN
Route::get('/pelatihan', function(){ return view('frontend.pelatihan'); });

//USER PROFIL
Route::get('/user-profil', 'App\Http\Controllers\UserProfilController@show');


//BACKEND
Route::group(['middleware' => 'auth'], function () {

    //DASHBOARD
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index');

    //USER
    Route::get('/back/user', 'App\Http\Controllers\UserController@index');
    Route::get('/back/data-user', 'App\Http\Controllers\UserController@data');
    Route::post('/back/store-user', 'App\Http\Controllers\UserController@store');
    Route::post('/back/update-user', 'App\Http\Controllers\UserController@update');
    Route::post('/back/delete-user', 'App\Http\Controllers\UserController@delete');

    //SLIDER
    Route::get('/back/slider', 'App\Http\Controllers\SliderController@index');
    Route::get('/back/data-slider', 'App\Http\Controllers\SliderController@data');
    Route::post('/back/store-slider', 'App\Http\Controllers\SliderController@store');
    Route::post('/back/update-slider', 'App\Http\Controllers\SliderController@update');
    Route::post('/back/delete-slider', 'App\Http\Controllers\SliderController@delete');

    //WISATA
    Route::get('/back/wisata', 'App\Http\Controllers\WisataController@index');
    Route::get('/back/data-wisata', 'App\Http\Controllers\WisataController@data');
    Route::post('/back/store-wisata', 'App\Http\Controllers\WisataController@store');
    Route::post('/back/update-wisata', 'App\Http\Controllers\WisataController@update');
    Route::post('/back/delete-wisata', 'App\Http\Controllers\WisataController@delete');

    //PRODUCT
    Route::get('/back/product', 'App\Http\Controllers\ProdukController@index');
    Route::get('/back/data-product', 'App\Http\Controllers\ProdukController@data');
    Route::post('/back/store-product', 'App\Http\Controllers\ProdukController@store');
    Route::post('/back/update-product', 'App\Http\Controllers\ProdukController@update');
    Route::post('/back/delete-product', 'App\Http\Controllers\ProdukController@delete');
    Route::post('/back/pilihan-UKM-product', 'App\Http\Controllers\ProdukController@pilihanUKM');

    //TUGAS
    Route::get('/back/tugas', 'App\Http\Controllers\TugasController@index');
    Route::get('/back/data-tugas', 'App\Http\Controllers\TugasController@data');
    Route::post('/back/store-tugas', 'App\Http\Controllers\TugasController@store');
    Route::post('/back/update-tugas', 'App\Http\Controllers\TugasController@update');
    Route::post('/back/delete-tugas', 'App\Http\Controllers\TugasController@delete');

    //KUMPUL TUGAS
    Route::get('/back/kumpul-task', 'App\Http\Controllers\KumpulTugasController@index');
    Route::get('/back/data-kumpul-task', 'App\Http\Controllers\KumpulTugasController@data');
    Route::post('/back/tinjau-task', 'App\Http\Controllers\KumpulTugasController@tinjauTugas');

    //TUKAR KOIN
    Route::get('/back/tukar-koin', 'App\Http\Controllers\TukarKoinController@index');
    Route::get('/back/data-tukar-koin', 'App\Http\Controllers\TukarKoinController@data');

    //BERITA
    Route::get('/back/beritas', 'App\Http\Controllers\BeritaController@index');
    Route::get('/back/data-berita', 'App\Http\Controllers\BeritaController@data');
    Route::post('/back/store-berita', 'App\Http\Controllers\BeritaController@store');
    Route::post('/back/update-berita', 'App\Http\Controllers\BeritaController@update');
    Route::post('/back/delete-berita', 'App\Http\Controllers\BeritaController@delete');

    //DISKUSI PRODUK
    Route::get('/back/diskusi-produk', 'App\Http\Controllers\DiskusiProdukController@index');
    Route::get('/back/data-diskusi-produk', 'App\Http\Controllers\DiskusiProdukController@data');
    Route::post('/back/store-diskusi-produk', 'App\Http\Controllers\DiskusiProdukController@store');
    Route::post('/back/update-diskusi-produk', 'App\Http\Controllers\DiskusiProdukController@update');
    Route::post('/back/delete-diskusi-produk', 'App\Http\Controllers\DiskusiProdukController@delete');

    //DISKUSI BERITA
    Route::get('/back/diskusi-berita', 'App\Http\Controllers\DiskusiBeritaController@index');
    Route::get('/back/data-diskusi-berita', 'App\Http\Controllers\DiskusiBeritaController@data');
    Route::post('/back/store-diskusi-berita', 'App\Http\Controllers\DiskusiBeritaController@store');
    Route::post('/back/update-diskusi-berita', 'App\Http\Controllers\DiskusiBeritaController@update');
    Route::post('/back/delete-diskusi-berita', 'App\Http\Controllers\DiskusiBeritaController@delete');

    //USER PROFIL
    Route::get('/back/profil-{id}', 'App\Http\Controllers\UserProfilController@detail');
    Route::post('/back/store-profil', 'App\Http\Controllers\UserProfilController@store');
});

//LOGOUT
Route::get('/logout', function () {
    Auth::logout();
    return redirect('login');
})->name('logout');
