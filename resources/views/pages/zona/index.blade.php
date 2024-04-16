@extends('layouts.app')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper p-5">
            <div class="d-block d-sm-flex justify-content-between align-items-center text-center text-sm-start mb-4">
                <div class="gap-1">
                    <h4 class="m-0">Daftar Zona</h4>
                    <p class="m-0" style="color: #90A8BF">Informasi data terkait zona untuk setiap regional</p>
                </div>
                <a href="{{ route('zona.create') }}" class="btn btn-success rounded-3 mt-3 mt-sm-0">Tambahkan Data</a>
            </div>
            <div class="row">
                @forelse ($zona as $item)
                    <div class="col-md-6 col-lg-4 height-card box-margin">
                        <div class="card">
                            <img class="card-img-top img-responsive p-3 rounded-5" src="/assets/img/gallery-img/4.jpg"
                                alt="Card image cap">
                            <div class="card-body">
                                <h4 class=" mb-0">{{ $item->nama_zona }}</h4>
                                <p class="card-text mb-0">{{ $item->regional->nama_regional }}</p>
                                {{-- <p class="my-0" style="color: #90A8BF" id="nama_koordinat_{{ $item->id }}"></p> --}}
                                <div class="d-flex justify-content-between align-items-center my-2">
                                    <div class="d-flex align-items-center gap-2">
                                        <i style="color: #22710E; font-size: 18px;" class='bx bx-group'></i>
                                        <span style="color: #90A8BF">Tim</span>
                                    </div>
                                    @if (!$item->tim->isEmpty())
                                        <p class="m-0 text-end" style="color: #90A8BF">{{ $item->tim }}
                                        </p>
                                    @else
                                        <a href="#">
                                            <p class="text-info m-0">+ Tambah User</p>
                                        </a>
                                    @endif
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <div class="d-flex align-items-center gap-2">
                                        <i style="color: #22710E; font-size: 18px;" class='bx bx-map-alt'></i>
                                        <span style="color: #90A8BF">Jenis Hutan</span>
                                    </div>
                                    <p class="m-0 text-end" style="color: #90A8BF">
                                        {{ $item->regional->type_hutan->jenis_hutan }}
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
                                    <p class="my-0" style="color: #90A8BF" id="nama_koordinat_{{ $item->id }}"></p>
                                </div>

                            </div>
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
        </div>
    </div>
@endsection

@push('after-syle')
@endpush

@push('after-script')
    <!-- Inject JS -->
    <script src="js/default-assets/modal-classes.js"></script>
    <script src="js/default-assets/modaleffects.js"></script>
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
        var zonaData = <?php echo json_encode($zona); ?>;
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
