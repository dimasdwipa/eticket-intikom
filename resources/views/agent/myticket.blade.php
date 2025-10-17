@extends('layouts.app', ['page' => 'My Task', 'pageSlug' => 'My Task', 'section' => 'My Task'])

@section('content')
    <div class="container-fluid py-4">
        <div class="row">

            <div id="table_data" class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-2 pb-1">
                            <h6 class="text-white text-capitalize ps-3">My Tasking</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table
                                class="tableku align-items-center justify-content-center my-0 tablesorter table-hover striped">
                                <thead>

                                    <tr>
                                        <th
                                        class="text-center text-uppercase text-secondary text-xs font-weight-bolder  ps-3">
                                        Action
                                    </th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder  ps-3"
                                    style="min-width: 10rem">
                                    Status
                                </th>
                                        <th>
                                            #Ticket
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder ps-3"
                                            style="min-width: 6rem">
                                            Created</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder  ps-3"
                                            style="min-width: 8rem">
                                            Requestor
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder  ps-3"
                                            style="min-width: 10rem">
                                            Lokasi
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder  ps-3"
                                            style="min-width: 6rem">
                                            BU
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder  ps-3"
                                            style="min-width: 6rem">
                                            Category
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder  ps-3"
                                            style="min-width: 10rem">
                                            Sub Category
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder  ps-3"
                                            style="min-width: 6rem">
                                            Problem
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder"
                                            style="min-width: 4rem;text-align: center">
                                            SLA Ticket (m)
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder  ps-3"
                                            style="min-width: 10rem">
                                            Assignment
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder  ps-3"
                                            style="min-width: 10rem">
                                            Respon
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder  ps-3"
                                            style="min-width: 10rem">
                                            Start Repairing
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder  ps-3"
                                            style="min-width: 10rem">
                                            End Repairing
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder  ps-3"
                                            style="min-width: 10rem">
                                            Start Pending
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder  ps-3"
                                            style="min-width: 10rem">
                                            End Pending
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder  ps-3"
                                            style="min-width: 10rem">
                                            Resolved
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder  ps-3"
                                            style="min-width: 10rem">
                                            Closed
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder  ps-3"
                                            style="min-width: 10rem">
                                            Rating
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder  ps-3"
                                            style="min-width: 10rem">
                                            Files
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder  ps-3"
                                            style="min-width: 10rem">
                                            Priority
                                        </th>


                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tickets as $item)
                                        <tr>
                                            <td class="text-center">
                                                <input type="hidden" name="id" class="dataID"
                                                    value="{{ $item->id }}">
                                                @if ($item->status == 'Awaiting Response')
                                                    <div class="btn-group btn-group-sm" role="group">
                                                        <button type="button"
                                                            class="btn btn-sm btn-success m-0 p-1 Response"
                                                            data-id="{{ $item->id }}" data-code="{{ $item->code }}"
                                                            data-title="Reponse" data-status="On Progress"
                                                            data-comment="I will do this task now"
                                                            style="width: 6rem">Reponse</button>
                                                        {{-- <button type="button"
                                                            class="btn btn-sm btn-primary m-0 p-1 ExtendSLA"
                                                            data-id="{{ $item->id }}" data-code="{{ $item->code }}"
                                                            data-title="Unable To Respond" data-status="Unable Respond"
                                                            data-comment="" style="width: 6rem">Unable Respond</button> --}}
                                                    </div>
                                                @elseif ($item->status == 'On Progress')
                                                    <div class="btn-group btn-group-sm" role="group">
                                                        <button type="button" class="btn btn-sm btn-warning m-0 p-1 Other"
                                                            data-id="{{ $item->id }}" data-code="{{ $item->code }}"
                                                            data-title="Request Repair" data-status="Request Repair"
                                                            style="width: 5rem">Request Repair</button>
                                                        <button type="button" class="btn btn-sm btn-danger m-0 p-1 Other"
                                                            data-id="{{ $item->id }}"
                                                            data-code="{{ $item->code }}" data-title="Request Pending"
                                                            data-status="Request Pending" style="width: 5rem">Request
                                                            Pending</button>
                                                        {{-- <button type="button"
                                                            class="btn btn-sm btn-primary m-0 p-1 ExtendSLA"
                                                            data-id="{{ $item->id }}"
                                                            data-code="{{ $item->code }}" data-title="Extend SLA"
                                                            data-status="Extend SLA" style="width: 5rem">Extend
                                                            SLA</button> --}}
                                                        <button type="button"
                                                            class="btn btn-sm btn-success m-0 p-1 Response"
                                                            data-id="{{ $item->id }}"
                                                            data-code="{{ $item->code }}" data-title="Resolved Ticket"
                                                            data-status="Resolved" style="width: 5rem">Resolved</button>
                                                        {{-- <button type="button" class="btn btn-sm btn-info m-0 p-1 Closed"
                                                            data-id="{{ $item->id }}"
                                                            data-code="{{ $item->code }}" data-title="Request Closed"
                                                            data-status="Request Close" style="width: 5rem">Request
                                                            Closed</button> --}}
                                                    </div>
                                                @elseif ($item->status == 'Repairing')
                                                    <button type="button" class="btn btn-sm btn-success m-0 p-1 Response"
                                                        data-id="{{ $item->id }}" data-code="{{ $item->code }}"
                                                        data-title="End Repair" data-status="End Repair"
                                                        data-comment="I will continue this ticket now"
                                                        style="width: 7rem">End Repair</button>
                                                @elseif ($item->status == 'Pending')
                                                    <button type="button" class="btn btn-sm btn-success m-0 p-1 Response"
                                                        data-id="{{ $item->id }}" data-code="{{ $item->code }}"
                                                        data-title="End Pending" data-status="End Pending"
                                                        data-comment="I will continue this ticket now"
                                                        style="width: 7rem">End Pending</button>
                                                @elseif ($item->status == 'Resolved')
                                                    <button type="button" class="btn btn-sm btn-info m-0 p-1 Closed"
                                                        data-id="{{ $item->id }}" data-code="{{ $item->code }}"
                                                        data-title="Request Closed" data-status="Request Close"
                                                        style="width: 7rem">Request Closed</button>
                                                @endif
                                            </td>
                                            <td>
                                                {{ $item->status }}
                                            </td>
                                            <td class="font-weight-bold">
                                                #{{ $item->code }}
                                            </td>
                                            <td>{{ date_format(date_create($item->created_at), 'd-M-y') }}</td>
                                            <td>{{ $item->user->name ?? '' }}</td>
                                            <td>
                                                {{ $item->lokasiAllTeams->lokasi ?? '-' }}
                                            </td>
                                            <td>{{ $item->bu }}</td>
                                            <td>
                                                {{ $item->katagoriAllTeams->kategori }}
                                            </td>
                                            <td>
                                                {{ $item->sub_katagoriAllTeams->sub_kategori }}
                                            </td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-sm btn-outline-info m-0 p-1"
                                                    style="width: 5rem" data-bs-toggle="modal" data-bs-target="#Detail"
                                                    data-problem="{{ $item->problem }}">Detail</button>
                                            </td>
                                            <td style="text-align: center">
                                                {{ $item->sla_ticket_time }}
                                            </td>
                                            <td>
                                                {{ $item->sla_assignment }}
                                            </td>
                                            <td>
                                                {{ $item->sla_respone }}
                                            </td>
                                            <td>
                                                {{ $item->sla_repair }}
                                            </td>
                                            <td>
                                                {{ $item->sla_repair_end }}
                                            </td>
                                            <td>
                                                {{ $item->sla_pending }}
                                            </td>
                                            <td>
                                                {{ $item->sla_pending_end }}
                                            </td>
                                            <td>
                                                {{ $item->sla_resolved }}
                                            </td>
                                            <td>
                                                {{ $item->sla_close }}
                                            </td>
                                            <td>
                                                @if ($item->rating == '1')
                                                    Disappointed
                                                @elseif($item->rating == '2')
                                                    Unsatisfied
                                                @elseif($item->rating == '3')
                                                    Quite satisfied
                                                @elseif($item->rating == '4')
                                                    Satisfied
                                                @elseif($item->rating == '5')
                                                    Very satisfied
                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-group btn-group-sm" role="group">
                                                    <a class="btn btn-sm btn-outline-info m-0 p-1" style="width: 5rem"
                                                        href="{{ url('storage/files/tickets/' . $item->files) }}"
                                                        target="_blank">
                                                        Show
                                                    </a>
                                                    <a class="btn btn-sm btn-outline-success m-0 p-1" style="width: 5rem"
                                                        href="{{ url('storage/files/tickets/' . $item->files) }}"
                                                        target="_blank" download>
                                                        Donwload
                                                    </a>
                                                </div>
                                            </td>
                                            <td>
                                                {{ $item->prioritas }}
                                            </td>


                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div id="sidebar_data" style="display:none" class="col-3">
                <div class="card shadow-lg">
                    <div class="card-header pb-0 pt-3">
                        <div class="text-right">
                            <button class="btn btn-link text-dark p-0 m-0 fixed-plugin-close-button"
                                id="close_sidebar_data">
                                <i class="material-icons">clear</i>
                            </button>
                        </div>
                        <div class="float-start">
                            <h6 class="mt-1 mb-0">Data Ticket</h6>
                        </div>

                        <!-- End Toggle Button -->
                    </div>
                    <hr class="horizontal dark my-1">
                    <div id="sidebar_data_body" class="card-body pt-sm-3 pt-0">

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
@push('modal')
    <!-- filter -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header py-2 bg-gray-200">
                    <h6 class="modal-title" id="exampleModalLabel">Data Filter</h6>
                    <button type="button" class="btn btn-outline m-0 p-1" data-bs-dismiss="modal" aria-label="Closed">
                        <span class="text-primary h7">
                            <i class="fas fa-external-link-alt"></i>
                        </span>
                    </button>
                </div>
                <form class="pt-3" method="get" action="{{ url()->full() }}">
                    <div class="modal-body">
                        @csrf
                        <div class="row">
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
                                        <option value="status" @if (isset($_GET['filter_by']) ? ($_GET['filter_by'] == 'status' ? true : false) : false) selected @endif>Status
                                        </option>
                                        <option value="code" @if (isset($_GET['filter_by']) ? ($_GET['filter_by'] == 'code' ? true : false) : false) selected @endif>No Ticket
                                        </option>
                                        <option value="name" @if (isset($_GET['filter_by']) ? ($_GET['filter_by'] == 'name' ? true : false) : false) selected @endif>Agent
                                        </option>
                                        <option value="bu" @if (isset($_GET['filter_by']) ? ($_GET['filter_by'] == 'bu' ? true : false) : false) selected @endif>BU
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
    <!-- Detail -->
    <div class="modal fade" id="Detail" tabindex="-1" role="dialog" aria-labelledby="Detail" aria-hidden="true">
        <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
            <div class="modal-content">
                <div class="modal-header py-2 bg-warning">
                    <h6 class="modal-title text-upercase font-weight-normal text-white" id="modal-title-notification">
                        <div class="h5 text-white p-0 m-0">Problem Detail</div>
                    </h6>
                    <button type="button" class="btn btn-outline m-0 p-1" data-bs-dismiss="modal" aria-label="Closed">
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
    <!-- Response -->
    <div class="modal fade" id="Response" tabindex="-1" role="dialog" aria-labelledby="Response"
        aria-hidden="true">
        <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
            <div class="modal-content">
                <div class="modal-header py-2 bg-success">
                    <h6 class="modal-title text-upercase font-weight-normal text-white" id="modal-title-notification">
                        <div class="h5 text-white p-0 m-0" id="title"></div>
                    </h6>
                    <button type="button" class="btn btn-outline m-0 p-1" data-bs-dismiss="modal" aria-label="Closed">
                        <span class="text-white h7">
                            <i class="fas fa-external-link-alt"></i>
                        </span>
                    </button>
                </div>
                <input type="hidden" name="id" id="code_ticket">
                <div class="modal-body">

                    <div class="prablem p4" id="problem_ticket">
                        <form action="{{ route('agent.response') }}" method="post">
                            @csrf
                            <div class="input-group input-group-static mb-4">
                                <label class="text-dark">#Ticket</label>
                                <input type="text" class="form-control form-control-sm" name="code"
                                    id="coderesponse" readonly>
                            </div>
                            <input type="hidden" name="id" id="idresponse">
                            <input type="hidden" name="status" id="status">
                            <div class="input-group input-group-static mb-4">
                                <label class="text-dark">Comment</label>
                                <textarea id="comment" placeholder="write your comment hire .." class="form-control form-control-sm"
                                    style="border-radius:0.25rem !important" rows="3" name="comment" required></textarea>
                            </div>
                            <div class="input-group input-group-static mb-4">
                                <label class="text-dark">Note</label>
                                <textarea class="form-control form-control-sm" placeholder="note" style="border-radius:0.25rem !important"
                                    rows="3" name="note"></textarea>
                            </div>
                            <div style="text-align: right">
                                <button type="submit" class="btn btn-sm btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Other -->
    <div class="modal fade" id="Other" tabindex="-1" role="dialog" aria-labelledby="Other" aria-hidden="true">
        <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
            <div class="modal-content">
                <div class="modal-header py-2 bg-warning">
                    <h6 class="modal-title text-upercase font-weight-normal text-white" id="modal-title-notification">
                        <div class="h5 text-white p-0 m-0" id="title"></div>
                    </h6>
                    <button type="button" class="btn btn-outline m-0 p-1" data-bs-dismiss="modal" aria-label="Closed">
                        <span class="text-white h7">
                            <i class="fas fa-external-link-alt"></i>
                        </span>
                    </button>
                </div>
                <input type="hidden" name="id" id="code_ticket">
                <div class="modal-body">
                    <div class="prablem p4" id="problem_ticket">
                        <form action="{{ route('agent.request') }}" method="post">
                            @csrf
                            <div class="input-group input-group-static mb-4">
                                <label class="text-dark">#Ticket</label>
                                <input type="text" class="form-control form-control-sm" name="code"
                                    id="coderesponse" readonly>
                            </div>
                            <div class=" input-group input-group-static mb-4">
                                <label class="text-dark">Start Date</label>
                                <input type="text" class="form-control form-control-sm" name="start_date"
                                    id="start_date_other" value="{{ date('Y-m-d H:i:s') }}" readonly>
                            </div>

                            <div class="input-group input-group-static mb-4">
                                <label class="text-dark">End Date</label>
                                <input type="text" class="form-control form-control-sm datetimepicker" name="end_date"
                                    id="end_date_other" autocomplete="off">
                            </div>
                            <input type="hidden" name="id" id="idresponse">
                            <input type="hidden" name="status" id="status">
                            <div class="input-group input-group-static mb-4">
                                <label class="text-dark">Comment</label>
                                <textarea id="comment" placeholder="write your comment hire .." class="form-control form-control-sm"
                                    style="border-radius:0.25rem !important" rows="3" name="comment" required></textarea>
                            </div>
                            <div class="input-group input-group-static mb-4">
                                <label class="text-dark">Note</label>
                                <textarea class="form-control form-control-sm" placeholder="note" style="border-radius:0.25rem !important"
                                    rows="3" name="note"></textarea>
                            </div>
                            <div style="text-align: right">
                                <button type="submit" class="btn btn-sm btn-warning">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Closed -->
    <div class="modal fade" id="Closed" tabindex="-1" role="dialog" aria-labelledby="Closed" aria-hidden="true">
        <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
            <div class="modal-content">
                <div class="modal-header py-2 bg-info">
                    <h6 class="modal-title text-upercase font-weight-normal text-white" id="modal-title-notification">
                        <div class="h5 text-white p-0 m-0" id="title"></div>
                    </h6>
                    <button type="button" class="btn btn-outline m-0 p-1" data-bs-dismiss="modal" aria-label="Closed">
                        <span class="text-white h7">
                            <i class="fas fa-external-link-alt"></i>
                        </span>
                    </button>
                </div>
                <input type="hidden" name="id" id="code_ticket">
                <div class="modal-body">

                    <div class="prablem p4" id="problem_ticket">
                        <form action="{{ route('agent.request') }}" method="post">
                            @csrf
                            <div class="input-group input-group-static mb-4">
                                <label class="text-dark">#Ticket</label>
                                <input type="text" class="form-control form-control-sm" name="code"
                                    id="coderesponse" readonly>
                            </div>
                            <div class=" input-group input-group-static mb-4">
                                <label class="text-dark">Closed Date</label>
                                <input type="text" class="form-control form-control-sm" name="close_request"
                                    id="close_request" value="{{ date('Y-m-d H:i:s') }}" readonly>
                            </div>
                            <input type="hidden" name="id" id="idresponse">
                            <input type="hidden" name="status" id="status">

                            <div class="input-group input-group-static mb-4">
                                <label class="text-dark">Comment</label>
                                <textarea id="comment" placeholder="write your comment hire .." class="form-control form-control-sm"
                                    style="border-radius:0.25rem !important" rows="3" name="comment" required></textarea>
                            </div>
                            <div class="input-group input-group-static mb-4">
                                <label class="text-dark">Note</label>
                                <textarea class="form-control form-control-sm" placeholder="note" style="border-radius:0.25rem !important"
                                    rows="3" name="note"></textarea>
                            </div>
                            <div style="text-align: right">
                                <button type="submit" class="btn btn-sm btn-info">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- extendSLA -->
    <div class="modal fade" id="ExtendSLA" tabindex="-1" role="dialog" aria-labelledby="ExtendSLA"
        aria-hidden="true">
        <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
            <div class="modal-content">
                <div class="modal-header py-2 bg-primary">
                    <h6 class="modal-title text-upercase font-weight-normal text-white" id="modal-title-notification">
                        <div class="h5 text-white p-0 m-0" id="title"></div>
                    </h6>
                    <button type="button" class="btn btn-outline m-0 p-1" data-bs-dismiss="modal" aria-label="Closed">
                        <span class="text-white h7">
                            <i class="fas fa-external-link-alt"></i>
                        </span>
                    </button>
                </div>
                <input type="hidden" name="id" id="code_ticket">
                <div class="modal-body">

                    <div class="prablem p4" id="problem_ticket">
                        <form action="{{ route('agent.request') }}" method="post">
                            @csrf
                            <div class="input-group input-group-static mb-4">
                                <label class="text-dark">#Ticket</label>
                                <input type="text" class="form-control form-control-sm" name="code"
                                    id="coderesponse" readonly>
                            </div>
                            <div class=" input-group input-group-static mb-4">
                                <label class="text-dark">Extend SLA (minute)</label>
                                <input type="text" class="form-control form-control-sm" name="extend_SLA"
                                    id="extend_SLA" value="60">
                            </div>
                            <input type="hidden" name="id" id="idresponse">
                            <input type="hidden" name="status" id="status">

                            <div class="input-group input-group-static mb-4">
                                <label class="text-dark">Comment</label>
                                <textarea id="comment" placeholder="write your comment hire .." class="form-control form-control-sm"
                                    style="border-radius:0.25rem !important" rows="3" name="comment" required></textarea>
                            </div>
                            <div class="input-group input-group-static mb-4">
                                <label class="text-dark">Note</label>
                                <textarea class="form-control form-control-sm" placeholder="note" style="border-radius:0.25rem !important"
                                    rows="3" name="note"></textarea>
                            </div>
                            <div style="text-align: right">
                                <button type="submit" class="btn btn-sm btn-info">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endpush

