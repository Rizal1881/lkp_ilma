@extends('informasi.layout')

@section('content')

<div class="container py-5">

    <div class="row align-items-center">

         <!-- GAMBAR -->
        <div class="col-md-5 mb-4">

            <img 
                src="{{ asset('tentangkami/person2.jpg') }}"
                alt="Tentang Kami"
                class="img-fluid rounded-4 shadow-lg"
                style="
                    height: 450px;
                    object-fit: cover;
                    width:100%;
                "
            >

        </div>

        <!-- TEXT -->
        <div class="col-md-7">

            <h1 class="fw-bold text-primary mb-4">
                Tentang Kami
            </h1>

            <p class="fw-bold fs-5">
                <span class="text-danger">
                    Ilma Driving School
                </span>

                telah terdaftar secara resmi dan beroperasi sesuai
                dengan ketentuan yang berlaku :
            </p>

            <ul class="list-unstyled fs-5 fw-semibold">

                <li class="mb-3">
                    <i class="bi bi-check-circle-fill text-primary"></i>
                    NPSN : K9997042
                </li>

                <li class="mb-3">
                    <i class="bi bi-check-circle-fill text-primary"></i>
                    Ijin Operasional :
                    503/12/OP.LKP/XII/2025
                </li>

                <li class="mb-4">
                    <i class="bi bi-check-circle-fill text-primary"></i>
                    SK Kemenkumham :
                    AHU-0027898.AH.01.04 Tahun 2015
                </li>

            </ul>

            <p class="fs-5">
                <span class="text-danger fw-bold">
                    Ilma Driving School
                </span>

                hadir sebagai solusi kursus mengemudi
                yang aman, nyaman, dan terpercaya.
                Kami berkomitmen membantu setiap peserta,
                baik pemula maupun yang ingin meningkatkan kemampuan
                agar lebih percaya diri saat berkendara di jalan raya.
            </p>

            <p class="fw-bold fs-5 mt-3">
                Kepuasan dan keberhasilan peserta adalah
                prioritas utama kami.
            </p>

        </div>

    </div>

</div>

@endsection