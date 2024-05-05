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
