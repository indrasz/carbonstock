@extends('layouts.app')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper p-sm-5 p-2 pt-4">
            <div class="container-fluid periode-section mb-4">
                <div class="d-block d-sm-flex justify-content-between align-items-center text-center text-sm-start mb-4">
                    <div class="gap-1">
                        <h4 class="m-0">Tambah Periode</h4>
                        <p class="m-0" style="color: #90A8BF">Data periode aktif untuk mengatur jangka waktu manajemen
                            Carbon Stock</p>
                    </div>
                </div>

                <form class="cmxform" id="commentForm" method="get" action="#">
                    <fieldset>
                        <div class="form-group mb-3">
                            <label for="periode">Nama periode</label>
                            <input id="periode" class="form-control" name="periode" minlength="2" type="text"
                                required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="start_date">Mulai Tanggal</label>
                            <input id="start_date" class="form-control" type="date" name="start_date" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="end_date">Berakhir Tanggal</label>
                            <input id="end_date" class="form-control" type="date" name="end_date" required>
                        </div>
                        <button class="btn btn-success" type="submit" value="Submit">Submit</button>
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
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>

    <script>
        $(function() {
            'use strict';

            $('#tags').tagsInput({
                'width': '100%',
                'height': '85%',
                'interactive': true,
                'defaultText': 'Add More',
                'removeWithBackspace': true,
                'minChars': 0,
                'maxChars': 20,
                'placeholderColor': '#555'
            });
        });
    </script>

    <script>
        // Open the full screen search box
        function openSearch() {
            document.getElementById("myOverlay").style.display = "block";
        }

        // Close the full screen search box
        function closeSearch() {
            document.getElementById("myOverlay").style.display = "none";
        }
    </script>
@endpush
