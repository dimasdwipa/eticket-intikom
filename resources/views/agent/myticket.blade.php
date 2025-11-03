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
                        <form id="responseForm" action="{{ route('agent.response') }}" method="post">
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
                        <form id="otherForm" action="{{ route('agent.request') }}" method="post">
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
                        <form id="otherForm" action="{{ route('agent.request') }}" method="post">
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
                        <form id="otherForm" action="{{ route('agent.request') }}" method="post">
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
{{-- Ini adalah kode JavaScript final yang sudah disesuaikan untuk halaman my-ticket --}}
<script>
$(document).ready(function() {
    // =================================================================
    // 1. Inisialisasi DataTable
    // =================================================================
    var table = $('.tableku').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "{{ route('api.agent.mytickets') }}",
            "type": "GET",
            "data": function (d) {
                d.start_date = $('#start_date').val();
                d.end_date = $('#end_date').val();
                d.filter_by = $('select[name="filter_by"]').val();
                d.keyword = $('#keyword').val();
            }
        },
        "columns": [
            { 
                "data": null, "orderable": false, "searchable": false, 
                "render": function(data, type, row) { 
                    let buttons = '';
                    let status = row.status ? row.status.toLowerCase() : '';
                    if (status === 'awaiting response') {
                        buttons += `<button type="button" class="btn btn-sm btn-success m-1 Response" data-bs-toggle="modal" data-bs-target="#Response" data-id="${row.id}" data-code="${row.code}" data-title="Response" data-status="On Progress" data-comment="I will do this task now">Response</button>`;
                    } else if (status === 'on progress') {
                        // buttons += `<button type="button" class="btn btn-sm btn-warning m-1 Other" data-bs-toggle="modal" data-bs-target="#Other" data-id="${row.id}" data-code="${row.code}" data-title="Request Repair" data-status="Request Repair">Request Repair</button> `;
                        buttons += `<button type="button" class="btn btn-sm btn-danger m-1 Other" data-bs-toggle="modal" data-bs-target="#Other" data-id="${row.id}" data-code="${row.code}" data-title="Request Pending" data-status="Request Pending">Request Pending</button> `;
                        buttons += `<button type="button" class="btn btn-sm btn-success m-1 Response" data-bs-toggle="modal" data-bs-target="#Response" data-id="${row.id}" data-code="${row.code}" data-title="Resolved Ticket" data-status="Resolved">Resolved</button>`;
                    } else if (status === 'repairing') {
                        buttons += `<button type="button" class="btn btn-sm btn-success m-1 Response" data-bs-toggle="modal" data-bs-target="#Response" data-id="${row.id}" data-code="${row.code}" data-title="End Repair" data-status="End Repair" data-comment="I will continue this ticket now">End Repair</button>`;
                    } else if (status === 'pending') {
                        buttons += `<button type="button" class="btn btn-sm btn-success m-1 Response" data-bs-toggle="modal" data-bs-target="#Response" data-id="${row.id}" data-code="${row.code}" data-title="End Pending" data-status="End Pending" data-comment="I will continue this ticket now">End Pending</button>`;
                    } else if (status === 'resolved') {
                        buttons += `<button type="button" class="btn btn-sm btn-info m-1 Closed" data-bs-toggle="modal" data-bs-target="#Closed" data-id="${row.id}" data-code="${row.code}" data-title="Request Closed" data-status="Request Close">Request Closed</button>`;
                    }
                    return `<div class="btn-group" role="group">${buttons}</div>`;
                }
            },
            { "data": "status" },
            { "data": "code" },
            { "data": "created_at", "render": function(data) { return data ? new Date(data).toLocaleDateString('id-ID', {day: 'numeric', month: 'short', year: 'numeric'}) : ''; }},
            { "data": "user.name", "defaultContent": "-" },
            { "data": "lokasi.lokasi", "defaultContent": "-" },
            { "data": "bu", "defaultContent": "-" },
            { "data": "katagori.kategori", "defaultContent": "-" },
            { "data": "sub_katagori.sub_kategori", "defaultContent": "-" },
            { "data": "problem", "orderable": false, "searchable": false, "render": function(data) { return `<button type="button" class="btn btn-sm btn-outline-info" data-bs-toggle="modal" data-bs-target="#Detail" data-problem="${data}">Detail</button>`; }},
            { "data": "sla_ticket_time", "defaultContent": "-" },
            { "data": "sla_assignment", "defaultContent": "-" },
            { "data": "sla_respone", "defaultContent": "-" },
            { "data": "sla_repair", "defaultContent": "-" },
            { "data": "sla_repair_end", "defaultContent": "-" },
            { "data": "sla_pending", "defaultContent": "-" },
            { "data": "sla_pending_end", "defaultContent": "-" },
            { "data": "sla_resolved", "defaultContent": "-" },
            { "data": "sla_close", "defaultContent": "-" },
            { "data": "rating", "defaultContent": "-" },
            { "data": "files", "orderable": false, "searchable": false, "render": function(data, type, row) { 
                if(row.files) {
                    let fileUrl = '/storage/files/tickets/' + row.files;
                    return `<div class="btn-group btn-group-sm"><a href="${fileUrl}" target="_blank" class="btn btn-sm btn-outline-info">Show</a><a href="${fileUrl}" download class="btn btn-sm btn-outline-success">Download</a></div>`;
                }
                return '-';
            }},
            { "data": "prioritas" }
        ],
        dom:  '<"row mx-2"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 d-flex justify-content-end"Bf>>t<"row mx-2"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
        buttons: [
            { text: 'Filter', className: 'btn btn-sm btn-white btn-outline-primary shadow rounded me-2', action: function () { $('#exampleModal').modal('show'); } },
            'excelHtml5', 'csvHtml5', 'pdfHtml5', 'print'
        ],
        language: { 'search': '' },
        "paging": true,
        "bAutoWidth": false
    });

    // =================================================================
    // 2. FUNGSI UMUM UNTUK SUBMIT FORM VIA AJAX
    // =================================================================
    function submitFormViaAjax(form, datatable) {
        var modal = form.closest('.modal');
        $.ajax({
            type: "POST",
            url: form.attr('action'),
            data: form.serialize(),
            success: function(response) {
                modal.modal('hide');
                form[0].reset();
                datatable.ajax.reload(null, false);
            },
            error: function(xhr) {
                var errorMsg = 'An error occurred during submission.';
                if (xhr.responseJSON && xhr.responseJSON.errors) {
                    errorMsg = Object.values(xhr.responseJSON.errors).map(err => err.join('\n')).join('\n');
                } else if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMsg = xhr.responseJSON.message;
                }
                alert(errorMsg);
            }
        });
    }

    // =================================================================
    // 3. Hubungkan Semua Form ke Fungsi AJAX
    // =================================================================
    $('#exampleModal form').on('submit', function(e) {
        e.preventDefault();
        table.ajax.reload();
        $('#exampleModal').modal('hide');
    });

    // Gunakan event delegation untuk semua form di dalam modal
    $(document).on('submit', '#responseForm, #otherForm, #closedForm, #extendSLAForm', function(e) {
        e.preventDefault();
        submitFormViaAjax($(this), table);
    });

    // =================================================================
    // 4. PERBAIKAN: Event Handler SPESIFIK untuk Setiap Modal
    // =================================================================
    $('#Detail').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        $(this).find('#problem_ticket').text(button.data('problem'));
    });

    $('#Response, #Closed, #ExtendSLA').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var modal = $(this);
        var form = modal.find('form');
        form.find('input[name="id"]').val(button.data('id'));
        form.find('input[name="code"]').val(button.data('code'));
        modal.find('#title').text(button.data('title'));
        form.find('input[name="status"]').val(button.data('status'));
        form.find('textarea[name="comment"]').val(button.data('comment'));
    });

    // --- Handler Khusus untuk Modal "Request Pending" (`#Other`) ---
    $('#Other').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var modal = $(this);
        var form = modal.find('form');

        // Isi data modal dengan selector ID yang tepat
        form.find('#idresponse').val(button.data('id'));
        form.find('#coderesponse').val(button.data('code'));
        modal.find('#title').text(button.data('title'));
        form.find('#status').val(button.data('status'));
        form.find('#comment').val(button.data('comment'));

        // Inisialisasi datetimepicker
        modal.find('.datetimepicker').datetimepicker({
            format: 'Y-m-d H:i:00',
            timepicker: true,
            step: 15,
            onShow: function() { this.setOptions({ zIndex: 1056 }); }
        });
    });

    // Inisialisasi Datepicker untuk form filter
    $("#start_date, #end_date").datepicker({ dateFormat: 'yy-mm-dd' });
});
</script>
@endpush
