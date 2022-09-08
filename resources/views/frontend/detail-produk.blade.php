@extends('frontend.app')
@section('content')
    <div
        style="
    height: 250px;
    margin: 0;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    background-image: linear-gradient(black, transparent), url('{{ asset('gambar_produk') }}/{{ $detail->gambar_1 }}')">

    </div>
    <div class="container">
        <div style="margin-top: -240px;">
            <div class="row">
                <div class="col-6">
                    <a href="{{ url('/') }}">
                        <i class="bi bi-arrow-left-circle text-white" style="font-size: 30px;"></i>
                    </a>
                </div>
                <div class="col-6">
                    {{-- <img height="40px" src="{{ asset('papeid_logo.png') }}" alt=""> --}}
                </div>
            </div>
        </div>
        <div style="margin-top: 60px;">
            <h1 class="text-white">
                {{ $detail->judul_produk }}
            </h1>
            {{-- <h6 class="text-white">Berlaku hingga {{ date('d M Y', strtotime($detail->kadaluarsa)) }}</h6> --}}
            <div class="card" style="border-radius: 15px;">
                <div class="card-body">
                    <h5>Tentang</h5>
                    {{ $detail->deskripsi }}
                    <br><br>
                    <h5>Foto</h5>
                    <ul class="nav nav-lt-tab" style="border: 0;" role="tablist">
                        <li class="nav-item" style="margin-right: 5px;">
                            <div class="card" style="width: 140px; border-radius: 15px; border: none;">
                                <img style="border-radius: 15px; height: 140px; object-fit: cover;"
                                    src="{{ asset('gambar_produk') }}/{{ $detail->gambar_1 }}"
                                    class="card-img-top" alt="...">
                            </div>
                        </li>
                        <li class="nav-item" style="margin-right: 5px;">
                            <div class="card" style="width: 140px; border-radius: 15px; border: none;">
                                <img style="border-radius: 15px; height: 140px; object-fit: cover;"
                                    src="{{ asset('gambar_produk') }}/{{ $detail->gambar_2 }}"
                                    class="card-img-top" alt="...">
                            </div>
                        </li>
                        <li class="nav-item" style="margin-right: 5px;">
                            <div class="card" style="width: 140px; border-radius: 15px; border: none;">
                                <img style="border-radius: 15px; height: 140px; object-fit: cover;"
                                    src="{{ asset('gambar_produk') }}/{{ $detail->gambar_3 }}"
                                    class="card-img-top" alt="...">
                            </div>
                        </li>
                        <li class="nav-item" style="margin-right: 5px;">
                            <div class="card" style="width: 140px; border-radius: 15px; border: none;">
                                <img style="border-radius: 15px; height: 140px; object-fit: cover;"
                                    src="{{ asset('gambar_produk') }}/{{ $detail->gambar_4 }}"
                                    class="card-img-top" alt="...">
                            </div>
                        </li>
                    </ul>
                    <br><br>
                    {{-- <h5>Interest</h5>
                    <span class="badge bg-primary" style="border-radius: 15px;"><i class="bi bi-check-circle"></i> Hiking</span>
                    <span class="badge bg-primary" style="border-radius: 15px;"><i class="bi bi-check-circle"></i>
                        Trekking</span>
                    <span class="badge bg-primary" style="border-radius: 15px;"><i class="bi bi-check-circle"></i> River
                        Rafting</span>
                    <span class="badge bg-primary" style="border-radius: 15px;"><i class="bi bi-check-circle"></i> Center
                        Bridge</span>
                    <span class="badge bg-primary" style="border-radius: 15px;"><i class="bi bi-check-circle"></i> Kids
                        Playground</span>
                    <br><br> --}}
                </div>
            </div>
            <br><br>

            <div class="mb-3">
                <h3 style="margin-bottom: 0;">Produk UKM</h3>
                <span style="font-size: 12px;">Lihat Lainnya <i class="bi bi-arrow-right"></i></span>
            </div>
            <ul class="nav nav-lt-tab" style="border: 0;" role="tablist">
                @foreach ($produk as $item)
                <li class="nav-item" style="margin-right: 5px;">
                    <a href="{{ url('detail-produk') }}/{{ $item->id }}">
                        <div class="card" style="width: 200px; border-radius: 15px; border: none;">
                            <img style="border-radius: 15px; height: 150px; object-fit: cover; padding: 5px;"
                                src="{{ asset('gambar_produk') }}/{{ $item->gambar_1 }}"
                                class="card-img-top">
                            <div class="card-body" style="white-space: normal;">
                                <h5 class="card-title">{{ substr($item->judul_produk, 0, 21) }} ...</h5>
                                <span style="font-size: 12px;" class="text-warning"><i class="bi bi-person"></i> {{ $item->name }}</span>
                            </div>
                        </div>
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    <br><br><br><br>
@endsection
