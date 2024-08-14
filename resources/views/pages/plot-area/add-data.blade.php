@extends('layouts.app')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper p-sm-5 p-2 pt-4">
            <div class="container-fluid periode-section mb-4">
                <div class="d-block d-sm-flex justify-content-between align-items-center text-center text-sm-start mb-4">
                    <div class="gap-1">
                        <h4 class="m-0">Tambah data plot</h4>
                        <p class="m-0" style="color: #90A8BF">Informasi terkait data plot yang akan didata</p>
                    </div>
                </div>

                <form method="POST" action="{{ route('region.store') }}">
                    @csrf
                    <fieldset>
                        <section>
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <h4 class="card-title ">Subplot A Seresah</h4>
                                    </div>

                                    <div class="row">
                                        <div class="form-group mb-3 col-6">
                                            <label for="">Basah total</label>
                                            <input id="" class="form-control" name="basah_total" type="number"
                                                required>
                                        </div>
                                        <div class="form-group mb-3 col-6">
                                            <label for="">Basah sampel</label>
                                            <input id="" class="form-control" name="basah_sample" type="number"
                                                required>
                                        </div>
                                        <div class="form-group mb-3 col-6">
                                            <label for="">Kering total</label>
                                            <input id="" class="form-control" name="kering_total" type="number"
                                                required>
                                        </div>
                                        <div class="form-group mb-3 col-6">
                                            <label for="">Kering sampel</label>
                                            <input id="" class="form-control" name="kering_sample" type="number"
                                                required>
                                        </div>

                                        <div class="form-group mb-3 col-6">
                                            <label for="">Kandungan karbon</label>
                                            <input id="" class="form-control" name="carbon_value" type="number"
                                                required readonly>
                                        </div>

                                        <div class="form-group mb-3 col-6">
                                            <label for="">Serapan CO2</label>
                                            <input id="" class="form-control" name="carbon_absorb" type="number"
                                                required readonly>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </section>

                        <section>
                            <div class="card mt-2">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <h4 class="card-title ">Subplot A Semai</h4>
                                    </div>

                                    <div class="row">
                                        <div class="form-group mb-3 col-6">
                                            <label for="">Basah total</label>
                                            <input id="" class="form-control" name="basah_total" type="number"
                                                required>
                                        </div>
                                        <div class="form-group mb-3 col-6">
                                            <label for="">Basah sampel</label>
                                            <input id="" class="form-control" name="basah_sample" type="number"
                                                required>
                                        </div>
                                        <div class="form-group mb-3 col-6">
                                            <label for="">Kering total</label>
                                            <input id="" class="form-control" name="kering_total" type="number"
                                                required>
                                        </div>
                                        <div class="form-group mb-3 col-6">
                                            <label for="">Kering sampel</label>
                                            <input id="" class="form-control" name="kering_sample" type="number"
                                                required>
                                        </div>

                                        <div class="form-group mb-3 col-6">
                                            <label for="">Kandungan karbon</label>
                                            <input id="" class="form-control" name="carbon_value" type="number"
                                                required readonly>
                                        </div>

                                        <div class="form-group mb-3 col-6">
                                            <label for="">Serapan CO2</label>
                                            <input id="" class="form-control" name="carbon_absorb" type="number"
                                                required readonly>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </section>

                        <section>
                            <div class="card mt-2">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <h4 class="card-title ">Subplot A Tumbuhan Bawah</h4>
                                    </div>

                                    <div class="row">
                                        <div class="form-group mb-3 col-6">
                                            <label for="">Basah total</label>
                                            <input id="" class="form-control" name="basah_total" type="number"
                                                required>
                                        </div>
                                        <div class="form-group mb-3 col-6">
                                            <label for="">Basah sampel</label>
                                            <input id="" class="form-control" name="basah_sample" type="number"
                                                required>
                                        </div>
                                        <div class="form-group mb-3 col-6">
                                            <label for="">Kering total</label>
                                            <input id="" class="form-control" name="kering_total" type="number"
                                                required>
                                        </div>
                                        <div class="form-group mb-3 col-6">
                                            <label for="">Kering sampel</label>
                                            <input id="" class="form-control" name="kering_sample" type="number"
                                                required>
                                        </div>

                                        <div class="form-group mb-3 col-6">
                                            <label for="">Kandungan karbon</label>
                                            <input id="" class="form-control" name="carbon_value" type="number"
                                                required readonly>
                                        </div>

                                        <div class="form-group mb-3 col-6">
                                            <label for="">Serapan CO2</label>
                                            <input id="" class="form-control" name="carbon_absorb" type="number"
                                                required readonly>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </section>

                        <section>
                            <div class="card mt-2">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <h4 class="card-title ">Subplot B Pancang</h4>
                                    </div>

                                    <div class="row">
                                        <div class="form-group mb-3 col-6">
                                            <label for="">Basah total</label>
                                            <input id="" class="form-control" name="basah_total" type="number"
                                                required>
                                        </div>
                                        <div class="form-group mb-3 col-6">
                                            <label for="">Basah sampel</label>
                                            <input id="" class="form-control" name="basah_sample" type="number"
                                                required>
                                        </div>
                                        <div class="form-group mb-3 col-6">
                                            <label for="">Kering total</label>
                                            <input id="" class="form-control" name="kering_total" type="number"
                                                required>
                                        </div>
                                        <div class="form-group mb-3 col-6">
                                            <label for="">Kering sampel</label>
                                            <input id="" class="form-control" name="kering_sample" type="number"
                                                required>
                                        </div>

                                        <div class="form-group mb-3 col-6">
                                            <label for="">Kandungan karbon</label>
                                            <input id="" class="form-control" name="carbon_value" type="number"
                                                required readonly>
                                        </div>

                                        <div class="form-group mb-3 col-6">
                                            <label for="">Serapan CO2</label>
                                            <input id="" class="form-control" name="carbon_absorb" type="number"
                                                required readonly>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </section>

                        <section>
                            <div class="card mt-2">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <h4 class="card-title ">Subplot C Tiang</h4>
                                    </div>

                                    <div class="row">
                                        <div class="form-group mb-3 col-6">
                                            <label for="">Basah total</label>
                                            <input id="" class="form-control" name="basah_total" type="number"
                                                required>
                                        </div>
                                        <div class="form-group mb-3 col-6">
                                            <label for="">Basah sampel</label>
                                            <input id="" class="form-control" name="basah_sample" type="number"
                                                required>
                                        </div>
                                        <div class="form-group mb-3 col-6">
                                            <label for="">Kering total</label>
                                            <input id="" class="form-control" name="kering_total" type="number"
                                                required>
                                        </div>
                                        <div class="form-group mb-3 col-6">
                                            <label for="">Kering sampel</label>
                                            <input id="" class="form-control" name="kering_sample" type="number"
                                                required>
                                        </div>

                                        <div class="form-group mb-3 col-6">
                                            <label for="">Kandungan karbon</label>
                                            <input id="" class="form-control" name="carbon_value" type="number"
                                                required readonly>
                                        </div>

                                        <div class="form-group mb-3 col-6">
                                            <label for="">Serapan CO2</label>
                                            <input id="" class="form-control" name="carbon_absorb" type="number"
                                                required readonly>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </section>

                        <section>
                            <div class="card mt-2">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <h4 class="card-title ">Subplot D Nekromas</h4>
                                    </div>

                                    <div class="row">
                                        <div class="form-group mb-3 col-6">
                                            <label for="">Basah total</label>
                                            <input id="" class="form-control" name="basah_total" type="number"
                                                required>
                                        </div>
                                        <div class="form-group mb-3 col-6">
                                            <label for="">Basah sampel</label>
                                            <input id="" class="form-control" name="basah_sample" type="number"
                                                required>
                                        </div>
                                        <div class="form-group mb-3 col-6">
                                            <label for="">Kering total</label>
                                            <input id="" class="form-control" name="kering_total" type="number"
                                                required>
                                        </div>
                                        <div class="form-group mb-3 col-6">
                                            <label for="">Kering sampel</label>
                                            <input id="" class="form-control" name="kering_sample" type="number"
                                                required>
                                        </div>

                                        <div class="form-group mb-3 col-6">
                                            <label for="">Kandungan karbon</label>
                                            <input id="" class="form-control" name="carbon_value" type="number"
                                                required readonly>
                                        </div>

                                        <div class="form-group mb-3 col-6">
                                            <label for="">Serapan CO2</label>
                                            <input id="" class="form-control" name="carbon_absorb" type="number"
                                                required readonly>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </section>

                        <section>
                            <div class="card mt-2">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <h4 class="card-title ">Subplot D Pohon</h4>
                                    </div>

                                    <div class="row">
                                        <div class="form-group mb-3 col-6">
                                            <label for="">Basah total</label>
                                            <input id="" class="form-control" name="basah_total" type="number"
                                                required>
                                        </div>
                                        <div class="form-group mb-3 col-6">
                                            <label for="">Basah sampel</label>
                                            <input id="" class="form-control" name="basah_sample" type="number"
                                                required>
                                        </div>
                                        <div class="form-group mb-3 col-6">
                                            <label for="">Kering total</label>
                                            <input id="" class="form-control" name="kering_total" type="number"
                                                required>
                                        </div>
                                        <div class="form-group mb-3 col-6">
                                            <label for="">Kering sampel</label>
                                            <input id="" class="form-control" name="kering_sample" type="number"
                                                required>
                                        </div>

                                        <div class="form-group mb-3 col-6">
                                            <label for="">Kandungan karbon</label>
                                            <input id="" class="form-control" name="carbon_value" type="number"
                                                required readonly>
                                        </div>

                                        <div class="form-group mb-3 col-6">
                                            <label for="">Serapan CO2</label>
                                            <input id="" class="form-control" name="carbon_absorb" type="number"
                                                required readonly>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </section>

                        <section>
                            <div class="card mt-2">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <h4 class="card-title ">Subplot D Tanah</h4>
                                    </div>

                                    <div class="row">
                                        <div class="form-group mb-3 col-6">
                                            <label for="">Basah total</label>
                                            <input id="" class="form-control" name="basah_total" type="number"
                                                required>
                                        </div>
                                        <div class="form-group mb-3 col-6">
                                            <label for="">Basah sampel</label>
                                            <input id="" class="form-control" name="basah_sample" type="number"
                                                required>
                                        </div>
                                        <div class="form-group mb-3 col-6">
                                            <label for="">Kering total</label>
                                            <input id="" class="form-control" name="kering_total" type="number"
                                                required>
                                        </div>
                                        <div class="form-group mb-3 col-6">
                                            <label for="">Kering sampel</label>
                                            <input id="" class="form-control" name="kering_sample" type="number"
                                                required>
                                        </div>

                                        <div class="form-group mb-3 col-6">
                                            <label for="">Kandungan karbon</label>
                                            <input id="" class="form-control" name="carbon_value" type="number"
                                                required readonly>
                                        </div>

                                        <div class="form-group mb-3 col-6">
                                            <label for="">Serapan CO2</label>
                                            <input id="" class="form-control" name="carbon_absorb" type="number"
                                                required readonly>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </section>

                        <button class="btn btn-success rounded-3 mt-3" type="submit" value="Submit">Simpan</button>
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
@endpush
