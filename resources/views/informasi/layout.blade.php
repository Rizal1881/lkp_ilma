<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ILMA Driving School</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>

        body{
            background: #f5f7fb;
            font-family: Arial;
        }

        .navbar{
            background: rgba(0,0,0,0.95);
            backdrop-filter: blur(8px);
            padding: 15px 0;
            box-shadow: 0 3px 15px rgba(0,0,0,0.3);
        }

        .nav-link{
            color: white !important;
            font-weight: 600;
            transition: .3s;
        }

        .nav-link:hover{
            color: #ffc107 !important;
        }

        .hero{
            padding-top: 140px;
            padding-bottom: 80px;
        }

        .card-custom{
            border: none;
            border-radius: 25px;
            padding: 35px;
            background: white;
            box-shadow: 0 10px 25px rgba(0,0,0,0.08);
            transition: .3s;
            height: 100%;
        }

        .card-custom:hover{
            transform: translateY(-8px);
        }

        .title{
            font-weight: bold;
            color: #0d6efd;
        }

        .wa-btn{
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: #25D366;
            color: white;
            font-size: 28px;
            padding: 15px 18px;
            border-radius: 50%;
            z-index: 999;
            text-decoration: none;
        }

    </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg fixed-top navbar-dark">
    <div class="container">

        <!-- LOGO -->
        <a class="navbar-brand fw-bold fs-3">
            ILMA Driving School
        </a>

        <!-- TOGGLE MOBILE -->
        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav">

            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- MENU -->
        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav ms-auto align-items-lg-center">

                <!-- HOME -->
                <li class="nav-item">
                    <a href="/dashboard" class="nav-link">
                        Home
                    </a>
                </li>

                <!-- DROPDOWN -->
                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle"
                       href="#"
                       role="button"
                       data-bs-toggle="dropdown">

                        Informasi
                    </a>

                    <ul class="dropdown-menu border-0 shadow rounded-4 p-2">

                        <li><a class="dropdown-item rounded-3" href="/layanan">Layanan</a></li>

                        <li><a class="dropdown-item rounded-3" href="/fasilitas">Fasilitas Kami</a></li>

                        <li><a class="dropdown-item rounded-3" href="/materi">Materi Belajar</a></li>

                        <li><a class="dropdown-item rounded-3" href="/jam-operasional">Jam Operasional</a></li>

                        <li><a class="dropdown-item rounded-3" href="/informasi">Tentang Kami</a></li>

                        <li><a class="dropdown-item rounded-3" href="/visi-misi">Visi, Misi & Tujuan</a></li>

                        <li><a class="dropdown-item rounded-3" href="/testimoni">Testimoni</a></li>

                        <li><a class="dropdown-item rounded-3" href="/sertifikat">Sertifikat</a></li>

                        <li><a class="dropdown-item rounded-3" href="/lokasi">Lokasi Kami</a></li>

                        <li><a class="dropdown-item rounded-3" href="/kontak">Kontak</a></li>

                    </ul>

                </li>

                <!-- DAFTAR -->
                <li class="nav-item">
                    <a href="/pendaftaran" class="nav-link">
                        Daftar
                    </a>
                </li>

                @guest

                <li class="nav-item">
                    <a href="/login" class="nav-link">
                        Login
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/register" class="nav-link">
                        Register
                    </a>
                </li>

                @else

                <li class="nav-item">
                    <a href="/riwayat" class="nav-link">
                        Riwayat
                    </a>
                </li>

                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle"
                       href="#"
                       data-bs-toggle="dropdown">

                        {{ Auth::user()->name }}
                    </a>

                    <ul class="dropdown-menu border-0 shadow rounded-4 p-2">

                        <li>
                            <a class="dropdown-item rounded-3"
                               href="/profile">

                                Profile
                            </a>
                        </li>

                        <li>
                            <form action="/logout" method="POST">
                                @csrf

                                <button class="dropdown-item rounded-3">
                                    Logout
                                </button>
                            </form>
                        </li>

                    </ul>

                </li>

                @endguest

            </ul>

        </div>

    </div>
</nav>

<div class="hero">
    <div class="container">
        @yield('content')
    </div>
</div>

<!-- WA -->
<a href="https://wa.me/6281329791557"
   target="_blank"
   class="wa-btn">

    <i class="bi bi-whatsapp"></i>
</a>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>