{{-- @php
    $data_user = Auth::user();

@endphp --}}

@if (Auth::check())
    <script>
        window.location = "/dashboard";
    </script>
@endif
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

        <style>

            html{
                height: 100%;
            }
            body{
                background: #f2f2f2;
                height: 100%
            }
        </style>
</head>

<body>
    <div>
        <div class="card shadow"
            style="
            aspect-ratio: 2/1;
            border: none;
            border-bottom-left-radius: 30px;
            border-bottom-right-radius: 30px;
            margin: 0;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            background: #f7f9f7;">

            <div class="d-flex justify-content-center" style="margin-top: 40%;">
                <img src="{{ asset('papeid_logo.png') }}" width="300" alt="">
            </div>
            <ul class="d-flex justify-content-center nav nav-pills mb-3 mt-5" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button style="border-radius: 25px;" class="pe-5 ps-5 me-5 nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
                        type="button" role="tab" aria-controls="pills-home" aria-selected="true">
                        <h5>Login</h5>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button style="border-radius: 25px;" class="pe-5 ps-5 nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile"
                        type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
                        <h5>Daftar</h5>
                    </button>
                </li>
            </ul>
        </div>

        <div>
            
            <div class="tab-content" id="pills-tabContent">
                <div style="padding: 25px;" class="tab-pane fade show active" id="pills-home" role="tabpanel"
                    aria-labelledby="pills-home-tab" tabindex="0">

                    <form id="formLogin">
                        <input type="email" name="email" class="form-control mb-3" placeholder="Email"
                            style="border-radius: 10px; border: none; height: 60px;" required>
                        <input type="password" class="form-control mb-3" placeholder="Password"
                            style="border-radius: 10px; border: none; height: 60px;" name="password" required>
                        <div class="d-grid gap-2">
                            <button id="btnLogin" style="height: 60px; border-radius: 25px; background: #0b4980;" class="mt-4 btn btn-primary"
                            >Login</button>
                        </div>
                    </form>
                </div>
                <div style="padding: 25px;" class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                    tabindex="0">
                    <form id="formRegister">
                        <input type="text" name="name" required class="form-control mb-3" placeholder="Nama"
                            style="border-radius: 10px; border: none; height: 60px;">
                        <input type="email" name="email" class="form-control mb-3" placeholder="Email"
                            style="border-radius: 10px; border: none;  height: 60px;">
                        <input type="password" name="password" class="form-control mb-3" placeholder="Password"
                            style="border-radius: 10px; border: none;  height: 60px;">
                        <input type="password" name="password_confirmation" class="form-control mb-3" placeholder="Konfirmasi Password"
                            style="border-radius: 10px; border: none;  height: 60px;">
                        <div class="d-grid gap-2">
                            <button style="height: 60px; border-radius: 25px; background: #0b4980;" class="mt-4 btn btn-primary"
                                >Daftar</button>
                        </div>
                    </form>
                </div>
    
            </div>
        </div>

    </div>
    <script src="https://unpkg.com/axios@0.27.2/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.7/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
    <script>
        formLogin.onsubmit = (e) => {

            e.preventDefault();

            const formData = new FormData(formLogin);
            // document.getElementById(`btnLogin`).style.display = "disable";
            // document.getElementById(`btnLoginLoading`).style.display = "block";

            axios({
                    method: 'post',
                    url: '/loginProses',
                    data: formData,
                })
                .then(function(res) {
                    //handle success
                    if (res.data.responCode == 1) {

                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil Login',
                            timer: 1000,
                            showConfirmButton: false,
                            // text: res.data.respon
                        })

                        setTimeout(() => {
                            location.reload(res.data.respon);
                        }, 1500);

                    } else {

                        Swal.fire({
                            icon: 'warning',
                            title: 'Ada kesalahan',
                            text: `${res.data.respon}`,
                        })
                    }
                })
                .catch(function(res) {
                    //handle error
                    console.log(res);
                }).then(function() {
                    // always executed              
                    document.getElementById(`btnLogin`).style.display = "block";
                    document.getElementById(`btnLoginLoading`).style.display = "none";

                });

        }
    </script>
    <script>
        formRegister.onsubmit = (e) => {

            e.preventDefault();

            const formData = new FormData(formRegister);
            // document.getElementById(`btnLogin`).style.display = "disable";
            // document.getElementById(`btnLoginLoading`).style.display = "block";

            axios({
                    method: 'post',
                    url: '/registerProses',
                    data: formData,
                })
                .then(function(res) {
                    //handle success
                    if (res.data.responCode == 1) {

                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil Mendaftar',
                            timer: 1000,
                            showConfirmButton: false,
                            // text: res.data.respon
                        })

                        setTimeout(() => {
                            window.location.href = '/dashboard';
                        }, 1000);

                    } else {

                        Swal.fire({
                            icon: 'warning',
                            title: 'Ada kesalahan',
                            text: `${res.data.respon}`,
                        })
                    }
                })
                .catch(function(res) {
                    //handle error
                    console.log(res);
                }).then(function() {
                    // always executed              
                    document.getElementById(`btnLogin`).style.display = "block";
                    document.getElementById(`btnLoginLoading`).style.display = "none";

                });

        }
    </script>
</body>

</html>
