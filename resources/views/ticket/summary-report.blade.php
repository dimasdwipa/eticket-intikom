@extends('layouts.app', ['page' => 'My Ticket', 'pageSlug' => 'My Ticket', 'section' => 'My Ticket'])

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
    {{-- rating --}}
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
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div id="table_data" class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-2 pb-1">
                            <h6 class="text-white text-capitalize ps-3">Ticket My Ticket </h6>
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
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder  ps-3">
                                            Status
                                        </th>

                                        <th>
                                            #TIcket</th>
                                        <th
                                            class="text-uppercase text-secondary text-xs font-weight-bolder text-center  ps-3">
                                            Tenant</th>
                                        <th
                                            class="text-uppercase text-secondary text-xs font-weight-bolder text-center  ps-3">
                                            Created</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder  ps-3">
                                            Category
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder  ps-3">
                                            Sub Category
                                        </th>
                                        <th>
                                            Assigned To
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder  ps-3">
                                            Problem
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder  ps-3">
                                            Solution
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder  ps-3">
                                            Note
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder text-center">
                                            Estimation
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder text-center">
                                            Resolved
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder text-center">
                                            Closed
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder text-center">
                                            File
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder  ps-3">
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
                        <button class="btn btn-link text-dark p-0 m-0 fixed-plugin-close-button" id="close_sidebar_data">
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

