@extends('layouts.app', ['page' => 'Detail of Loan Item Movement', 'pageSlug' => 'Detail of Loan Item Movement', 'section' => 'Detail of Loan Item Movement'])

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-2 pb-1">
                            <h6 class="text-white text-capitalize ps-3">Detail of Loan Item Movement</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <form method="GET" action="{{ route('report_movement_asset') }}" class="form-inline">
                                <div class="row px-3 py-2">
                                    <div class="col-md-8">
                                        <div class="input-group input-group-static mb-4">
                                            <label>Tag Asset / Item Name</label>
                                            <select
                                                class="form-control select @error('tag_item') is-invalid @enderror"
                                                name="tag_item">
                                                <option value="">Select Asset</option>
                                                @foreach($assets as $asset)
                                                    <option value="{{ $asset->tag_asset }}|{{ $asset->nama_item }}"
                                                        {{ request('tag_item') == "{$asset->tag_asset}|{$asset->nama_item}" ? 'selected' : '' }}>
                                                        {{ $asset->tag_asset }} - {{ $asset->nama_item }} - {{ $asset->deskripsi }} - {{ $asset->merek }} - {{ $asset->model_type }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('tag_item')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group input-group-static mb-4">
                                            <label>Transaction Type</label>
                                            <select
                                                class="form-control select @error('transaction_type') is-invalid @enderror"
                                                name="transaction_type">
                                                <option value="">Select Type</option>
                                                <option value="Received From User"
                                                    {{ request('transaction_type') == 'Received From User' ? 'selected' : '' }}>
                                                    Received from user</option>
                                                <option value="Has been given"
                                                    {{ request('transaction_type') == 'Has been given' ? 'selected' : '' }}>
                                                    Has been given</option>
                                                <option value="all"
                                                    {{ request('transaction_type') == 'all' ? 'selected' : '' }}>All
                                                </option>
                                            </select>
                                            @error('transaction_type')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group input-group-static mb-4">
                                            <label>Transaction Start Date</label>
                                            <input type="text"
                                                class="form-control datepicker @error('transaction_start_date') is-invalid @enderror"
                                                id="transaction_start_date" name="transaction_start_date"
                                                value="{{ request('transaction_start_date') }}">
                                            @error('transaction_start_date')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group input-group-static mb-4">
                                            <label>Transaction End Date</label>
                                            <input type="text"
                                                class="form-control datepicker @error('transaction_end_date') is-invalid @enderror"
                                                id="transaction_end_date" name="transaction_end_date"
                                                value="{{ request('transaction_end_date') }}">
                                            @error('transaction_end_date')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group input-group-static mb-4">
                                            <label>Penagung Jawab Asset</label>
                                            <input type="text"
                                                class="form-control @error('asset_custodian') is-invalid @enderror"
                                                id="asset_custodian" name="asset_custodian" value="{{ request('asset_custodian') }}">
                                            @error('asset_custodian')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- Other filters remain unchanged -->
                                    <div class="col-md-12 text-right">
                                        <button type="submit" class="btn btn-primary">Filter</button>
                                    </div>
                                </div>
                            </form>
                            <br>
                            <table class="tableku align-items-center justify-content-center my-0 tablesorter table-hover striped">
                                <thead>
                                    <tr>

                                        <th>Transaction Date</th>
                                        <th>#Tag Asset</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder ps-3">Person Responsible</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder ps-3">Status</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder ps-3">Item Name</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder ps-3">Asset Condition</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder ps-3">Asset Description</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder ps-3">Brand</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder ps-3">Model Type</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder ps-3">Image</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder ps-3" style="min-width: 100px;">Request Code</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder ps-3" style="min-width: 100px;">Transaction Type</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder ps-3">Location</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder ps-3">Supervisor</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder ps-3">Agent</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder ps-3">User</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($assetMovements as $movement)
                                        <tr>
                                            <td class="font-weight-bold">
                                                {{ $movement->transaction_date  ? \Carbon\Carbon::parse($movement->transaction_date )->format('Y-m-d H:i:s') : '' }}
                                            </td>
                                            <td class="font-weight-bold">{{ $movement->asset->tag_asset }}</td>
                                            <td>{{ $movement->asset_custodian }}</td>
                                            <td>{{ $movement->asset->status }}</td>
                                            <td>{{ $movement->asset->nama_item }}</td>
                                            <td>{{ $movement->condition_asset }}</td>
                                            <td>{{ $movement->asset->deskripsi }}</td>
                                            <td>{{ $movement->asset->merek }}</td>
                                            <td>{{ $movement->asset->model_type }}</td>
                                            <td>
                                                @if (!empty($movement->asset->image))
                                                    <a class="btn btn-sm btn-outline-info m-0 p-1" style="width: 5rem"
                                                        href="{{ url('storage/' . $movement->asset->image) }}" target="_blank">
                                                        <img class="img-thumbnail"
                                                            src="{{ url('storage/' . $movement->asset->image) }}"
                                                            alt="">
                                                    </a>
                                                @endif
                                            </td>
                                            <td>{{ $movement->code }}</td>
                                            <td>{{ $movement->transaction_type }}</td>
                                            <td>{{ $movement->lokasi->lokasi }}</td>
                                            <td>{{ $movement->supervisor->name }}</td>
                                            <td>{{ $movement->agent->name }}</td>
                                            <td>{{ $movement->user->name }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('style')
    <style>
        .dt-buttons {
            text-align: right;
            padding-left: 1rem;
            padding-right: 1rem;
            padding-bottom: 0.5rem;
        }

        .dataTables_length,
        .dataTables_filter,
        .dataTables_info,
        .dataTables_paginate {
            padding-left: 1rem;
            padding-right: 1rem;
        }
    </style>
@endpush

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.tableku').DataTable({
                dom: 'Blfrtip',
                "order": [],
                "showNEntries": true,
                buttons: [
                    {
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: ':not(:contains("Action"))'
                        },
                        footer: true,
                        className: 'btn btn-sm btn-success shadow rounded'
                    }, {
                        extend: 'csvHtml5',
                        exportOptions: {
                            columns: ':not(:contains("Action"))'
                        },
                        footer: true,
                        className: 'btn btn-sm btn-success shadow rounded'
                    }, {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: ':not(:contains("Action"))'
                        },
                        footer: true,
                        className: 'btn btn-sm btn-success shadow rounded'
                    }
                ]
            });

            // Initialize select2
            $('.select').select2({
                placeholder: "Select Asset",
                width: '100%',
                matcher: function(params, data) {
                    var query = $.trim(params.term).toLowerCase();
                    if (query === '') {
                        return data;
                    }
                    if (data.text.toLowerCase().indexOf(query) > -1) {
                        return $.extend({}, data, true);
                    }
                    return null;
                }
            });

            $(".datepicker").datetimepicker({
                format: 'Y-m-d H:i:00',
                timepicker: true,
                step: 15,
                beforeShow: function() {
                    setTimeout(function() {
                        $('.ui-datepicker').css('z-index', 99999999999999);
                    }, 0);
                }
            });
        });
    </script>
@endpush
