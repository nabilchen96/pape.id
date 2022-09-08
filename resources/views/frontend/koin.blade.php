@extends('frontend.app')
@section('content')
    <div class="d-flex justify-content-center mt-4">
        <img src="{{ asset('papeid_logo.png') }}" height="60" alt="">

    </div>
    <div class="container">
        <div class="card mt-4" style="border: none; border-radius: 15px;">
            <div class="card-body">
                <div class="text-center">
                    Total koin saya
                    <h1 class="text-warning"><i class="bi bi-coin"></i> 2000</h1>

                    <br>
                    Selesaikan task, dapatkan koinnya dan tukarkan dengan destinasi wisata yang diinginkan
                </div>
            </div>
        </div>
        <div class="mb-3 mt-5">
            <h3 style="margin-bottom: 0;">Daftar Tugas</h3>
            <span style="font-size: 12px;">Selesaikan Task dan Dapatkan Koin</span>
        </div>
        {{-- <ul class="nav nav-lt-tab" style="border: 0;" role="tablist">
            <li class="nav-item" style="margin-right: 5px;">
                <a href="{{ url('report') }}" target="_blank" class="btn btn-primary mb-1"
                    style="border-radius: 20px; padding-left: 25px; padding-right: 25px;">Task</a>
            </li>
            <li class="nav-item" style="margin-right: 5px;">
                <button class="btn btn-primary position-relative" onclick="getData(0)" id="0"
                    style="border-radius: 25px; padding-left: 25px; padding-right: 25px;">
                    Tugas Diproses</span>
                </button>
            </li>
            <li class="nav-item" style="margin-right: 5px;">
                <button class="btn btn-primary" onclick="getData(1)" id="1"
                    style="border-radius: 25px; padding-left: 25px; padding-right: 25px;">Tugas Selesai</button>
            </li>
            <li class="nav-item" style="margin-right: 5px;">
                <button class="btn btn-primary" onclick="getData(1)" id="1"
                    style="border-radius: 25px; padding-left: 25px; padding-right: 25px;">Tugas Ditolak</button>
            </li>
        </ul> --}}
        <div class="card mb-2" style="border-radius: 15px;">
            <div class="card-body p-2">
                <div class="d-flex justify-content-between">
                    <div class="card" style="
                        background-size: cover;
                        background-position: center;
                        border: none;
                        background-image: url('https://cdn.pixabay.com/photo/2016/11/23/18/29/cloudy-1854241_960_720.jpg'); 
                        border-radius: 15px; 
                        width: 35%">
                        
                    </div>
                    <div style="margin-left: 10px; width: 65%;">
                        <h6 class="mb-2 mt-1">Buat video pendek!</h6>
                        <p>
                            Buat video pendek dan upload dengan tema <a href="{{ url('detail-tugas') }}"> ...detail</a>
                        </p>
                        <span style="border-radius: 15px;" class="badge bg-primary">30 Orang</span>
                        <span style="border-radius: 15px;" class="badge bg-warning">500 koin</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-2" style="border-radius: 15px;">
            <div class="card-body p-2">
                <div class="d-flex justify-content-between">
                    <div class="card" style="
                        background-size: cover;
                        background-position: center;
                        border: none;
                        background-image: url('https://cdn.pixabay.com/photo/2016/11/23/18/29/cloudy-1854241_960_720.jpg'); 
                        border-radius: 15px; 
                        width: 35%">
                        
                    </div>
                    <div style="margin-left: 10px; width: 65%;">
                        <h6 class="mb-2 mt-1">Buat Gambar Promosi</h6>
                        <p>
                            Buat gambar promosi dan upload dengan tema <a href="#"> ...detail</a>
                        </p>
                        <span style="border-radius: 15px;" class="badge bg-primary">100 Orang</span>
                        <span style="border-radius: 15px;" class="badge bg-warning">150 koin</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-2" style="border-radius: 15px;">
            <div class="card-body p-2">
                <div class="d-flex justify-content-between">
                    <div class="card" style="
                        background-size: cover;
                        background-position: center;
                        border: none;
                        background-image: url('https://cdn.pixabay.com/photo/2016/11/23/18/29/cloudy-1854241_960_720.jpg'); 
                        border-radius: 15px; 
                        width: 35%">
                        
                    </div>
                    <div style="margin-left: 10px; width: 65%;">
                        <h6 class="mb-2 mt-1">Buat Gambar Promosi</h6>
                        <p>
                            Buat gambar promosi dan upload dengan tema <a href="#"> ...detail</a>
                        </p>
                        <span style="border-radius: 15px;" class="badge bg-primary">100 Orang</span>
                        <span style="border-radius: 15px;" class="badge bg-warning">150 koin</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br><br><br>
@endsection
