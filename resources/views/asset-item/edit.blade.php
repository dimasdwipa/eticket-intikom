@extends('layouts.app', ['page' => 'Master Item Loan', 'pageSlug' => 'Master Item Loan', 'section' => 'Master Item Loan'])

@section('content')
    <div class="container-fluid py-4">
        <div class="row">

            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-2 pb-1">
                            <h6 class="text-white text-capitalize ps-3">Edit Master Item Loan</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <form action="{{ route('asset-item.update', $asset->id) }}" class="p-4" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6" id="input-group-autogenerate">

                                    <div class="input-group input-group-static mb-4">
                                        <label>Tag Asset</label>
                                        <input type="text" class="form-control @error('tag_asset') is-invalid @enderror" id="tag_asset" name="tag_asset" value="{{ old('tag_asset', $asset->tag_asset) }}" readonly>
                                        @error('tag_asset')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="input-group input-group-static mb-4">
                                        <label>Nama Item</label>
                                        <input type="text" class="form-control @error('nama_item') is-invalid @enderror" id="nama_item" name="nama_item" value="{{ old('nama_item', $asset->nama_item) }}" required>
                                        @error('nama_item')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group input-group-static mb-4">
                                        <label>Asset Condition</label>
                                        <input class="form-control @error('condition_asset') is-invalid @enderror" id="condition_asset" name="condition_asset" value="{{ old('condition_asset', $asset->condition_asset) }}">
                                        @error('condition_asset')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group input-group-static mb-4">
                                        <label>Deskripsi</label>
                                        <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi">{{ old('deskripsi', $asset->deskripsi) }}</textarea>
                                        @error('deskripsi')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group input-group-static mb-4">
                                        <label>Merek</label>
                                        <input type="text" class="form-control @error('merek') is-invalid @enderror" id="merek" name="merek" value="{{ old('merek', $asset->merek) }}">
                                        @error('merek')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group input-group-static mb-4">
                                        <label>Model Type</label>
                                        <input type="text" class="form-control @error('model_type') is-invalid @enderror" id="model_type" name="model_type" value="{{ old('model_type', $asset->model_type) }}">
                                        @error('model_type')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group input-group-static mb-4">
                                        <label>Agent</label>
                                        <select class="form-control @error('agent_id') is-invalid @enderror select2" name="agent_id" required>
                                            <option></option>
                                            @foreach ($agents as $agent)
                                                <option class="agent" value="{{ $agent->id }}" {{ old('agent_id', $asset->agent_id) == $agent->id ? 'selected' : '' }}>
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
                                    <div class="input-group input-group-static mb-4">
                                        <label>Supervisor</label>
                                        <select class="form-control @error('supervisor_id') is-invalid @enderror select2" name="supervisor_id" required>
                                            <option></option>
                                            @foreach ($supervisors as $supervisor)
                                                <option class="supervisor" value="{{ $supervisor->id }}" {{ old('supervisor_id', $asset->supervisor_id) == $supervisor->id ? 'selected' : '' }}>
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
                                    <label >Image</label>
                                    <div class="input-group input-group-static mb-4">
                                        <input type="file" class="form-control form-control-sm @error('image') is-invalid @enderror" id="image" name="image">
                                        @error('image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        @if($asset->image)
                                            <div class="mt-2">
                                                <img src="{{ asset('storage/' . $asset->image) }}" alt="{{ $asset->nama_item }}" class="img-thumbnail" width="200">
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-sm btn-success">Update</button>
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
    </script>
@endpush
