@extends('layouts.app', ['page' => 'Ticket Update', 'pageSlug' => 'Ticket Update', 'section' => 'Ticket Update'])

@section('content')
<div class="container-fluid py-4">
    <div class="row">

        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-2 pb-1">
                        <h6 class="text-white text-capitalize ps-3">Ticket Update </h6>
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
                                    <th>
                                        #TIcket
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
                                       Category
                                    </th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder  ps-3"
                                        style="min-width: 6rem">
                                        Company
                                    </th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder  ps-3"
                                        style="min-width: 6rem">
                                        FOR BU
                                    </th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder  ps-3"
                                        style="min-width: 6rem">
                                        CRM No. / Ref No.
                                    </th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder  ps-3"
                                        style="min-width: 6rem">
                                        Description
                                    </th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder  ps-3"
                                        style="min-width: 4rem;text-align: center">
                                        Quit ITK
                                    </th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder  ps-3"
                                        style="min-width: 4rem;text-align: center">
                                        PO Customer
                                    </th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder  ps-3"
                                        style="min-width: 4rem;text-align: center">
                                        PO Suplayer
                                    </th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder  ps-3"
                                        style="min-width: 4rem;text-align: center">
                                        Cost Sheet
                                    </th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder  ps-3"
                                        style="text-align: center">
                                        Other
                                    </th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder  ps-3"
                                        style="min-width: 6rem">
                                        Attachment
                                    </th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder  ps-3"
                                        style="min-width: 8rem">
                                        Assigned To
                                    </th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder"
                                        style="min-width: 4rem;text-align: center">
                                        SLA Ticket (m)
                                    </th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder"
                                        style="min-width: 4rem;text-align: center">
                                        SLA Response (m)
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
                                        Start Working
                                    </th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder  ps-3"
                                        style="min-width: 10rem">
                                        End Working
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
                                        Close
                                    </th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder  ps-3"
                                        style="min-width: 10rem">
                                        Priority
                                    </th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder  ps-3"
                                        style="min-width: 10rem">
                                        Status
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tickets as $item)

                                <tr>

                                    <td class="text-center">
                                        @if ($item->status=="Canceled" || $item->status=="Closed" )
                                        @else
                                            <input type="hidden" name="id" class="dataID" value="{{ $item->id }}">
                                            <button type="button" class="btn btn-sm btn-warning m-0 p-1 UpdateButton"
                                            id="#UpdateButton" style="width: 5rem">Update</button>
                                        @endif
                                    </td>
                                    <td class="font-weight-bold">
                                        #{{ $item->code }}
                                    </td>
                                    <td>{{ date_format(date_create($item->created_at), 'd-M-y') }}</td>
                                    <td>{{ $item->user->name ?? '' }}</td>
                                    <td>
                                        <select class="form-control select2 sub_katagori_id" name="sub_katagori_id"
                                            required>
                                            <option></option>
                                            @foreach ($subkategori as $value)
                                            <option @if ($value->id==$item->sub_katagori_id) selected @endif value="{{
                                                $value->id }}">{{ $value->sub_kategori }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td> {{$item->customer}} </td>
                                    <td>{{ $item->bu }}</td>
                                    <td>{{$item->no_CRM}}</td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-sm btn-outline-info m-0 p-1"
                                            style="width: 5rem" data-bs-toggle="modal" data-bs-target="#Detail"
                                            data-problem="{{ $item->problem }}">Detail</button>
                                    </td>
                                    <td class="text-center">
                                    {{$item->quot_itk==0?'No':'Yes'}}
                                    </td>
                                    <td class="text-center">
                                    {{$item->po_customer==0?'No':'Yes'}}
                                    </td>
                                    <td class="text-center">
                                    {{$item->po_suplayer==0?'No':'Yes'}}
                                    </td>
                                    <td class="text-center">
                                    {{$item->cost_sheet==0?'No':'Yes'}}
                                    </td>
                                    <td>
                                    {{$item->other}}
                                    </td>
                                    <td>
                                        @foreach ($item->file_manager as $value_file)
                                            <div class="btn-group btn-group-sm" role="group">
                                                <a class="btn btn-sm btn-outline-info m-0 p-1"
                                                style="width: 5rem" href="{{asset('storage/files/tickets/'.$value_file->file)}}" target="_blank" >
                                                Show
                                                </a>
                                                <a class="btn btn-sm btn-outline-success m-0 p-1"
                                                style="width: 5rem" href="{{asset('storage/files/tickets/'.$value_file->file)}}" target="_blank"  download>
                                                Donwload
                                                </a>
                                            </div>
                                        @endforeach
                                    </td>
                                    <td>
                                        <select class="form-control select2 agent_id" name="agent_id" required>
                                            <option></option>
                                            @foreach ($agents as $value)
                                                <option @if ($value->id==$item->agent_id) selected @endif @if ($value->permission=="Non Active")  disabled @endif value="{{ $value->id }}"> @if($value->permission=="Non Active") {{ $value->name }} ( leave ) @else {{ $value->name }} @endif</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td style="text-align: center">
                                        {{ $item->sla_ticket_time }}
                                    </td>
                                    <td style="text-align: center">
                                        {{ $item->sla_response_time }}
                                    </td>
                                    <td>
                                        <div class="input-group input-group-dynamic m-0">
                                            <input type="text" placeholder="SLA Response" autocomplete="on"
                                                name="sla_assignment" value="{{ $item->sla_assignment }}"
                                                class="form-control form-control-sm datepicker sla_assignment" required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group input-group-dynamic m-0">
                                            <input type="text" placeholder="SLA Response" autocomplete="on"
                                                name="sla_respone" value="{{ $item->sla_respone }}"
                                                class="form-control form-control-sm datepicker sla_respone" required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group input-group-dynamic m-0">
                                            <input type="text" placeholder="Start Working" autocomplete="on"
                                                name="start_work" value="{{ $item->start_work }}"
                                                class="form-control form-control-sm datepicker start_work" required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group input-group-dynamic m-0">
                                            <input type="text" placeholder="End Working" autocomplete="on"
                                                name="end_work" value="{{ $item->end_work }}"
                                                class="form-control form-control-sm datepicker end_work" required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group input-group-dynamic m-0">
                                            <input type="text" placeholder="SLA Pending" autocomplete="on"
                                                name="sla_pending" value="{{ $item->sla_pending }}"
                                                class="form-control form-control-sm datepicker sla_pending" required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group input-group-dynamic m-0">
                                            <input type="text" placeholder="SLA Pending" autocomplete="on"
                                                name="sla_pending_end" value="{{ $item->sla_pending_end }}"
                                                class="form-control form-control-sm datepicker sla_pending_end" required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group input-group-dynamic m-0">
                                            <input type="text" placeholder="SLA Resolved" autocomplete="on"
                                                name="sla_resolved" value="{{ $item->sla_resolved }}"
                                                class="form-control form-control-sm datepicker sla_resolved" required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group input-group-dynamic m-0">
                                            <input type="text" placeholder="SLA Close" autocomplete="on"
                                                name="sla_close" value="{{ $item->sla_close }}"
                                                class="form-control form-control-sm datepicker sla_close" required>
                                        </div>
                                    </td>
                                    <td>
                                        <select class="form-control prioritas prioritas" name="prioritas" required>
                                            <option  @if ($item->prioritas=='low') selected @endif  value="low">Low</option>
                                            <option  @if ($item->prioritas=='normal') selected @endif  value="normal">Normal</option>
                                            <option  @if ($item->prioritas=='high') selected @endif  value="high">High</option>
                                            <option  @if ($item->prioritas=='urgent') selected @endif  value="urgent">Urgent</option>
                                        </select>
                                    </td>
                                    <td>
                                        @if ($item->status=="Canceled" || $item->status=="Closed"  )
                                        {{ $item->status }}
                                        @else
                                        <select class="form-control select2 status_id" name="status" required>
                                            <option @if ('Awaiting Response'==$item->status) selected @endif
                                                value="Awaiting Response" >Awaiting Response</option>
                                            <option @if ('On Progress'==$item->status) selected @endif value="On
                                                Progress" >On Progress</option>
                                            <option @if ('Pending'==$item->status) selected @endif
                                                value="Pending">Pending</option>
                                            <option @if ('Resolved'==$item->status) selected @endif value="Resolved">Finish</option>
                                            <option @if ('Closed'==$item->status) selected @endif value="Closed">Close</option>
                                        </select>
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
<form action="{{ route('sa.supervisor.summary-report-sumpervisor-update') }}" style="display: none" method="post" id="FormAction">
    @csrf
    <input type="text" name="id" id="id">
    <input type="text" name="lokasi_id" id="lokasi_id">
    <input type="text" name="sub_katagori_id" id="sub_katagori_id">
    <input type="text" name="agent_id" id="agent_id">
    <input type="text" name="prioritas" id="prioritas">
    <input type="text" name="sla_respone" id="sla_respone">
    <input type="text" name="start_work" id="start_work">
    <input type="text" name="end_work" id="end_work">
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
     [aria-disabled="true"]{
        background-image: linear-gradient(195deg, #747b8a 0%, #495361 100%);
         color:#fff!important;
        }
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
                        <div class="col-6">
                            <div class="input-group input-group-static my-3">
                                <input type="text" class="form-control form-control-sm" name="start_date"
                                    id="start_date" placeholder="Start Date" @if (isset($_GET['start_date']) ?? false)
                                    value="{{ $_GET['start_date'] }}" @endif autocomplete="off">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group input-group-static my-3">
                                <input type="text" class="form-control form-control-sm" name="end_date" id="end_date"
                                    placeholder="End Date" @if (isset($_GET['end_date']) ?? false)
                                    value="{{ $_GET['end_date'] }}" @endif autocomplete="off">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group input-group-static my-3">
                                <select class="form-control form-control-sm select2" name="filter_by">
                                    <option disabled selected>Filter By</option>
                                    <option value="status" @if (isset($_GET['filter_by']) ?
                                        ($_GET['filter_by']=='status' ? true : false) : false) selected @endif>Status
                                    </option>
                                    <option value="code" @if (isset($_GET['filter_by']) ? ($_GET['filter_by']=='code' ?
                                        true : false) : false) selected @endif>No Ticket
                                    </option>
                                    <option value="name" @if (isset($_GET['filter_by']) ? ($_GET['filter_by']=='name' ?
                                        true : false) : false) selected @endif>Agent
                                    </option>
                                    <option value="bu" @if (isset($_GET['filter_by']) ? ($_GET['filter_by']=='bu' ? true
                                        : false) : false) selected @endif>BU
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group input-group-static my-3">
                                <input type="text" class="form-control form-control-sm" @if (isset($_GET['keyword']) ??
                                    false) value="{{ $_GET['keyword'] }}" @endif name="keyword" id="keyword"
                                    placeholder="Keyword">
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
                            <textarea class="form-control form-control-sm bg-white"
                                style="border-radius:0.25rem !important" rows="2" name="comment" id=""
                                placeholder="Comment Requestor !!"></textarea>
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
                    <div class="h5 text-white p-0 m-0">Description</div>
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
        $('.tableku').DataTable({
            dom: 'lfrtip'
            , "order": []
            , "showNEntries": true
            ,
             language: {
                'search': '' /*Empty to remove the label*/
            }
            , "paging": true
            , "bAutoWidth": false,

            initComplete: function() {
                $(this).on('draw.dt', function() {
                    $(document).ready(function() {
                        $('.select2').select2({
                            tags: true
                            , placeholder: "Select Agent"
                            , width: '100%'
                        , });
                        $('.prioritas').select2({
                            tags: true,
                            minimumResultsForSearch: -1
                            , width: '100%'
                        , });
                        $(".datepicker").datetimepicker({
                            format: 'Y-m-d H:i:00'
                            , timepicker: true
                            , step: 15
                            , beforeShow: function() {
                                setTimeout(function() {
                                    $('.ui-datepicker').css('z-index', 99999999999999);
                                }, 0);
                            }
                        });

                    });
                });
            }
        , });
        $('.tableku2').DataTable({
            dom: 'lfrtip'
            , "order": []
            , "showNEntries": true
            ,  language: {
                'search': '' /*Empty to remove the label*/
            }
            , "paging": true
            , "bAutoWidth": false
            , initComplete: function() {
                $(this).on('draw.dt', function() {
                    $(document).ready(function() {
                        $('.select2').select2({
                            tags: true
                            , placeholder: "Select Agent"
                            , width: '100%'
                        , });
                        $(".datepicker").datetimepicker({
                            format: 'Y-m-d H:i:00'
                            , timepicker: true
                            , step: 15
                            , beforeShow: function() {
                                setTimeout(function() {
                                    $('.ui-datepicker').css('z-index', 99999999999999);
                                }, 0);
                            }
                        });

                    });
                });
            }
        , });
    });

    $(document).ready(function() {
        $('.select2').select2({
            tags: true
            , placeholder: "Select Agent"
            , width: '100%'
        , });
        $('.prioritas').select2({
            tags: true,
            minimumResultsForSearch: -1
            , width: '100%'
        , });
        $(".datepicker").datetimepicker({
            format: 'Y-m-d H:i:00'
            , timepicker: true
            , step: 15
            , beforeShow: function() {
                setTimeout(function() {
                    $('.ui-datepicker').css('z-index', 99999999999999);
                }, 0);
            }
        });

    });



    $(document).ready(function() {
        $('.filter').attr('data-bs-toggle', 'modal');
        $('.filter').attr('data-bs-target', '#exampleModal');


        $('#close').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('whatever') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            // modal.find('.modal-title').text(recipient)
            modal.find('#code_ticket').val(recipient)
        });

        $('#Detail').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var problem = button.data('problem') // E// Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            // modal.find('.modal-title').text(recipient)
            modal.find('#problem_ticket').text(problem) // Extract info from data-* attributes
        });

    });



    $(document).ready(function() {
        $('table.tableku').on('click', 'Button.UpdateButton', function(e) {

            var row = $(this).closest('tr'),
             dataID = $('.dataID', row),
            lokasi_id = $('.lokasi_id', row),
            sub_katagori_id = $('.sub_katagori_id', row),
            sla_respone = $('.sla_respone', row),
            start_work = $('.start_work', row),
            end_work = $('.end_work', row),
            sla_repair = $('.sla_repair', row),
            sla_repair_end = $('.sla_repair_end', row),
            sla_pending = $('.sla_pending', row),
            sla_pending_end = $('.sla_pending_end', row),
            sla_resolved = $('.sla_resolved', row),
            sla_close = $('.sla_close', row),
            statusku = $('.status_id', row),
            agent_id = $('.agent_id', row);
            prioritas = $('.prioritas', row);



            $('#id').val(dataID.val());
            $('#agent_id').val(agent_id.val());
            $('#lokasi_id').val(lokasi_id.val());
            $('#sub_katagori_id').val(sub_katagori_id.val());
            $('#sla_respone').val(sla_respone.val());
            $('#start_work').val(start_work.val());
            $('#end_work').val(end_work.val());
            $('#sla_repair').val(sla_repair.val());
            $('#sla_repair_end').val(sla_repair_end.val());
            $('#sla_pending').val(sla_pending.val());
            $('#sla_pending_end').val(sla_pending_end.val());
            $('#sla_resolved').val(sla_resolved.val());
            $('#sla_close').val(sla_close.val());
            $('#status').val(statusku.val());
            $('#agent_id').val(agent_id.val());
            $('#prioritas').val(prioritas.val());
            $('#FormAction').submit();
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

</script>

@endpush
