@extends('layouts.app')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper p-sm-5 p-2 pt-4">
            <div class="container-fluid periode-section mb-4">
                <div class="d-block d-sm-flex justify-content-between align-items-center text-center text-sm-start mb-4">
                    <div class="gap-1">
                        <h4 class="m-0">Daftar Tim</h4>
                        <p class="m-0" style="color: #90A8BF">Informasi data terkait tim Carbon Stock</p>
                    </div>
                    <button class="btn btn-success rounded-3 mt-3 mt-sm-0 "data-bs-toggle="modal"
                        data-bs-target="#myModal">Tambahkan
                        Data</button>
                </div>

                <style>
                    .color-grey {
                        color: #90A8BF;
                    }
                </style>
                <div class="row">
                    @forelse ($team as $item)
                        <div class="col-sm-4 col-12 box-margin">
                            <div class="card mb-2">
                                <div class="card-body">
                                    <h4 class="card-title mb-2">{{ $item->nama }}</h4>
                                    <div class="row align-items-center">
                                        <div class="col-12">
                                            {{-- <div class="d-flex justify-content-between gap-4 align-items-center mb-2">
                                                <div class="d-flex align-items-center justify-content-end gap-2">
                                                    <i style="color: #22710E; font-size: 18px;" class='bx bx-user'></i>
                                                    <span style="color: #90A8BF">Ketua tim</span>
                                                </div>
                                                <p class="m-0" style="color: #90A8BF">Wahyu Indra</p>
                                            </div> --}}
                                            <div class="d-block justify-content-start align-items-center">
                                                <div class="d-flex align-items-center justify-content-start gap-2">
                                                    <i style="color: #22710E; font-size: 18px;" class='bx bx-group'></i>
                                                    <span style="color: #90A8BF">Daftar Anggota</span>
                                                </div>
                                                <div class="d-flex align-items-center gap-2 overflow-x-auto mt-2">
                                                    @if (!$item->anggota->isEmpty())
                                                        @foreach ($item->anggota as $listAnggota)
                                                            @php
                                                                $user = $listAnggota->users;
                                                            @endphp
                                                            <span class="badge p-2"
                                                                style="background: #3e8829;">{{ $user->nama }}</span>
                                                        @endforeach
                                                    @else
                                                        <p class="text-danger m-0"> Belum ada anggota yang ditambahkan</p>
                                                    @endif

                                                </div>
                                                <a href="{{ route('team.create', $item->id) }}">
                                                    <p class="text-info mt-3">+ Tambah User</p>
                                                </a>
                                            </div>
                                            <div class="mt-3">
                                                <div class="text-sm-end text-start gap-2 d-flex d-sm-block mt-sm-0 mt-3">
                                                    @if (!$item->anggota->isEmpty())
                                                        <form class="d-flex gap-2 align-items-center"
                                                            action="{{ route('team.destroy', $item->id) }}" method="POST">
                                                            @csrf

                                                            <a class="btn btn-warning rounded-3 p-2">Ubah</a>
                                                            <button onclick="return confirm('Apakah yakin ingin di hapus?')"
                                                                class="btn btn-danger rounded-3 p-2">Hapus
                                                                Data</button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    @empty
                    @endforelse
                </div>

                <div class="modal  inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content animated bounceInRight">
                            <div class="modal-header">
                                <h4 class="modal-title d-block">Buat Tim</h4>
                            </div>
                            <div class="modal-body mb-3">
                                <form action="{{ route('team.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group"><label>Nama Tim</label> <input type="text"
                                            placeholder="Masukkan nama tim" name="nama" class="form-control" /></div>
                                    <div class="d-flex justify-content-end align-items-center gap-2 p-3">
                                        <a href="#" type="button" class="btn btn-danger"
                                            data-bs-dismiss="modal">Batal</a>
                                        <button type="submit" class="btn btn-success">Simpan</button>
                                    </div>
                                </form>
                            </div>

                        </div>
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
    <script src="/assets/js/default-assets/modal-classes.js"></script>
    <script src="/assets/js/default-assets/modaleffects.js"></script>
@endpush
