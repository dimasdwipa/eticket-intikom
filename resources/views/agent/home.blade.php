@extends('layouts.app', ['page' => 'Dashboard', 'pageSlug' => 'Dashboard', 'section' => 'Dashboard'])

@section('content')
    <div class="row">
        <div class="col-xl-3 col-sm-3 mb-xl-0 pb-5 mb-4">
            <a href="{{ url('agent?status=Awaiting Response') }}">
                <div class="card card-select">
                    <div class="card-header card-footer p-3 pt-2">
                        <div
                            class="icon icon-lg icon-shape bg-buttercup shadow-success text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">hourglass_top</i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Awaiting Response</p>
                            <h4 class="mb-0">{{ $tickets_icon->where('status', 'Awaiting Response')->count() }}</h4>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-sm-3 mb-xl-0 pb-5 mb-4">
            <a href="{{ url('agent?status=On Progress') }}">
                <div class="card card-select">
                    <div class="card-header card-footer p-3 pt-2">
                        <div
                            class="icon icon-lg icon-shape bg-seance shadow-success text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">handyman</i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">On Progress</p>
                            <h4 class="mb-0">{{ $tickets_icon->where('status', 'On Progress')->count() }}</h4>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-sm-3 mb-xl-0 pb-5 mb-4">
            <a href="{{ url('agent?status=Repairing') }}">
                <div class="card card-select">
                    <div class="card-header card-footer p-3 pt-2">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-secondary shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">home_repair_service</i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Repairing</p>
                            <h4 class="mb-0">{{ $tickets_icon->where('status', 'Repairing')->count() }}</h4>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-sm-3 mb-xl-0 pb-5 mb-4">
            <a href="{{ url('agent?status=Request Feedback') }}">
                <div class="card card-select">
                    <div class="card-header card-footer p-3 pt-2">
                        <div
                            class="icon icon-lg icon-shape bg-steel-blue shadow-info text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">announcement</i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Complain</p>
                            <h4 class="mb-0">{{ $tickets_icon->where('state', 'Request Feedback')->count() }}</h4>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-sm-3 mb-xl-0 pb-5 mb-4">
            <a href="{{ url('agent?status=Overdue') }}">
                <div class="card card-select">
                    <div class="card-header card-footer p-3 pt-2">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-warning shadow-info text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">report_problem</i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Overdue</p>
                            <h4 class="mb-0">
                                @php
                                    $indexku=0;
                                @endphp
                                @foreach ($tickets_icon->where('status', 'On Progress') as $item)
                                    @if (!empty($item->sla_respone))

                                        @if(empty($item->sla_resolved)||empty($item->sla_close))

                                            @if (\Carbon\Carbon::create($item->sla_respone)->addMinutes($item->sla_ticket_time) < \Carbon\Carbon::now())
                                                @php
                                                    $indexku=$indexku+1;
                                                @endphp
                                            @endif

                                        @elseif(!empty($item->sla_resolved))
                                            @if (\Carbon\Carbon::create($item->sla_respone)->addMinutes($item->sla_ticket_time) < \Carbon\Carbon::create($item->sla_resolved))
                                                @php
                                                    $indexku=$indexku+1;
                                                @endphp
                                            @endif
                                        @endif
                                    @endif
                                @endforeach
                                {{  $indexku }}
                            </h4>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-2 col-sm-3 mb-xl-0 pb-5 mb-4">
            <a href="{{ url('agent?status=Resolved') }}">
                <div class="card card-select">
                    <div class="card-header card-footer p-3 pt-2">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-primary2 shadow-success text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">assignment_turned_in</i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Resolved</p>
                            <h4 class="mb-0">{{ $tickets_icon->where('status', 'Resolved')->count() }}</h4>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-2 col-sm-3 mb-xl-0 pb-5 mb-4">
            <a href="{{ url('agent?status=Closed') }}">
                <div class="card card-select">
                    <div class="card-header card-footer p-3 pt-2">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-success shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">local_activity</i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Closed</p>
                            <h4 class="mb-0">{{ $tickets_icon->where('status', 'Closed')->count() }}</h4>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-2 col-sm-3 mb-xl-0 pb-5 mb-4">
            <a href="{{ url('agent?status=Pending') }}">
                <div class="card card-select">
                    <div class="card-header card-footer p-3 pt-2">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-danger shadow-info text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">running_with_errors</i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Pending</p>
                            <h4 class="mb-0">{{ $tickets_icon->where('status', 'Pending')->count() }}</h4>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-sm-3 mb-xl-0 pb-5 mb-4">
            <a href="{{ url('agent') }}">
                <div class="card card-select">
                    <div class="card-header card-footer p-3 pt-2">
                        <div
                            class="icon icon-lg icon-shape bg-chambray shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">folder_special</i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Total Tickets</p>
                            <h4 class="mb-0">{{ $tickets_icon->count() }}</h4>
                        </div>
                    </div>
                </div>
            </a>
        </div>

    </div>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n1 mx-3 z-index-2">
                        <div class="icon icon-shape bg-success shadow-info text-center border-radius-xl mt-n3 position-absolute">
                            <i class="material-icons opacity-10">business_center</i>
                        </div>
                    </div>
                    <div class="card-body px-0 py-5 pb-2">
                        <div class="table-responsive p-0">
                            <table
                                class="tableku2 align-items-center justify-content-center my-5 tablesorter table-hover striped">
                                <thead>

                                    <tr>
                                        <th>
                                            #Ticket</th>
                                        <th
                                            class="text-uppercase text-secondary text-xs font-weight-bolder text-center  ps-3">
                                            Created</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder  ps-3">
                                            Requestor
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder  ps-3">
                                            Category
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder  ps-3">
                                            Sub Category
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder  ps-3">
                                            BU
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder  ps-3">
                                            Problem
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder  ps-3">
                                            Assignment
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder  ps-3">
                                            Respon
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder text-center  ps-3">
                                            SLA Ticket (Minutes)
                                        </th>
                                        <th class="text-center">
                                            State
                                        </th>
                                        <th class="text-center">
                                            Status
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tickets->where('status',"!=", 'Closed') as $item)
                                        <tr>
                                            <td class="font-weight-bold">
                                                #{{ $item->code }}
                                            </td>
                                            <td>{{ date_format(date_create($item->created_at), 'd-M-y') }}</td>
                                            <td>{{ $item->user->name ?? '' }}</td>
                                            <td>{{ $item->katagori->kategori ?? '' }}</td>
                                            <td>{{ $item->sub_katagori->sub_kategori ?? '' }}</td>
                                            <td>{{ $item->bu }}</td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-sm btn-outline-info m-0 p-0 py-1"
                                                    style="width: 5rem" data-bs-toggle="modal" data-bs-target="#Detail"
                                                    data-problem="{{ $item->problem }}" >Detail</button>
                                            </td>
                                            <td >
                                                {{ $item->sla_assignment }}
                                            </td>
                                            <td >
                                                {{ $item->sla_respon }}
                                            </td>
                                            <td class="text-center">
                                                {{ $item->sla_ticket_time }}
                                            </td>
                                            <td class="text-center">
                                                {{ $item->state }}
                                            </td>
                                            <td class="text-center">
                                                {{ $item->status }}
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

