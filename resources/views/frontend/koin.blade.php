@extends('frontend.app')
@section('content')
    <div class="d-flex justify-content-center mt-4">
        <img src="{{ asset('papeid_logo.png') }}" height="60" alt="">

    </div>
    <div class="container">
        <div class="card mt-4" style="border: none; border-radius: 15px;">
            <div class="card-body">
                <div class="text-center">
                    Total koin saya
                    <h1 class="text-warning"><i class="bi bi-coin"></i> {{ Auth::user()->koin }}</h1>

                    <br>
                    Selesaikan task, dapatkan koinnya dan tukarkan dengan destinasi wisata yang diinginkan
                </div>
            </div>
        </div>
        <div class="mb-3 mt-5">
            <h3 style="margin-bottom: 0;">Daftar Tugas</h3>
            <span style="font-size: 12px;">Selesaikan Task dan Dapatkan Koin</span>
        </div>
        @php
            $data = DB::table('tugas')
                ->where('kuota', '>', 0)
                ->paginate(3);
        @endphp

        <div class="row">
            @foreach ($data as $item)
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
                                    <span style="border-radius: 15px;" class="badge bg-primary">{{ $item->kuota }}
                                        Orang</span>
                                    <span style="border-radius: 15px;" class="badge bg-warning">{{ $item->koin }}
                                        koin</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center">
            {{ $data->links() }}
        </div>
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
                text: 'Tugas Berhasil Diupload!',
                timer: 3000,
                showConfirmButton: false
            })
        @endif
    </script>
@endpush
