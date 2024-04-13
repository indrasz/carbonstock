@extends('layouts.app')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper p-sm-5 p-2 pt-4">
            <div class="data-table-area">
                <div class="container-fluid periode-section mb-4">
                    <div class="d-block d-sm-flex justify-content-between align-items-center text-center text-sm-start mb-4">
                        <div class="gap-1">
                            <h4 class="m-0">Daftar Regional</h4>
                            <p class="m-0" style="color: #90A8BF">Informasi terkait Data regional yang aktif</p>
                        </div>
                        <button class="btn btn-success rounded-3 mt-3 mt-sm-0">Tambahkan Data</button>
                    </div>

                    <style>
                        .color-grey {
                            color: #90A8BF;
                        }
                    </style>
                    <div class="row">
                        <div class="col-12 box-margin">
                            <div class="card mb-2">
                                <div class="card-body">
                                    <h4 class="card-title mb-2">Regional 1</h4>
                                    <div class="row align-items-center">
                                        <div class="col-sm-8 col-12">
                                            <div class="d-flex justify-content-start gap-2 align-items-center mb-2">
                                                <div class="d-flex align-items-center justify-content-start gap-2">
                                                    <i style="color: #22710E; font-size: 18px;" class='bx bx-map'></i>
                                                    <span style="color: #90A8BF">Lokasi : </span>
                                                </div>
                                                <p class="m-0" style="color: #90A8BF">Bandung</p>
                                            </div>
                                            <div class="d-block justify-content-start gap-4 align-items-center mb-2">
                                                <div class="d-flex align-items-center justify-content-start gap-2">
                                                    <span style="color: #22710E">Detail Alamat </span>
                                                </div>
                                                <p class="mx-0 mt-2" style="color: #90A8BF">Jl. Telekomunikasi. 1, Terusan Buahbatu - Bojongsoang, Telkom University, Sukapura, Kec. Dayeuhkolot, Kabupaten Bandung, Jawa Barat 40257</p>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-12">
                                            <div class="text-sm-end text-start gap-2 d-flex d-sm-block mt-sm-0 mt-2">
                                                <button class="btn btn-warning rounded-3 p-2">Ubah Data</button>
                                                <button class="btn btn-danger rounded-3 p-2">Hapus Data</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@push('after-syle')
@endpush

@push('after-script')
@endpush
