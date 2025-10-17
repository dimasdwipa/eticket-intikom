@extends('layouts.app', ['page' => 'Asset Loan Approval SPV', 'pageSlug' => 'Asset Loan Approval SPV', 'section' => 'Asset Loan Approval SPV'])

@section('content')
    <div class="container-fluid py-4">
        <div class="row">

            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-2 pb-1">
                            <h6 class="text-white text-capitalize ps-3">User  landing request</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table
                                class="tableku align-items-center justify-content-center my-0 tablesorter table-hover striped">
                                <thead>

                                    <tr>
                                        <th style="min-width: 300px" class="text-center">Action</th>
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
                                            style="min-width: 100px;">Request Retrun Date</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder ps-3"
                                            style="min-width: 100px;">Retrun Date</th>


                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder ps-3">Tag Asset
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder ps-3">Item Name
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder ps-3">Asset
                                            Description</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder ps-3">Asset Condition</th>
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
                                        {{-- <th class="text-uppercase text-secondary text-xs font-weight-bolder ps-3">User</th> --}}

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
                                        </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($asset_request as $item)
                                        <tr>
                                            <td class="text-center">
                                                @if ($item->transaction_type == 'Request Asset')
                                                    <form action="{{ route('asset-supervisor.update', $item->id) }}"
                                                        class="border border-2 rounded-2 p-1" method="post">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="row">
                                                            <div class="col-8 ">
                                                                <select class="form-control agentku" name="agent" required>
                                                                    <option></option>
                                                                    @foreach ($agents as $agent)
                                                                        <option class="agent" value="{{ $agent->id }}" @if ($agent->id == $item->agent_id) selected @endif>
                                                                            {{ $agent->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col">
                                                                <button type="submit"
                                                                    class="btn btn-sm btn-success m-0 p-1 "
                                                                    style="width: 100%">Save</button>
                                                            </div>
                                                        </div>

                                                    </form>
                                                @endif
                                            </td>
                                            <td class="font-weight-bold">{{ $item->code }}</td>
                                            <td>{{ $item->transaction_type }}</td>
                                            <td>{{ $item->transaction_date }}</td>
                                            <td>{{ $item->est_return_date }}</td>
                                            <td>{{ $item->resolution_date }}</td>
                                            <td>{{ $item->request_return_date }}</td>
                                            <td>{{ $item->return_date }}</td>


                                            {{-- <td>{{ $item->user->name }}</td> --}}
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
                                                        href="{{ url('storage/' . $item->asset->image) }}"
                                                        target="_blank">
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
                                                            Donwload
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
    <form action="{{ route('supervisor.summary-report-sumpervisor-update') }}" style="display: none" method="post"
        id="FormAction">
        @csrf
        <input type="text" name="id" id="id">
        <input type="text" name="lokasi_id" id="lokasi_id">
        <input type="text" name="sub_katagori_id" id="sub_katagori_id">
        <input type="text" name="agent_id" id="agent_id">
        <input type="text" name="sla_respone" id="sla_respone">
        <input type="text" name="sla_repair" id="sla_repair">
        <input type="text" name="sla_repair_end" id="sla_repair_end">
        <input type="text" name="sla_pending" id="sla_pending">
        <input type="text" name="sla_pending_end" id="sla_pending_end">
        <input type="text" name="sla_resolved" id="sla_resolved">
        <input type="text" name="sla_close" id="sla_close">
        <input type="text" name="status" id="status">
    </form>
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
@push('modal')
    <!-- filter -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header py-2 bg-gray-200">
                    <h6 class="modal-title" id="exampleModalLabel">Data Filter</h6>
                    <button type="button" class="btn btn-outline m-0 p-1" data-bs-dismiss="modal" aria-label="Close">
                        <span class="text-primary h7">
                            <i class="fas fa-external-link-alt"></i>
                        </span>
                    </button>
                </div>
                <form class="pt-3" method="get" action="{{ url()->full() }}">
                    <div class="modal-body">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-check form-check-info text-start ps-0">
                                    <input class="form-check-input" type="checkbox" value="1" name="alltype"
                                        id="flexCheckDefault" @if (isset($_GET['alltype']) ? ($_GET['alltype'] == 1 ? true : false) : false) checked @endif>
                                    <label class="form-check-label" for="flexCheckDefault"><span
                                            class="text-dark font-weight-bolder">All status request !</span> By default
                                        just await</a>
                                    </label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group input-group-static my-3">
                                    <input type="text" class="form-control form-control-sm" name="start_date"
                                        id="start_date" placeholder="Start Date"
                                        @if (isset($_GET['start_date']) ?? false) value="{{ $_GET['start_date'] }}" @endif
                                        autocomplete="off">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group input-group-static my-3">
                                    <input type="text" class="form-control form-control-sm" name="end_date"
                                        id="end_date" placeholder="End Date"
                                        @if (isset($_GET['end_date']) ?? false) value="{{ $_GET['end_date'] }}" @endif
                                        autocomplete="off">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group input-group-static my-3">
                                    <select class="form-control form-control-sm select2" name="filter_by">
                                        <option disabled selected>Filter By</option>
                                        <option value="tickets.code" @if (isset($_GET['filter_by']) ? ($_GET['filter_by'] == 'tickets.code' ? true : false) : false) selected @endif>
                                            Request Code
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group input-group-static my-3">
                                    <input type="text" class="form-control form-control-sm"
                                        @if (isset($_GET['keyword']) ?? false) value="{{ $_GET['keyword'] }}" @endif
                                        name="keyword" id="keyword" placeholder="Keyword">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer py-2 bg-gray-200">
                        <button type="submit" class="btn btn-outline-success btn-sm m-0">
                            FIND
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Close -->
    <div class="modal fade" id="close" tabindex="-1" role="dialog" aria-labelledby="close" aria-hidden="true">
        <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
            <div class="modal-content">
                <div class="modal-header py-2 bg-success">
                    <h6 class="modal-title text-upercase font-weight-normal text-white" id="modal-title-notification">
                        <div class="h5 text-white p-0 m-0">Rating !!</div>
                        <div class="form-label text-white p-0 m-0">Will you close this ticket ?</div>
                    </h6>
                    <button type="button" class="btn btn-outline m-0 p-1" data-bs-dismiss="modal" aria-label="Close">
                        <span class="text-white h7">
                            <i class="fas fa-external-link-alt"></i>
                        </span>
                    </button>
                </div>
                <form method="POST" action="{{ route('ticket-close') }}">
                    @csrf
                    <input type="hidden" name="id" id="code_ticket">
                    <div class="modal-body">
                        <div class="py-0 text-center align-items-center justify-content-center">
                            <div><small>Please, don't forget to give a star rating</small></div>
                            <div class="rating mx-0">
                                <input type="radio" id="star5" name="rating" value="5" required />
                                <label class="star" for="star5" title="Awesome" aria-hidden="true"></label>
                                <input type="radio" id="star4" name="rating" value="4" />
                                <label class="star" for="star4" title="Great" aria-hidden="true"></label>
                                <input type="radio" id="star3" name="rating" value="3" />
                                <label class="star" for="star3" title="Very good" aria-hidden="true"></label>
                                <input type="radio" id="star2" name="rating" value="2" />
                                <label class="star" for="star2" title="Good" aria-hidden="true"></label>
                                <input type="radio" id="star1" name="rating" value="1" />
                                <label class="star" for="star1" title="Bad" aria-hidden="true"></label>
                            </div>
                            <div class="input-group input-group-static mb-4">
                                <textarea class="form-control form-control-sm bg-white" style="border-radius:0.25rem !important" rows="2"
                                    name="comment" id="" placeholder="Comment Requestor !!"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer py-2 bg-gray-200">
                        <button type="submit" class="btn btn-outline-success btn-sm m-0">
                            Ok, Got it
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Detail -->
    <div class="modal fade" id="Detail" tabindex="-1" role="dialog" aria-labelledby="Detail" aria-hidden="true">
        <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
            <div class="modal-content">
                <div class="modal-header py-2 bg-info">
                    <h6 class="modal-title text-upercase font-weight-normal text-white" id="modal-title-notification">
                        <div class="h5 text-white p-0 m-0">Problem Detail</div>
                    </h6>
                    <button type="button" class="btn btn-outline m-0 p-1" data-bs-dismiss="modal" aria-label="Close">
                        <span class="text-white h7">
                            <i class="fas fa-external-link-alt"></i>
                        </span>
                    </button>
                </div>
                <input type="hidden" name="id" id="code_ticket">
                <div class="modal-body">
                    <div class="prablem p4" id="problem_ticket">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endpush

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.agentku').select2({
                tags: true,
                placeholder: "Switch Agent",
                width: '100%',
            });
            $('.tableku').DataTable({
                dom: 'Blfrtip',
                "order": [],
                "showNEntries": true,
                buttons: [
                    //     {
                    //     text: 'filter',
                    //     footer: true,
                    //     className: 'btn btn-sm btn-white btn-outline-primary shadow rounded filter'
                    // },
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
                "bAutoWidth": false,

                initComplete: function() {
                    $(this).on('draw.dt', function() {
                        $(document).ready(function() {
                            $('.agentku').select2({
                                tags: true,
                                placeholder: "Switch Asset",
                                width: '100%',
                            });

                        });
                    });
                },
            });
        });

        // $(document).ready(function() {
        //     $('.select2').select2({
        //         tags: true,
        //         placeholder: "Select Agent",
        //         width: '100%',
        //     });
        //     $(".datepicker").datetimepicker({
        //         format: 'Y-m-d H:i:00',
        //         timepicker: true,
        //         step: 15,
        //         beforeShow: function() {
        //             setTimeout(function() {
        //                 $('.ui-datepicker').css('z-index', 99999999999999);
        //             }, 0);
        //         }
        //     });

        // });



        // $(document).ready(function() {
        //     $('.filter').attr('data-bs-toggle', 'modal');
        //     $('.filter').attr('data-bs-target', '#exampleModal');


        //     $('#close').on('show.bs.modal', function(event) {
        //         var button = $(event.relatedTarget) // Button that triggered the modal
        //         var recipient = button.data('whatever') // Extract info from data-* attributes
        //         // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        //         // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        //         var modal = $(this)
        //         // modal.find('.modal-title').text(recipient)
        //         modal.find('#code_ticket').val(recipient)
        //     });

        //     $('#Detail').on('show.bs.modal', function(event) {
        //         var button = $(event.relatedTarget)
        //         var problem = button.data('problem') // E// Extract info from data-* attributes
        //         // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        //         // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        //         var modal = $(this)
        //         // modal.find('.modal-title').text(recipient)
        //         modal.find('#problem_ticket').text(problem) // Extract info from data-* attributes
        //     });

        // });



        // $(document).ready(function() {
        //     $('table.tableku').on('click', 'Button.UpdateButton', function(e) {

        //         var row = $(this).closest('tr'),
        //             dataID = $('.dataID', row),
        //             lokasi_id = $('.lokasi_id', row),
        //             sub_katagori_id = $('.sub_katagori_id', row),
        //             sla_respone = $('.sla_respone', row),
        //             sla_repair = $('.sla_repair', row),
        //             sla_repair_end = $('.sla_repair_end', row),
        //             sla_pending = $('.sla_pending', row),
        //             sla_pending_end = $('.sla_pending_end', row),
        //             sla_resolved = $('.sla_resolved', row),
        //             sla_close = $('.sla_close', row),
        //             statusku = $('.status_id', row),
        //             agent_id = $('.agent_id', row);



        //         $('#id').val(dataID.val());
        //         $('#agent_id').val(agent_id.val());
        //         $('#lokasi_id').val(lokasi_id.val());
        //         $('#sub_katagori_id').val(sub_katagori_id.val());
        //         $('#sla_respone').val(sla_respone.val());
        //         $('#sla_repair').val(sla_repair.val());
        //         $('#sla_repair_end').val(sla_repair_end.val());
        //         $('#sla_pending').val(sla_pending.val());
        //         $('#sla_pending_end').val(sla_pending_end.val());
        //         $('#sla_resolved').val(sla_resolved.val());
        //         $('#sla_close').val(sla_close.val());
        //         $('#status').val(statusku.val());
        //         $('#agent_id').val(agent_id.val());
        //         $('#FormAction').submit();
        //     });
        // });

        // $(function() {
        //     $("#start_date").datepicker({
        //         dateFormat: 'yy-mm-dd',
        //         beforeShow: function() {
        //             setTimeout(function() {
        //                 $('.ui-datepicker').css('z-index', 99999999999999);
        //             }, 0);
        //         }
        //     });
        //     $("#end_date").datepicker({
        //         dateFormat: 'yy-mm-dd',
        //         beforeShow: function() {
        //             setTimeout(function() {
        //                 $('.ui-datepicker').css('z-index', 99999999999999);
        //             }, 0);
        //         }
        //     }).bind("change", function() {
        //         var minValue = $(this).val();
        //         minValue = $.datepicker.parseDate("yy-mm-dd", minValue);
        //         minValue.setDate(minValue.getDate() + 1);
        //         $("#to").datepicker("option", "minDate", minValue);
        //     })
        // });
    </script>
@endpush
