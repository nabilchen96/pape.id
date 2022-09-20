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
                <a href="{{ url('pelatihan') }}" class="btn btn-primary mb-3"
                    style="border-radius: 20px; padding-left: 25px; padding-right: 25px;">Pelatihan</a>
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
        <div class="mb-3">
            <h3 style="margin-bottom: 0;">Trip Liburan</h3>
            <a href="{{ url('list-wisata?cari=all') }}">
                <span style="font-size: 12px;">Lihat Lainnya <i class="bi bi-arrow-right"></i></span>
            </a>
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


        <ul class="nav nav-lt-tab" style="border: 0;" role="tablist">
            @foreach ($wisata as $item)
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

        <div class="mb-3 mt-4">
            <h3 style="margin-bottom: 0;">Produk UKM menarik <br>lainnya dari Pape.id</h3>
            <a href="{{ url('list-produk') }}">
                <span style="font-size: 12px;">Lihat Lainnya <i class="bi bi-arrow-right"></i></span>
            </a>
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
    <br><br><br><br>
@endsection
@push('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.7/dist/sweetalert2.all.min.js"></script>
    <script>
        @if ($message = Session::get('sukses'))
            Swal.fire({
                icon: 'success',
                title: 'Sukses',
                text: 'Koin Berhasil Ditukarkan, untuk informasi lebih lanjut silahkan buka email anda',
                timer: 3000,
                showConfirmButton: false
            })
        @endif
    </script>
@endpush
