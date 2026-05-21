@extends('informasi.layout')

@section('content')

<style>
    .title-testimoni{
        font-size: 60px;
        font-weight: bold;
        text-transform: uppercase;
        color: white;
        text-align: center;
        margin-bottom: 50px;
        letter-spacing: 2px;
    }

    .bg-testimoni{
        background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)),
        url('https://images.unsplash.com/photo-1506744038136-46273834b3fb?q=80&w=1470&auto=format&fit=crop');
        background-size: cover;
        background-position: center;
        padding: 60px 30px;
        border-radius: 20px;
    }

    .video-card{
        background: #000;
        border-radius: 15px;
        overflow: hidden;
        transition: 0.3s;
        box-shadow: 0 8px 20px rgba(0,0,0,0.4);
    }

    .video-card:hover{
        transform: translateY(-5px);
    }

    .video-frame{
        width: 100%;
        height: 250px;
        border: none;
    }

    .video-title{
        color: white;
        font-weight: bold;
        font-size: 18px;
        padding: 15px;
        text-align: center;
    }

    @media(max-width:768px){
        .title-testimoni{
            font-size: 35px;
        }

        .video-frame{
            height: 220px;
        }
    }
</style>

<div class="container-fluid bg-danger py-4 mb-5">
    <h1 class="title-testimoni">
        TESTIMONI
    </h1>
</div>

<div class="container-fluid bg-testimoni">

    <div class="row g-4">

        {{-- VIDEO 1 --}}
        <div class="col-md-3">
            <div class="video-card">

                <iframe
                    class="video-frame"
                    src="https://www.youtube.com/embed/Fk0Sy7iDpwE?si=SkLr-59cjtyL9OCh"
                    allowfullscreen>
                </iframe>

                <div class="video-title">
                    Kursus Setir Mobil ILMA
                </div>

            </div>
        </div>

        {{-- VIDEO 2 --}}
        <div class="col-md-3">
            <div class="video-card">

                <iframe
                    class="video-frame"
                    src="https://www.youtube.com/embed/3kXi4-I5TSI?si=UMdpgIVIf0zEWjBY"
                    allowfullscreen>
                </iframe>

                <div class="video-title">
                    Testimoni 1
                </div>

            </div>
        </div>

        {{-- VIDEO 3 --}}
        <div class="col-md-3">
            <div class="video-card">

                <iframe
                    class="video-frame"
                    src="https://www.youtube.com/embed/wYzLB5ETlwY?si=eJGCJ-nW7ilkPuJn"
                    allowfullscreen>
                </iframe>

                <div class="video-title">
                    Testimoni 2
                </div>

            </div>
        </div>

        {{-- VIDEO 4 --}}
        <div class="col-md-3">
            <div class="video-card">

                <iframe
                    class="video-frame"
                    src="https://www.youtube.com/embed/zZ48NT9Ev-E?si=SbP4mxZS4XFCvnNP"
                    allowfullscreen>
                </iframe>

                <div class="video-title">
                    Testimoni 3
                </div>

            </div>
        </div>

        {{-- VIDEO 5 --}}
        <div class="col-md-3">
            <div class="video-card">

                <iframe
                    class="video-frame"
                    src="https://www.youtube.com/embed/Qmii2WJdqj4?si=gmW7kyaKYcZSS7OR"
                    allowfullscreen>
                </iframe>

                <div class="video-title">
                    Testimoni 4
                </div>

            </div>
        </div>

        {{-- VIDEO 6 --}}
        <div class="col-md-3">
            <div class="video-card">

                <iframe
                    class="video-frame"
                    src="https://www.youtube.com/embed/6XZ9AaP3DMQ?si=BxMsTKi6rFhHSnya"
                    allowfullscreen>
                </iframe>

                <div class="video-title">
                    Testimoni 5
                </div>

            </div>
        </div>

        {{-- VIDEO 7 --}}
        <div class="col-md-3">
            <div class="video-card">

                <iframe
                    class="video-frame"
                    src="https://www.youtube.com/embed/_bLXDLyciDo?si=yYMyQ07EMgBYhPen"
                    allowfullscreen>
                </iframe>

                <div class="video-title">
                    Testimoni 6
                </div>

            </div>
        </div>

        {{-- VIDEO 8 --}}
        <div class="col-md-3">
            <div class="video-card">

                <iframe
                    class="video-frame"
                    src="https://www.youtube.com/embed/8sJ6SDx_DHo?si=ri-R6Ddt4mZs4vel"
                    allowfullscreen>
                </iframe>

                <div class="video-title">
                    Testimoni 7
                </div>

            </div>
        </div>

    </div>

</div>

@endsection