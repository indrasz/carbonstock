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
                                <div class="d-flex justify-content-between align-items-center my-2">
                                    <div class="d-flex align-items-center gap-2">
                                        <i style="color: #22710E; font-size: 18px;" class='bx bx-group'></i>
                                        <span style="color: #90A8BF">Tim</span>
                                    </div>
                                    @if (!$item->tim->isEmpty())
                                        <p class="m-0 text-end" style="color: #90A8BF">
                                            {{ $item->tim->first()->namaTim->nama }}
                                            {{-- {{ $item->tim }}  --}}
                                        </p>
                                    @else
                                        <a href="#" data-bs-toggle="modal"
                                            data-bs-target="#myModal{{ $item->id }}">
                                            <p class="text-info m-0">+ Tambah tim</p>
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

                                <div class="mt-3">
                                    <div class="text-sm-end text-start gap-2 d-flex d-sm-block mt-sm-0 mt-3">
                                        {{-- @if (!$item->anggota->isEmpty()) --}}
                                        <form class="d-flex gap-2 align-items-center"
                                            action="{{ route('zona.destroy', $item->id) }}" method="POST">
                                            @csrf

                                            <a class="btn btn-warning rounded-3 p-2">Ubah</a>
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

                    <div class="modal inmodal" id="myModal{{ $item->id }}" tabindex="-1" role="dialog"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content animated bounceInRight">
                                <div class="modal-header">
                                    <h4 class="modal-title d-block">Buat Tim</h4>
                                </div>
                                <div class="modal-body mb-3">
                                    <form action="{{ route('zona.tambahTim') }}" method="POST">
                                        <input type="text" name="id_zona" value="{{ $item->id }}">
                                        @csrf
                                        <div class="form-group"><label>Nama Tim</label>
                                            <select name="id_tim" class="form-control" id="exampleFormControlSelect1">
                                                @foreach ($tim as $timItem)
                                                    <option value="{{ $timItem->id }}">{{ $timItem->nama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </form>
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
    {{-- <script src="js/default-assets/modal-classes.js"></script>
    <script src="js/default-assets/modaleffects.js"></script> --}}
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
