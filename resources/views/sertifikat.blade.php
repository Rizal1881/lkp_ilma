@extends('informasi.layout')

@section('content')

<div class="container py-5">

    <div class="row align-items-center g-5">

        <!-- TEXT -->
        <div class="col-md-6">

            <h1 class="fw-bold text-primary mb-4">
                Sertifikat Kompetensi Instruktur dan Lembaga
            </h1>

            <p class="fs-5 fw-semibold">

                <span class="text-danger fw-bold">
                    Ilma Driving School
                </span>

                telah memiliki sertifikat kompetensi instruktur
                dan lembaga sehingga proses pelatihan dilakukan
                secara profesional dan sesuai standar.

            </p>

            <p class="fs-5 text-secondary">
                Dengan instruktur bersertifikat, peserta akan
                mendapatkan pengalaman belajar mengemudi yang
                aman, nyaman, dan berkualitas.
            </p>

        </div>

        <!-- GAMBAR -->
        <div class="col-md-6 text-center">

            <img 
                src="{{ asset('serti/sertifikat.jpg') }}"
                alt="Sertifikat"
                style="
                    width:100%;
                    max-height:550px;
                    object-fit:contain;
                    border-radius:20px;
                    box-shadow:0 10px 25px rgba(0,0,0,0.2);
                "
            >

        </div>

    </div>

</div>

@endsection