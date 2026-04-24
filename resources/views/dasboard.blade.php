<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LKP ILMA Driving School</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- ICON (WA) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
    body { font-family: Arial; }

    .hero {
        background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),
        url('https://images.unsplash.com/photo-1503376780353-7e6692767b70') center/cover;
        height: 100vh;
        color: white;
    }

    /* NAVBAR DIPERBAIKI SAJA */
    .navbar {
        background: rgba(0, 0, 0, 0.9); /* lebih pekat biar jelas */
        backdrop-filter: blur(8px);
        box-shadow: 0 2px 10px rgba(0,0,0,0.4);
        border-bottom: 2px solid rgba(255,255,255,0.1); /* garis bawah */
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

    .section { padding: 80px 0; }

    .card:hover {
        transform: scale(1.05);
        transition: 0.3s;
    }

    html {
        scroll-behavior: smooth;
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
        <a class="navbar-brand fw-bold">ILMA Driving School</a>

        <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a href="#home" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="#layanan" class="nav-link">Layanan</a></li>
            <li class="nav-item"><a href="#informasi" class="nav-link">Informasi</a></li>
            <li class="nav-item"><a href="#testimoni" class="nav-link">Testimoni</a></li>
            <li class="nav-item"><a href="#kontak" class="nav-link">Kontak</a></li>
            <li class="nav-item"><a href="/siswa/create" class="nav-link">Daftar</a></li>
                        
            @guest
            <li class="nav-item"><a href="/login" class="nav-link">Login</a></li>
            <li class="nav-item"><a href="/register" class="nav-link">Register</a></li>
            @else

            <!-- RIWAYAT -->
            <li class="nav-item">
                <a href="/riwayat" class="nav-link">Riwayat</a>
            </li>

            <!-- PROFIL DROPDOWN -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                    {{ Auth::user()->name }}
                </a>

                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/profil">Profil</a></li>

                    <li>
                        <form action="/logout" method="POST">
                            @csrf
                            <button class="dropdown-item">Logout</button>
                        </form>
                    </li>
                </ul>
            </li>

            @endguest

        </ul>
    </div>
</nav>

<!-- HERO -->
<div class="hero d-flex align-items-center text-center" id="home">
    <div class="container">
        <h1 class="fw-bold">Belajar Mengemudi Profesional</h1>
        <p>Kursus setir mobil terbaik di LKP ILMA</p>

        <a href="/siswa/create" class="btn btn-warning m-2">Daftar Sekarang</a>
    </div>
</div>

<!-- KENAPA MEMILIH KAMI -->
<div class="section text-center" id="layanan">
    <div class="container">

        <h2 class="mb-5 fw-bold">Kenapa Memilih Kami</h2>

        <div class="row g-4">

            <div class="col-md-4">
                <div class="card shadow p-4 h-100 border-0 rounded-4">
                    <h4 class="text-primary fw-bold">Instruktur Berpengalaman</h4>
                    <p class="fw-semibold">
                        Dibimbing langsung oleh instruktur profesional, sabar,
                        dan berpengalaman sehingga proses belajar lebih aman,
                        nyaman, dan mudah dipahami oleh pemula
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow p-4 h-100 border-0 rounded-4">
                    <h4 class="text-primary fw-bold">Jadwal Fleksibel</h4>
                    <p class="fw-semibold">
                        Waktu kursus bisa disesuaikan dengan kesibukan Anda.
                        Cocok untuk pelajar, karyawan, maupun ibu rumah tangga
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow p-4 h-100 border-0 rounded-4">
                    <h4 class="text-primary fw-bold">Mobil Manual & Matic</h4>
                    <p class="fw-semibold">
                        Tersedia pilihan mobil manual maupun matic,
                        sehingga peserta dapat belajar sesuai kebutuhan
                        dan lebih percaya diri saat berkendara
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow p-4 h-100 border-0 rounded-4">
                    <h4 class="text-primary fw-bold">Harga Terjangkau</h4>
                    <p class="fw-semibold">
                        Biaya kursus kompetitif tanpa biaya tersembunyi.
                        Investasi terbaik untuk kemampuan mengemudi
                    </p>
                </div>
            </div>

        </div>

    </div>
</div>

<!-- INFORMASI + VISI MISI -->
<!-- TENTANG KAMI -->
<div class="section bg-light" id="informasi">
    <div class="container">

        <div class="row align-items-center">

            <!-- GAMBAR -->
            <div class="col-md-5 mb-4">
                <img src="https://images.unsplash.com/photo-1503376780353-7e6692767b70"
                     class="img-fluid rounded-4 shadow">
            </div>

            <!-- TEXT -->
            <div class="col-md-7">

                <h2 class="fw-bold text-primary mb-3">Tentang Kami</h2>

                <p class="fw-bold">
                    <span class="text-danger">Ilma Driving School</span> telah terdaftar secara resmi dan beroperasi sesuai dengan ketentuan yang berlaku :
                </p>

                <ul class="list-unstyled fw-semibold">

                    <li class="mb-2">
                        <i class="bi bi-check-circle-fill text-primary"></i>
                        NPSN : K9997042
                    </li>

                    <li class="mb-2">
                        <i class="bi bi-check-circle-fill text-primary"></i>
                        Ijin Operasional : 503/12/OP.LKP/XII/2025
                    </li>

                    <li class="mb-3">
                        <i class="bi bi-check-circle-fill text-primary"></i>
                        SK Kemenkumham : AHU-0027898.AH.01.04 Tahun 2015
                    </li>

                </ul>

                <p>
                    <span class="text-danger fw-bold">Ilma Driving School</span> hadir sebagai solusi kursus mengemudi
                    yang aman, nyaman, dan terpercaya. Kami berkomitmen membantu setiap peserta,
                    baik pemula maupun yang ingin meningkatkan kemampuan agar lebih percaya diri
                    saat berkendara di jalan raya.
                </p>

                <p class="fw-semibold">
                    Kepuasan dan keberhasilan peserta adalah prioritas utama kami.
                </p>

            </div>

        </div>

    </div>
</div>

        </div>

        <div class="row g-4">

            <div class="col-md-4">
                <div class="card shadow p-4 border-0 rounded-4">
                    <h4 class="text-primary">Visi</h4>
                    <p>Menjadikan Sekolah Mengemudi ILMA Sebagai Sekolah mengemudi mobil yang profesional dan berkualitas.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow p-4 border-0 rounded-4">
                    <h4 class="text-primary">Misi</h4>
                    <p>
                        1. Membantu meningkatkan Sumber Daya Manusia yang terampil dan profesional dalam mengemudi untuk menjadi pelopor tertib berlalulintas.<br>
                        2. Menjadi sekolah mengemudi yang dipercaya dalam memberikan manfaat bagi masyarakat khususnya dalam bidang pelatihan mengemudi mobil.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow p-4 border-0 rounded-4">
                    <h4 class="text-primary">Tujuan</h4>
                    <p>Sekolah Mengemudi ILMA didirikan dengan tujuan untuk membantu memberikan pelatihan dan keterampilan mengemudi kepada masyarakat dengan fasilitas yang memadai dan biaya yang sangat terjangkau.</p>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- TESTIMONI -->
<div class="section" id="testimoni" style="background: yellow;">
    <div class="container text-center">

        <h2 class="fw-bold text-primary mb-5">Kata Pelanggan Kami</h2>

        <div class="row g-4 justify-content-center">

            <!-- TESTI 1 -->
            <div class="col-md-4">
                <div class="p-4 rounded-4 shadow" style="background: #eee;">
                    <p class="fw-bold text-primary">
                        "Selama ikut pelatihan mengemudi di ilma saya merasa lebih yakin
                        dalam mengendarai mobil sendiri, beberapa kali ke luar kota
                        didampingi abah.. sukses selalu ilma."
                    </p>
                    <h5 class="text-danger fw-bold mt-3">- Muh Alana</h5>
                </div>
            </div>

            <!-- TESTI 2 -->
            <div class="col-md-4">
                <div class="p-4 rounded-4 shadow" style="background: #eee;">
                    <p class="fw-bold text-primary">
                        "Alhamdulillah, tdk nyangka dpt pelatih perempuan OK,
                        mengarahkan dg sabar, sepanjang jln enjoy ngobrolnya,
                        bs membuat suasana tegang mjd rileks dan santai.
                        Sukses untuk ILMA, terkhusus mb devi."
                    </p>
                    <h5 class="text-danger fw-bold mt-3">- Anik Enikmawati</h5>
                </div>
            </div>

            <!-- TESTI 3 -->
            <div class="col-md-4">
                <div class="p-4 rounded-4 shadow" style="background: #eee;">
                    <p class="fw-bold text-primary">
                        "Pengajarnya sabar, karyawan di kantor pun juga ramah.
                        Hanya 5 jam saja sudah lebih percaya diri bawa mobil di jalan."
                    </p>
                    <h5 class="text-danger fw-bold mt-3">- Nareswari Dahayu</h5>
                </div>
            </div>

        </div>

    </div>
</div>
<!-- SERTIFIKAT -->
<div class="section" id="sertifikat">
    <div class="container">

        <div class="row align-items-center">

            <!-- TEXT -->
            <div class="col-md-6">

                <h2 class="fw-bold text-primary mb-3">
                    Sertifikat Kompetensi Instruktur dan Lembaga
                </h2>

                <p class="fw-semibold">
                    <span class="text-danger fw-bold">Ilma Driving School</span> telah memiliki
                    sertifikat kompetensi instruktur dan lembaga, menjamin bahwa setiap
                    instruktur dan sistem pelatihan kami telah memenuhi standar kompetensi
                    yang ditetapkan, sehingga peserta mendapatkan pembelajaran yang aman,
                    profesional, dan berkualitas.
                </p>

            </div>

            <!-- GAMBAR -->
            <div class="col-md-6 text-center">
                <img src="https://images.unsplash.com/photo-1603575448361-6f9b3e0c6d85"
                     class="img-fluid rounded-4 shadow"
                     style="max-height: 350px;">
            </div>

        </div>

    </div>
</div>
<!-- MAPS -->
<div class="section" id="maps">
    <div class="container">
        <h2 class="text-center fw-bold mb-4">Lokasi Kami</h2>

        <iframe 
            src="https://www.google.com/maps?q=Sukoharjo&output=embed"
            width="100%" height="400" style="border:0;">
        </iframe>

        <!-- ALAMAT PINDAH KE SINI -->
        <div class="mt-3 text-center">
            <p class="fw-semibold">
                📍 Dusun I, Wirogunan, Kec. Kartasura, Kabupaten Sukoharjo, Jawa Tengah 57166
            </p>
        </div>

    </div>
</div>

<!-- KONTAK -->
<div class="section bg-dark text-white text-center" id="kontak">
    <div class="container">
        <h2 class="fw-bold mb-4">Kontak Kami</h2>

        <p>
        📞 WhatsApp:
        <a href="https://wa.me/6281329791557" class="text-white fw-bold">
        0813-2979-1557
        </a>
        </p>

        <p>📧 ilmadrivingschool@gmail.com</p>

        <hr>

        <h5>Follow Kami</h5>

        <a href="#" class="btn btn-danger m-2">Instagram</a>
        <a href="#" class="btn btn-primary m-2">Facebook</a>

    </div>
</div>

<!-- WA BUTTON -->
<a href="https://wa.me/6281329791557" target="_blank" class="wa-btn">
    <i class="bi bi-whatsapp"></i>
</a>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>