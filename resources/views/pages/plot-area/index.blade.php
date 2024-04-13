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
                    <button class="btn btn-success rounded-3">Tambahkan Data</button>
                </div>
                <div class="row">
                    @include('components.card-plot-area')
                    @include('components.card-plot-area')
                    @include('components.card-plot-area')
                    @include('components.card-plot-area')
                    @include('components.card-plot-area')
                    @include('components.card-plot-area')
                </div>
            </section>
        </div>
    </div>


@endsection
