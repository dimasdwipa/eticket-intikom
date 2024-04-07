@extends('layouts.app', ['page' => 'Dashboard', 'pageSlug' => 'Dashboard', 'section' => 'Dashboard'])

@section('content')
    <div class="row align-items-center justify-content-center">
        <div class="col-xl-3 col-sm-6 mb-xl-0 pb-5 mb-4">
            <a href="{{ url('sa/summary-report-sumpervisor-sla-sa') }}">
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
        <div class="col-xl-3 col-sm-6 mb-xl-0 pb-5 mb-4">
            <a href="{{ url('sa/summary-report-sumpervisor-sla-sa?start_date=&end_date=&filter_by=status&keyword=Awaiting Response') }}">
            <div class="card card-select">
                <div class="card-header card-footer p-3 pt-2">
                    <div
                        class="icon icon-lg icon-shape bg-gradient-info shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">confirmation_number</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Awaiting Response</p>
                        <h4 class="mb-0">{{ $tickets_icon->where('status', 'Awaiting Response')->count() }}</h4>
                    </div>
                </div>
            </div>
            </a>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 pb-5 mb-4">
            <a href="{{ url('sa/summary-report-sumpervisor-sla-sa?start_date=&end_date=&filter_by=status&keyword=On Progress') }}">
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
        <div class="col-xl-3 col-sm-6 mb-xl-0 pb-5 mb-4">
            <a href="{{ url('sa/summary-report-sumpervisor-sla-sa?start_date=&end_date=&filter_by=status&keyword=Document Revison') }}">
                <div class="card card-select">
                    <div class="card-header card-footer p-3 pt-2">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-warning shadow-success text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">drive_file_rename_outline</i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Document Revison</p>
                            <h4 class="mb-0">{{  $tickets_icon->where('status','Document Revison')->count() }}</h4>
                        </div>
                    </div>
                    
                    {{-- <hr class="dark horizontal my-0">
                    <div class="card-footer p-3">
                        <p class="mb-0"><span class="text-danger text-sm font-weight-bolder">-2%</span> than yesterday</p>
                    </div> --}}
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-sm-3 mb-xl-0 pb-5 mb-4">
            <a href="{{ url('sa/summary-report-sumpervisor-sla-sa?start_date=&end_date=&filter_by=status&keyword=Complain') }}">
                <div class="card card-select">
                    <div class="card-header card-footer p-3 pt-2">
                        <div
                            class="icon icon-lg icon-shape bg-steel-blue shadow-info text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">announcement</i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Complain</p>
                            <h4 class="mb-0">{{ $tickets_icon->where('status', 'Complain')->count() }}</h4>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 pb-5 mb-4">
            <a href="{{ url('sa/summary-report-sumpervisor-sla-sa?start_date=&end_date=&filter_by=status&keyword=Pending') }}">
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
        <div class="col-xl-3 col-sm-6 mb-xl-0 pb-5 mb-4">
            <a href="{{ url('sa/summary-report-sumpervisor-sla-sa?start_date=&end_date=&filter_by=status&keyword=Re Prosess') }}">
                <div class="card card-select">
                    <div class="card-header card-footer p-3 pt-2">
                        <div
                            class="icon icon-lg icon-shape bg-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">settings_backup_restore</i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Re Prosess</p>
                            <h4 class="mb-0">{{  $tickets_icon->where('status','Re Prosess')->count() }}</h4>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 pb-5 mb-4">
            <a href="{{ url('sa/summary-report-sumpervisor-sla-sa?start_date=&end_date=&filter_by=status&keyword=Awaiting Update') }}">
                <div class="card card-select">
                    <div class="card-header card-footer p-3 pt-2">
                        <div
                            class="icon icon-lg icon-shape bg-dark shadow-info text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">supervisor_account</i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Awaiting Update</p>
                            <h4 class="mb-0">{{  $tickets_icon->where('status','Awaiting Update')->count() }}</h4>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 pb-5 mb-4">
            <a href="{{ url('sa/summary-report-sumpervisor-sla-sa?start_date=&end_date=&filter_by=status&keyword=Resolved') }}">
                <div class="card card-select">
                    <div class="card-header card-footer p-3 pt-2">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-primary2 shadow-success text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">assignment_turned_in</i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Finish</p>
                            <h4 class="mb-0">{{ $tickets_icon->where('status', 'Resolved')->count() }}</h4>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 pb-5 mb-4">
            <a href="{{ url('sa/summary-report-sumpervisor-sla-sa?start_date=&end_date=&filter_by=status&keyword=Overdue') }}">
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


    </div>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n1 mx-3 z-index-2">
                        <div class="icon icon-shape bg-gradient-warning shadow-info text-center border-radius-xl mt-n3 position-absolute">
                        <i class="material-icons opacity-10">directions_run</i>
                    </div>
                    </div>
                    <div class="card-body px-0 py-5 pb-2">
                        <div class="table-responsive ">
                            <table
                                class="tableku2 align-items-center justify-content-center my-0 tablesorter table-hover striped">
                                <thead>
                                    <tr>
                                        <th> #Sales Admin </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder  ps-3">
                                            Awaiting <br> Response
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder  ps-3">
                                            On Progress
                                        </th>
                                        
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder text-center">
                                            Doc. Revison
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder text-center">
                                            Complain
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder text-center">
                                            Pending
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder text-center">
                                            Awaiting Update
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder text-center">
                                            Reposess
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder text-center">
                                            Finish
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder  ps-3">
                                            Overdue
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder  ps-3">
                                            Total
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($agents as $item)
                                        <tr>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->tickets->where('status','Awaiting Response')->count()}}</td>
                                            <td>{{$item->tickets->where('status','On Progress')->count()}}</td>
                                            <td>{{$item->tickets->where('status','Document Revison')->count()}}</td>
                                            <td>{{$item->tickets->where('status','Complain')->count()}}</td>
                                            <td>{{$item->tickets->where('status','Pending')->count()}}</td>
                                            <td>{{$item->tickets->where('status','Awaiting Update')->count()}}</td>
                                            <td>{{$item->tickets->where('status','Re Prosess')->count()}}</td>
                                            <td>{{$item->tickets->where('status','Resolved')->count()}}</td>
                                            <td>{{$item->tickets()->where('status','On Progress')->whereRaw('DATE_ADD(sla_respone, INTERVAL sla_ticket_time MINUTE) < NOW()')->count()}}</td>
                                            <td>{{$item->tickets->count()}}</td>
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
            $('.tableku2').DataTable({
                dom: 'Blfrtip',
                "order": [],
                "showNEntries": true,
                buttons: [{
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

            $('.tableku').DataTable({
                dom: 'Blfrtip',
                "order": [],
                "showNEntries": true,
                buttons: [{
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
