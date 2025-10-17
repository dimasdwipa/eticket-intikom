@extends('layouts.app', ['page' => 'Asset Loan Detailed Report', 'pageSlug' => 'Asset Loan Detailed Report', 'section' => 'Asset Loan Detailed Report'])

@section('content')
    <div class="container-fluid py-4">
        <div class="row">

            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-2 pb-1">
                            <h6 class="text-white text-capitalize ps-3">Asset Loan Detailed Report</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <form method="GET" action="{{ route('asset_report') }}" class="form-inline">
                                <div class="row px-3 py-2">
                                    <div class="col-md-6">
                                        <div class="input-group input-group-static mb-4">
                                            <label>Request Code</label>
                                            <input type="text"
                                                class="form-control @error('request_code') is-invalid @enderror"
                                                id="request_code" name="request_code" value="{{ request('request_code') }}">
                                            @error('request_code')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group input-group-static mb-4">
                                            <label>Transaction Type</label>
                                            <select
                                                class="form-control select @error('transaction_type') is-invalid @enderror"
                                                name="transaction_type">
                                                <option value="">Select Type</option>
                                                <option value="Rejected"
                                                    {{ request('transaction_type') == 'Rejected' ? 'selected' : '' }}>
                                                    Rejected</option>
                                                <option value="Request Asset"
                                                    {{ request('transaction_type') == 'Request Asset' ? 'selected' : '' }}>
                                                    Request Asset</option>
                                                <option value="Has been given"
                                                    {{ request('transaction_type') == 'Has been given' ? 'selected' : '' }}>
                                                    Has been given</option>
                                                <option value="Request Return Asset"
                                                    {{ request('transaction_type') == 'Request Return Asset' ? 'selected' : '' }}>
                                                    Request Return Asset</option>
                                                <option value="Received From User"
                                                    {{ request('transaction_type') == 'Received From User' ? 'selected' : '' }}>
                                                    Received From User</option>
                                                <option value="all"
                                                    {{ request('transaction_type') == 'all' ? 'selected' : '' }}>All
                                                </option>
                                            </select>
                                            @error('transaction_type')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
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
                                    <div class="col-md-6">
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
                                    <div class="col-md-12 text-right">
                                        <button type="submit" class="btn btn-primary">Filter</button>
                                    </div>
                                </div>
                            </form>
                            <br>
                            <table
                                class="tableku align-items-center justify-content-center my-0 tablesorter table-hover striped">
                                <thead>
                                    <tr>
                                        <th>#Request Code</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder ps-3"
                                            style="min-width: 100px;">Transaction Type</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder ps-3"
                                            style="min-width: 100px;">Transaction Date</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder ps-3"
                                            style="min-width: 100px;">Estimated Return Date</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder ps-3"
                                            style="min-width: 100px;">Resolution Date</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder ps-3"
                                            style="min-width: 100px;">Request Return Date</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder ps-3"
                                            style="min-width: 100px;">Return Date</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder ps-3">Tag Asset
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder ps-3">Item Name
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder ps-3">Asset Condition</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder ps-3">Asset
                                            Description</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder ps-3">Brand</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder ps-3">Model Type
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder ps-3">Status
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder ps-3">Image</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder ps-3">Location
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder ps-3">Supervisor
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder ps-3">Agent</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder ps-3">Request
                                            Type</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder ps-3">Estimated
                                            Return Date</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder ps-3">Penagungjawab Asset</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder ps-3">Priority
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder ps-3">
                                            Description</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder ps-3">Note Agent
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder ps-3">Files</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($asset_request as $item)
                                        <tr>
                                            <td class="font-weight-bold">{{ $item->code }}</td>
                                            <td>{{ $item->transaction_type }}</td>
                                            <td>{{ $item->transaction_date }}</td>
                                            <td>{{ $item->est_return_date }}</td>
                                            <td>{{ $item->resolution_date }}</td>
                                            <td>{{ $item->request_return_date }}</td>
                                            <td>{{ $item->return_date }}</td>
                                            <td>{{ $item->asset->tag_asset }}</td>
                                            <td>{{ $item->asset->nama_item }}</td>
                                            <td>{{ $item->asset->condition_asset }}</td>
                                            <td>{{ $item->asset->deskripsi }}</td>
                                            <td>{{ $item->asset->merek }}</td>
                                            <td>{{ $item->asset->model_type }}</td>
                                            <td>{{ $item->asset->status }}</td>
                                            <td>
                                                @if (!empty($item->asset->image))
                                                    <a class="btn btn-sm btn-outline-info m-0 p-1" style="width: 5rem"
                                                        href="{{ url('storage/' . $item->asset->image) }}" target="_blank">
                                                        <img class="img-thumbnail"
                                                            src="{{ url('storage/' . $item->asset->image) }}"
                                                            alt="">
                                                    </a>
                                                @endif
                                            </td>
                                            <td>{{ $item->lokasi->lokasi }}</td>
                                            <td>{{ $item->supervisor->name }}</td>
                                            <td>{{ $item->agent->name }}</td>
                                            <td>{{ $item->type_request }}</td>
                                            <td>{{ $item->est_return_date }}</td>
                                            <td>{{ $item->asset_custodian }}</td>
                                            <td>{{ $item->priority }}</td>
                                            <td>{{ $item->description }}</td>
                                            <td>{{ $item->note_agent }}</td>
                                            <td>
                                                @if (!empty($item->files))
                                                    <div class="btn-group btn-group-sm" role="group">
                                                        <a class="btn btn-sm btn-outline-info m-0 p-1" style="width: 5rem"
                                                            href="{{ url('storage/files/assets/' . $item->files) }}"
                                                            target="_blank">
                                                            Show
                                                        </a>
                                                        <a class="btn btn-sm btn-outline-success m-0 p-1"
                                                            style="width: 5rem"
                                                            href="{{ url('storage/files/assets/' . $item->files) }}"
                                                            target="_blank" download>
                                                            Download
                                                        </a>
                                                    </div>
                                                @endif
                                            </td>
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
                        orientation: 'landscape',
                        className: 'btn btn-sm btn-success shadow rounded'
                    }, {
                        extend: 'print',
                        exportOptions: {
                            columns: ':not(:contains("Action"))'
                        },
                        footer: true,
                        orientation: 'landscape',
                        className: 'btn btn-sm btn-success shadow rounded',

                        customize: function(win) {
                            $(win.document.body).find('div.dataTables_wrapper').addClass('display')
                                .html('text-align', 'center');

                            //  $(win.document.body).find('div.dt-buttons').append('<button type="button" class="btn btn-sm btn-outline-primary"><i class="fas fa-filter"></i></button>');
                            $(win.document.body).find('th').addClass('display').css('text-align',
                                'center');
                            $(win.document.body).find('th').addClass('display').css('color',
                                '#000000');


                            $(win.document.body).find('table').addClass('display').css('font-size',
                                '16px');
                            $(win.document.body).find('table').addClass('display').css('text-align',
                                'center');
                            $(win.document.body).find('tr:nth-child(odd) td').each(function(index) {
                                // $(this).css('background-color', '#D0D0D0');
                                $(this).css('color', '#000000');
                            });
                            $(win.document.body).find('h1').css('text-align', 'center');
                            $(win.document.body).find('td').addClass('display').css('color',
                                '#000000 !important');
                        }
                    }
                ],
                language: {
                    'search': '' /*Empty to remove the label*/
                },
                "paging": true,
                "bAutoWidth": false
            });
        });

        $(document).ready(function() {
            $('.select').select2({
                tags: true,
                placeholder: "Select Asset",
                width: '100%',
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

            // Helper function to format dates as 'Y-m-d H:i:00'
            var formatDate = function(date) {
                var year = date.getFullYear();
                var month = ('0' + (date.getMonth() + 1)).slice(-2);
                var day = ('0' + date.getDate()).slice(-2);
                var hours = ('0' + date.getHours()).slice(-2);
                var minutes = ('0' + date.getMinutes()).slice(-2);
                return `${year}-${month}-${day} ${hours}:${minutes}:00`;
            };

            // Get today's date and last month's date
            var today = new Date();
            var lastMonth = new Date(today.getFullYear(), today.getMonth() - 1, today.getDate());

            var formattedToday = formatDate(today);
            var formattedLastMonth = formatDate(lastMonth);

            // Check if values are present in the input fields; if not, set default values
            var startDateValue = $('#transaction_start_date').val();
            var endDateValue = $('#transaction_end_date').val();

            if (!startDateValue) {
                $('#transaction_start_date').val(formattedLastMonth);
            }

            if (!endDateValue) {
                $('#transaction_end_date').val(formattedToday);
            }


        });
    </script>
@endpush
