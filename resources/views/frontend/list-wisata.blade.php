@extends('frontend.app')
@section('content')
    <div class="container">
        <div class="d-flex justify-content-center mt-4">
            <img src="{{ asset('papeid_logo.png') }}" height="60" alt="">
        </div>
        <form action="{{ url('list-wisata') }}">
            <div class="d-flex justify-content-between p-0">
                <div class="d-flex flex-row align-items-center mt-3 me-2 border rounded bg-white"
                    style="width: 80%; border-radius: 25px !important;">
                    <i class="bi bi-search me-1 ms-4" style="color: #c5c9d2;"></i>
                    <input type="text" name="cari" class="form-control search me-3" style="border: none; height: 46px;"
                        placeholder="Pilih Destinasi">
                </div>
                {{-- <input type="text" class="form-control mt-3 me-3 search" style="border: none; height: 46px; border-radius: 25px;" placeholder="Pilih Destinasi"> --}}
                <button type="submit" class="btn btn-primary btn-sm mt-3" style="height: 46px; width: 20%; border-radius: 25px;">
                    <i class="bi bi-sliders2" style="font-size: 20px"></i>
                </button>
            </div>
        </form>
        <ul class="nav nav-lt-tab mt-4" style="border: 0;" role="tablist">
            <li class="nav-item" style="margin-right: 5px;">
                <a href="{{ url('list-wisata?cari=all') }}" class="btn btn-primary mb-3"
                    style="border-radius: 20px; padding-left: 25px; padding-right: 25px;"><i class="bi bi-arrow-repeat"></i> Acak</a>
            </li>
            <li class="nav-item" style="margin-right: 5px;">
                <a href="{{ url('list-wisata?cari=hot') }}" class="btn btn-primary mb-3"
                    style="border-radius: 20px; padding-left: 25px; padding-right: 25px;"><i class="bi bi-fire"></i> Hot</a>
            </li>
            <li class="nav-item" style="margin-right: 5px;">
                <a href="{{ url('list-wisata?cari=down') }}" class="btn btn-primary position-relative" onclick="getData(0)" id="0"
                    style="border-radius: 25px; padding-left: 25px; padding-right: 25px;"><i
                        class="bi bi-arrow-down-circle"></i> Koin Terendah</span>
                </a>
            </li>
            <li class="nav-item" style="margin-right: 5px;">
                <a href="{{ url('list-wisata?cari=up') }}" class="btn btn-primary" onclick="getData(1)" id="1"
                    style="border-radius: 25px; padding-left: 25px; padding-right: 25px;"><i
                        class="bi bi-arrow-up-circle"></i> Koin Tertinggi</a>
            </li>
        </ul>
        <div class="mb-2">
            {{-- <h3 style="margin-bottom: 0;">Trip Liburan</h3>
            <span style="font-size: 12px;">Lihat Lainnya <i class="bi bi-arrow-right"></i></span> --}}
        </div>

        @php
            $wisata = DB::table('wisatas')->inRandomOrder()->limit(6)->get();
            $produk = DB::table('produks')
                        ->select(
                            'produks.*', 
                            'users.name'
                        )
                        ->join('users', 'users.id', '=', 'produks.id_user')
                        ->inRandomOrder()->limit(6)->get();
        @endphp
        <div class="row">
            @foreach ($data as $item)
                <div class="col-6">
                    <a href="{{ url('detail-wisata') }}/{{ $item->id }}">
                        <div class="card mb-4" style="border-radius: 15px; border: none;">
                            <img style="border-radius: 15px; height: 150px; object-fit: cover; padding: 5px;"
                                src="{{ asset('gambar_wisata') }}/{{ $item->gambar_1 }}" class="card-img-top"
                                alt="...">
                            <div class="card-body" style="white-space: normal;">
                                <h5 class="card-title">{{ substr($item->judul_wisata, 0, 13) }} ...</h5>
                                <span style="font-size: 11px;"><i class="bi bi-calendar"></i> Berlaku hingga {{ date('d-m-Y', strtotime($item->kadaluarsa)) }}</span>
                                <span style="font-size: 12px;" class="text-warning"><i class="bi bi-coin"></i> {{ number_format($item->koin) }} Coin</span>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <br><br><br><br>
@endsection
