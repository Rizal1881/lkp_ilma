<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LKP ILMA Driving School</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- ICON -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>

        body{
            font-family: Arial;
        }

        .hero{
            background:
            linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)),
            url('{{ asset("tentangkami/person2.jpg") }}');

            background-size: cover;
            background-position: center;
            height: 100vh;
            color: white;
        }

        /* NAVBAR JANGAN DIUBAH */
        .navbar {
            background: rgba(0, 0, 0, 0.9);
            backdrop-filter: blur(8px);
            box-shadow: 0 2px 10px rgba(0,0,0,0.4);
            border-bottom: 2px solid rgba(255,255,255,0.1);
            padding: 15px 0;
        }

        .navbar .nav-link {
            color: white !important;
            font-weight: 500;
            transition: 0.3s;
        }

        .navbar .nav-link:hover {
            color: #ffc107 !important;
            transform: translateY(-2px);
        }

        .section{
            padding: 100px 0;
        }

        html{
            scroll-behavior: smooth;
        }

        .card-custom{
            background: white;
            border-radius: 25px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            height: 100%;
            transition: 0.4s;
        }

        .card-custom:hover{
            transform: translateY(-10px);
        }

        .wa-btn {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: #25D366;
            color: white;
            font-size: 28px;
            padding: 15px 18px;
            border-radius: 50%;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
            z-index: 999;
            transition: 0.3s;
            text-decoration: none;
        }

        .wa-btn:hover {
            transform: scale(1.1);
            background: #1ebe5d;
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

                <!-- DROPDOWN INFORMASI -->
                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle"
                       href="#"
                       role="button"
                       data-bs-toggle="dropdown">

                        Informasi
                    </a>

                    <ul class="dropdown-menu border-0 shadow rounded-4 p-2">

                        <li>
                            <a class="dropdown-item rounded-3"
                               href="/layanan">

                                Layanan
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item rounded-3"
                               href="/fasilitas">

                                Fasilitas Kami
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item rounded-3"
                               href="/materi">

                                Materi Belajar
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item rounded-3"
                               href="/jam-operasional">

                                Jam Operasional
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item rounded-3"
                               href="/informasi">

                                Tentang Kami
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item rounded-3"
                               href="/visi-misi">

                                Visi, Misi & Tujuan
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item rounded-3"
                               href="/testimoni">

                                Testimoni
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item rounded-3"
                               href="/sertifikat">

                                Sertifikat
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item rounded-3"
                               href="/lokasi">

                                Lokasi Kami
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item rounded-3"
                               href="/kontak">

                                Kontak
                            </a>
                        </li>

                    </ul>

                </li>

                <!-- DAFTAR -->
                <li class="nav-item">
                    <a href="/pendaftaran" class="nav-link">
                        Daftar
                    </a>
                </li>

                @guest

                <!-- LOGIN -->
                <li class="nav-item">
                    <a href="/login" class="nav-link">
                        Login
                    </a>
                </li>

                <!-- REGISTER -->
                <li class="nav-item">
                    <a href="/register" class="nav-link">
                        Register
                    </a>
                </li>

                @else

                <!-- RIWAYAT -->
                <li class="nav-item">
                    <a href="/riwayat" class="nav-link">
                        Riwayat
                    </a>
                </li>

                <!-- PROFILE -->
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

<!-- HERO -->
<div class="hero d-flex align-items-center text-center">

    <div class="container">

        <h1 class="fw-bold display-2">
            LKP ILMA
        </h1>

        <h2 class="fw-bold mb-4">
            Driving School
        </h2>

        <p class="fs-4">
            Lembaga Kursus dan Pelatihan Mengemudi Mobil
            yang profesional, aman, dan terpercaya.
        </p>

    </div>

</div>

<!-- APA ITU LKP -->
<div class="section bg-light">

    <div class="container">

        <div class="row align-items-center g-5">

            <div class="col-md-6">

                <img src="{{ asset('tentangkami/person2.jpg') }}"
                     class="img-fluid rounded-4 shadow-lg"
                     style="height:500px; width:100%; object-fit:cover;">

            </div>

            <div class="col-md-6">

                <h1 class="fw-bold text-primary mb-4">
                    Apa itu LKP ILMA?
                </h1>

                <p class="fs-5 text-secondary">

                    <span class="text-danger fw-bold">
                        LKP ILMA Driving School
                    </span>

                    merupakan lembaga kursus dan pelatihan
                    mengemudi mobil yang bergerak di bidang
                    jasa pendidikan keterampilan berkendara.

                </p>

                <p class="fs-5 text-secondary">

                    Kami membantu masyarakat agar mampu
                    mengemudi dengan aman, percaya diri,
                    dan memahami etika berkendara di jalan raya.

                </p>

            </div>

        </div>

    </div>

</div>

<!-- KAPAN DIBUAT -->
<div class="section">

    <div class="container">

        <div class="row align-items-center g-5">

            <div class="col-md-6">

                <h1 class="fw-bold text-primary mb-4">
                    Kapan LKP ILMA Dibuat?
                </h1>

                <p class="fs-5 text-secondary">

                    LKP ILMA Driving School berdiri sejak tahun

                    <span class="fw-bold text-danger">
                        2004
                    </span>

                    dan telah membantu ribuan peserta
                    dalam belajar mengemudi mobil.

                </p>

                <p class="fs-5 text-secondary">

                    Dengan pengalaman bertahun-tahun,
                    ILMA terus berkembang menjadi tempat
                    kursus mengemudi terpercaya.

                </p>

            </div>

            <div class="col-md-6">

                <img src="{{ asset('tentangkami/person.png') }}"
                     class="img-fluid rounded-4 shadow-lg"
                     style="height:500px; width:100%; object-fit:cover;">

            </div>

        </div>

    </div>

</div>

<!-- MENGAPA DIBUAT -->
<div class="section bg-light">

    <div class="container">

        <div class="row align-items-center g-5">

            <div class="col-md-6">

                <img src="{{ asset('tentangkami/person2.jpg') }}"
                     class="img-fluid rounded-4 shadow-lg"
                     style="height:500px; width:100%; object-fit:cover;">

            </div>

            <div class="col-md-6">

                <h1 class="fw-bold text-primary mb-4">
                    Mengapa LKP ILMA Dibuat?
                </h1>

                <p class="fs-5 text-secondary">

                    LKP ILMA dibuat sebagai solusi
                    bagi masyarakat yang ingin belajar
                    mengemudi dengan aman dan profesional.

                </p>

                <p class="fs-5 text-secondary">

                    Banyak masyarakat yang ingin bisa mengemudi
                    namun belum memiliki tempat belajar
                    yang nyaman dan terpercaya.

                </p>

                <p class="fs-5 text-secondary">

                    Karena itu, ILMA hadir untuk membantu
                    menciptakan pengemudi yang disiplin,
                    percaya diri, dan memahami keselamatan
                    berlalu lintas.

                </p>

            </div>

        </div>

    </div>

</div>

<!-- WA BUTTON -->
<a href="https://wa.me/6281329791557"
   target="_blank"
   class="wa-btn">

    <i class="bi bi-whatsapp"></i>

</a>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>