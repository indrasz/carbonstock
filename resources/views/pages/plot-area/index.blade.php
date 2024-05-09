@extends('layouts.app')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper p-5">
            <section class="plot-area-section mb-4">
                <div class="d-block d-sm-flex justify-content-between align-items-center text-center text-sm-start mb-4">
                    <div class="gap-1">
                        <h4 class="m-0">Data Plot Area</h4>
                        <p class="m-0" style="color: #90A8BF">Pendataan plot area yang dituju</p>
                    </div>
                    {{-- <a href="{{ route('plot-area.create') }}" class="btn btn-success rounded-3">Tambahkan Data</a> --}}
                </div>
                <div class="row">
                    @forelse ($plotArea as $item)
                        <div class="col-md-6 col-lg-4 height-card box-margin">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class=" mb-0">{{ $item->nama_plot }}</h4>
                                    <p class="card-text mb-2">{{ $item->hamparan->nama_hamparan }}</p>
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <div class="d-flex align-items-center gap-2">
                                            <i style="color: #22710E; font-size: 18px;" class='bx bx-map-alt'></i>
                                            <span style="color: #90A8BF">Tipe Plot</span>
                                        </div>
                                        <p class="m-0 text-end" style="color: #90A8BF">
                                            {{ $item->plot->nama_plot }}
                                        </p>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <div class="d-flex align-items-center gap-2">
                                            <i style="color: #22710E; font-size: 18px;" class='bx bx-map'></i>
                                            <span style="color: #90A8BF">Koordinat</span>
                                        </div>
                                        <p class="m-0 text-end" style="color: #90A8BF">{{ $item->latitude }},
                                            {{ $item->longitude }}</p>
                                    </div>
                                    <div class="d-block justify-content-between align-items-center mb-2">
                                        <div class="d-flex align-items-center gap-2">
                                            <i style="color: #22710E; font-size: 18px;" class='bx bx-map-pin'></i>
                                            <span style="color: #90A8BF">Lokasi</span>
                                        </div>
                                        <p class="my-0" style="color: #90A8BF" id="nama_koordinat_{{ $item->id }}">
                                        </p>
                                    </div>

                                    <div class="text-sm-end text-start gap-2 d-flex d-sm-block mt-sm-0 mt-3">
                                        {{-- @if (!$item->anggota->isEmpty()) --}}
                                        <form class="d-flex gap-2 align-items-center"
                                            action="{{ route('plot-area.destroy', $item->id) }}" method="POST">
                                            @csrf

                                            <a href="{{ route('plot-area.show', $item->id) }}"
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
                        @empty
                    @endforelse
                </div>
            </section>
        </div>
    </div>
@endsection

@push('after-script')
    <script>
        mapboxgl.accessToken = 'pk.eyJ1IjoiaW5kcmFzeiIsImEiOiJjbHVxaWV3bngycmhiMmtuejluMTNzY216In0.EZ-2uwWJ3SAYv3ehMizmGw';

        function getAddressFromCoordinates(latitude, longitude, id) {
            fetch(
                    `https://api.mapbox.com/geocoding/v5/mapbox.places/${longitude},${latitude}.json?access_token=${mapboxgl.accessToken}`
                )
                .then(response => response.json())
                .then(data => {
                    const address = data.features[0].place_name;
                    // Gunakan ID yang disisipkan untuk memperbarui elemen yang sesuai
                    document.getElementById('nama_koordinat_' + id).innerText = address;
                })
                .catch(error => console.error('Error:', error));
        }
        var plotData = <?php echo json_encode($plotArea); ?>;
        // console.log(regionalData);
        if (Array.isArray(plotData)) {
            plotData.forEach(item => {
                getAddressFromCoordinates(item.latitude, item.longitude, item.id);
            });
        } else {
            console.error('Plot bukan array');
        }
    </script>
@endpush
