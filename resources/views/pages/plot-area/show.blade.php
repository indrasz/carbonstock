@extends('layouts.app')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper p-sm-4 p-2 pt-4">
            <section class="plot-area-section mb-4">
                <div class="d-block d-sm-flex justify-content-between align-items-center text-center text-sm-start mb-4">
                    <div class="gap-1">
                        <h4 class="m-0">Detail Plot {{ $plot->nama_plot }}</h4>
                        <p class="m-0" style="color: #90A8BF">Detail ringkasan data dari plot {{ $plot->nama_plot }}</p>
                    </div>
                    {{-- <button class="btn btn-warning rounded-3 mt-3 mt-sm-0">Ubah Data Plot</button> --}}
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
                                                <th>Kandungan Karbon</th>
                                                <th>Serapan CO2</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($plot->subplotASeresah as $row)
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
                                                <th>Kandungan Karbon</th>
                                                <th>Serapan CO2</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($plot->subplotASemai as $row)
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
                                                <th>Kandungan Karbon</th>
                                                <th>Serapan CO2</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($plot->subplotATumbuhanBawah as $row)
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
                                                <th>Kandungan Karbon</th>
                                                <th>Serapan CO2</th>
                                                {{-- <th>Subplot B Photo URL</th>
                                                <th>Updated At</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($plot->subplotB as $row)
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
                                                <th>Kandungan Karbon</th>
                                                <th>Serapan CO2</th>
                                                {{-- <th>Subplot B Photo URL</th> --}}
                                                {{-- <th>Updated At</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($plot->subplotC as $row)
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
                                                <th>Kandungan Karbon</th>
                                                <th>Serapan CO2</th>
                                                <th>Updated At</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($plot->subplotDNekromas as $row)
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
                                                <th>Kandungan Karbon</th>
                                                <th>Serapan CO2</th>
                                                <th>Updated At</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($plot->subplotDPohon as $row)
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
                                                <th>Serapan CO2</th>
                                                <th>Updated At</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($plot->subplotDTanah as $row)
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
        </div>
    </div>
@endsection
