@extends('layouts.guest')

@section('content')
    <nav class="navbar position-fixed w-100 bg-white z-3 navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid px-4 py-2">
            <h2 class="font-praise text-green fs-1 mb-0 mr-4">Carbon Stock</h2>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link fw-bold fs-6" href="#">Mapping Area</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold fs-6" href="#">Kontak Kami</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- main --}}
    <main class="row w-100vw h-100vh">

        {{-- left --}}
        <section class="col-12 col-md-6 px-4 d-flex flex-column justify-content-center align-items-center">
            <div class="d-flex align-items-center gap-4 mb-2 px-4 px-md-0">
                <h1 class="font-praise text-green hero-logo-carbon">Carbon Stock</h1>
                <img class="img-telkom" src="{{ asset('assets/img/auth-img/Logo.png') }}" class="">
            </div>

            <div class="text-center mb-4">
                <h2 class="hero-title">Satu Visi: Bumi Hijau, Masa<br> Depan Berkelanjutan</h2>
                <p class="fs-6">Masuk dan nikmati pengalaman yang terbaik</->
            </div>


            <a class="d-block hover text-center py-3 w-cta fs-6 fw-bold text-white bg-green rounded"
                href="{{ route('login.email') }}">Lanjutkan dengan E-mail</a>
            <!-- separator -->
            <div class="d-flex my-4">
                <span>atau</span>
            </div>
            <!-- Button Google -->
            <a href=""
                class="d-flex gap-2 justify-content-center align-items-center text-center py-3 w-cta fs-6 fw-bold border-2 border rounded">
                <img class="img-cta"
                    src="https://lh3.googleusercontent.com/COxitqgJr1sJnIDe8-jiKhxDx1FrYbtRHKJ9z_hELisAlapwE9LUPh6fcXIfb5vwpbMl4xl9H9TRFPc5NOO8Sb3VSgIBrfRYvW6cUA">
                <p class="mb-0 fs-6 fw-bold">Lanjutkan dengan Google</p>
            </a>
        </section>

        {{-- right --}}
        <section class="col-6 d-none d-md-block p-0">

            {{-- carousel --}}
            <div class="carousel gap-0" data-flickity='{ "autoPlay": true,"prevNextButtons": false }'>
                <div class="carousel-cell">
                    <div class="position-relative bg-danger-300 h-100vh w-100">
                        <img class="position-absolute h-100 w-100 top-0"
                            src="{{ asset('assets/img/auth-img/gradient.png') }}">
                        <img class="w-100 h-100 object-fit-cover"
                            src="{{ asset('assets/img/auth-img/Telkom University.png') }}">
                        <div class="position-absolute slider-text-wrapper w-100 text-white text-center">
                            <p class="text-white fs-1 fw-bolder mb-2 lh-sm">Meningkatkan Hutan,<br>Menghijaukan Bumi</p>
                            <p class="text-white fs-6 opacity-75">
                                Menjaga bumi dengan meningkatkan hutan dan mengurangi <br> emisi karbon.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="carousel-cell">
                    <div class="position-relative bg-danger-300 h-100vh w-100">
                        <img class="position-absolute h-100 w-100 top-0"
                            src="{{ asset('assets/img/auth-img/gradient.png') }}">
                        <img class="w-100 h-100 object-fit-cover"
                            src="{{ asset('assets/img/auth-img/Telkom University.png') }}">
                        <div class="position-absolute slider-text-wrapper w-100 text-white text-center">
                            <p class="text-white fs-1 fw-bolder mb-2 lh-sm">Meningkatkan Hutan,<br>Menghijaukan Bumi</p>
                            <p class="text-white fs-6 opacity-75">
                                Menjaga bumi dengan meningkatkan hutan dan mengurangi <br> emisi karbon.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="carousel-cell">
                    <div class="position-relative bg-danger-300 h-100vh w-100">
                        <img class="position-absolute h-100 w-100 top-0"
                            src="{{ asset('assets/img/auth-img/gradient.png') }}">
                        <img class="w-100 h-100 object-fit-cover"
                            src="{{ asset('assets/img/auth-img/Telkom University.png') }}">
                        <div class="position-absolute slider-text-wrapper w-100 text-white text-center">
                            <p class="text-white fs-1 fw-bolder mb-2 lh-sm">Meningkatkan Hutan,<br>Menghijaukan Bumi</p>
                            <p class="text-white fs-6 opacity-75">
                                Menjaga bumi dengan meningkatkan hutan dan mengurangi <br> emisi karbon.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </main>
@endsection

@push('after-style')
    <style>
        a {
            color: black
        }

        .font-praise {
            font-family: "Praise", cursive;
        }

        .font-gilroy {
            font-family: "Gilroy-Bold", sans-serif;
        }

        .font-bold {
            font-weight: 800;
        }

        .text-green {
            color: #047857;
            font-weight: 100;
        }

        .bg-green {
            background-color: #2B8D12;
        }

        .w-cta {
            width: 260px;
        }

        .img-cta {
            width: 20px;
            height: 20px;
        }

        .carousel {
            background: #EEE;
        }

        .carousel-cell {
            width: 100%;
            /* height: 200px; */
            margin-right: 10px;
            /* background: #8C8; */
            border-radius: 5px;
            /* counter-increment: gallery-cell; */
        }

        /* carousel dot pagination */

        .flickity-page-dots {
            bottom: 40px;
        }

        .flickity-page-dots .dot {
            width: 8px;
            height: 8px;
            opacity: 1;
            background: rgba(128, 128, 128, 0.5);
        }

        .flickity-page-dots .dot.is-selected {
            background: white;
        }

        .img-telkom {
            width: 80px;
        }

        .hero-logo-carbon {
            font-size: 32px;
        }

        .hero-title {
            font-family: 'Gilroy-Bold', sans-serif;
        }

        .slider-text-wrapper {
            bottom: 80px;
        }

        .slider-text-wrapper:nth-child(1) {
            font-family: 'Gilroy-Bold', sans-serif;
            font-size: 42px;
        }

        /* responsive */

        @media only screen and (min-width: 992px) {
            .w-cta {
                width: 380px !important;
            }

            .hero-logo-carbon {
                font-size: 52px;
            }

            .img-telkom {
                width: 100px;
            }

        }
    </style>
@endpush
