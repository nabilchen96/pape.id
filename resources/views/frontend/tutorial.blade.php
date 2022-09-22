@extends('frontend.app')
@section('content')
    <style>
        html {
            height: 100%;
        }

        body {
            background-image: url('{{ asset('map.png') }}');
            background-size: cover;
            background-position: center;
        }
    </style>
    <div>
        <div class="d-flex justify-content-center mt-4">
            <img src="{{ asset('papeid_logo.png') }}" height="60" alt="">

        </div>

        <div class="container mt-4">
            <div class="card">
                <div class="card-body">
                    <h6>1. Selesaikan task di menu koin untuk mendapatkan hadiah</h6>
                    <img src="{{ asset('tutorial_1_pape.id.png') }}" width="100%" alt="">
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h6>2. Pilih task yang ingin diselesaikan, lalu baca syarat dan ketentuannya</h6>
                    <img src="{{ asset('tutorial_2_pape.id.png') }}" width="100%" alt="">
                    <br><br>
                    <img src="{{ asset('tutorial_3_pape.id.png') }}" width="100%" alt="">
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h6>3. Upload bukti sesuai persyaratan task</h6>
                    <img src="{{ asset('tutorial_4_pape.id.png') }}" width="100%" alt="">
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h6>4. Task yang anda kerjakan akan direview oleh pape.id, jika berhasil maka anda akan mendapatkan koin
                    </h6>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h6>5. Anda dapat menukarkan koin-koin yang telah didapatkan dengan paket wisata yang ada di pape.id di
                        menu home</h6>
                    <img src="{{ asset('tutorial_5_pape.id.png') }}" width="100%" alt="">

                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h6>6. Saat melakukan penukaran koin dengan paket wisata, baca syarat dan ketentuan yang berlaku.</h6>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h6>7. Setelah ditukar, anda akan menerima email masuk berisi informasi lengkap tentang wisata dan
                        selamat anda bisa menikmati wisata gratis</h6>
                        <img src="{{ asset('traveler.png') }}" width="100%" alt="">
                </div>
            </div>
        </div>
        <br><br><br>
    </div>
@endsection
