<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <style>
        html{
            /* height: 100%; */
        }

        a{
            text-decoration: none;
        }
        body{
            background: linear-gradient(white, #1c96ee);
            height: 100%;
        }

        .search::placeholder{
            color: #c5c9d2;
        }

        .nav-lt-tab .nav-item .nav-link.active {
            border-top: 2.5px solid #624bff;
        }

        .nav {
            display: inline-block;
            overflow: auto;
            overflow-y: hidden;
            max-width: 100%;
            /* margin: 0 0 1em; */
            white-space: nowrap;
        }

        .nav li {
            display: inline-block;
            vertical-align: top;
        }

        .nav-item {
            margin-bottom: 0 !important;
        }

        .nav:hover> ::-webkit-scrollbar-thumb {
            visibility: visible;
        }

        ::-webkit-scrollbar {
            width: 0.5rem;
        }
    </style>
</head>

<body>
    <nav class="navbar bg-white navbar-expand fixed-bottom" style="bottom: -10px; left: -15px; right: -15px;">
        <ul class="navbar-nav nav-justified w-100">
            <li class="nav-item">
                <a href="{{ url('/home') }}" class="nav-link">
                    <i style="font-size: 20px;" class="bi bi-house-door"></i>
                    <br>
                    <span style="font-size: 10px">HOME</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('koin') }}" class="nav-link">
                    <i style="font-size: 20px;" class="bi bi-coin"></i>
                    <br>
                    <span style="font-size: 10px">KOIN</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i style="font-size: 20px;" class="bi bi-journal-text"></i>
                    <br>
                    <span style="font-size: 10px">TUTORIAL</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('user-profil') }}" class="nav-link">
                    <i style="font-size: 20px;" class="bi bi-person"></i>
                    <br>
                    <span style="font-size: 10px">PROFILE</span>
                </a>
            </li>
        </ul>
    </nav>
    @yield('content')
    @stack('script')
</body>

</html>