@push('scripts')
    <script>
        $(document).ready(function() {
            $(".datetimepicker").datetimepicker({
                format: 'Y-m-d H:i:00',
                timepicker: true,
                step: 15,
                beforeShow: function() {
                    setTimeout(function() {
                        $('.ui-datepicker').css('z-index', 99999999999999);
                    }, 0);
                }
            });
            $('.tableku').DataTable({
                dom: 'Blfrtip',
                "order": [],
                "showNEntries": true,
                buttons: [{
                    text: 'filter',
                    footer: true,
                    className: 'btn btn-sm btn-white btn-outline-primary shadow rounded filter'
                }, {
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
                }],
                language: {
                    'search': '' /*Empty to remove the label*/
                },
                "paging": true,
                "bAutoWidth": false,

                initComplete: function() {
                    $(this).on('draw.dt', function() {
                        $(document).ready(function() {
                            $('.select2').select2({
                                tags: true,
                                placeholder: "Select Agent",
                                width: '100%',
                            });
                            $(".datepicker").datetimepicker({
                                format: 'Y-m-d H:i:00',
                                timepicker: true,
                                step: 15,
                                beforeShow: function() {
                                    setTimeout(function() {
                                        $('.ui-datepicker').css(
                                            'z-index',
                                            99999999999999);
                                    }, 0);
                                }
                            });

                        });
                    });
                },
            });

        });

        $(document).ready(function() {
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



        $(document).ready(function() {
            $('.filter').attr('data-bs-toggle', 'modal');
            $('.filter').attr('data-bs-target', '#exampleModal');


            $('.Response').attr('data-bs-toggle', 'modal');
            $('.Response').attr('data-bs-target', '#Response');

            $('.Other').attr('data-bs-toggle', 'modal');
            $('.Other').attr('data-bs-target', '#Other');

            $('.Closed').attr('data-bs-toggle', 'modal');
            $('.Closed').attr('data-bs-target', '#Closed');

            $('.ExtendSLA').attr('data-bs-toggle', 'modal');
            $('.ExtendSLA').attr('data-bs-target', '#ExtendSLA');



            $('#Detail').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget)
                var problem = button.data('problem') // E// Extract info from data-* attributes
                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                var modal = $(this)
                // modal.find('.modal-title').text(recipient)
                modal.find('#problem_ticket').text(problem) // Extract info from data-* attributes
            });

            $('#Response').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var id = button.data('id');
                var code = button.data('code');
                var title = button.data('title');
                var status = button.data('status');
                var comment = button.data('comment');

                var modal = $(this);

                modal.find('#idresponse').val(id);
                modal.find('#coderesponse').val(code);
                modal.find('#title').text(title);
                modal.find('#status').val(status);
                modal.find('#comment').val(comment);
            });

            $('#Other').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var id = button.data('id');
                var code = button.data('code');
                var title = button.data('title');
                var status = button.data('status');
                var comment = button.data('comment');

                var modal = $(this);

                modal.find('#idresponse').val(id);
                modal.find('#coderesponse').val(code);
                modal.find('#title').text(title);
                modal.find('#status').val(status);
                modal.find('#comment').val(comment);
            });

            $('#Closed').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var id = button.data('id');
                var code = button.data('code');
                var title = button.data('title');
                var status = button.data('status');
                var comment = button.data('comment');

                var modal = $(this);

                modal.find('#idresponse').val(id);
                modal.find('#coderesponse').val(code);
                modal.find('#title').text(title);
                modal.find('#status').val(status);
                modal.find('#comment').val(comment);
            });

            $('#ExtendSLA').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var id = button.data('id');
                var code = button.data('code');
                var title = button.data('title');
                var status = button.data('status');
                var comment = button.data('comment');

                var modal = $(this);

                modal.find('#idresponse').val(id);
                modal.find('#coderesponse').val(code);
                modal.find('#title').text(title);
                modal.find('#status').val(status);
                modal.find('#comment').val(comment);
            });

        });

        $(function() {
            $("#start_date").datepicker({
                dateFormat: 'yy-mm-dd',
                beforeShow: function() {
                    setTimeout(function() {
                        $('.ui-datepicker').css('z-index', 99999999999999);
                    }, 0);
                }
            });
            $("#end_date").datepicker({
                dateFormat: 'yy-mm-dd',
                beforeShow: function() {
                    setTimeout(function() {
                        $('.ui-datepicker').css('z-index', 99999999999999);
                    }, 0);
                }
            }).bind("change", function() {
                var minValue = $(this).val();
                minValue = $.datepicker.parseDate("yy-mm-dd", minValue);
                minValue.setDate(minValue.getDate() + 1);
                $("#to").datepicker("option", "minDate", minValue);
            })
        });

        $('#close_sidebar_data').click(function(e) {
            $('#sidebar_data').hide();
            $('#table_data').removeClass('col-9');
            $('#table_data').addClass('col-12');
        });
        $(document).ready(function() {

            // Reference to the sidebar
            var sidebar = $('#sidebar_data');

            // Add a click event listener to all table rows
            $('.tableku tr').click(function() {
                // Hide the sidebar initially
                $('#table_data').removeClass('col-12');
                $('#table_data').addClass('col-9');
                var header = [];
                // Get all the th elements (headers) within the first row
                var headers = $('.tableku tr:first-child th');

                // Get all the td elements (cell content) within the clicked row
                var cells = $(this).find('td');

                // Create a string to store header and cell content
                var content = "";

                // Loop through the headers and append their values to the content string
                headers.each(function(index) {
                    header.push($(this).text());
                });
                content += "<table>"
                // Loop through the td elements and append their values to the content string
                cells.each(function(index) {
                    content += '<tr><td>' + header[index] + '</td>';
                    content += '<td>&nbsp&nbsp:&nbsp&nbsp</td>';
                    content += '<td>' + $(this).text() + '</td></tr>';
                });

                content += "</table>"
                // Update the content of the sidebar with cell content
                $('#sidebar_data_body').html(content);

                // Show the sidebar after updating its content
                sidebar.show();
            });
        });
    </script>
@endpush
