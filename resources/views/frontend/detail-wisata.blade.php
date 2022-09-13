@extends('frontend.app')
@section('content')
    <div
        style="
    height: 250px;
    margin: 0;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    background-image: linear-gradient(black, transparent), url('{{ asset('gambar_wisata') }}/{{ $detail->gambar_1 }}')">

    </div>
    <div class="container">
        <div style="margin-top: -240px;">
            <div class="row">
                <div class="col-6">
                    <a href="{{ url('/home') }}">
                        <i class="bi bi-arrow-left-circle text-white" style="font-size: 30px;"></i>
                    </a>
                </div>
                <div class="col-6">

                </div>
            </div>
        </div>
        <div style="margin-top: 60px;">
            <h1 class="text-white">
                {{ $detail->judul_wisata }}
            </h1>
            <h6 class="text-white">Berlaku hingga {{ date('d M Y', strtotime($detail->kadaluarsa)) }}</h6>
            <div class="card" style="border-radius: 15px;">
                <div class="card-body">
                    <h5>Tentang</h5>
                    {{ $detail->keterangan }}
                    <br><br>
                    <h5>Foto</h5>
                    <ul class="nav nav-lt-tab" style="border: 0;" role="tablist">
                        <li class="nav-item" style="margin-right: 5px;">
                            <div class="card" style="width: 140px; border-radius: 15px; border: none;">
                                <img style="border-radius: 15px; height: 140px; object-fit: cover;"
                                    src="{{ asset('gambar_wisata') }}/{{ $detail->gambar_1 }}"
                                    class="card-img-top" alt="...">
                            </div>
                        </li>
                        <li class="nav-item" style="margin-right: 5px;">
                            <div class="card" style="width: 140px; border-radius: 15px; border: none;">
                                <img style="border-radius: 15px; height: 140px; object-fit: cover;"
                                    src="{{ asset('gambar_wisata') }}/{{ $detail->gambar_2 }}"
                                    class="card-img-top" alt="...">
                            </div>
                        </li>
                        <li class="nav-item" style="margin-right: 5px;">
                            <div class="card" style="width: 140px; border-radius: 15px; border: none;">
                                <img style="border-radius: 15px; height: 140px; object-fit: cover;"
                                    src="{{ asset('gambar_wisata') }}/{{ $detail->gambar_3 }}"
                                    class="card-img-top" alt="...">
                            </div>
                        </li>
                        <li class="nav-item" style="margin-right: 5px;">
                            <div class="card" style="width: 140px; border-radius: 15px; border: none;">
                                <img style="border-radius: 15px; height: 140px; object-fit: cover;"
                                    src="{{ asset('gambar_wisata') }}/{{ $detail->gambar_4 }}"
                                    class="card-img-top" alt="...">
                            </div>
                        </li>
                        <li class="nav-item" style="margin-right: 5px;">
                            <div class="card" style="width: 140px; border-radius: 15px; border: none;">
                                <img style="border-radius: 15px; height: 140px; object-fit: cover;"
                                    src="{{ asset('gambar_wisata') }}/{{ $detail->gambar_5 }}"
                                    class="card-img-top" alt="...">
                            </div>
                        </li>
                    </ul>
                    <br><br>
                </div>
            </div>
            @if ($detail->koin > Auth::user()->koin)
                <a style="border-radius: 25px; width: 100%;" class="btn btn-danger text-white shadow mt-4" type="button">
                    <h3>{{ number_format($detail->koin) }} <i class="bi bi-coin"></i> Koin</h3>
                    Maaf, koin anda belum mencukupi

                    {{ \Auth::user()->koin }}
                </a>
            @else
                <a href="{{ url('tukar-koin') }}?id={{ $detail->id }}" style="border-radius: 25px; width: 100%;" class="btn btn-warning text-white shadow mt-4" type="button">
                    <h3>Tukar {{ number_format($detail->koin) }} <i class="bi bi-coin"></i> Koin</h3>
                </a>
            @endif
            <br><br>

            <div class="mb-3">
                <h3 style="margin-bottom: 0;">Trip Liburan</h3>
                <a href="{{ url('list-wisata?cari=all') }}">
                    <span style="font-size: 12px;">Lihat Lainnya <i class="bi bi-arrow-right"></i></span>
                </a>
            </div>
            <ul class="nav nav-lt-tab" style="border: 0;" role="tablist">
                @foreach ($produk as $item)
                    <li class="nav-item" style="margin-right: 5px;">
                        <a href="{{ url('detail-wisata') }}/{{ $item->id }}">
                            <div class="card" style="width: 200px; border-radius: 15px; border: none;">
                                <img style="border-radius: 15px; height: 150px; object-fit: cover; padding: 5px;"
                                    src="{{ asset('gambar_wisata') }}/{{ $item->gambar_1 }}" class="card-img-top"
                                    alt="...">
                                <div class="card-body" style="white-space: normal;">
                                    <h5 class="card-title">{{ substr($item->judul_wisata, 0, 14) }} ...</h5>
                                    <span style="font-size: 12px;"><i class="bi bi-calendar"></i> Berlaku hingga {{ date('d-m-Y', strtotime($item->kadaluarsa)) }}</span>
                                    <span style="font-size: 12px;" class="text-warning"><i class="bi bi-coin"></i> {{ number_format($item->koin) }} Coin</span>
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
