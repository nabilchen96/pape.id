@extends('frontend.app')
@section('content')
    <style>
        html {
            /* height: 100%; */
        }

        /* body {
            background-image: url('{{ asset('map.png') }}');
            background-size: cover;
            background-position: center;
        } */
    </style>
    <div>

        <div
            style="
            height: 250px;
            margin: 0;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            background-image: linear-gradient(transparent, black), url('{{ asset('gambar_tugas') }}/{{ $detail->gambar }}')">

        </div>

        <div class="container">
            <div style="margin-top: -240px;">
                <div class="col-6">
                    <a href="{{ url('/') }}">
                        <i class="bi bi-arrow-left-circle text-white" style="font-size: 30px;"></i>
                    </a>
                </div>

                <div style="margin-top: 50px;">
                    <h1 class="text-white">
                        {{ $detail->judul_tugas }}
                    </h1>

                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body">
                            <h6 class="text-white">
                                <span class="badge bg-warning">{{ $detail->koin }} Koin</span>
                                <span class="badge bg-primary">{{ $detail->kuota }} Orang</span>
                            </h6>
                            <div>
                                <h3>Deskripsi, Syarat & Ketentuan</h3>
                                <br>
                                <?php echo nl2br($detail->keterangan_tugas); ?>
                                <br><br>
                                <form method="POST" enctype="multipart/form-data" action="{{ url('/store-kumpul-task') }}">
                                    @csrf
                                    <input type="hidden" name="id_tugas" value="{{ $detail->id }}">
                                    <input type="file" name="file_tugas" class="text-center" required>
                                    <button class="btn btn-primary mt-2" style="width: 100%; border-radius: 25px;"><i
                                            class="bi bi-arrow-up-circle"></i> Upload</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <br><br>

                <div class="mb-3">
                    <h3 style="margin-bottom: 0;">Daftar Tugas</h3>
                    <a href="{{ url('koin') }}">
                        <span style="font-size: 12px;">Lihat Lainnya <i class="bi bi-arrow-right"></i></span>
                    </a>
                </div>
                <ul class="nav nav-lt-tab" style="border: 0;" role="tablist">
                    @foreach ($produk as $item)
                        <li class="nav-item" style="margin-right: 5px;">
                            <a href="{{ url('detail-tugas') }}/{{ $item->id }}">
                                <div class="card" style="width: 200px; border-radius: 15px; border: none;">
                                    <img style="border-radius: 15px; height: 150px; object-fit: cover; padding: 5px;"
                                        src="{{ asset('gambar_tugas') }}/{{ $item->gambar }}" class="card-img-top"
                                        alt="...">
                                    <div class="card-body" style="white-space: normal;">
                                        <h6 class="mb-2 mt-1">{{ substr($item->judul_tugas, 0, 25) }} </h6>
                                        <span class="badge bg-warning">{{ $detail->koin }} Koin</span>
                                        <span class="badge bg-primary">{{ $detail->kuota }} Orang</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <br><br><br><br>
@endsection
