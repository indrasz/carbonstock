@extends('layouts.app')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper p-5">
            <div class="d-block d-sm-flex justify-content-between align-items-center text-center text-sm-start mb-4">
                <div class="gap-1">
                    <h4 class="m-0">Daftar Hamparan</h4>
                    <p class="m-0" style="color: #90A8BF">Informasi terkait data hamparan untuk setiap zona yang aktif</p>
                </div>
                <button class="btn btn-success rounded-3 mt-3 mt-sm-0">Tambahkan Data</button>
            </div>
            <div class="row">
                @include('components.card-zona')
                @include('components.card-zona')
                @include('components.card-zona')
                @include('components.card-zona')
                @include('components.card-zona')
                @include('components.card-zona')
            </div>
        </div>
    </div>
@endsection
