@extends('informasi.layout')

@section('content')

<h1 class="text-center fw-bold mb-5 title">
    Fasilitas Kami
</h1>

<div class="row g-4">

    @php
    $data = [
        ['🚗 Armada Lengkap','Armada latihan yang memadai (Manual & Matic)'],
        ['👨‍🏫 Instruktur Profesional','Instruktur pria/wanita berpengalaman dan bersertifikat kompeten'],
        ['⏰ Jadwal Fleksibel','Jam latihan menyesuaikan termasuk kelas malam*'],
        ['📘 Materi Standar','Materi pembelajaran sesuai standar kepolisian'],
        ['🚐 Antar Jemput','Layanan antar-jemput untuk kenyamanan peserta*'],
        ['📄 Bersertifikat','Peserta mendapatkan sertifikat resmi'],
        ['👤 Privat','Belajar privat agar lebih fokus dan cepat bisa'],
        ['✅ Bergaransi','Garansi pembelajaran hingga bisa*'],
    ];
    @endphp

    @foreach($data as $d)

    <div class="col-md-3">
        <div class="card-custom text-center">
            <h4 class="title">{{ $d[0] }}</h4>
            <p class="fw-bold mt-3">{{ $d[1] }}</p>
        </div>
    </div>

    @endforeach

</div>

<p class="text-center mt-4 fw-bold">
    *Syarat dan ketentuan berlaku
</p>

@endsection