@push('modal')
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
@endpush

@push('style')
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
@endpush

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.filter').attr('data-bs-toggle', 'modal');
            $('.filter').attr('data-bs-target', '#Detail');

            $('#Detail').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var problem = button.data('problem') // E// Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            // modal.find('.modal-title').text(recipient)
            modal.find('#problem_ticket').text(problem) // Extract info from data-* attributes
        });

            $('.tableku2').DataTable({
                dom: 'Blfrtip',
                "order": [],
                "showNEntries": true,
                buttons: [
                    {
                        text: 'filter',
                        footer: true,
                        className: 'd-none btn btn-sm btn-white btn-outline-primary shadow rounded filter'
                    },
                    {
                        extend: 'excelHtml5',
                        footer: true,
                        className: 'd-none btn btn-sm btn-success shadow rounded'
                    },
                    {
                        extend: 'csvHtml5',
                        footer: true,
                        className: 'd-none btn btn-sm btn-success shadow rounded'
                    },
                    {
                        extend: 'pdfHtml5',
                        footer: true,
                        orientation: 'landscape',
                        className: 'd-none btn btn-sm btn-success shadow rounded'
                    },
                    {
                        extend: 'print',
                        footer: true,
                        orientation: 'landscape',
                        className: 'd-none btn btn-sm btn-success shadow rounded',

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


        $(function() {
            var dateFormat = "yy-mm-dd",
                from = $("#start_date")
                .datepicker({
                    defaultDate: "+1w",
                    changeMonth: true,
                    numberOfMonths: 1
                })
                .on("change", function() {
                    to.datepicker("option", "minDate", getDate(this));
                }),
                to = $("#end_date").datepicker({
                    defaultDate: "+1w",
                    changeMonth: true,
                    numberOfMonths: 1
                })
                .on("change", function() {
                    from.datepicker("option", "maxDate", getDate(this));
                });

            function getDate(element) {
                var date;
                try {
                    date = $.datepicker.parseDate(dateFormat, element.value);
                } catch (error) {
                    date = null;
                }

                return date;
            }
        });
    </script>
@endpush