@push('modal')
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
                <div class="modal-body">
                    <div class="prablem p4" id="problem_ticket"></div>
                </div>
            </div>
        </div>
    </div>
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
                            <div class="col-12">
                                <div class="input-group input-group-static my-3">
                                    <select class="form-control form-control-sm select2" name="team_id">
                                        <option disabled selected style="text-secondary">Tenant</option>
                                        @foreach ( Auth::user()->teams as $item )
                                            <option value="{{$item->id}}" @if (isset($_GET['team_id']) ? ($_GET['team_id'] == $item->id ? true : false) : false) selected @endif>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
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
                    <input type="hidden" name="id" id="id_ticket">
                    <div class="modal-body">
                        <div class="py-0 text-center align-items-center justify-content-center">
                            <div><small>Please, don't forget to give a star rating</small></div>
                            <div class="rating mx-0">
                                <input type="radio" id="star5" name="rating" value="5"  />
                                <label class="star" for="star5" title="Awesome" aria-hidden="true"></label>
                                <input type="radio" id="star4" name="rating" value="4" />
                                <label class="star" for="star4" title="Great" aria-hidden="true"></label>
                                <input type="radio" id="star3" name="rating" value="3" />
                                <label class="star" for="star3" title="Very good" aria-hidden="true"></label>
                                <input type="radio" id="star2" name="rating" value="2" />
                                <label class="star" for="star2" title="Good" aria-hidden="true"></label>
                                <input type="radio" id="star1" name="rating" value="1" required />
                                <label class="star" for="star1" title="Bad" aria-hidden="true" ></label>
                            </div>
                            <div class="input-group input-group-static mb-4">
                                <textarea class="form-control form-control-sm bg-white" style="border-radius:0.25rem !important" rows="2"
                                    name="comment" id="" placeholder="Comment Requestor !!" required></textarea>
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
    <!-- Complain -->
    <div class="modal fade" id="complain" tabindex="-1" role="dialog" aria-labelledby="complain"
        aria-hidden="true">
        <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
            <div class="modal-content">
                <div class="modal-header py-2 bg-warning">
                    <h6 class="modal-title text-upercase font-weight-normal text-white" id="modal-title-notification">
                        <div class="h5 text-white p-0 m-0">Complaint Ticket</div>
                    </h6>
                    <button type="button" class="btn btn-outline m-0 p-1" data-bs-dismiss="modal" aria-label="Close">
                        <span class="text-white h7">
                            <i class="fas fa-external-link-alt"></i>
                        </span>
                    </button>
                </div>
                <form method="POST" action="{{ route('ticket-complain') }}">
                    @csrf
                    <input type="hidden" name="id" id="id_ticket">
                    <div class="modal-body">
                        <div class="input-group input-group-static mb-4">
                            <label>#Ticket</label>
                            <input readonly type="text" name="code" class="form-control" id="code_ticket">
                        </div>
                        <div class="input-group input-group-static mb-4">
                            <label>Category</label>
                            <input readonly type="text" name="katagori" class="form-control" id="katagori_ticket">
                        </div>
                        <div class="input-group input-group-static mb-4">
                            <label>Status</label>
                            <input readonly type="text" name="status" class="form-control" id="status_ticket">
                        </div>
                        <div class="input-group input-group-static mb-4">
                            <label>Agent</label>
                            <input readonly type="text" name="agent" class="form-control" id="agent_ticket">
                        </div>
                        <div class="input-group input-group-dynamic">
                            <textarea name="comment" class="multisteps-form__textarea form-control" rows="5" placeholder="Write your complain hire .."
                                spellcheck="false"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer py-2 bg-gray-200">
                        <button type="submit" class="btn btn-outline-warning btn-sm m-0">
                            Ok, Got it
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Rating -->
    <div class="modal fade" id="rating" tabindex="-1" role="dialog" aria-labelledby="close" aria-hidden="true">
        <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
            <div class="modal-content">
                <div class="modal-header py-2 bg-success">
                    <h6 class="modal-title text-upercase font-weight-normal text-white" id="modal-title-notification">
                        <div class="h5 text-white p-0 m-0">Rating !!</div>
                        <div class="form-label text-white p-0 m-0">Please, Give rating for this service !</div>
                    </h6>
                    <button type="button" class="btn btn-outline m-0 p-1" data-bs-dismiss="modal" aria-label="Close">
                        <span class="text-white h7">
                            <i class="fas fa-external-link-alt"></i>
                        </span>
                    </button>
                </div>
                <form method="POST" action="{{ route('ticket-rating') }}">
                    @csrf
                    <input type="hidden" name="id" id="id_ticket">
                    <div class="modal-body">
                        <div class="py-0 text-center align-items-center justify-content-center">
                            <div><small>Please, don't forget to give a star rating</small></div>
                            <div class="rating mx-0">
                                <input type="radio" id="starku5" name="rating" value="5"  />
                                <label class="starku" for="starku5" title="Awesome" aria-hidden="true"></label>
                                <input type="radio" id="starku4" name="rating" value="4" />
                                <label class="starku" for="starku4" title="Great" aria-hidden="true"></label>
                                <input type="radio" id="starku3" name="rating" value="3" />
                                <label class="starku" for="starku3" title="Very good" aria-hidden="true"></label>
                                <input type="radio" id="starku2" name="rating" value="2" />
                                <label class="starku" for="starku2" title="Good" aria-hidden="true"></label>
                                <input type="radio" id="starku1" name="rating" value="1" required />
                                <label class="starku" for="starku1" title="Bad" aria-hidden="true" ></label>
                            </div>
                            <div class="input-group input-group-static mb-4">
                                <textarea class="form-control form-control-sm bg-white" style="border-radius:0.25rem !important" rows="2"
                                    name="comment" id="" placeholder="Comment Requestor !!" required></textarea>
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
@endpush
@push('scripts')
{{-- CSS tambahan untuk memberi jarak antara tombol dan search box --}}
<style>
    div.dataTables_wrapper div.dataTables_filter {
        margin-top: 0.5rem; /* Memberi sedikit jarak atas untuk search box */
        text-align: right; /* Memastikan search box tetap di kanan */
    }
