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

        <div class="container">
            <div class="card mt-4" style="border-radius: 15px;">
                <div class="card-body">
                    <div>
                        <h3>Ayo Mulai Pelatihan Bersama Kami!</h3>
                        <h6>Yang akan kalian dapatkan <br> dari pelatihan ini: </h6>
                        <br>
                        1. Ilmu cara memandu wisatawan <br>
                        2. Tata cara memandu wisatawan <br>
                        3. Sertifikat beratas namakan pape.id <br>

                    </div>
                </div>
            </div>
            <div class="">
                <a href="#"
                    style="margin-bottom: 100px; width: 100%;" class="btn btn-primary text-white shadow mt-4"
                    type="button">
                    <h3>Rp. 250.000</h3>
                    Hubungi <i class="bi bi-whatsapp"></i> 081271137583
                </a>
            </div>
        </div>
    </div>
@endsection
