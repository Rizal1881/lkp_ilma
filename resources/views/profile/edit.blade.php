<x-app-layout>

    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="fw-bold text-dark mb-0">
                {{ __('Profile Pengguna') }}
            </h2>

            <span class="badge bg-primary px-3 py-2">
                Akun Aktif
            </span>
        </div>
    </x-slot>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background: #f4f6f9;
        }

        .profile-card{
            border: none;
            border-radius: 20px;
            overflow: hidden;
            transition: 0.3s;
        }

        .profile-card:hover{
            transform: translateY(-5px);
        }

        .card-header-custom{
            background: linear-gradient(135deg, #0d6efd, #0b5ed7);
            color: white;
            padding: 18px;
        }

        .section-title{
            font-size: 18px;
            font-weight: 700;
        }

        .section-desc{
            font-size: 14px;
            opacity: 0.9;
        }

        .main-container{
            padding-top: 40px;
            padding-bottom: 50px;
        }

        .welcome-box{
            background: linear-gradient(135deg, #0d6efd, #4ea3ff);
            border-radius: 20px;
            color: white;
            padding: 35px;
            margin-bottom: 30px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }

        .welcome-box h3{
            font-weight: bold;
        }

        .shadow-custom{
            box-shadow: 0 10px 25px rgba(0,0,0,0.08);
        }
    </style>

    <div class="container main-container">

        <!-- HEADER -->
        <div class="welcome-box">
            <h3>Selamat Datang, {{ Auth::user()->name }} 👋</h3>
            <p class="mb-0">
                Kelola informasi akun, keamanan password, dan pengaturan profil Anda di halaman ini.
            </p>
        </div>

        <div class="row g-4">

            <!-- UPDATE PROFILE -->
            <div class="col-lg-12">
                <div class="card profile-card shadow-custom">

                    <div class="card-header-custom">
                        <div class="section-title">
                            Informasi Profile
                        </div>

                        <div class="section-desc">
                            Ubah nama dan email akun Anda.
                        </div>
                    </div>

                    <div class="card-body p-4">
                        @include('profile.partials.update-profile-information-form')
                    </div>

                </div>
            </div>

            <!-- UPDATE PASSWORD -->
            <div class="col-lg-12">
                <div class="card profile-card shadow-custom">

                    <div class="card-header bg-success text-white p-4">
                        <div class="section-title">
                            Keamanan Password
                        </div>

                        <div class="section-desc">
                            Gunakan password yang kuat agar akun lebih aman.
                        </div>
                    </div>

                    <div class="card-body p-4">
                        @include('profile.partials.update-password-form')
                    </div>

                </div>
            </div>

            <!-- DELETE ACCOUNT -->
            <div class="col-lg-12">
                <div class="card profile-card shadow-custom border-danger">

                    <div class="card-header bg-danger text-white p-4">
                        <div class="section-title">
                            Hapus Akun
                        </div>

                        <div class="section-desc">
                            Tindakan ini permanen dan tidak dapat dikembalikan.
                        </div>
                    </div>

                    <div class="card-body p-4">
                        @include('profile.partials.delete-user-form')
                    </div>

                </div>
            </div>

        </div>
    </div>

</x-app-layout>