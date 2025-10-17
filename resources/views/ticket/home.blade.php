@extends('layouts.app', ['page' => 'Dashboard', 'pageSlug' => 'Dashboard', 'section' => 'Dashboard'])

@section('content')
<div class="row align-items-center justify-content-center">
    <div class="col-xl-3 col-sm-6 mb-xl-0 pb-5 mb-4">
        <a href="{{ url('user') }}">
            <div class="card card-select">
                <div class="card-header card-footer p-3 pt-2">
                    <div
                        class="icon icon-lg icon-shape bg-chambray shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">folder_special</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Total Tickets</p>
                        <h4 class="mb-0">{{  $tickets_icon->count() }}</h4>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 pb-5 mb-4">
        <a href="{{ url('user?status=Open') }}">
            <div class="card card-select">
                <div class="card-header card-footer p-3 pt-2">
                    <div
                        class="icon icon-lg icon-shape bg-gradient-info shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">confirmation_number</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Open</p>
                        <h4 class="mb-0">{{  $tickets_icon->where('status','Open')->count() }}</h4>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 pb-5 mb-4">
        <a href="{{ url('user?status=On Progress') }}">
            <div class="card card-select">
                <div class="card-header card-footer p-3 pt-2">
                    <div
                        class="icon icon-lg icon-shape bg-seance shadow-success text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">handyman</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">On Progress</p>
                        <h4 class="mb-0">{{  $tickets_icon->where('status','On Progress')->count() }}</h4>
                    </div>
                </div>

                {{-- <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <p class="mb-0"><span class="text-danger text-sm font-weight-bolder">-2%</span> than yesterday</p>
                </div> --}}
            </div>
        </a>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 pb-5 mb-4">
        <a href="{{ url('user?status=Repairing') }}">
            <div class="card card-select">
                <div class="card-header card-footer p-3 pt-2">
                    <div
                        class="icon icon-lg icon-shape bg-gradient-secondary shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">home_repair_service</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Repairing</p>
                        <h4 class="mb-0">{{  $tickets_icon->where('status','Repairing')->count() }}</h4>
                    </div>
                </div>
                {{-- <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55% </span>than last week</p>
                </div> --}}
            </div>
        </a>
    </div>
    {{-- <div class="col-xl-3 col-sm-6 mb-xl-0 pb-5 mb-4">
        <a href="{{ url('user?status=Overdue') }}">
            <div class="card card-select">
                <div class="card-header card-footer p-3 pt-2">
                    <div
                        class="icon icon-lg icon-shape bg-gradient-warning shadow-info text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">report_problem</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Overdue</p>
                        <h4 class="mb-0">{{  $tickets_icon->where('status','Overdue')->count() }}</h4>
                    </div>
                </div>
            </div>
        </a>
    </div> --}}
    <div class="col-xl-3 col-sm-6 mb-xl-0 pb-5 mb-4">
        <a href="{{ url('user?status=Resolved') }}">
            <div class="card card-select">
                <div class="card-header card-footer p-3 pt-2">
                    <div
                        class="icon icon-lg icon-shape bg-gradient-primary2 shadow-success text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">assignment_turned_in</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Resolved</p>
                        <h4 class="mb-0">{{  $tickets_icon->where('status','Resolved')->count() }}</h4>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 pb-5 mb-4">
        <a href="{{ url('user?status=Closed') }}">
            <div class="card card-select">
                <div class="card-header card-footer p-3 pt-2">
                    <div
                        class="icon icon-lg icon-shape bg-gradient-success shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">local_activity</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Closed</p>
                        <h4 class="mb-0">{{  $tickets_icon->where('status','Closed')->count() }}</h4>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 pb-5 mb-4">
        <a href="{{ url('user?status=Pending') }}">
            <div class="card card-select">
                <div class="card-header card-footer p-3 pt-2">
                    <div
                        class="icon icon-lg icon-shape bg-gradient-danger shadow-info text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">running_with_errors</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Pending</p>
                        <h4 class="mb-0">{{  $tickets_icon->where('status','Pending')->count() }}</h4>
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
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-2 pb-1">
                        <h6 class="text-white text-capitalize ps-3">monthly report</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="tableku align-items-center justify-content-center my-0 tablesorter table-hover striped">
                            <thead>
                                <tr>
                                    <th>
                                        #TIcket</th>
                                    <th
                                        class="text-uppercase text-secondary text-xs font-weight-bolder text-center  ps-3">
                                        Created</th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder  ps-3">
                                        Tenants
                                    </th>
                                    <th
                                        class="text-uppercase text-secondary text-xs font-weight-bolder  ps-3">
                                        Category</th>
                                    <th>
                                        Assigned To
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
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder  ps-3">
                                        Status
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tickets as $item )
                                    <tr>
                                        <td class="font-weight-bold">#{{ $item->code }}</td>
                                        <td>{{ date_format(date_create($item->created_at),"d-M-y") }}</td>
                                        <td>{{ $item->team->name??""}}</td>
                                        <td>{{ $item->katagoriAllTeams->kategori }}</td>
                                        <td>{{ !empty($item->agent->name) ? $item->agent->name:'' }}</td>
                                        <td>{{ $item->estimation_date }}</td>
                                        <td>{{ $item->sla_resolved }}</td>
                                        <td>{{ $item->sla_close }}</td>
                                        <td>{{ $item->status}}</td>
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
        .dt-buttons{
            text-align: right;
            padding-left:1rem;
            padding-right:1rem;
            padding-bottom:0.5rem;
        }
        .dataTables_length{
            padding-left:1rem;
            padding-right:1rem;
        }
        .dataTables_filter{
            padding-left:1rem;
            padding-right:1rem;
        }
        .dataTables_info{
            padding-left:1rem;
            padding-right:1rem;
        }
        .dataTables_paginate {
            padding-left:1rem;
            padding-right:1rem;
        }
    </style>
