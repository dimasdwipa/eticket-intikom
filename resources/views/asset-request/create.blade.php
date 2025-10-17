@extends('layouts.app', ['page' => 'Item Loan Request', 'pageSlug' => 'Item Loan Request', 'section' => 'Item Loan Request'])

@section('content')
    <div class="row">
        <div class="col-12">
            <form method="POST" action="{{ route('asset-request.store') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" class="form-control" name="bu" value="{{ Auth::user()->departemen_corporate }}">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-3 pb-2">
                            <h6 class="text-white text-capitalize ps-3">Ticket Loan request</h6>
                        </div>
                    </div>
                    <div class="card-body px-5 pb-2">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                        <div class="input-group input-group-static mb-4">
                            <label for="Lokasi">Date</label>
                            <input type="text" class="form-control" autocomplete="off" name="tanggal"
                                value="{{ date('Y-m-d') }}" readonly aria-describedby="helpId" required>
                        </div>
                        <div class="mainform">
                            <div class="card bg-gray-700">
                                <div class="p-0 position-relative mt-n4 mx-3 z-index-2 border-radius-lg ps p-3 row">

                                    <h6
                                        class="col-10 col-sm-6 col-md-4 col-lg-4 col-xl-3 bg-gradient-primary shadow-primary border-radius-lg pt-1 pb-1 text-white text-capitalize ps-3">
                                        Detail Request</h6>
                                </div>
                                <div class="card-body bg-gray-200">
                                    <div class="input-group input-group-static mb-4">
                                        <label for="Lokasi">Send To</label>
                                        <select class="form-control form-control-sm tenant33" datateam="0" name="team_id"
                                            onchange="getCombo2(this)" required>
                                            <option></option>
                                            @foreach ($teams as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="input-group input-group-static mb-4">
                                        <label for="Lokasi">Location</label>
                                        <select class="form-control lokasi" name="lokasi" lokasi="0" required>
                                            <option></option>
                                            @foreach ($lokasi as $item)
                                                <option class="lokasi{{ $item->team_id }}" value="{{ $item->id }}">
                                                    {{ $item->lokasi }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="input-group input-group-static mb-4">
                                        <label class="text-dark">Priority</label>
                                        <select class="form-control form-control-sm Priority23" id="prioritas0"
                                            name="prioritas" required>
                                            <option class="prioritas0" value="low">Low</option>
                                            <option class="prioritas1" value="normal">Normal</option>
                                            <option class="prioritas2" value="high">High</option>
                                            <option class="prioritas3" value="urgent">Urgent</option>
                                        </select>
                                    </div>

                                    <div class="border-2 rounded border border-dark p-4">
                                        <div class="row">
                                            <div class="col-8">
                                                <div class="input-group input-group-static mb-4">
                                                    <label for="asset">Select Asset</label>
                                                    <select class="form-control asset" name="asset" required>
                                                        <option></option>
                                                        @foreach ($assets as $item)
                                                            <option class="assets" value="{{ $item->id }}"
                                                                data-tag="{{ $item->tag_asset }}"
                                                                data-nama="{{ $item->nama_item }}"
                                                                data-deskripsi="{{ $item->deskripsi }}"
                                                                data-merek="{{ $item->merek }}"
                                                                data-model="{{ $item->model_type }}"
                                                                data-statusasset="{{ $item->status }}"
                                                                data-url="{{ $item->image }}"
                                                                data-team_id="{{ $item->team_id }}">
                                                                {{ $item->nama_item }} - {{ $item->status }} -
                                                                {{ $item->deskripsi }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" id="OnlyAvailable">
                                                    <label class="form-check-label" for="OnlyAvailable">Only shows available
                                                        assets</label>
                                                </div>
                                                {{-- <div class="form-group">
                                                    <Label>Type of loan</Label>
                                                    <div class="form-check mb-3">
                                                        <input class="form-check-input" type="radio" name="type_request"
                                                            id="customRadio1" value="Non Permanent" checked>
                                                        <label class="custom-control-label" for="customRadio1">Non
                                                            Permanent</label>

                                                        <input class="form-check-input" type="radio" name="type_request"
                                                            id="customRadio2" value="Permanent">
                                                        <label class="custom-control-label"
                                                            for="customRadio2">Permanent</label>
                                                    </div>
                                                </div> --}}
                                                <input class="form-check-input" type="hidden" name="type_request" value="Non Permanent" >

                                            </div>
                                            <div class="col-md-4">
                                                <div class="input-group input-group-static mb-4">
                                                    <div class="mt-2">
                                                        <img id="asset-image" src="#" alt="Selected Asset" class="img-thumbnail" width="200" style="display:none;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group input-group-static mb-4" id="est_return_date">
                                                    <label for="est_return_date">Tanggal Estimasi Pengembalian</label>
                                                    <input type="text" class="form-control form-control-sm bg-white px-1"
                                                        name="est_return_date" id="return_date">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group input-group-static mb-4">
                                                    <label for="tag-asset">Tag Asset</label>
                                                    <input type="text"
                                                        class="form-control form-control-sm bg-white px-1" id="tag-asset"
                                                        readonly>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group input-group-static mb-4">
                                                    <label for="nama-asset">Nama Asset</label>
                                                    <input type="text"
                                                        class="form-control form-control-sm bg-white px-1" id="nama-asset"
                                                        readonly>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group input-group-static mb-4">
                                                    <label for="deskripsi-item">Deskripsi Item</label>
                                                    <input type="text"
                                                        class="form-control form-control-sm bg-white px-1"
                                                        id="deskripsi-item" readonly>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group input-group-static mb-4">
                                                    <label for="merek">Merek</label>
                                                    <input type="text"
                                                        class="form-control form-control-sm bg-white px-1" id="merek"
                                                        readonly>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group input-group-static mb-4">
                                                    <label for="model-type">Model Type</label>
                                                    <input type="text"
                                                        class="form-control form-control-sm bg-white px-1" id="model-type"
                                                        readonly>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group input-group-static mb-4">
                                                    <label for="status">Status</label>
                                                    <input type="text"
                                                        class="form-control form-control-sm bg-white px-1"
                                                        id="statusasset" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <br>

                                    <div class="input-group input-group-static mb-4">
                                        <label class="text-dark">Need for</label>
                                        <textarea class="form-control form-control-sm bg-white" style="border-radius:0.25rem !important" rows="5"
                                            name="description" required></textarea>
                                    </div>

                                    <div class="input-group input-group-static mb-4">
                                        <label class="text-dark">Choose file to upload (max. 2mb)</label>
                                        <input type="file" class="form-control form-control-sm bg-white px-1"
                                            style="border-radius:0.25rem !important" rows="5" name="files">
                                    </div>

                                </div>
                            </div>
                        </div>
                        {{-- <div class="card-footer px-0" style="text-align: right">
                            <button type="button" class="add btn btn-sm btn-success text-white"><i class="fa fa-plus"
                                    aria-hidden="true"></i> Add Problem</button>
                        </div> --}}

                    </div>
                    <div class="card card-footer" style="text-align: right">
                        <button type="submit" id="submit-form" class="btn btn-primary">Send Ticket</button>
                    </div>
                </div>
        </div>
        </form>
    </div>
    </div>


    <script>
        $(document).ready(function() {
            const nonPermanentRadio = $('#customRadio1');
            const permanentRadio = $('#customRadio2');
            const estReturnDateInput = $('input[name="est_return_date"]');
            const estReturnDateInput2 = $('#est_return_date');

            function toggleEstReturnDate() {
                if (permanentRadio.is(':checked')) {
                    estReturnDateInput.val(null);
                    estReturnDateInput2.hide();
                } else {
                    estReturnDateInput2.show();
                }
            }

            nonPermanentRadio.on('change', toggleEstReturnDate);
            permanentRadio.on('change', toggleEstReturnDate);

            toggleEstReturnDate(); // Initial call to set the correct state
        });

        $(document).ready(function() {
            $('#OnlyAvailable').on('change', function() {
                // Trigger the getCombo2 function for the currently selected team
                var selectedTeam = $('.tenant33').val();
                if (selectedTeam) {
                    var selectElement = $('.tenant33')[0]; // Get the select element
                    getCombo2(selectElement);
                }
            });

            $('#return_date').datepicker({
                dateFormat: 'yy-mm-dd'
            });

            $('.tenant33').select2({
                placeholder: 'Select',
                allowClear: true
            });
            $('.asset').select2({
                placeholder: 'Select an asset',
                allowClear: true
            });

            $('.asset').change(function() {
                var selectedOption = $(this).find('option:selected');

                $('#tag-asset').val(selectedOption.data('tag'));
                $('#nama-asset').val(selectedOption.data('nama'));
                $('#deskripsi-item').val(selectedOption.data('deskripsi'));
                $('#merek').val(selectedOption.data('merek'));
                $('#model-type').val(selectedOption.data('model'));
                $('#statusasset').val(selectedOption.data('statusasset'));
                if (selectedOption.data('statusasset') != 'Available') {
                    $('#statusasset').removeClass('bg-white').css({
                        'background-color': 'rgb(162, 0, 0)',
                        'color': 'white',
                        'font-weight': 'bold'
                    });
                    $('#submit-form').hide();
                } else {
                    $('#statusasset').addClass('bg-white').css({
                        'background-color': '',
                        'color': '',
                        'font-weight': ''
                    });
                    $('#submit-form').show();
                }

                var imageUrl = selectedOption.data('url');
                if (imageUrl) {
                    $('#asset-image').attr('src', '/storage/' + imageUrl).show(); // Set image source dan tampilkan gambar
                } else {
                    $('#asset-image').hide(); // Sembunyikan gambar jika tidak ada URL
                }
            });


        });



        function getCombo2(e) {

            $(document).ready(function() {



                var a = $(e).attr('datateam');
                var b = e.value;

                var $example = $("select[team=" + a + "]").select2();

                $example.val(null).trigger("change");
                $example.select2("destroy");

                $example.select2({
                    // //-^^^^^^^^--- update here
                    tags: true,
                    placeholder: "Select an Option",
                    width: '100%',
                    matcher: function(term, text, option) {
                        if ($(text.element).hasClass('team' + b)) {
                            return text;
                        }
                        return true;
                    }

                });



                var $example = $("select[lokasi=" + a + "]").select2();

                $example.val(null).trigger("change");
                $example.select2("destroy");
                console.log($example);
                $example.select2({
                    // //-^^^^^^^^--- update here
                    tags: true,
                    placeholder: "Select an Option",
                    width: '100%',
                    matcher: function(term, text, option) {
                        if ($(text.element).hasClass('lokasi' + b)) {
                            return text;
                        }
                        return true;
                    }

                });

                var onlyAvailable = $('#OnlyAvailable').is(':checked');
                var $assetSelect = $("select.asset").select2();
                $assetSelect.val(null).trigger("change");
                $assetSelect.select2("destroy");
                $assetSelect.select2({
                    tags: true,
                    placeholder: "Select an Asset",
                    width: '100%',
                    matcher: function(term, text, option) {

                        if ($(text.element).hasClass('assets') && $(text.element).data('team_id') ==
                            b) {
                            if (onlyAvailable) {
                                var isAvailable = $(text.element).data('statusasset') == 'Available';
                                if (isAvailable) {
                                    return text;
                                } else {
                                    return null;
                                }
                            } else {
                                return text;
                            }
                        }
                        return true;
                    }
                });
            });

        }
    </script>
@endsection
