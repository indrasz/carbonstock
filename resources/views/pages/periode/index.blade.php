@extends('layouts.app')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper p-sm-5 p-2 pt-4">
            <div class="data-table-area">
                <div class="container-fluid periode-section mb-4">
                    <div class="d-block d-sm-flex justify-content-between align-items-center text-center text-sm-start mb-4">
                        <div class="gap-1">
                            <h4 class="m-0">Manajemen Periode</h4>
                            <p class="m-0" style="color: #90A8BF">Data periode aktif untuk mengatur jangka waktu manajemen
                                Carbon Stock</p>
                        </div>
                        <a href="{{ route('periode.create') }}" class="btn btn-success rounded-3 mt-3 mt-sm-0">Tambahkan Data</a>
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
                                    <h4 class="card-title mb-2">Periode ke-1</h4>
                                    <div class="row align-items-center">
                                        <div class="col-sm-4 col-12">
                                            <div class="d-flex justify-content-between gap-4 align-items-center mb-2">
                                                <div class="d-flex align-items-center justify-content-end gap-2">
                                                    <i style="color: #22710E; font-size: 18px;" class='bx bx-time'></i>
                                                    <span style="color: #90A8BF">Mulai tanggal</span>
                                                </div>
                                                <p class="m-0" style="color: #90A8BF">22 April 2024</p>
                                            </div>
                                            <div class="d-flex justify-content-between gap-4 align-items-center">
                                                <div class="d-flex align-items-center justify-content-end gap-2">
                                                    <i style="color: #22710E; font-size: 18px;" class='bx bx-time-five'></i>
                                                    <span style="color: #90A8BF">Berakhir tanggal</span>
                                                </div>
                                                <p class="m-0" style="color: #90A8BF">3 Juni 2024</p>
                                            </div>
                                        </div>
                                        <div class="col-sm-8 col-12">
                                            <div class="text-sm-end text-start gap-2 d-flex d-sm-block mt-sm-0 mt-2">
                                                <button class="btn btn-warning rounded-3 p-2">Ubah Data</button>
                                                <button class="btn btn-danger rounded-3 p-2">Hapus Data</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-2">
                                <div class="card-body">
                                    <h4 class="card-title mb-2">Periode ke-1</h4>
                                    <div class="row align-items-center">
                                        <div class="col-sm-4 col-12">
                                            <div class="d-flex justify-content-between gap-4 align-items-center mb-2">
                                                <div class="d-flex align-items-center justify-content-end gap-2">
                                                    <i style="color: #22710E; font-size: 18px;" class='bx bx-time'></i>
                                                    <span style="color: #90A8BF">Mulai tanggal</span>
                                                </div>
                                                <p class="m-0" style="color: #90A8BF">22 April 2024</p>
                                            </div>
                                            <div class="d-flex justify-content-between gap-4 align-items-center">
                                                <div class="d-flex align-items-center justify-content-end gap-2">
                                                    <i style="color: #22710E; font-size: 18px;" class='bx bx-time-five'></i>
                                                    <span style="color: #90A8BF">Berakhir tanggal</span>
                                                </div>
                                                <p class="m-0" style="color: #90A8BF">3 Juni 2024</p>
                                            </div>
                                        </div>
                                        <div class="col-sm-8 col-12">
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

@push('after-script')
    <!-- Inject JS -->
    <script src="/assets/js/default-assets/jquery.datatables.min.js"></script>
    <script src="/assets/js/default-assets/datatables.bootstrap4.js"></script>
    <script src="/assets/js/default-assets/datatable-responsive.min.js"></script>
    <script src="/assets/js/default-assets/responsive.bootstrap4.min.js"></script>
    <script src="/assets/js/default-assets/datatable-button.min.js"></script>
    <script src="/assets/js/default-assets/button.bootstrap4.min.js"></script>
    <script src="/assets/js/default-assets/button.html5.min.js"></script>
    <script src="/assets/js/default-assets/button.flash.min.js"></script>
    <script src="/assets/js/default-assets/button.print.min.js"></script>
    <script src="/assets/js/default-assets/datatables.keytable.min.js"></script>
    <script src="/assets/js/default-assets/datatables.select.min.js"></script>
    <script src="/assets/js/default-assets/demo.datatable-init.js"></script>
@endpush
