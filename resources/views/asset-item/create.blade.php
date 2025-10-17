@extends('layouts.app', ['page' => 'Master Item Loan', 'pageSlug' => 'Master Item Loan', 'section' => 'Master Item Loan'])

@section('content')
    <div class="container-fluid py-4">
        <div class="row">

            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-2 pb-1">
                            <h6 class="text-white text-capitalize ps-3">Master Item Loan</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <form action="{{ route('asset-item.store') }}" class="p-4" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                {{-- <div class="col-md-12">
                                    <div class="form-check form-switch">
                                        <input type="hidden" name="auto_generate" value="false">
                                        <input class="form-check-input" type="checkbox" id="AutoGenerate"
                                            name="auto_generate" checked>
                                        <label class="form-check-label" for="OnlyAvailable">Auto Generate Tag</label>
                                    </div>
                                </div> --}}
                                <div class="col-md-6" id="input-group-autogenerate">

                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">Tag Asset</label>
                                        <input type="text" class="form-control @error('tag_asset') is-invalid @enderror"
                                            id="tag_asset" name="tag_asset" value="{{ old('tag_asset') }}" required>
                                        @error('tag_asset')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">Nama Item</label>
                                        <input type="text" class="form-control @error('nama_item') is-invalid @enderror"
                                            id="nama_item" name="nama_item" value="{{ old('nama_item') }}" required>
                                        @error('nama_item')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">Asset Condition</label>
                                        <input class="form-control @error('condition_asset') is-invalid @enderror" id="condition_asset" name="condition_asset" required>
                                        @error('condition_asset')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group input-group-static mb-4">
                                        <label>Deskripsi</label>
                                        <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi"></textarea>
                                        @error('deskripsi')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">Merek</label>
                                        <input type="text" class="form-control @error('merek') is-invalid @enderror"
                                            id="merek" name="merek" value="{{ old('merek') }}">
                                        @error('merek')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">Model Type</label>
                                        <input type="text" class="form-control @error('model_type') is-invalid @enderror"
                                            id="model_type" name="model_type" value="{{ old('model_type') }}">
                                        @error('model_type')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group input-group-outline my-3">
                                        <label>Agent</label>
                                        <select class="form-control  @error('agent_id') is-invalid @enderror select2"
                                            name="agent_id" required>
                                            <option></option>
                                            @foreach ($agents as $agent)
                                                <option class="agent" value="{{ $agent->id }}">
                                                    {{ $agent->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('agent_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group input-group-outline my-3">
                                        <label>Supervisor</label>
                                        <select class="form-control  @error('supervisor_id') is-invalid @enderror select2"
                                            name="supervisor_id" required>
                                            <option></option>
                                            @foreach ($supervisors as $supervisor)
                                                <option class="supervisor" value="{{ $supervisor->id }}">
                                                    {{ $supervisor->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('supervisor_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label>Image</label>
                                    <div class="input-group input-group-outline my-3">

                                        <input type="file"
                                            class="form-control form-control-sm  @error('image') is-invalid @enderror"
                                            id="image" name="image">
                                        @error('image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-sm btn-success">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('style')
    {{-- data table --}}
    <style>
        .dt-buttons {
            text-align: right;
            padding-left: 1rem;
            padding-right: 1rem;
            padding-bottom: 0.5rem;
        }

        .dataTables_length {
            padding-left: 1rem;
            padding-right: 1rem;
        }

        .dataTables_filter {
            padding-left: 1rem;
            padding-right: 1rem;
        }

        .dataTables_info {
            padding-left: 1rem;
            padding-right: 1rem;
        }

        .dataTables_paginate {
            padding-left: 1rem;
            padding-right: 1rem;
        }
    </style>
    {{-- rating --}}
    <style>
        .rating {
            border: none;
            float: left;
        }

        .rating>label {
            color: #90A0A3;
            float: right;
        }

        .rating>label:before {
            margin: 5px;
            font-size: 2em;
            font-family: FontAwesome;
            content: "\f005";
            display: inline-block;
        }

        .rating>input {
            display: none;
        }

        .rating>input:checked~label,
        .rating:not(:checked)>label:hover,
        .rating:not(:checked)>label:hover~label {
            color: #F79426;
        }

        .rating>input:checked+label:hover,
        .rating>input:checked~label:hover,
        .rating>label:hover~input:checked~label,
        .rating>input:checked~label:hover~label {
            color: #FECE31;
        }
    </style>
@endpush
@push('scripts')
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                tags: true,
                width: '100%',
            });

        });

        $(document).ready(function() {
            const checkbox = $('#AutoGenerate');
            const inputGroup = $('#input-group-autogenerate');
            const tagAssetInput = $('#tag_asset');

            // Function to handle the visibility of the input group
            function toggleVisibility() {
                if (checkbox.is(':checked')) {
                    inputGroup.hide();
                    tagAssetInput.prop('disabled', true);
                } else {
                    inputGroup.show();
                    tagAssetInput.prop('disabled', false);
                }
            }

            // Initial check
            toggleVisibility();

            // Event listener for checkbox change
            checkbox.on('change', toggleVisibility);

            // Handle form submit
            $('form').on('submit', function(e) {
                if (tagAssetInput.prop('disabled')) {
                    tagAssetInput.prop('disabled', false); // Enable the input if it was disabled
                }

                // Validate that tag_asset has a value if not auto-generated
                if (!checkbox.is(':checked') && tagAssetInput.val().trim() === '') {
                    e.preventDefault();
                    alert('Tag Asset harus diisi jika Auto Generate tidak diaktifkan.');
                    tagAssetInput.focus();
                }
            });
        });
    </script>
@endpush
