@extends('layouts.app')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper p-sm-5 p-2 pt-4">
            <div class="data-table-area">
                <div class="container-fluid periode-section mb-4">
                    <div class="d-block d-sm-flex justify-content-between align-items-center text-center text-sm-start mb-4">
                        <div class="gap-1">
                            <h4 class="m-0">Daftar Regional</h4>
                            <p class="m-0" style="color: #90A8BF">Informasi terkait Data regional yang aktif</p>
                        </div>
                        <a href="{{ route('region.create') }}" class="btn btn-success rounded-3 mt-3 mt-sm-0 md-trigger"
                            data-modal="modal-1">Tambahkan
                            Data</a>
                    </div>

                    <style>
                        .color-grey {
                            color: #90A8BF;
                        }
                    </style>
                    <div class="row">
                        @forelse ($regional as $item)
                            <div class="col-sm-4 col-12 box-margin">
                                <div class="card mb-2">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-12">
                                                <h4 class=" mb-0">{{ $item->nama_regional }}</h4>
                                                <p class="card-text" id="nama_koordinat"/>
                                                <div class="d-flex justify-content-between align-items-center my-2">
                                                    <div class="d-flex align-items-center gap-2">
                                                        <i style="color: #22710E; font-size: 18px;"
                                                            class='bx bx-map-alt'></i>
                                                        <span style="color: #90A8BF">Jenis Hutan</span>
                                                    </div>
                                                    <p class="m-0" style="color: #90A8BF">
                                                        {{ $item->type_hutan->jenis_hutan }}</p>
                                                </div>
                                                <div class="d-flex justify-content-between align-items-center mb-2">
                                                    <div class="d-flex align-items-center gap-2">
                                                        <i style="color: #22710E; font-size: 18px;" class='bx bx-map'></i>
                                                        <span style="color: #90A8BF">Koordinat</span>
                                                    </div>
                                                    <p class="m-0" style="color: #90A8BF">{{ $item->latitude }},
                                                        {{ $item->longitude }}</p>
                                                </div>
                                                <div class="d-flex justify-content-between align-items-center mb-2">
                                                    <div class="d-flex align-items-center gap-2">
                                                        <i style="color: #22710E; font-size: 18px;" class='bx bx-time'></i>
                                                        <span style="color: #90A8BF">Tanggal mulai</span>
                                                    </div>
                                                    <p class="m-0" style="color: #90A8BF">{{ $item->tanggal_mulai }}</p>
                                                </div>
                                                <div class="d-flex justify-content-between align-items-center mb-2">
                                                    <div class="d-flex align-items-center gap-2">
                                                        <i style="color: #22710E; font-size: 18px;"
                                                            class='bx bx-time-five'></i>
                                                        <span style="color: #90A8BF">Tanggal berakhir</span>
                                                    </div>
                                                    <p class="m-0" style="color: #90A8BF">{{ $item->tanggal_selesai }}</p>
                                                </div>
                                                {{-- <div class="d-flex justify-content-start gap-2 align-items-center mb-2">
                                                <div class="d-flex align-items-center justify-content-start gap-2">
                                                    <i style="color: #22710E; font-size: 18px;" class='bx bx-map'></i>
                                                    <span style="color: #90A8BF">Lokasi : </span>
                                                </div>
                                                <p class="m-0" style="color: #90A8BF">Bandung</p>
                                            </div>
                                            <div class="d-block justify-content-start gap-4 align-items-center mb-2">
                                                <div class="d-flex align-items-center justify-content-start gap-2">
                                                    <span style="color: #22710E">Detail Alamat </span>
                                                </div>
                                                <p class="mx-0 mt-2" style="color: #90A8BF">Jl. Telekomunikasi. 1, Terusan
                                                    Buahbatu - Bojongsoang, Telkom University, Sukapura, Kec. Dayeuhkolot,
                                                    Kabupaten Bandung, Jawa Barat 40257</p>
                                            </div> --}}
                                            </div>
                                            <div class="col-12">
                                                <div class="text-sm-end text-start gap-2 d-flex d-sm-block mt-sm-0 mt-2">
                                                    <button class="btn btn-warning rounded-3 p-2">Ubah Data</button>
                                                    <button class="btn btn-danger rounded-3 p-2">Hapus Data</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                        @endforelse
                    </div>
                </div>
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

        function getAddressFromCoordinates(latitude, longitude) {
            fetch(
                    `https://api.mapbox.com/geocoding/v5/mapbox.places/${longitude},${latitude}.json?access_token=${mapboxgl.accessToken}`
                    )
                .then(response => response.json())
                .then(data => {
                    const address = data.features[0].place_name;
                    document.getElementById('nama_koordinat').innerText = address;
                })
                .catch(error => console.error('Error:', error));
        }
    </script>

    <script>
        getAddressFromCoordinates({{ $item->latitude }}, {{ $item->longitude }});
    </script>
@endpush
