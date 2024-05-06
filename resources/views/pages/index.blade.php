@extends('layouts.app')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper container-fluid">
            <div class="card mb-3">
                <div
                    class="d-block d-sm-flex justify-content-between align-items-center text-center text-sm-start px-3 pt-4 ">
                    <div class="gap-1">
                        <h4 class="m-0">Informasi Lokasi</h4>
                        <p class="m-0" style="color: #90A8BF">Dapat memantau daerah Carbon Stock</p>
                    </div>
                    {{-- <a href="#" class="btn btn-success rounded-3 mt-3 mt-sm-0 ">Tambahkan
                        Data</a> --}}
                </div>
                <div class="card-body">
                    <div id="map" class="rounded-3"></div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-sm-8 mb-3">
                    <div class="card bg-boxshadow full-height">
                        <div class="card-header bg-transparent d-flex align-items-center justify-content-between">
                            <div class="widgets-card-title">
                                <h5 class="card-title mb-0">Data Carbon Stock dari tiap regional</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="regionalChart" width="400" height="200"></canvas>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-4 mb-3">
                    <div class="card bg-boxshadow full-height">
                        <div class="card-header bg-transparent d-flex align-items-center justify-content-between">
                            <div class="widgets-card-title">
                                <h5 class="card-title mb-0">Total Pendataan</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="regionalPieChart" width="400" height="200"></canvas>
                        </div>
                    </div>
                </div>
            </div>

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
                                                <th>Kandungan Karbon</th>
                                                <th>Serapan CO2</th>
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
                                                <th>Kandungan Karbon</th>
                                                <th>Serapan CO2</th>
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
                                                <th>Kandungan Karbon</th>
                                                <th>Serapan CO2</th>
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
                                                <th>Kandungan Karbon</th>
                                                <th>Serapan CO2</th>
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
                                                <th>Kandungan Karbon</th>
                                                <th>Serapan CO2</th>
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
                                                <th>Kandungan Karbon</th>
                                                <th>Serapan CO2</th>
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
                                                <th>Serapan CO2</th>
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

        </div>
    </div>
@endsection

@push('after-style')
    {{-- <link rel="stylesheet" href="/assets/css/default-assets/new/chartist.min.css"> --}}
    {{-- <link rel="stylesheet" href="/assets/css/default-assets/new/chartist-custom.css"> --}}
@endpush

@push('after-script')
    <!-- Inject JS -->
    {{-- <script src="/assets/js/default-assets/chartist.min.js"></script>
    <script src="/assets/js/default-assets/chartist-plugin-toltip.js"></script>
    <script src="/assets/js/default-assets/chartis-custom.js"></script> --}}

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var regionalLabels = {!! json_encode(array_keys($regionalCarbonValues)) !!};
        var carbonValues = {!! json_encode(array_values($regionalCarbonValues)) !!};
        var carbonAbsorbs = {!! json_encode(array_values($regionalCarbonAbsorbs)) !!};

        var ctx = document.getElementById('regionalChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: regionalLabels,
                datasets: [{
                        label: 'Kandungan Karbon',
                        data: carbonValues,
                        backgroundColor: '#8FC457'
                    },
                    {
                        label: 'Serapan CO2',
                        data: carbonAbsorbs,
                        backgroundColor: '#2A8D12'
                    }
                ]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    <script>
        var carbonTotal = {{ $sumCarbonValuePlot }};
        var co2Total = {{ $sumCarbonAbsorbPlot }};

        var ctx = document.getElementById('regionalPieChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Carbon', 'CO2'],
                datasets: [{
                    // label: 'Regional Data',
                    data: [
                        (carbonTotal).toFixed(2),
                        (co2Total).toFixed(2)
                    ],
                    backgroundColor: [
                        '#8FC457',
                        '#2A8D12'
                    ]
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: false,
                        // text: 'Regional Data'
                    }
                },
                tooltips: {
                    callbacks: {
                        label: function(tooltipItem, data) {
                            var label = data.labels[tooltipItem.index];
                            var value = data.datasets[0].data[tooltipItem.index];
                            return label + ': ' + value;
                        }
                    }
                }
            }
        });
    </script>

    <script>
        mapboxgl.accessToken = 'pk.eyJ1IjoiaW5kcmFzeiIsImEiOiJjbHVxaWV3bngycmhiMmtuejluMTNzY216In0.EZ-2uwWJ3SAYv3ehMizmGw';

        const map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v11',
            center: [118.0149, -2.5489],
            zoom: 5
        });
        map.addControl(new mapboxgl.NavigationControl());

        var regionalData = <?php echo json_encode($regional); ?>;
        if (Array.isArray(regionalData)) {
            regionalData.forEach(item => {
                new mapboxgl.Marker()
                    .setLngLat([item.longitude, item.latitude])
                    .addTo(map);
            });
        } else {
            console.error('regionalData bukan array');
        }
    </script>
@endpush
