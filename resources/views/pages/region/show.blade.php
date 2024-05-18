@extends('layouts.app')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper p-sm-4 p-2 pt-4">
            <div class="d-block d-sm-flex justify-content-between align-items-center text-center text-sm-start mb-4">
                <div class="gap-1">
                    <h4 class="m-0">Daftar Zona</h4>
                    <p class="m-0" style="color: #90A8BF">Informasi terkait data lokasi yang aktif</p>
                </div>
                <a href="{{ route('zona.create', $regionalId) }}" class="btn btn-success rounded-3 mt-3 mt-sm-0 md-trigger"
                    data-modal="modal-1">Tambahkan
                    Data</a>
            </div>
            <section>
                <style>
                    .card-zona {
                        overflow-x: hidden;
                        overflow-y: hidden;
                        -webkit-overflow-scrolling: touch;
                    }
                </style>
                <div class="card-zona d-flex gap-3 overflow-x-auto">
                    @forelse ($regional->zona as $zona)
                        <div class="col-md-6 col-lg-4 height-card box-margin">
                            <div class="card">
                                {{-- @if (empty($z->files)) --}}

                                {{-- @endif --}}
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <div>
                                            <h4 class=" mb-0">{{ $zona->nama_zona }}</h4>

                                            <p class="card-text mb-0">{{ $zona->regional->nama_regional }}</p>
                                        </div>
                                        <a href="{{ route('zona.edit', ['id' => $zona->id, 'regionalId' => $regionalId]) }}"
                                            class="rounded-pill p-2 bg-info m-0 d-flex align-items-center">
                                            <i class="text-white bx bx-pencil fs-5 m-0">
                                            </i>
                                        </a>
                                    </div>
                                    @foreach ($zona->files as $file)
                                        <div class="zona-image">
                                            <img class="card-img-top img-responsive rounded"
                                                src="{{ asset($file['path']) }}" alt="Card image cap"
                                                style="height: 180px; object-fit:cover; object-position:center;">
                                        </div>
                                    @endforeach
                                    <div class="d-block justify-content-start align-items-center mb-2">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center justify-content-start gap-2">
                                                <i style="color: #22710E; font-size: 18px;" class='bx bx-group'></i>
                                                <span style="color: #90A8BF">Daftar Tim</span>
                                            </div>
                                            <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#myModal{{ $zona->id }}">
                                                <p class="text-info m-0">+ Tambah tim</p>
                                            </a>
                                        </div>
                                        <div class="d-flex align-items-center gap-2 overflow-x-auto mt-2">
                                            @if (!$zona->tim->isEmpty())
                                                @foreach ($zona->tim as $listTim)
                                                    <span class="badge p-2"
                                                        style="background: #3e8829;">{{ $listTim->namaTim->nama }}</span>
                                                @endforeach
                                            @else
                                                <p class="text-danger m-0"> Belum ada tim yang ditambahkan
                                                </p>
                                            @endif
                                        </div>

                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <div class="d-flex align-items-center gap-2">
                                            <i style="color: #22710E; font-size: 18px;" class='bx bx-map-alt'></i>
                                            <span style="color: #90A8BF">Jenis Hutan</span>
                                        </div>
                                        <p class="m-0 text-end" style="color: #90A8BF">
                                            {{ $zona->regional->type_hutan->jenis_hutan }}
                                        </p>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <div class="d-flex align-items-center gap-2">
                                            <i style="color: #22710E; font-size: 18px;" class='bx bx-map'></i>
                                            <span style="color: #90A8BF">Koordinat</span>
                                        </div>
                                        <p class="m-0 text-end" style="color: #90A8BF">{{ $zona->latitude }},
                                            {{ $zona->longitude }}</p>
                                    </div>
                                    <div class="d-block justify-content-between align-items-center mb-2">
                                        <div class="d-flex align-items-center gap-2">
                                            <i style="color: #22710E; font-size: 18px;" class='bx bx-map-pin'></i>
                                            <span style="color: #90A8BF">Lokasi</span>
                                        </div>
                                        <p class="my-0 text-truncate" style="color: #90A8BF"
                                            id="nama_koordinat_{{ $zona->id }}">
                                        </p>
                                    </div>

                                    <div class="mt-3">
                                        <div class="text-sm-end text-start gap-2 d-flex d-sm-block mt-sm-0 mt-3">
                                            {{-- @if (!$zona->anggota->isEmpty()) --}}
                                            <form class="d-flex gap-2 align-items-center"
                                                action="{{ route('zona.destroy', $zona->id) }}" method="POST">
                                                @csrf

                                                <a href="{{ route('zona.show', $zona->id) }}"
                                                    class="btn btn-warning rounded-3 p-2">Detail</a>
                                                <button onclick="return confirm('Apakah yakin ingin di hapus?')"
                                                    class="btn btn-danger rounded-3 p-2">Hapus
                                                </button>
                                            </form>
                                            {{-- @endif --}}
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @empty
                        <h3 class="text-center">Data masih kosong</h3>
                    @endforelse
                </div>
            </section>
            <section>
                <div class="row">
                    <div class="col-sm-6 height-card box-margin">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-0">Summary Kandungan Karbon</h4>
                                <p class="mb-3">Bagian ini untuk menampilkan hitungan total kandungan karbon untuk lokasi
                                    {{ $regional->nama_regional }}</p>

                                <div class="template-demo">
                                    <table class="table mb-0">
                                        <thead>
                                            <tr>
                                                <th>Subplot</th>
                                                <th class="text-right">Karbon</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Seresah</td>
                                                <td class="text-right">
                                                    <div class="badge badge-primary p-2">{{ $valueCVSeresah }}</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Semai</td>
                                                <td class="text-right">
                                                    <div class="badge badge-primary">{{ $valueCVSemai }}</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Tumbuhan Bawah</td>
                                                <td class="text-right">
                                                    <div class="badge badge-primary">{{ $valueCVTumbuhanBawah }}</div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Pancang</td>
                                                <td class="text-right">
                                                    <div class="badge badge-primary">{{ $totalAvgCVSubplotB }}</div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Tiang</td>
                                                <td class="text-right">
                                                    <div class="badge badge-primary">{{ $totalAvgCVSubplotC }}</div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Nekromas</td>
                                                <td class="text-right">
                                                    <div class="badge badge-primary">{{ $valueCVNekromas }}</div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Pohon</td>
                                                <td class="text-right">
                                                    <div class="badge badge-primary">{{ $totalAvgCVSubplotPohon }}</div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Tanah</td>
                                                <td class="text-right">
                                                    <div class="badge badge-primary">{{ $totalCVTanah }}</div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Total</td>
                                                <td class="text-right">
                                                    <div class="badge badge-primary">{{ $sumCarbonValuePlot }}</div>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 height-card box-margin">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-0">Summary Serapan CO2</h4>
                                <p class="mb-3">Bagian ini untuk menampilkan hitungan total serapa CO2 untuk lokasi
                                    {{ $regional->nama_regional }}</p>

                                <div class="template-demo">
                                    <table class="table mb-0">
                                        <thead>
                                            <tr>
                                                <th>Subplot</th>
                                                <th class="text-right">Karbon</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Seresah</td>
                                                <td class="text-right">
                                                    <div class="badge badge-primary p-2">{{ $valueCASeresah }}</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Semai</td>
                                                <td class="text-right">
                                                    <div class="badge badge-primary">{{ $valueCASemai }}</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Tumbuhan Bawah</td>
                                                <td class="text-right">
                                                    <div class="badge badge-primary">{{ $valueCATumbuhanBawah }}</div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Pancang</td>
                                                <td class="text-right">
                                                    <div class="badge badge-primary">{{ $totalAvgCASubplotB }}</div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Tiang</td>
                                                <td class="text-right">
                                                    <div class="badge badge-primary">{{ $totalAvgCASubplotC }}</div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Nekromas</td>
                                                <td class="text-right">
                                                    <div class="badge badge-primary">{{ $valueCANekromas }}</div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Pohon</td>
                                                <td class="text-right">
                                                    <div class="badge badge-primary">{{ $totalAvgCASubplotPohon }}</div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Tanah</td>
                                                <td class="text-right">
                                                    <div class="badge badge-primary">{{ $totalCATanah }}</div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Total</td>
                                                <td class="text-right">
                                                    <div class="badge badge-primary">{{ $sumCarbonAbsorbPlot }}</div>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                                            @foreach ($regional->zona as $zona)
                                                @foreach ($zona->hamparan as $hamparan)
                                                    @foreach ($hamparan->plot as $plot)
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
                                                    @endforeach
                                                @endforeach
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
                                            @foreach ($regional->zona as $zona)
                                                @foreach ($zona->hamparan as $hamparan)
                                                    @foreach ($hamparan->plot as $plot)
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
                                                    @endforeach
                                                @endforeach
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
                                            @foreach ($regional->zona as $zona)
                                                @foreach ($zona->hamparan as $hamparan)
                                                    @foreach ($hamparan->plot as $plot)
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
                                                    @endforeach
                                                @endforeach
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
                                            @foreach ($regional->zona as $zona)
                                                @foreach ($zona->hamparan as $hamparan)
                                                    @foreach ($hamparan->plot as $plot)
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
                                                                {{-- <td>{{ $row->subplot_b_photo_url }}</td>
                                                    <td>{{ $row->updated_at }}</td> --}}
                                                            </tr>
                                                        @endforeach
                                                    @endforeach
                                                @endforeach
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
                                            @foreach ($regional->zona as $zona)
                                                @foreach ($zona->hamparan as $hamparan)
                                                    @foreach ($hamparan->plot as $plot)
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
                                                                {{-- <td>{{ $row->subplot_b_photo_url }}</td> --}}
                                                                {{-- <td>{{ $row->updated_at }}</td> --}}
                                                            </tr>
                                                        @endforeach
                                                    @endforeach
                                                @endforeach
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
                                                {{-- <th>Updated At</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($regional->zona as $zona)
                                                @foreach ($zona->hamparan as $hamparan)
                                                    @foreach ($hamparan->plot as $plot)
                                                        @foreach ($plot->subplotDNekromas as $row)
                                                            <tr>
                                                                <td>{{ $row->diameter_pangkal }}</td>
                                                                <td>{{ $row->diameter_ujung }}</td>
                                                                <td>{{ $row->panjang }}</td>
                                                                <td>{{ $row->volume }}</td>
                                                                <td>{{ $row->biomass }}</td>
                                                                <td>{{ $row->carbon_value }}</td>
                                                                <td>{{ $row->carbon_absorb }}</td>
                                                                {{-- <td>{{ $row->updated_at }}</td> --}}
                                                            </tr>
                                                        @endforeach
                                                    @endforeach
                                                @endforeach
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
                                                {{-- <th>Updated At</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($regional->zona as $zona)
                                                @foreach ($zona->hamparan as $hamparan)
                                                    @foreach ($hamparan->plot as $plot)
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
                                                                {{-- <td>{{ $row->updated_at }}</td> --}}
                                                            </tr>
                                                        @endforeach
                                                    @endforeach
                                                @endforeach
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
                                                {{-- <th>Updated At</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($regional->zona as $zona)
                                                @foreach ($zona->hamparan as $hamparan)
                                                    @foreach ($hamparan->plot as $plot)
                                                        @foreach ($plot->subplotDTanah as $row)
                                                            <tr>
                                                                <td>{{ $row->kedalaman_sample }}</td>
                                                                <td>{{ $row->berat_jenis_tanah }}</td>
                                                                <td>{{ $row->organik_c_tanah }}</td>
                                                                <td>{{ $row->carbon_gr_cm }}</td>
                                                                <td>{{ $row->carbon_ton_ha }}</td>
                                                                <td>{{ $row->carbon_ton }}</td>
                                                                <td>{{ $row->carbon_absorb }}</td>
                                                                {{-- <td>{{ $row->updated_at }}</td> --}}
                                                            </tr>
                                                        @endforeach
                                                    @endforeach
                                                @endforeach
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
@push('after-script')
    <!-- Inject JS -->
    {{-- <script src="js/default-assets/modal-classes.js"></script>
    <script src="js/default-assets/modaleffects.js"></script> --}}
    <script>
        document.getElementById('addTeam').addEventListener('click', function(event) {
            event.preventDefault();
            var selectWrapper = document.getElementById('listTeam').cloneNode(true);

            // Membuat div wrapper
            var divWrapper = document.createElement('div');
            divWrapper.classList.add('d-flex', 'gap-2', 'align-items-center', 'team-item');
            divWrapper.appendChild(selectWrapper);

            // Membuat tombol hapus
            var deleteButton = document.createElement('a');
            deleteButton.href = '#';
            deleteButton.innerHTML = '<i class="text-danger bx bx-trash"></i>';
            deleteButton.addEventListener('click', function(e) {
                e.preventDefault();
                divWrapper.remove();
            });

            // Menambahkan select dan tombol hapus ke dalam container
            divWrapper.appendChild(deleteButton);
            var appenTeam = document.getElementById('appendTeam');
            appenTeam.appendChild(divWrapper);
        });
    </script>
    <script>
        mapboxgl.accessToken = 'pk.eyJ1IjoiaW5kcmFzeiIsImEiOiJjbHVxaWV3bngycmhiMmtuejluMTNzY216In0.EZ-2uwWJ3SAYv3ehMizmGw';

        function getAddressFromCoordinates(latitude, longitude, id) {
            fetch(
                    `https://api.mapbox.com/geocoding/v5/mapbox.places/${longitude},${latitude}.json?access_token=${mapboxgl.accessToken}`
                )
                .then(response => response.json())
                .then(data => {
                    const address = data.features[0].place_name;
                    document.getElementById('nama_koordinat_' + id).innerText = address;
                })
                .catch(error => console.error('Error:', error));
        }
        var zonaData = <?php echo json_encode($regional->zona); ?>;
        // console.log(zonaData);
        if (Array.isArray(zonaData)) {
            zonaData.forEach(item => {
                getAddressFromCoordinates(item.latitude, item.longitude, item.id);
            });
        } else {
            console.error('regionalData bukan array');
        }
    </script>
@endpush
