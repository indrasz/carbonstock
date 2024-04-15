@extends('layouts.app')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper p-sm-5 p-2 pt-4">
            <div class="container-fluid periode-section mb-4">
                <div class="d-block d-sm-flex justify-content-between align-items-center text-center text-sm-start mb-4">
                    <div class="gap-1">
                        <h4 class="m-0">Tambah data tim</h4>
                        <p class="m-0" style="color: #90A8BF">Informasi terkait data regional yang aktif</p>
                    </div>
                </div>

                <form method="POST" action="{{ route('team.tambahAnggota') }}">
                    @csrf
                    <fieldset>
                        <input type="hidden" name="id_tim" value="{{ $id }}">
                        <div class="form-group mb-3 col-6" id="listUser">
                            <label for="id_user">Pilih anggota</label>
                            <select name="id_user[]" class="form-control" id="exampleFormControlSelect1">
                                @foreach ($users as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}, {{ $item->email }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div id="appendMember"></div>
                        <a href="#" id="addMemberLink">
                            <p class="text-info">+ Tambah Anggota</p>
                        </a>
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
        document.getElementById('addMemberLink').addEventListener('click', function(event) {
            event.preventDefault();
            var selectWrapper = document.getElementById('listUser').cloneNode(true);
            var appendMember = document.getElementById('appendMember');
            appendMember.appendChild(selectWrapper);
        });
    </script>
@endpush
