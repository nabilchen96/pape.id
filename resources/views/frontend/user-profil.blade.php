@extends('frontend.app')
@section('content')
    <div class="d-flex justify-content-center mt-4">
        <img src="{{ asset('papeid_logo.png') }}" height="60" alt="">

    </div>

    <div class="container">
        <div class="card mt-4" style="border: none; border-radius: 15px;">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <img style="border-radius: 25px;" width="100%" height= "100%"; src="{{ asset('foto_profil') }}/{{ $data->foto_profil ?? "office.jpg" }}"
                            alt="">
                    </div>
                    <div class="col-6">
                        <div class="text-start">
                            <h2>{{ $data->name }}</h2>
                            <p>{{ $data->email }}</p>
                            <h1 class="text-warning"><i class="bi bi-coin"></i> {{ $data->koin ?? 0 }}</h1>
                            <button style="border-radius: 25px;" class="btn btn-primary">Edit</button>
                            <a style="border-radius: 25px;" class="btn btn-danger" href="{{ url('logout') }}">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <ul class="nav nav-lt-tab mt-4" style="border: 0;" role="tablist">
            <li class="nav-item" style="margin-right: 5px;">
                <a href="{{ url('user-profil') }}" class="btn btn-primary position-relative"
                    onclick="getData(0)" id="0"
                    style="border-radius: 25px; padding-left: 25px; padding-right: 25px;">Riwayat Tugas</span>
                </a>
            </li>
            <li class="nav-item" style="margin-right: 5px;">
                <a href="{{ url('user-profil?cari=riwayat-koin') }}" class="btn btn-primary mb-3"
                    style="border-radius: 20px; padding-left: 25px; padding-right: 25px;">Penukaran Koin</a>
            </li>
        </ul>
        @if (request('cari') == 'riwayat-koin')

        <div class="row">
            @foreach ($tugas as $item)
                <div class="col-lg-6">
                    <div class="card mb-2" style="border-radius: 15px;">
                        <div class="card-body p-2">
                            <div class="d-flex justify-content-between">
                                <div class="card"
                                    style="
                                background-size: cover;
                                background-position: center;
                                border: none;
                                background-image: url('{{ asset('gambar_wisata') }}/{{ $item->gambar_1 }}'); 
                                border-radius: 15px; 
                                width: 35%">

                                </div>
                                <div style="margin-left: 10px; width: 65%;">
                                    <h6 class="mb-2 mt-1">{{ substr($item->judul_wisata, 0, 25) }}</h6>
                                    <p>
                                        {{ substr($item->keterangan, 0, 45) }}<a
                                            href="{{ url('detail-tugas') }}/{{ $item->id }}">
                                            ...detail</a>
                                    </p>
                                    Anda sudah menukar <br>
                                    <span style="border-radius: 15px;" class="badge bg-warning">
                                        {{ $item->koin }} <i class="bi bi-coin"></i>
                                    </span>
                                    Koin
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        @else

        <div class="row">
            @foreach ($tugas as $item)
                <div class="col-lg-6">
                    <div class="card mb-2" style="border-radius: 15px;">
                        <div class="card-body p-2">
                            <div class="d-flex justify-content-between">
                                <div class="card"
                                    style="
                                background-size: cover;
                                background-position: center;
                                border: none;
                                background-image: url('{{ asset('gambar_tugas') }}/{{ $item->gambar }}'); 
                                border-radius: 15px; 
                                width: 35%">

                                </div>
                                <div style="margin-left: 10px; width: 65%;">
                                    <h6 class="mb-2 mt-1">{{ substr($item->judul_tugas, 0, 25) }}</h6>
                                    <p>
                                        {{ substr($item->keterangan_tugas, 0, 45) }}<a
                                            href="{{ url('detail-tugas') }}/{{ $item->id }}">
                                            ...detail</a>
                                    </p>
                                    @if ($item->status == 'Diterima')
                                        <span style="border-radius: 15px;" class="badge bg-success">Status: {{ $item->status }}</span>
                                    @elseif($item->status == 'Ditolak')
                                        <span style="border-radius: 15px;" class="badge bg-danger">Status:
                                            {{ $item->status }}</span>
                                    @else
                                        <span style="border-radius: 15px;" class="badge bg-warning">Status:
                                            {{ $item->status }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
            
        @endif
        <div class="d-flex justify-content-center">
            {{ $tugas->links() }}
        </div>
    </div>
    <br><br><br><br><br>
@endsection
