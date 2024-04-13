@extends('layouts.app')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper p-sm-5 p-2 pt-4">
            <div class="container-fluid periode-section mb-4">
                <div class="d-block d-sm-flex justify-content-between align-items-center text-center text-sm-start mb-4">
                    <div class="gap-1">
                        <h4 class="m-0">Daftar Tim</h4>
                        <p class="m-0" style="color: #90A8BF">Informasi data terkait tim Carbon Stock</p>
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
                                <h4 class="card-title mb-2">Tim Regional 1 Bandung</h4>
                                <div class="row align-items-center">
                                    <div class="col-sm-7 col-12">
                                        <div class="d-flex justify-content-between gap-4 align-items-center mb-2">
                                            <div class="d-flex align-items-center justify-content-end gap-2">
                                                <i style="color: #22710E; font-size: 18px;" class='bx bx-user'></i>
                                                <span style="color: #90A8BF">Ketua tim</span>
                                            </div>
                                            <p class="m-0" style="color: #90A8BF">Wahyu Indra</p>
                                        </div>
                                        <div class="d-flex justify-content-between gap-4 align-items-center">
                                            <div class="d-flex align-items-center justify-content-end gap-2">
                                                <i style="color: #22710E; font-size: 18px;" class='bx bx-group'></i>
                                                <span style="color: #90A8BF">Daftar Anggota</span>
                                            </div>
                                            <div class="d-flex align-items-center gap-2 overflow-x-auto">
                                                <span class="badge p-2" style="background: #3e8829;">Andre</span>
                                                <span class="badge p-2" style="background: #3e8829;">Indra</span>
                                                <span class="badge p-2" style="background: #3e8829;">Andre</span>
                                                <span class="badge p-2" style="background: #3e8829;">Indra</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-5 col-12">
                                        <div class="text-sm-end text-start gap-2 d-flex d-sm-block mt-sm-0 mt-3">
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
@endsection

@push('after-syle')
    <style>
        /* .dataTables_wrapper.dt-bootstrap4.no-footer .dataTables_filter {
                                                display: flex !important;
                                                justify-content: flex-right !important;
                                                flex: right;
                                            } */
        div.dataTables_wrapper div.dataTables_filter {
            text-align: right !important;
        }
    </style>
@endpush
