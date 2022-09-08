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
            <div class="card mt-2" style="border-radius: 15px;">
                <div class="card-body">
                    <div>
                        <h3>Pembuatan Video Pendek </span></h3>
                        <br>
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Doloremque rem delectus, quam
                        voluptate.
                    </div>
                </div>
            </div>
            <div class="card mt-2" style="border-radius: 15px;">
                <div class="card-body">
                    <div>
                        <h3>Syarat & Ketentuan</h3>
                        <br>
                        1. Video berdurasi minimal 15 detik dan maksimal 30 detik. <br>
                        2. Video asli milik orisinil tidak mencomot atau mengambil 
                        video milik orang lain. <br>
                        3. Video yang dibuat bertema tentang wisata yang tersedia
                        di pape.id promosikan lalu disebarkan lewat sosial media
                        contohnya Instagram. <br>
                        4. Pemilik video harus menyetujui persyaratan yang berlaku
                        diatas <br>
                        5. Jika video menyalahi aturan maka koin tidak bisa diklaim
                        sebelum pihak tim Pape.id sudah verifikasi video yang
                        anda upload. <br>
                        6. Menyertakan logo Pape.id di video
                        <br><br>
                        <input type="file" class="text-center">
                        <button class="btn btn-primary mt-2" style="width: 100%; border-radius: 25px;"><i class="bi bi-arrow-up-circle"></i> Upload</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br><br><br>
@endsection
