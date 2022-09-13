@extends('backend.app')
@push('style')
    <style>
        #myTable_filter input {
            height: 29.67px !important;
        }

        #myTable_length select {
            height: 29.67px !important;
        }

        .btn {
            border-radius: 50px !important;
        }
    </style>
@endpush
@section('content')
    <div class="row" style="margin-top: -200px;">
        <div class="col-md-12">
            <div class="row">
                <div class="col-12 col-xl-8 mb-xl-0">
                    <h3 class="font-weight-bold text-white">Data Kumpul Tugas</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mt-4">
            <div class="card w-100">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="myTable" class="table table-striped" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th width="100px">Gambar</th>
                                    <th>Tugas</th>
                                    <th>Status</th>
                                    <th>Pengumpul</th>
                                    <th>File</th>
                                    <th width="5%"></th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- Modal -->
        <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="form">
                        <div class="modal-header p-3">
                            <h5 class="modal-title m-2" id="exampleModalLabel">Tinjau Tugas</h5>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id" id="id">
                            
                            <div class="form-group">
                                <label for="exampleInputPassword1">Status</label>
                                <select name="status" class="form-control" required id="status">
                                    <option>Diterima</option>
                                    <option>Ditolak</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label>Keterangan</label>
                                <textarea name="keterangan_ditolak" id="keterangan_ditolak" class="form-control" cols="30" rows="5" placeholder="Alasan Penolakan..."></textarea>
                            </div>
                        </div>
                        <div class="modal-footer p-3">
                            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                            <button id="tombol_kirim" class="btn btn-primary btn-sm">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
@push('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            getData()
        })

        function getData() {
            $("#myTable").DataTable({
                "ordering": false,
                ajax: '/back/data-kumpul-task',
                processing: true,
                'language': {
                    'loadingRecords': '&nbsp;',
                    'processing': 'Loading...'
                },
                columns: [{
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        render: function(data, type, row, meta) {
                            return `<div class="card shadow" style="
                                    border: none;
                                    background-size: cover; 
                                    background-position: center; 
                                    background-image: url('/gambar_tugas/${row.gambar_tugas}'); 
                                    aspect-ratio: 1/1; 
                                    width: 80%;"></div>`
                        }
                    },
                    {
                        render: function(data, type, row, meta) {
                            return `${row.judul_tugas}`
                        }
                    },
                    {
                        render: function(data, type, row, meta) {
                            if(row.status == 'Diproses'){

                                return `<span class="badge bg-warning text-white">${row.status}</span>`
                            }
                            else if(row.status == 'Ditolak'){
                                return `<span class="badge bg-danger text-white">${row.status}</span>`

                            }else{
                                return `<span class="badge bg-success text-white">${row.status}</span>`

                            }
                            
                        }
                    },
                    {
                        data: "name"
                    },
                    {
                        render: function(data, type, row, meta) {
                            return `<a href="/gambar_kumpul_tugas/${row.file_tugas}" target="_blank">Download</a>`
                        }
                    },
                    {
                        render: function(data, type, row, meta) {

                            if(row.status == 'Diproses'){

                                return `<a data-toggle="modal" data-target="#modal"
                                        data-bs-id=` + (row.id) + ` href="javascript:void(0)">
                                        <i style="font-size: 1.5rem;" class="text-success bi bi-grid"></i>
                                    </a>`
                            }else{
                                return ``
                            }

                        }
                    },
                ]
            })
        }

        $('#modal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('bs-id') // Extract info from data-* attributes
            var cok = $("#myTable").DataTable().rows().data().toArray()

            let cokData = cok.filter((dt) => {
                return dt.id == recipient;
            })

            document.getElementById("form").reset();
            document.getElementById('id').value = ''
            $('.error').empty();

            if (recipient) {
                var modal = $(this)
                modal.find('#id').val(cokData[0].id)
                modal.find('#status').val(cokData[0].status)
                modal.find('#keterangan_ditolak').val(cokData[0].keterangan_ditolak)
            }
        })

        form.onsubmit = (e) => {

            let formData = new FormData(form);

            e.preventDefault();

            document.getElementById("tombol_kirim").disabled = true;

            axios({
                    method: 'post',
                    url: '/back/tinjau-task',
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

                        $("#modal").modal("hide");
                        $('#myTable').DataTable().clear().destroy();
                        getData()

                    } else {
                        //error validation
                        // document.getElementById('password_alert').innerHTML = res.data.respon.password ?? ''
                        // document.getElementById('email_alert').innerHTML = res.data.respon.email ?? ''
                    }

                    document.getElementById("tombol_kirim").disabled = false;
                })
                .catch(function(res) {
                    //handle error
                    console.log(res);
                    document.getElementById("tombol_kirim").disabled = false;
                });
        }
    </script>
@endpush