@endpush

@push('scripts')
<script>
    $(document).ready( function () {
             $('.tableku').DataTable({
                 dom: 'Blfrtip',
                 "order": [],
                 "showNEntries" : true,
                 buttons: [
                     { extend: 'excelHtml5', footer: true ,className: 'btn btn-sm btn-success shadow rounded'},
                     { extend: 'csvHtml5', footer: true ,className: 'btn btn-sm btn-success shadow rounded'},
                     { extend: 'pdfHtml5', footer: true, orientation: 'landscape' , className: 'btn btn-sm btn-success shadow rounded'},
                     { extend: 'print',footer:true,orientation: 'landscape',className: 'btn btn-sm btn-success shadow rounded',

                     customize: function ( win ) {
                         $(win.document.body).find('div.dataTables_wrapper').addClass('display').html('text-align', 'center');
                         $(win.document.body).find('th').addClass('display').css('text-align', 'center');
                         $(win.document.body).find('th').addClass('display').css('color', '#000000');


                         $(win.document.body).find('table').addClass('display').css('font-size', '16px');
                         $(win.document.body).find('table').addClass('display').css('text-align', 'center');
                         $(win.document.body).find('tr:nth-child(odd) td').each(function (index) {
                             // $(this).css('background-color', '#D0D0D0');
                             $(this).css('color', '#000000');
                         });
                         $(win.document.body).find('h1').css('text-align', 'center');
                         $(win.document.body).find('td').addClass('display').css('color', '#000000 !important');
                     }
                     }
                 ],
                 language: {
                    'search' : '' /*Empty to remove the label*/
                    },
                 "paging":true,
                 "bAutoWidth": false,
             });
         } );


            $( function() {
            var dateFormat = "yy-mm-dd",
            from = $( "#start_date" )
                .datepicker({
                defaultDate: "+1w",
                changeMonth: true,
                numberOfMonths: 1
                })
                .on( "change", function() {
                to.datepicker( "option", "minDate", getDate( this ) );
                }),
            to = $( "#end_date" ).datepicker({
                defaultDate: "+1w",
                changeMonth: true,
                numberOfMonths: 1
            })
            .on( "change", function() {
                from.datepicker( "option", "maxDate", getDate( this ) );
            });

            function getDate( element ) {
            var date;
            try {
                date = $.datepicker.parseDate( dateFormat, element.value );
            } catch( error ) {
                date = null;
            }

            return date;
            }
        } );
</script>
@endpush
