@extends('frontend.app')
@section('content')
    <style>
        html{
            height: 100%;
        }
        body{
            background-image: url('{{ asset('map.png') }}');
            background-size: cover;
            background-position: center;
        }
    </style>
    <div>
        <div class="d-flex justify-content-center mt-4">
            <img src="{{ asset('papeid_logo.png') }}" height="60" alt="">

        </div>

        <div class="container">
            <div class="card mt-4" style="border-radius: 15px;">
                <div class="card-body">
                    <div>
                        <h3>Syarat & Ketentuan</h3>
                        <br>
                        1. pada saat tukar koin akan ada email masuk dan semua
                        informasi ada di email tersebut contohnya tempat titik
                        kumpul dan tanggal berangkat. <br>
                        2. Setelah anda tekan tukar koin jumlah koin otomatis
                        berkurang sesuai dengan destinasi wisata. <br>
                        3. Biaya ke lokasi titik temu di tanggung sendiri sedangkan
                        ke lokasi wisata di tanggung penuh oleh pape.id <br>
                        4. Wisata hanya dilakukan selama 3 hari 2 malam dan tempat
                        wisata akan dipandu penuh oleh tim dari pape.id <br>
                        5. pape.id hanya akan menanggung biaya menginap dan
                        wisata. <br>

                        @php
                            $koin = DB::table('wisatas')->where('id', request('id'))->value('koin');
                        @endphp

                        <a href="{{ url('store-tukar-koin') }}?id={{ request('id') }}" style="border-radius: 25px; width: 100%;" class="btn btn-warning text-white shadow mt-4" type="button">
                            <h3>Tukar {{ $koin }} <i class="bi bi-coin"></i> Koin</h3>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
