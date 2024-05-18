@extends('layouts.app')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper p-sm-5 p-2 pt-4">
            <div class="container-fluid periode-section mb-4">
                <div class="d-block d-sm-flex justify-content-between align-items-center text-center text-sm-start mb-4">
                    <div class="gap-1">
                        <h4 class="m-0">Tambah data zona</h4>
                        <p class="m-0" style="color: #90A8BF">Informasi terkait data zona yang aktif</p>
                    </div>
                </div>



                <form method="POST" action="{{ route('zona.store', $regionalId) }}" enctype="multipart/form-data">
                    @csrf
                    <fieldset>
                        <input type="hidden" name="id_regional" id="id_regional" value="{{ $regionalId }}">

                        <div class="col-12 mb-3">
                            <label for="map" class="form-label">Pilih Lokasimu</label>
                            <div id="map" />
                        </div>
                        <div class="row mt-3">
                            <div class="form-group mb-3 col-6">
                                <label for="latitude">Latitude</label>
                                <input id="latitude" class="form-control" name="latitude" id="latitude" type="text"
                                    required readonly>
                            </div>
                            <div class="form-group mb-3 col-6">
                                <label for="longitude">Longitude</label>
                                <input id="longitude" class="form-control" name="longitude" id="longitude" type="text"
                                    required readonly>
                            </div>
                            <div class="form-group mb-3 col-6">
                                <label for="nama_zona">Nama Zona</label>
                                <input id="nama_zona" class="form-control" name="nama_zona" type="text" required>
                            </div>
                            <div class="form-group mb-3 col-6">
                                <label for="jenis_hutan">Pilih Jenis Hutan</label>
                                <select name="jenis_hutan" class="form-control" id="exampleFormControlSelect1">
                                    @foreach ($masterHutan as $item)
                                        <option value="{{ $item->id }}">{{ $item->jenis_hutan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-3 col-6">
                                <label for="zona_img">Upload  foto zona</label>
                                <input accept="image/*" type="file" name="file" id="imgInp" class="form-control"/>
                            </div>
                            <div class="form-group mb-3 col-6">
                                <img id="blah" src="/assets/img/gallery-img/4.jpg" alt="your image" class="w-100 h-100" style="max-width: 250px; max-height: 250px; object-fit: cover; object-position: center;"/>
                            </div>
                        </div>
                        <button class="btn btn-success rounded-3" type="submit" value="Submit">Simpan</button>
                    </fieldset>
                </form>

            </div>
        </div>
    </div>
    </div>
@endsection

@push('after-syle')
@endpush

@push('after-script')
    <script>
        mapboxgl.accessToken = 'pk.eyJ1IjoiaW5kcmFzeiIsImEiOiJjbHVxaWV3bngycmhiMmtuejluMTNzY216In0.EZ-2uwWJ3SAYv3ehMizmGw';
        const map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v11',
            // Default center dan zoom diatur berdasarkan data regional
            center: [{{ $regional->longitude }}, {{ $regional->latitude }}],
            zoom: 15
        });

        map.addControl(new mapboxgl.NavigationControl());

        const geocoder = new MapboxGeocoder({
            accessToken: mapboxgl.accessToken,
            mapboxgl: mapboxgl,
            countries: 'ID',
            marker: false
        });

        document.getElementById('map').appendChild(geocoder.onAdd(map));

        geocoder.on('result', function(e) {
            document.getElementById('latitude').value = e.result.center[1].toFixed(4);
            document.getElementById('longitude').value = e.result.center[0].toFixed(4);
        });

        let marker = new mapboxgl.Marker();

        map.on('click', function(e) {
            marker.remove(); // remove the previous marker
            marker.setLngLat(e.lngLat).addTo(map);
            document.getElementById('latitude').value = e.lngLat.lat.toFixed(4);
            document.getElementById('longitude').value = e.lngLat.lng.toFixed(4);
        });
    </script>

    <script>
        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                blah.src = URL.createObjectURL(file)
            }
        }
    </script>
@endpush
