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
                                            class="text-center text-uppercase text-secondary text-xs font-weight-bolder  ps-3" style="min-width: 10rem">
                                            Action
                                        </th>
                                        <th>
                                            #Ticket
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder  ps-3"
                                            style="min-width: 10rem">
                                            Status
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder ps-3"
                                            style="min-width: 6rem">
                                            Created</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder  ps-3"
                                            style="min-width: 8rem">
                                            Sales Admin
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder  ps-3"
                                            style="min-width: 6rem">
                                            Category
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder  ps-3"
                                            style="min-width: 6rem">
                                            Company
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder  ps-3"
                                            style="min-width: 6rem">
                                            BU
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
                                            style="text-align: center">
                                            Attachment
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder"
                                            style="min-width: 4rem;text-align: center">
                                            SLA Ticket (m)
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder"
                                            style="min-width: 4rem;text-align: center">
                                            SLA Reponse (m)
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
                                            Start Doc. Update
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder  ps-3"
                                            style="min-width: 10rem">
                                            End Doc. Update
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
                                            Start Work
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder  ps-3"
                                            style="min-width: 10rem">
                                            End Work
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder  ps-3"
                                            style="min-width: 10rem">
                                            Finish
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
                                            Priority
                                        </th>
                                        
                                    
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tickets as $item)
                                        <tr>
                                          
                                            <td style="text-align:center;">
                                                @if ($item->status != 'Closed')
                                                    @if ($item->status != 'Canceled')
                                                    @if ($item->status == 'Document Revison')
                                                    <div class="p-1">
                                                        <a href="{{ route('sa.sales-ticket.edit', ['sales_ticket' => $item->id ]) }}"
                                                            class="btn btn-sm btn-outline-info m-0 p-1">Update Ticket</a>
                                                    </div>
                                                    @endif
                                                    @if ($item->status == 'Resolved')
                                                    <div class="btn-group btn-group-sm" role="group">
                                                    
                                                        <button type="button"
                                                            class="btn btn-sm btn-outline-success m-0 p-1"
                                                            style="width: 5rem" data-bs-toggle="modal"
                                                            data-bs-target="#close"
                                                            data-id="{{ $item->id }}">Close</button>
                                                        <button type="button"
                                                            class="btn btn-sm btn-outline-warning m-0 p-1"
                                                            style="width: 5rem" data-bs-toggle="modal"
                                                            data-bs-target="#complain" data-id="{{ $item->id }}"
                                                            data-code="{{ $item->code }}"
                                                            data-katagori="{{ $item->katagoriAllTeams->kategori ?? '' }}"
                                                            data-status="{{ $item->status }}"
                                                            data-agent="{{ $item->agent->name ?? '--' }}">Complain</button>
                                                    </div>
                                                    @endif
                                                    @endif

                                                @endif

                                                @if (($item->status == 'Closed'||$item->status == 'Canceled' )&& empty($item->rating))
                                                    <button type="button"
                                                            class="btn btn-sm btn-outline-secondary m-0 p-1"
                                                            style="width: 10rem" data-bs-toggle="modal"
                                                            data-bs-target="#rating"
                                                            data-id="{{ $item->id }}">Give Rating</button>
                                                @endif
                                            </td>
                                            <td class="font-weight-bold">
                                                #{{ $item->code }}
                                            </td>
                                            <td>
                                                @if($item->status=='Resolved')
                                                    Finish
                                                @else
                                                    {{ $item->status}}
                                                @endif
                                            </td>
                                            <td>{{ date_format(date_create($item->created_at), 'd-M-y') }}</td>
                                            <td>{{ $item->agent->name ?? '' }}</td>
                                            <td>
                                                {{$item->sub_katagoriAllTeams->sub_kategori??''}}
                                            </td>
                                            <td>
                                            {{$item->customer}}
                                            </td>
                                            <td>{{ $item->bu }}</td>
                                        
                                            <td>
                                            {{$item->no_CRM}}
                                            </td>
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
                                            <td style="text-align: center">
                                                {{ $item->sla_ticket_time }}
                                            </td>
                                            <td style="text-align: center">
                                                {{ $item->sla_response_time }}
                                            </td>
                                            <td>{{ formatDate($item->sla_assignment) }}</td>
                                            <td>{{ formatDate($item->sla_respone) }}</td>
                                       
                                            <td>{{ formatDate($item->sla_revison) }}</td>
                                            <td>{{ formatDate($item->sla_revison_end) }}</td>
                                            <td>{{ formatDate($item->sla_pending) }}</td>
                                            <td>{{ formatDate($item->sla_pending_end) }}</td>
                                            <td>{{ formatDate($item->start_work) }}</td>
                                            <td>{{ formatDate($item->end_work) }}</td>
                                            <td>{{ formatDate($item->sla_resolved) }}</td>
                                            <td>{{ formatDate($item->sla_close) }}</td>
                                            <td>
                                                @if($item->rating=="1")
                                                    Disappointed
                                                @elseif($item->rating=="2")
                                                    Unsatisfied
                                                @elseif($item->rating=="3")
                                                    Quite satisfied
                                                @elseif($item->rating=="4")
                                                    Satisfied
                                                @elseif($item->rating=="5")
                                                    Very satisfied
                                                @endif
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
                        <div class="h5 text-white p-0 m-0">Description</div>
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
                           Submit
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
                <form method="POST" action="{{ route('sa.ticket-complain') }}">
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
                        <div class="input-group input-group-static mb-4">
                        <label class="text-dark">Comment</label>
                            <textarea id="comment" placeholder="write your comment hire .." class="form-control form-control-sm" style="border-radius:0.25rem !important" rows="3"
                                name="comment" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer py-2 bg-gray-200">
                        <button type="submit" class="btn btn-outline-warning btn-sm m-0">
                            Submit
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
    <script>
        $(document).ready(function() {
            $('.tableku').DataTable({
                dom: 'Blfrtip',
                "order": [],
                "showNEntries": true,
                buttons: [{
                        text: 'filter',
                        footer: true,
                        className: 'btn btn-sm btn-white btn-outline-primary shadow rounded filter'
                    },
                    {
                        extend: 'excelHtml5',
                        footer: true,
                        className: 'btn btn-sm btn-success shadow rounded'
                    },
                    {
                        extend: 'csvHtml5',
                        footer: true,
                        className: 'btn btn-sm btn-success shadow rounded'
                    },
                    {
                        extend: 'pdfHtml5',
                        footer: true,
                        orientation: 'landscape',
                        className: 'btn btn-sm btn-success shadow rounded'
                    },
                    {
                        extend: 'print',
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
            });
        });

        $('#Detail').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget)
                var problem = button.data('problem')// E// Extract info from data-* attributes
                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                var modal = $(this)
                // modal.find('.modal-title').text(recipient)
                modal.find('#problem_ticket').text(problem) // Extract info from data-* attributes
            });

        $(document).ready(function() {
            $('.filter').attr('data-bs-toggle', 'modal');
            $('.filter').attr('data-bs-target', '#exampleModal');


            $('#close').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var id = button.data('id') // Extract info from data-* attributes
                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                var modal = $(this)
                // modal.find('.modal-title').text(recipient)
                modal.find('#id_ticket').val(id)
            });

            $('#rating').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var id = button.data('id') // Extract info from data-* attributes
                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                var modal = $(this)
                // modal.find('.modal-title').text(recipient)
                modal.find('#id_ticket').val(id)
            });

            $('#complain').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget)
                var id = button.data('id') // Extract info from data-* attributes
                var code = button.data('code') // Extract info from data-* attributes
                var katagori = button.data('katagori') // Extract info from data-* attributes
                var status = button.data('status') // Extract info from data-* attributes
                var agent = button.data('agent') // E// Extract info from data-* attributes
                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                var modal = $(this)
                // modal.find('.modal-title').text(recipient)
                modal.find('#id_ticket').val(id) // Extract info from data-* attributes
                modal.find('#code_ticket').val(code) // Extract info from data-* attributes
                modal.find('#katagori_ticket').val(katagori) // Extract info from data-* attributes
                modal.find('#status_ticket').val(status) // Extract info from data-* attributes
                modal.find('#agent_ticket').val(agent) // Extract info from data-* attributes
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
        $('#close_sidebar_data').click(function (e) { 
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
                    content += '<tr><td>'+header[index]+'</td>';
                    content += '<td>&nbsp&nbsp:&nbsp&nbsp</td>';
                    content += '<td>'+ $(this).text()+'</td></tr>';
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
