@extends('layouts.app')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper p-sm-4 p-2 pt-4">
            <div class="d-block d-sm-flex justify-content-between align-items-center text-center text-sm-start mb-4">
                <div class="gap-1">
                    <h4 class="m-0">Daftar Hamparan</h4>
                    <p class="m-0" style="color: #90A8BF">Informasi terkait data hamparan untuk setiap zona yang aktif</p>
                </div>
                <a href="{{ route('hamparan.create', $zonaId) }}"
                    class="btn btn-success rounded-3 mt-3 mt-sm-0 md-trigger" data-modal="modal-1">Tambahkan
                    Data</a>
            </div>
            <section>

                {{-- <h4 class="card-title mb-4">Data Plot</h4> --}}
                <div class="row">
                    @forelse ($zona->hamparan as $item)
                        <div class="col-md-6 col-lg-4 height-card box-margin">
                            <div class="card">
                                {{-- <img class="card-img-top img-responsive p-3 rounded-5" src="/assets/img/gallery-img/4.jpg"
                                alt="Card image cap"> --}}
                                <div class="card-body">
                                    <h4 class=" mb-0">{{ $item->nama_hamparan }}</h4>
                                    @if ($item->zona)
                                        <p class="card-text mb-0">{{ $item->zona->nama_zona }}</p>
                                    @endif

                                    <div class="d-flex justify-content-between align-items-center my-2">
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
                                        <p class="my-0 text-truncate" style="color: #90A8BF" id="nama_koordinat_{{ $item->id }}">
                                        </p>
                                    </div>

                                    <div class="mt-3">
                                        <div class="text-sm-end text-start gap-2 d-flex d-sm-block mt-sm-0 mt-3">
                                            {{-- @if (!$item->anggota->isEmpty()) --}}
                                            <form class="d-flex gap-2 align-items-center"
                                                action="{{ route('hamparan.destroy', $item->id) }}" method="POST">
                                                @csrf

                                                <a href="{{ route('hamparan.show', $item->id) }}" class="btn btn-warning rounded-3 p-2">Detail</a>
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
                    document.getElementById('nama_koordinat_' + id).innerText = address;
                })
                .catch(error => console.error('Error:', error));
        }
        var hamparanData = <?php echo json_encode($zona->hamparan); ?>;
        // console.log(hamparanData);
        if (Array.isArray(hamparanData)) {
            hamparanData.forEach(item => {
                getAddressFromCoordinates(item.latitude, item.longitude, item.id);
            });
        } else {
            console.error('regionalData bukan array');
        }
    </script>
@endpush

