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

            <section>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Data Subplot</h4>

                        <ul class="nav nav-tabs nav-bordered nav-justified overflow-x-auto">
                            <li class="nav-item">
                                <a href="#seresah" data-bs-toggle="tab" aria-expanded="true" class="nav-link active">
                                    Seresah
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#semai" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                    Semai
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#tumbuhan" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                    Tumbuhan
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#pancang" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                    Pancang
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#tiang" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                    Tiang
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#necromass" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                    Nekromas
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#pohon" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                    Pohon
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#tanah" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                    Tanah
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="seresah">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Basah Total</th>
                                                <th>Basah Sample</th>
                                                <th>Kering Total</th>
                                                <th>Kering Sample</th>
                                                <th>Carbon Value</th>
                                                <th>Carbon Absorb</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($seresah as $row)
                                                <tr>
                                                    <td>{{ $row->basah_total }}</td>
                                                    <td>{{ $row->basah_sample }}</td>
                                                    <td>{{ $row->kering_total }}</td>
                                                    <td>{{ $row->kering_sample }}</td>
                                                    <td>{{ $row->carbon_value }}</td>
                                                    <td>{{ $row->carbon_absorb }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" id="semai">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>

                                                <th>Basah Total</th>
                                                <th>Basah Sample</th>
                                                <th>Kering Total</th>
                                                <th>Kering Sample</th>
                                                <th>Carbon Value</th>
                                                <th>Carbon Absorb</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($semai as $row)
                                                <tr>

                                                    <td>{{ $row->basah_total }}</td>
                                                    <td>{{ $row->basah_sample }}</td>
                                                    <td>{{ $row->kering_total }}</td>
                                                    <td>{{ $row->kering_sample }}</td>
                                                    <td>{{ $row->carbon_value }}</td>
                                                    <td>{{ $row->carbon_absorb }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" id="tumbuhan">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>

                                                <th>Basah Total</th>
                                                <th>Basah Sample</th>
                                                <th>Kering Total</th>
                                                <th>Kering Sample</th>
                                                <th>Carbon Value</th>
                                                <th>Carbon Absorb</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($tumbuhanBawah as $row)
                                                <tr>

                                                    <td>{{ $row->basah_total }}</td>
                                                    <td>{{ $row->basah_sample }}</td>
                                                    <td>{{ $row->kering_total }}</td>
                                                    <td>{{ $row->kering_sample }}</td>
                                                    <td>{{ $row->carbon_value }}</td>
                                                    <td>{{ $row->carbon_absorb }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" id="pancang">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>

                                                <th>Local Name</th>
                                                <th>Bio Name</th>
                                                <th>Keliling</th>
                                                <th>Diameter</th>
                                                <th>Kerapatan Kayu</th>
                                                <th>Biomass</th>
                                                <th>Carbon Value</th>
                                                <th>Carbon Absorb</th>
                                                {{-- <th>Subplot B Photo URL</th>
                                                <th>Updated At</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pancang as $row)
                                                <tr>

                                                    <td>{{ $row->local_name }}</td>
                                                    <td>{{ $row->bio_name }}</td>
                                                    <td>{{ $row->keliling }}</td>
                                                    <td>{{ $row->diameter }}</td>
                                                    <td>{{ $row->kerapatan_kayu }}</td>
                                                    <td>{{ $row->biomass }}</td>
                                                    <td>{{ $row->carbon_value }}</td>
                                                    <td>{{ $row->carbon_absorb }}</td>
                                                    {{-- <td>{{ $row->subplot_b_photo_url }}</td>
                                                    <td>{{ $row->updated_at }}</td> --}}
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" id="tiang">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>

                                                <th>Local Name</th>
                                                <th>Bio Name</th>
                                                <th>Keliling</th>
                                                <th>Diameter</th>
                                                <th>Kerapatan Kayu</th>
                                                <th>Biomass</th>
                                                <th>Carbon Value</th>
                                                <th>Carbon Absorb</th>
                                                {{-- <th>Subplot B Photo URL</th> --}}
                                                {{-- <th>Updated At</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($tiang as $row)
                                                <tr>

                                                    <td>{{ $row->local_name }}</td>
                                                    <td>{{ $row->bio_name }}</td>
                                                    <td>{{ $row->keliling }}</td>
                                                    <td>{{ $row->diameter }}</td>
                                                    <td>{{ $row->kerapatan_kayu }}</td>
                                                    <td>{{ $row->biomass }}</td>
                                                    <td>{{ $row->carbon_value }}</td>
                                                    <td>{{ $row->carbon_absorb }}</td>
                                                    {{-- <td>{{ $row->subplot_b_photo_url }}</td> --}}
                                                    {{-- <td>{{ $row->updated_at }}</td> --}}
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" id="necromass">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>

                                                <th>Diameter Pangkal</th>
                                                <th>Diameter Ujung</th>
                                                <th>Panjang</th>
                                                <th>Volume</th>
                                                <th>Biomass</th>
                                                <th>Carbon Value</th>
                                                <th>Carbon Absorb</th>
                                                <th>Updated At</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($necromass as $row)
                                                <tr>

                                                    <td>{{ $row->diameter_pangkal }}</td>
                                                    <td>{{ $row->diameter_ujung }}</td>
                                                    <td>{{ $row->panjang }}</td>
                                                    <td>{{ $row->volume }}</td>
                                                    <td>{{ $row->biomass }}</td>
                                                    <td>{{ $row->carbon_value }}</td>
                                                    <td>{{ $row->carbon_absorb }}</td>
                                                    <td>{{ $row->updated_at }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" id="pohon">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>

                                                <th>Local Name</th>
                                                <th>Bio Name</th>
                                                <th>Keliling</th>
                                                <th>Diameter</th>
                                                <th>Kerapatan Kayu</th>
                                                <th>Biomass</th>
                                                <th>Carbon Value</th>
                                                <th>Carbon Absorb</th>
                                                <th>Updated At</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pohon as $row)
                                                <tr>

                                                    <td>{{ $row->local_name }}</td>
                                                    <td>{{ $row->bio_name }}</td>
                                                    <td>{{ $row->keliling }}</td>
                                                    <td>{{ $row->diameter }}</td>
                                                    <td>{{ $row->kerapatan_kayu }}</td>
                                                    <td>{{ $row->biomass }}</td>
                                                    <td>{{ $row->carbon_value }}</td>
                                                    <td>{{ $row->carbon_absorb }}</td>
                                                    <td>{{ $row->updated_at }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <div class="tab-pane" id="tanah">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>

                                                <th>Kedalaman Sample</th>
                                                <th>Berat Jenis Tanah</th>
                                                <th>Organik C Tanah</th>
                                                <th>Carbon Gr cm</th>
                                                <th>Carbon Ton Ha</th>
                                                <th>Carbon Ton</th>
                                                <th>Carbon Absorb</th>
                                                <th>Updated At</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($tanah as $row)
                                                <tr>
                                                   
                                                    <td>{{ $row->kedalaman_sample }}</td>
                                                    <td>{{ $row->berat_jenis_tanah }}</td>
                                                    <td>{{ $row->organik_c_tanah }}</td>
                                                    <td>{{ $row->carbon_gr_cm }}</td>
                                                    <td>{{ $row->carbon_ton_ha }}</td>
                                                    <td>{{ $row->carbon_ton }}</td>
                                                    <td>{{ $row->carbon_absorb }}</td>
                                                    <td>{{ $row->updated_at }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div> <!-- end card-->
            </section>
            {{-- <section class="sub-plot-area-section mb-4">
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
            </section> --}}
            {{-- <section>
                <h1 class="my-4">Data Akar</h1>
                <style>
                    .center-table {
                        margin: auto;
                    }
                </style>

                <div class="table-responsive center-table">
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th rowspan="2" scope="col">No Plot</th>
                                <th colspan="3" scope="colgroup">Serapan CO2 (Ton C/Ha)</th>
                                <th rowspan="2" scope="col">Total Berat Masa Pucuk</th>
                                <th rowspan="2" scope="col">Berat Biomassa Akar (Beratbiomassapucukx0,37)</th>
                            </tr>
                            <tr>
                                <th scope="col">Pancang</th>
                                <th scope="col">Tiang</th>
                                <th scope="col">Pohon</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>79.91</td>
                                <td>86.93</td>
                                <td>418.66</td>
                                <td>585.49</td>
                                <td>216.63</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>-</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>-</td>
                                <td>0.00</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>-</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>-</td>
                                <td>0.00</td>
                            </tr>
                            <tr>
                                <td colspan="5">Total</td>
                                <td>216.63</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <section>
                <h1 class="my-4">Data Tanah</h1>
                <div class="table-responsive center-table">
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kedalaman Sample (cm)</th>
                                <th scope="col">Berat Jenis Tanah (gr/cm3)</th>
                                <th scope="col">C Organik Tanah (%)</th>
                                <th scope="col">Carbon (gr/cm2)</th>
                                <th scope="col">Carbon (Ton/ha)</th>
                                <th scope="col">Carbon (Ton)</th>
                                <th scope="col">CO2 (Ton)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>5</td>
                                <td>0.5</td>
                                <td>5%</td>
                                <td>0.125</td>
                                <td>13</td>
                                <td>143.75</td>
                                <td>527.56</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                            <!-- Tambahkan baris seperti di atas untuk setiap entri data yang ada -->
                            <tr>
                                <td>Total</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                                <td>0.00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </section>
            <section>
                <h1 class="my-4">Data Necromass</h1>
                <div class="table-responsive">
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Diameter Pangkal (m)</th>
                                <th scope="col">Diameter Ujung (m)</th>
                                <th scope="col">Panjang (m)</th>
                                <th scope="col">Volume (m3)</th>
                                <th scope="col">Berat Jenis Kayu (kg/m3)</th>
                                <th scope="col">Biomassa (Kg)</th>
                                <th scope="col">Carbon (Kg)</th>
                                <th scope="col">CO2 (Kg)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Z2_2</td>
                                <td>0.382</td>
                                <td>0.2</td>
                                <td>1.12</td>
                                <td>0.074</td>
                                <td>610</td>
                                <td>45.44</td>
                                <td>21.36</td>
                                <td>78.38</td>
                            </tr>
                            <tr>
                                <td>Z4_1</td>
                                <td>0.074</td>
                                <td>0.027</td>
                                <td>4.05</td>
                                <td>0.008</td>
                                <td>610</td>
                                <td>4.95</td>
                                <td>2.33</td>
                                <td>8.54</td>
                            </tr>
                            <!-- Tambahkan baris seperti di atas untuk setiap entri data yang ada -->
                            <tr>
                                <td>Rata-Rata</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>128.80</td>
                                <td>60.53</td>
                                <td>222.16</td>
                            </tr>
                            <tr>
                                <td colspan="2">Biomassa di atas permukaan tanah (ton/ha)</td>
                                <td colspan="7">3.22</td>
                            </tr>
                            <tr>
                                <td colspan="2">Kandungan karbon (ton/ha)</td>
                                <td colspan="7">1.51</td>
                            </tr>
                            <tr>
                                <td colspan="2">Serapan CO2 (ton/ha)</td>
                                <td colspan="7">5.55</td>
                            </tr>
                            <tr>
                                <td colspan="2">Total Necromass di TelU (Serapan CO2xLuaslokasilahantanaman)</td>
                                <td colspan="7">63.87</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </section>
            <section>
                <h1 class="my-4">Data Seresah</h1>
                <div class="table-responsive">
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th scope="col">No Plot</th>
                                <th scope="col">Berat basah total (gr)</th>
                                <th scope="col">Berat basah sampel (gr)</th>
                                <th scope="col">Berat kering sampel (gr)</th>
                                <th scope="col">Berat kering total (gr)</th>
                                <th scope="col">Kandungan karbon (kg)</th>
                                <th scope="col">Serapan CO2 (kg)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Z4_1</td>
                                <td>2004</td>
                                <td>322</td>
                                <td>150</td>
                                <td>933.54</td>
                                <td>438.76</td>
                                <td>1608.80</td>
                            </tr>
                            <tr>
                                <td>Z1_1</td>
                                <td>151</td>
                                <td>151</td>
                                <td>75.5</td>
                                <td>75.50</td>
                                <td>35.49</td>
                                <td>130.11</td>
                            </tr>
                            <!-- Tambahkan baris seperti di atas untuk setiap entri data yang ada -->
                            <tr>
                                <td>Rata Rata</td>
                                <td>441.63</td>
                                <td>231.38</td>
                                <td>198.19</td>
                                <td>296.13</td>
                                <td>139.18</td>
                                <td>510.33</td>
                            </tr>
                            <tr>
                                <td colspan="2">Biomassa di atas permukaan tanah (ton/ha)</td>
                                <td colspan="5">2.96</td>
                            </tr>
                            <tr>
                                <td colspan="2">Kandungan karbon (ton/ha)</td>
                                <td colspan="5">1.39</td>
                            </tr>
                            <tr>
                                <td colspan="2">Serapan CO2 (ton/ha)</td>
                                <td colspan="5">5.10</td>
                            </tr>
                            <tr>
                                <td colspan="2">Total Serasah di TelU (Serapan CO2xLuaslokasilahantanaman)</td>
                                <td colspan="5">58.69</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </section>
            <section>
                <h1 class="my-4">Data Semai dan Tumbuhan Bawah</h1>
                <div class="table-responsive">
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th scope="col">No Plot</th>
                                <th scope="col">Berat basah total (gr)</th>
                                <th scope="col">Berat basah sampel (gr)</th>
                                <th scope="col">Berat kering sampel (gr)</th>
                                <th scope="col">Berat kering total (gr)</th>
                                <th scope="col">Kandungan karbon (kg)</th>
                                <th scope="col">Serapan CO2 (kg)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Z1_1</td>
                                <td>6</td>
                                <td>6</td>
                                <td>6</td>
                                <td>6.00</td>
                                <td>2.82</td>
                                <td>10.34</td>
                            </tr>
                            <tr>
                                <td>Z1_2</td>
                                <td>30</td>
                                <td>30</td>
                                <td>30</td>
                                <td>30.00</td>
                                <td>14.10</td>
                                <td>51.70</td>
                            </tr>
                            <!-- Tambahkan baris seperti di atas untuk setiap entri data yang ada -->
                            <tr>
                                <td>Rata-Rata</td>
                                <td>425.375</td>
                                <td>425.375</td>
                                <td>423.5</td>
                                <td>423.5</td>
                                <td>199.045</td>
                                <td>729.831667</td>
                            </tr>
                            <tr>
                                <td colspan="2">Biomassa di atas permukaan tanah (ton/ha)</td>
                                <td colspan="5">4.24</td>
                            </tr>
                            <tr>
                                <td colspan="2">Kandungan karbon (ton/ha)</td>
                                <td colspan="5">1.99</td>
                            </tr>
                            <tr>
                                <td colspan="2">Serapan CO2 (ton/ha)</td>
                                <td colspan="5">7.30</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </section>
            <section>
                <h1 class="my-4">Data Pancang</h1>
                <div class="table-responsive">
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th scope="col">No Plot</th>
                                <th scope="col">No Pohon</th>
                                <th scope="col">Keliling (cm)</th>
                                <th scope="col">Diameter (cm)</th>
                                <th scope="col">Nama Lokal</th>
                                <th scope="col">Nama Ilmiah</th>
                                <th scope="col">Kerapatan jenis kayu (gr/cm3)</th>
                                <th scope="col">Biomassa di atas permukaan tanah (kg)</th>
                                <th scope="col">Kandungan karbon (kg)</th>
                                <th scope="col">Serapan CO2 (kg)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td rowspan="10">Z2_1</td>
                                <td>1</td>
                                <td>26.0</td>
                                <td>8.3</td>
                                <td>Mindi</td>
                                <td></td>
                                <td>0.61</td>
                                <td>17.02</td>
                                <td>8.00</td>
                                <td>29.33</td>
                            </tr>
                            <!-- Tambahkan baris seperti di atas untuk setiap entri data yang ada -->
                            <tr>
                                <td>2</td>
                                <td>25.0</td>
                                <td>8.0</td>
                                <td>Mindi</td>
                                <td></td>
                                <td>0.61</td>
                                <td>15.36</td>
                                <td>7.22</td>
                                <td>26.47</td>
                            </tr>
                            <!-- Tambahkan baris seperti di atas untuk setiap entri data yang ada -->
                            <tr>
                                <td>3</td>
                                <td>21.0</td>
                                <td>6.7</td>
                                <td>Mindi</td>
                                <td></td>
                                <td>0.61</td>
                                <td>9.73</td>
                                <td>4.57</td>
                                <td>16.76</td>
                            </tr>
                            <tr>
                                <td colspan="6">Rata-rata</td>
                                <td> 14,74 </td>
                                <td> 6,93 </td>
                                <td> 25,40 </td>

                                <!-- Isi data rata-rata untuk Z4_1 -->
                            </tr>
                            <tr>
                                <td colspan="6">Jumlah</td>
                                <td> 147,41 </td>
                                <td> 69,28 </td>
                                <td> 254,03 </td>
                                <!-- Isi data jumlah untuk Z4_1 -->
                            </tr>
                            <!-- Lanjutkan dengan entri-entri berikutnya jika ada -->
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2">Potensial Carbon di TelU (11,5 ha)</td>
                                <td colspan="2">Pendekatan Kerapatan</td>
                                <!-- Isi data Potensial Carbon di TelU dan Pendekatan Kerapatan -->
                            </tr>
                            <tr>
                                <td colspan="2">Pendekatan Luasan</td>
                                <td colspan="2">Biomassa di atas permukaan tanah (ton/ha)</td>
                                <!-- Isi data Pendekatan Luasan dan Biomassa di atas permukaan tanah -->
                            </tr>
                        </tfoot>
                    </table>
                </div>


            </section>
            <section>
                <h1 class="my-4">Data Tiang</h1>
                <div class="table-responsive">
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th scope="col">No Plot</th>
                                <th scope="col">No Pohon</th>
                                <th scope="col">Keliling (cm)</th>
                                <th scope="col">Diameter (cm)</th>
                                <th scope="col">Nama Lokal</th>
                                <th scope="col">Nama Ilmiah</th>
                                <th scope="col">Kerapatan jenis kayu (gr/cm3)</th>
                                <th scope="col">Biomassa di atas permukaan tanah (kg)</th>
                                <th scope="col">Kandungan karbon (kg)</th>
                                <th scope="col">Serapan CO2 (kg)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td rowspan="8">Z1_1</td>
                                <td>1</td>
                                <td>48</td>
                                <td>15.27</td>
                                <td>Sawo Durian</td>
                                <td>Tidak tahu</td>
                                <td>0.61</td>
                                <td>84.84</td>
                                <td>39.87</td>
                                <td>146.20</td>
                            </tr>
                            <!-- Tambahkan baris seperti di atas untuk setiap entri data yang ada -->
                            <tr>
                                <td>2</td>
                                <td>48</td>
                                <td>15.27</td>
                                <td>Sawo Durian</td>
                                <td>Tidak tahu</td>
                                <td>0.61</td>
                                <td>84.84</td>
                                <td>39.87</td>
                                <td>146.20</td>
                                <!-- Isi entri-entri untuk No Pohon 2 -->
                            </tr>
                            <!-- Tambahkan baris seperti di atas untuk setiap entri data yang ada -->
                            <tr>
                                <td>2</td>
                                <td>48</td>
                                <td>15.27</td>
                                <td>Sawo Durian</td>
                                <td>Tidak tahu</td>
                                <td>0.61</td>
                                <td>84.84</td>
                                <td>39.87</td>
                                <td>146.20</td>
                                <!-- Isi entri-entri untuk No Pohon 3 -->
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="7">Rata-rata</td>
                                <td> 106,91 </td>
                                <td> 50,25 </td>
                                <td> 184,24 </td>

                                <!-- Isi data rata-rata untuk Z4_1 -->
                            </tr>
                            <tr>
                                <td colspan="7">Jumlah</td>
                                <td> 855,28 </td>
                                <td> 401,98 </td>
                                <td> 1.473,93 </td>
                                <!-- Isi data jumlah untuk Z4_1 -->
                            </tr>
                        </tfoot>
                        <tbody>
                            <tr>
                                <td rowspan="8">Z1_1</td>
                                <td>1</td>
                                <td>48</td>
                                <td>15.27</td>
                                <td>Sawo Durian</td>
                                <td>Tidak tahu</td>
                                <td>0.61</td>
                                <td>84.84</td>
                                <td>39.87</td>
                                <td>146.20</td>
                            </tr>
                            <!-- Tambahkan baris seperti di atas untuk setiap entri data yang ada -->
                            <tr>
                                <td>2</td>
                                <td>48</td>
                                <td>15.27</td>
                                <td>Sawo Durian</td>
                                <td>Tidak tahu</td>
                                <td>0.61</td>
                                <td>84.84</td>
                                <td>39.87</td>
                                <td>146.20</td>
                                <!-- Isi entri-entri untuk No Pohon 2 -->
                            </tr>
                            <!-- Tambahkan baris seperti di atas untuk setiap entri data yang ada -->
                            <tr>
                                <td>2</td>
                                <td>48</td>
                                <td>15.27</td>
                                <td>Sawo Durian</td>
                                <td>Tidak tahu</td>
                                <td>0.61</td>
                                <td>84.84</td>
                                <td>39.87</td>
                                <td>146.20</td>
                                <!-- Isi entri-entri untuk No Pohon 3 -->
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="7">Rata-rata</td>
                                <td> 106,91 </td>
                                <td> 50,25 </td>
                                <td> 184,24 </td>

                                <!-- Isi data rata-rata untuk Z4_1 -->
                            </tr>
                            <tr>
                                <td colspan="7">Jumlah</td>
                                <td> 855,28 </td>
                                <td> 401,98 </td>
                                <td> 1.473,93 </td>
                                <!-- Isi data jumlah untuk Z4_1 -->
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </section>
            <section>
                <h1 class="my-4">Data Pohon</h1>
                <div class="table-responsive">
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th scope="col">No Plot</th>
                                <th scope="col">No Pohon</th>
                                <th scope="col">Keliling (cm)</th>
                                <th scope="col">Diameter (cm)</th>
                                <th scope="col">Nama Lokal</th>
                                <th scope="col">Nama Ilmiah</th>
                                <th scope="col">Kerapatan jenis kayu (gr/cm3)</th>
                                <th scope="col">Biomassa di atas permukaan tanah (kg)</th>
                                <th scope="col">Kandungan karbon (kg)</th>
                                <th scope="col">Serapan CO2 (kg)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td rowspan="18">Z1_1</td>
                                <td>1</td>
                                <td>120.0</td>
                                <td>38.18</td>
                                <td>English Oak</td>
                                <td>Tidak tahu</td>
                                <td>0.61</td>
                                <td>935.81</td>
                                <td>439.83</td>
                                <td>1612.71</td>
                            </tr>
                            <!-- Tambahkan baris seperti di atas untuk setiap entri data yang ada -->
                            <tr>
                                <td>2</td>
                                <!-- Isi entri-entri untuk No Pohon 2 -->
                            </tr>
                            <!-- Tambahkan baris seperti di atas untuk setiap entri data yang ada -->
                            <tr>
                                <td>3</td>
                                <!-- Isi entri-entri untuk No Pohon 3 -->
                            </tr>
                            <!-- Lanjutkan dengan entri-entri berikutnya jika ada -->
                            <!-- Setelah selesai entri Z1_1, lanjutkan dengan entri Z1_2 jika ada -->

                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2">Rata-rata</td>
                                <!-- Isi data rata-rata untuk kolom Rata-rata -->
                            </tr>
                            <tr>
                                <td colspan="2">Jumlah</td>
                                <!-- Isi data jumlah untuk kolom Jumlah -->
                            </tr>
                        </tfoot>
                    </table>
                </div>

            </section> --}}
        </div>
    </div>
@endsection
