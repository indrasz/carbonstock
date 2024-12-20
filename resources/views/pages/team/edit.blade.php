@extends('layouts.app')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper p-sm-5 p-2 pt-4">
            <div class="container-fluid periode-section mb-4">
                <div class="d-block d-sm-flex justify-content-between align-items-center text-center text-sm-start mb-4">
                    <div class="gap-1">
                        <h4 class="m-0">Edit Nama Tim</h4>
                        <p class="m-0" style="color: #90A8BF">Informasi terkait nama tim yang aktif</p>
                    </div>
                </div>

                <form method="POST" action="{{ route('team.updateTeam', $team->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3 col-6">
                        <label for="nama">Nama Tim</label>
                        <input id="nama" class="form-control" name="nama" id="nama" type="text"
                            value="{{ $team->nama }}" required>
                    </div>
                    {{-- <fieldset>
                        <input type="hidden" name="id_tim" value="{{ $id }}">
                        @foreach ($team->anggota as $item)
                            <label for="id_user">Pilih anggota</label>
                            <div class="d-flex align-items-center mb-3 gap-3">
                                <div class="form-group m-0 col-6" id="listUser">
                                    <select name="id_user[]" class="form-control" id="exampleFormControlSelect1">
                                        <option selected value="{{ $item->users->id }}">{{ $item->users->nama }},
                                            {{ $item->users->email }}
                                        </option>
                                        @foreach ($users as $userItem)
                                            <option value="{{ $userItem->id }}">{{ $userItem->nama }},
                                                {{ $userItem->email }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <form action="{{ route('team.destroyAnggota', $item->users->id) }}" method="POST" class="m-0">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger rounded p-1 m-0">Hapus</butt>
                                </form>
                            </div>
                        @endforeach
                        <div id="appendMember"></div>
                        <a href="#" id="addMemberLink">
                            <p class="text-info">+ Tambah Anggota</p>
                        </a>

                    </fieldset> --}}
                    <button class="btn btn-success rounded-3" type="submit" value="Submit">Simpan</button>
                </form>

            </div>
        </div>
    </div>
@endsection

@push('after-syle')
@endpush

@push('after-script')
    <script>
        document.getElementById('addMemberLink').addEventListener('click', function(event) {
            event.preventDefault();
            var selectWrapper = document.getElementById('listUser').cloneNode(true);
            var appendMember = document.getElementById('appendMember');
            appendMember.appendChild(selectWrapper);
        });
    </script>
@endpush
