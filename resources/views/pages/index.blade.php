@extends('layouts.app')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
           {{-- <x-mapbox id="mapId" /> --}}
        </div>
    </div>
    {{-- <script>
        mapboxgl.accessToken = '{{ $token }}';
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v11',
            center: [{{ $longitude }}, {{ $latitude }}],
            zoom: 10
        });

        // Tambahkan marker untuk menunjukkan posisi saat ini
        new mapboxgl.Marker()
            .setLngLat([{{ $longitude }}, {{ $latitude }}])
            .addTo(map);
    </script> --}}
@endsection
