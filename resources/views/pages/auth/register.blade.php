@extends('layouts.guest')

@section('content')
    {{-- Navbar --}}

    <nav class="navbar  w-100 bg-white navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid d-flex justify-content-center align-items-center px-4 py-2">
            <a href="#">
                <h1 class="font-praise text-green mr-3 hero-logo-carbon">Carbon Stock</h1>
            </a>
            <img class="img-telkom" src="{{ asset('assets/img/auth-img/Logo.png') }}" alt="">
        </div>
    </nav>


    <main class="">
        <section class="px-5 py-3" style="">
            <h3>Infromasi Umum</h3>
            <p style="font-size: 1rem;">Silahkan isi informasi umum dengan benar</p>
            <form method="" action="">
                <div class="form-group mb-3">
                    <label for="inputNama">Nama</label>
                    <input type="text" class="form-control" id="inputNama" placeholder="Masukkan nama">
                </div>
                <div class="form-group mb-3">
                    <label for="inputKatasandi">Kata Sandi</label>
                    <input type="password" class="form-control" id="inputKatasandi" placeholder="Masukkan kata sandi">
                </div>
                <div class="form-group mb-3">
                    <label for="inputConfirmKatasandi">Konfirmasi Kata Sandi</label>
                    <input type="password" class="form-control" id="inputConfirmKatasandi"
                        placeholder="Masukkan kembali kata sandi">
                </div>
                <div class="form-group mb-3">
                    <label for="inputTempat">Tempat Lahir</label>
                    <input type="text" class="form-control" id="inputTempat" placeholder="Masukkan tempat lahir">
                </div>
                <div class="form-group mb-3">
                    <label for="inputTanggalLahir">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="inputTanggalLahir">
                </div>
                <div class="form-group mb-3">
                    <label for="inputJenisKelamin">Jenis Kelamin</label>
                    <select class="form-control" id="inputJenisKelamin">
                        <option disabled selected>Pilih Jenis Kelamin</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="inputNoTelepon">Nomor Telepon</label>
                    <input type="tel" class="form-control" id="inputNoTelepon" placeholder="Masukkan nomor telepon">
                </div>
                <div class="form-group mb-3">
                    <label for="inputEmail">Email</label>
                    <input type="email" class="form-control" id="inputEmail" placeholder="Masukkan email">
                </div>
                <a href="#" class="btn btn-success mt-2 rounded-2" style="width: 100%">Daftar Sekarang</a>
            </form>

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
