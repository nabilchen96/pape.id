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
                        <img style="border-radius: 25px;" width="100%" height="100%" ;
                            src="{{ asset('foto_profil') }}/{{ $data->foto_profil ?? 'office.jpg' }}" alt="">
                    </div>
                    <div class="col-6">
                        <div class="text-start">
                            <h2>{{ $data->name }}</h2>
                            <p>{{ $data->email }}</p>
                            <h1 class="text-warning"><i class="bi bi-coin"></i> {{ $data->koin ?? 0 }}</h1>
                            {{-- <button style="border-radius: 25px;" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                class="btn btn-primary">Edit</button> --}}

                            <a style="border-radius: 25px;" class="btn btn-danger" href="{{ url('logout') }}">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="form">
                        <div class="modal-body">

                            <input type="hidden" name="id" value="{{ @$data->user_id }}">

                            <label for="">Edit Nama</label>
                            <input type="text" name="name" class="form-control" value="{{ @$data->name }}">
                            <br>

                            <label for="">Edit Password</label>
                            <input type="password" name="password" class="form-control">
                            <br>
                            <label for="">Edit Foto</label>
                            <input type="file" name="foto_profil" class="form-control">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button id="tombol_kirim" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <ul class="nav nav-lt-tab mt-4" style="border: 0;" role="tablist">
            <li class="nav-item" style="margin-right: 5px;">
                <a href="{{ url('user-profil') }}" class="btn btn-primary position-relative" onclick="getData(0)"
                    id="0" style="border-radius: 25px; padding-left: 25px; padding-right: 25px;">Riwayat
                    Tugas</span>
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
                                            <span style="border-radius: 15px;" class="badge bg-success">Status:
                                                {{ $item->status }}</span>
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
@push('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.7/dist/sweetalert2.all.min.js"></script>

    <script src="https://unpkg.com/axios@0.27.2/dist/axios.min.js"></script>
    <script>
        form.onsubmit = (e) => {

            let formData = new FormData(form);

            e.preventDefault();

            document.getElementById("tombol_kirim").disabled = true;

            axios({
                    method: 'post',
                    url: 'update-profil',
                    data: formData,
                })
                .then(function(res) {
                    //handle success         
                    if (res.data.responCode == 1) {

                        Swal.fire({
                            icon: 'success',
                            title: 'Sukses',
                            text: res.data.respon,
                            timer: 3000,
                            showConfirmButton: false
                        })

                        window.location.replace("/user-profil");

                    } else {


                    }

                    document.getElementById("tombol_kirim").disabled = false;
                })
                .catch(function(res) {
                    //handle error
                    console.log(res);
                });
        }
    </script>
@endpush