</style>
<script>
$(document).ready(function() {
    // =================================================================
    // 1. Inisialisasi DataTable dengan Filter AJAX & Tampilan Rapi
    // =================================================================
    var table = $('.tableku').DataTable({
        "processing": true,
        "serverSide": true,
        
        // Kirim data dari form filter bersama setiap request AJAX
        "ajax": {
            "url": "{{ route('api.summary-report') }}",
            "type": "GET",
            "data": function (d) {
                // Ambil nilai dari setiap input di form filter
                d.start_date = $('#start_date').val();
                d.end_date = $('#end_date').val();
                d.filter_by = $('select[name="filter_by"]').val();
                d.keyword = $('#keyword').val();
                d.team_id = $('select[name="team_id"]').val();
            }
        },

        // Definisi kolom dari JSON
        "columns": [
            {
                "data": null, "orderable": false, "searchable": false,
                "render": function(data, type, row) {
                    let buttons = '';
                    // Ambil data dari relasi dengan aman (cek jika null)
                    let katagoriName = row.katagori ? row.katagori.kategori : '';
                    let agentName = row.agent ? row.agent.name : '';

                    if (row.status === 'Resolved') {
                         buttons += `<button type="button" class="btn btn-sm btn-success m-1" data-bs-toggle="modal" data-bs-target="#close" data-id="${row.id}">CLOSE</button>`;
                         buttons += `<button type="button" class="btn btn-sm btn-warning m-1" data-bs-toggle="modal" data-bs-target="#complain" data-id="${row.id}" data-code="${row.code}" data-katagori="${katagoriName}" data-status="${row.status}" data-agent="${agentName}">COMPLAIN</button>`;
                    } else if (row.status !== 'Closed' && row.status !== 'Canceled') {
                        buttons += `<button type="button" class="btn btn-sm btn-outline-success m-1" data-bs-toggle="modal" data-bs-target="#close" data-id="${row.id}">Close</button>`;
                        buttons += `<button type="button" class="btn btn-sm btn-outline-warning m-1" data-bs-toggle="modal" data-bs-target="#complain" data-id="${row.id}" data-code="${row.code}" data-katagori="${katagoriName}" data-status="${row.status}" data-agent="${agentName}">Complain</button>`;
                    }
                    if ((row.status === 'Closed' || row.status === 'Canceled') && !row.rating) {
                        buttons += `<button type="button" class="btn btn-sm btn-outline-secondary m-1" data-bs-toggle="modal" data-bs-target="#rating" data-id="${row.id}">Give Rating</button>`;
                    }
                    return `<div class="btn-group" role="group">${buttons}</div>`;
                }
            },
            { "data": "status" },
            { "data": "code", "name": "tickets.code" },
            { "data": "team.name", "name": "team.name", "defaultContent": "-" },
            { "data": "created_at", "name": "tickets.created_at" },
            { "data": "katagori.kategori", "defaultContent": "-" },
            { "data": "sub_katagori.sub_kategori", "defaultContent": "-" },
            { "data": "agent.name", "name": "agent.name", "defaultContent": "-" },
            { 
                "data": "problem", "orderable": false, "searchable": false,
                "render": function(data, type, row) {
                    return `<button type="button" class="btn btn-sm btn-outline-info" data-bs-toggle="modal" data-bs-target="#Detail" data-problem="${data}">DETAIL</button>`;
                }
            },
            { "data": "solution", "defaultContent": "-" },
            { "data": "note", "defaultContent": "-" },
            { "data": "estimation_date", "defaultContent": "-" },
            { "data": "resolved_date", "defaultContent": "-" },
            { "data": "closed_date", "defaultContent": "-" },
            { 
                "data": "files", "orderable": false, "searchable": false,
                "render": function(data, type, row) {
                    if (data) {
                        let fileUrl = '/storage/files/tickets/' + data;
                        return `
                            <div class="btn-group btn-group-sm" role="group">
                                <a href="${fileUrl}" target="_blank" class="btn btn-sm btn-outline-info m-0 p-1">SHOW</a>
                                <a href="${fileUrl}" download class="btn btn-sm btn-outline-success m-0 p-1">DOWNLOAD</a>
                            </div>
                        `;
                    }
                    return '-';
                }
            },
            { "data": "prioritas" }
        ],

        // Tata letak elemen tabel yang rapi
        dom:  '<"row mx-2"' +
              '    <"col-sm-12 col-md-6" l>' +
              '    <"col-sm-12 col-md-6" <"d-flex flex-column align-items-end" B f>>' +
              '>' +
              't' +
              '<"row mx-2"' +
              '    <"col-sm-12 col-md-5" i>' +
              '    <"col-sm-12 col-md-7" p>' +
              '>',
        
        "order": [],
        buttons: [
            {
                text: 'Filter',
                className: 'btn btn-sm btn-white btn-outline-primary shadow rounded me-1', // Jarak diubah ke me-1
                action: function ( e, dt, node, config ) {
                    $('#exampleModal').modal('show');
                }
            },
            {
                extend: 'excelHtml5',
                text: 'Excel',
                className: 'btn btn-sm btn-success shadow rounded me-1' // Jarak diubah ke me-1
            },
            {
                extend: 'csvHtml5',
                text: 'CSV',
                className: 'btn btn-sm btn-success shadow rounded me-1' // Jarak diubah ke me-1
            },
            {
                extend: 'pdfHtml5',
                text: 'PDF',
                className: 'btn btn-sm btn-success shadow rounded me-1' // Jarak diubah ke me-1
            },
            {
                extend: 'print',
                text: 'Print',
                className: 'btn btn-sm btn-success shadow rounded' // Tombol terakhir tidak perlu jarak
            }
        ],
        language: { 'search': '' },
        "paging": true,
        "bAutoWidth": false,
    });

    // =================================================================
    // 2. Hubungkan Form Filter ke DataTable
    // =================================================================
    $('#exampleModal form').on('submit', function(e) {
        e.preventDefault(); // Mencegah halaman reload
        table.ajax.reload(); // Memuat ulang data tabel dengan parameter filter baru
        $('#exampleModal').modal('hide'); // Tutup modal
    });


    // =================================================================
    // 3. Kode Event Handler untuk Modal & Sidebar yang Dirapikan
    // =================================================================
    $('#Detail').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var problem = button.data('problem');
        $(this).find('#problem_ticket').text(problem);
    });

    $('#close, #rating').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        $(this).find('#id_ticket').val(id);
    });

    $('#complain').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var modal = $(this);
        // Ambil data dari tombol dan isi ke dalam form di modal
        modal.find('#id_ticket').val(button.data('id'));
        modal.find('#code_ticket').val(button.data('code'));
        modal.find('#katagori_ticket').val(button.data('katagori'));
        modal.find('#status_ticket').val(button.data('status'));
        modal.find('#agent_ticket').val(button.data('agent'));
    });

    // Inisialisasi Datepicker
    $("#start_date, #end_date").datepicker({
        dateFormat: 'yy-mm-dd',
        beforeShow: function() {
            setTimeout(function() {
                $('.ui-datepicker').css('z-index', 99999999999999);
            }, 0);
        }
    });

    // Logika Sidebar
    $('#close_sidebar_data').click(function() {
        $('#sidebar_data').hide();
        $('#table_data').removeClass('col-9').addClass('col-12');
    });

    // 4. Event listener untuk row click yang di-delegasikan (agar berfungsi di semua halaman)
    $('.tableku tbody').on('click', 'tr', function (event) {
        // Jangan aktifkan sidebar jika yang diklik adalah tombol atau link di dalam sel
        if ($(event.target).is('button, a, i')) {
            return;
        }

        $('#sidebar_data').show();
        $('#table_data').removeClass('col-12').addClass('col-9');
        
        var header = [];
        var content = "<table class='table table-sm'>"; // Beri class agar lebih rapi
        var cells = $(this).find('td');

        $('.tableku thead th').each(function() {
            header.push($(this).text().trim());
        });
        
        cells.each(function(index) {
            // Jangan tampilkan kolom 'Action' di sidebar
            if (header[index] && header[index].toLowerCase() !== 'action') {
                content += `<tr><td class="fw-bold">${header[index]}</td><td>&nbsp;:&nbsp;</td><td>${$(this).html()}</td></tr>`;
            }
        });

        content += "</table>";
        $('#sidebar_data_body').html(content);
    });
});
</script>
@endpush
