@extends('layouts.app')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper p-sm-4 p-2 pt-4">
            <section class="plot-area-section mb-4">
                <div class="d-block d-sm-flex justify-content-between align-items-center text-center text-sm-start mb-4">
                    <div class="gap-1">
                        <h4 class="m-0">Detail Plot Area A</h4>
                        <p class="m-0" style="color: #90A8BF">Detail ringkasan data dari plot area A</p>
                    </div>
                    <button class="btn btn-warning rounded-3 mt-3 mt-sm-0">Ubah Data Plot</button>
                </div>
                <div class="row">
                    <div class="col-md-6 height-card box-margin">
                        <div class="card">
                            <img class="card-img-top img-responsive p-3 rounded-5" src="/assets/img/gallery-img/4.jpg"
                                alt="Card image cap">
                            <div class="card-body">
                                <h4 class=" mb-0">Plot A</h4>
                                <p class="card-text">Hamparan 1</p>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <div class="d-flex align-items-center gap-2">
                                        <i style="color: #22710E; font-size: 18px;" class='bx bx-info-circle'></i>
                                        <span style="color: #90A8BF">Kandungan Karbon</span>
                                    </div>
                                    <p class="m-0" style="color: #90A8BF">34.35 ton/ha</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <div class="d-flex align-items-center gap-2">
                                        <i style="color: #22710E; font-size: 18px;" class='bx bx-info-circle'></i>
                                        <span style="color: #90A8BF">Serapan CO2</span>
                                    </div>
                                    <p class="m-0" style="color: #90A8BF">126.60 ton/ha</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <div class="d-flex align-items-center gap-2">
                                        <i style="color: #22710E; font-size: 18px;" class='bx bx-time'></i>
                                        <span style="color: #90A8BF">Tanggal Pencatatan</span>
                                    </div>
                                    <p class="m-0" style="color: #90A8BF">22 Mei - 3 Jun 2023</p>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 height-card box-margin">
                        <div class="card">
                            <div class="card-body">
                                <h4 class=" mb-0">Summary Total</h4>
                                <p class="card-text">Kandungan Karbon (Ton C/Ha)</p>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <p style="color: #90A8BF" class="m-0">Seresah</p>
                                    <p class="m-0 text-end" style="color: #90A8BF">34.35 ton/ha</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <p style="color: #90A8BF" class="m-0">Tumbuhan Bawah</p>
                                    <p class="m-0 text-end" style="color: #90A8BF">126.60 ton/ha</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <p style="color: #90A8BF" class="m-0">Semai</p>
                                    <p class="m-0 text-end" style="color: #90A8BF">34.35 ton/ha</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <p style="color: #90A8BF" class="m-0">Pancang</p>
                                    <p class="m-0 text-end" style="color: #90A8BF">126.60 ton/ha</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <p style="color: #90A8BF" class="m-0">Tiang</p>
                                    <p class="m-0 text-end" style="color: #90A8BF">34.35 ton/ha</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <p style="color: #90A8BF" class="m-0">Pohon</p>
                                    <p class="m-0 text-end" style="color: #90A8BF">126.60 ton/ha</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <p style="color: #90A8BF" class="m-0">Nekromas</p>
                                    <p class="m-0 text-end" style="color: #90A8BF">34.35 ton/ha</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <p style="color: #90A8BF" class="m-0">Tanah</p>
                                    <p class="m-0 text-end" style="color: #90A8BF">126.60 ton/ha</p>
                                </div>
                                {{-- <div class="d-flex justify-content-between align-items-center mb-2">
                                    <div class="d-flex align-items-center gap-2">
                                        <i style="color: #22710E; font-size: 18px;" class='bx bx-time'></i>
                                        <span style="color: #90A8BF">Tanggal Pencatatan</span>
                                    </div>
                                    <p class="m-0 text-end" style="color: #90A8BF">22 Mei - 3 Jun 2023</p>
                                </div> --}}

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 height-card box-margin">
                        <div class="card">
                            <div class="card-body">
                                <h4 class=" mb-0">Summary Total</h4>
                                <p class="card-text">Serapan CO2 (Ton C/Ha)</p>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <p style="color: #90A8BF" class="m-0">Seresah</p>
                                    <p class="m-0 text-end" style="color: #90A8BF">34.35 ton/ha</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <p style="color: #90A8BF" class="m-0">Tumbuhan Bawah</p>
                                    <p class="m-0 text-end" style="color: #90A8BF">126.60 ton/ha</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <p style="color: #90A8BF" class="m-0">Semai</p>
                                    <p class="m-0 text-end" style="color: #90A8BF">34.35 ton/ha</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <p style="color: #90A8BF" class="m-0">Pancang</p>
                                    <p class="m-0 text-end" style="color: #90A8BF">126.60 ton/ha</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <p style="color: #90A8BF" class="m-0">Tiang</p>
                                    <p class="m-0 text-end" style="color: #90A8BF">34.35 ton/ha</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <p style="color: #90A8BF" class="m-0">Pohon</p>
                                    <p class="m-0 text-end" style="color: #90A8BF">126.60 ton/ha</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <p style="color: #90A8BF" class="m-0">Nekromas</p>
                                    <p class="m-0 text-end" style="color: #90A8BF">34.35 ton/ha</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <p style="color: #90A8BF" class="m-0">Tanah</p>
                                    <p class="m-0 text-end" style="color: #90A8BF">126.60 ton/ha</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="sub-plot-area-section mb-4">
                <div class="d-block d-sm-flex justify-content-between align-items-center text-center text-sm-start mb-4">
                    <div class="gap-1">
                        <h4 class="m-0">Data sub plot</h4>
                        <p class="m-0" style="color: #90A8BF">Informasi data carbon stock per sub plot area yang telah
                            terekam</p>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-3 overflow-x-auto">
                    <div class="col-12 col-sm-3 height-card box-margin">
                        <div class="card">
                            <img class="card-img-top img-responsive p-3 rounded-5" src="/assets/img/gallery-img/4.jpg"
                                alt="Card image cap">
                            <div class="card-body">
                                <h6 class=" mb-0">Sub Plot A (1x1) - Semai</h6>
                                <p class="card-text">Telkom University</p>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <div class="d-flex align-items-center gap-2">
                                        <i style="color: #22710E; font-size: 18px;" class='bx bx-map'></i>
                                        <span style="color: #90A8BF">Kandungan Karbon</span>
                                    </div>
                                    <p class="m-0" style="color: #90A8BF">34.35 ton/ha</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <div class="d-flex align-items-center gap-2">
                                        <i style="color: #22710E; font-size: 18px;" class='bx bx-map'></i>
                                        <span style="color: #90A8BF">Serapan CO2</span>
                                    </div>
                                    <p class="m-0" style="color: #90A8BF">126.60 ton/ha</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <div class="d-flex align-items-center gap-2">
                                        <i style="color: #22710E; font-size: 18px;" class='bx bx-time'></i>
                                        <span style="color: #90A8BF">Tanggal Pencatatan</span>
                                    </div>
                                    <p class="m-0" style="color: #90A8BF">22 Mei - 3 Jun 2023</p>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-3 height-card box-margin">
                        <div class="card">
                            <img class="card-img-top img-responsive p-3 rounded-5" src="/assets/img/gallery-img/4.jpg"
                                alt="Card image cap">
                            <div class="card-body">
                                <h6 class=" mb-0">Sub Plot B (5x5) - Pancang</h6>
                                <p class="card-text">Telkom University</p>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <div class="d-flex align-items-center gap-2">
                                        <i style="color: #22710E; font-size: 18px;" class='bx bx-map'></i>
                                        <span style="color: #90A8BF">Kandungan Karbon</span>
                                    </div>
                                    <p class="m-0" style="color: #90A8BF">34.35 ton/ha</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <div class="d-flex align-items-center gap-2">
                                        <i style="color: #22710E; font-size: 18px;" class='bx bx-map'></i>
                                        <span style="color: #90A8BF">Serapan CO2</span>
                                    </div>
                                    <p class="m-0" style="color: #90A8BF">126.60 ton/ha</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <div class="d-flex align-items-center gap-2">
                                        <i style="color: #22710E; font-size: 18px;" class='bx bx-time'></i>
                                        <span style="color: #90A8BF">Tanggal Pencatatan</span>
                                    </div>
                                    <p class="m-0" style="color: #90A8BF">22 Mei - 3 Jun 2023</p>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-3 height-card box-margin">
                        <div class="card">
                            <img class="card-img-top img-responsive p-3 rounded-5" src="/assets/img/gallery-img/4.jpg"
                                alt="Card image cap">
                            <div class="card-body">
                                <h6 class=" mb-0">Sub Plot C (10x10) - Tiang</h6>
                                <p class="card-text">Telkom University</p>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <div class="d-flex align-items-center gap-2">
                                        <i style="color: #22710E; font-size: 18px;" class='bx bx-map'></i>
                                        <span style="color: #90A8BF">Kandungan Karbon</span>
                                    </div>
                                    <p class="m-0" style="color: #90A8BF">34.35 ton/ha</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <div class="d-flex align-items-center gap-2">
                                        <i style="color: #22710E; font-size: 18px;" class='bx bx-map'></i>
                                        <span style="color: #90A8BF">Serapan CO2</span>
                                    </div>
                                    <p class="m-0" style="color: #90A8BF">126.60 ton/ha</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <div class="d-flex align-items-center gap-2">
                                        <i style="color: #22710E; font-size: 18px;" class='bx bx-time'></i>
                                        <span style="color: #90A8BF">Tanggal Pencatatan</span>
                                    </div>
                                    <p class="m-0" style="color: #90A8BF">22 Mei - 3 Jun 2023</p>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-3 height-card box-margin">
                        <div class="card">
                            <img class="card-img-top img-responsive p-3 rounded-5" src="/assets/img/gallery-img/4.jpg"
                                alt="Card image cap">
                            <div class="card-body">
                                <h6 class=" mb-0">Sub Plot D (20x20) - Pohon</h6>
                                <p class="card-text">Telkom University</p>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <div class="d-flex align-items-center gap-2">
                                        <i style="color: #22710E; font-size: 18px;" class='bx bx-map'></i>
                                        <span style="color: #90A8BF">Kandungan Karbon</span>
                                    </div>
                                    <p class="m-0" style="color: #90A8BF">34.35 ton/ha</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <div class="d-flex align-items-center gap-2">
                                        <i style="color: #22710E; font-size: 18px;" class='bx bx-map'></i>
                                        <span style="color: #90A8BF">Serapan CO2</span>
                                    </div>
                                    <p class="m-0" style="color: #90A8BF">126.60 ton/ha</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <div class="d-flex align-items-center gap-2">
                                        <i style="color: #22710E; font-size: 18px;" class='bx bx-time'></i>
                                        <span style="color: #90A8BF">Tanggal Pencatatan</span>
                                    </div>
                                    <p class="m-0" style="color: #90A8BF">22 Mei - 3 Jun 2023</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
