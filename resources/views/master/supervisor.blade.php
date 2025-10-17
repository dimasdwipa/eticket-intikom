@extends('layouts.app', ['page' => 'Supervisor And Agent', 'pageSlug' => 'Supervisor And Agent', 'section' => 'Supervisor And Agent'])

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-2 pb-1">
                            <h6 class="text-white text-capitalize ps-3">Manage Supervisor</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table
                                class="datatable align-items-center justify-content-center my-0 tablesorter table-hover striped">
                                <thead>

                                    <tr>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder  ps-3">
                                            Name
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder  ps-3">
                                            Permission
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder  ps-3">
                                            Permission (days)
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder  ps-3">
                                            Permission Desc
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder  ps-3" width="30%">
                                            Email
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder  ps-3" width="30%">
                                            Employee Id
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder  ps-3" width="15%">
                                            Role
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xs font-weight-bolder  ps-3" width="15%">
                                            Action
                                        </th>
                                        @if (Auth::user()->role=="administrator")
                                        <th
                                            class="text-center text-uppercase text-secondary text-xs font-weight-bolder  ps-3" width="10%">
                                            Login As User
                                        </th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $item)
                                        <tr>
                                            <td>
                                                {{ $item->name }}
                                            </td>
                                            <td>
                                                {{ $item->permission }}
                                            </td>
                                            <td class="text-right">
                                                {{ $item->permission_days }}
                                            </td>
                                            <td>
                                                {{ $item->permission_desc }}
                                            </td>
                                            <td>
                                                <div class="input-group input-group-dynamic m-0">
                                                    <input type="email" placeholder="Email" autocomplete="on"
                                                        name="email"  value="{{  $item->email }}"
                                                        class="form-control form-control-sm Email email" required>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group input-group-dynamic m-0">
                                                    <input type="text" placeholder="Employee ID" autocomplete="on"
                                                        name="employee_id" value="{{  $item->employee_id }}"
                                                        class="form-control form-control-sm employee_id" required>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group input-group-dynamic m-0">
                                                    <select class="form-control form-control-sm select2 roleku" name="role" required>
                                                        <option></option>
                                                        <option @if( $item->role=="user") selected @endif value="user">User</option>
                                                        <option @if( $item->role=="agent") selected @endif value="agent">Agent</option>
                                                        <option @if( $item->role=="agent-user") selected @endif value="agent">Agent User</option>
                                                        <option @if( $item->role=="supervisor-agent") selected @endif value="supervisor-agent">Supervisor Agent</option>
                                                        <option @if( $item->role=="supervisor") selected @endif value="supervisor">Supervisor</option>
                                                        <option @if( $item->role=="supervisor-agent-user") selected @endif value="supervisor-agent-user">Supervisor Agent User</option>
                                                        @if (Auth::user()->role=="administrator")
                                                            <option @if( $item->role=="manager") selected @endif value="manager">Manager</option>
                                                        @endif
                                                    </select>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <input type="hidden" name="id" class="dataID" value="{{ $item->id }}">
                                                <button type="button"  class="btn btn-sm btn-success m-0 p-1 UpdateAgent"
                                                style="width: 5rem" >Edit</button>
                                            </td>
                                             <td>
                                                @if (Auth::user()->role=="administrator")
                                                    <a href="{{ route('user.show', $item->id) }}"  style="width: 5rem" class="btn btn-sm btn-warning m-0 p-1">
                                                        Login As User
                                                    </a>
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
    <form action="{{ route('user.update',0) }}" style="display: none" method="post" id="FormActionRole" >
        @method('PATCH')
        @csrf
        <input type="text" name="id" id="id">
        <input type="text" name="email" id="email">
        <input type="text" name="employee_id" id="employee_id">
        <input type="text" name="role" id="roleku">
    </form>
@endsection
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
                            {{-- <div class="col-6">
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
                            </div> --}}
                            <div class="col-6">
                                <div class="input-group input-group-static my-3">
                                    <select class="form-control form-control-sm select2" name="filter_by">
                                        <option disabled selected>Filter By</option>
                                        <option value="role" @if (isset($_GET['filter_by']) ? ($_GET['filter_by'] == 'role' ? true : false) : false) selected @endif>Status
                                        </option>
                                        <option value="employee_id" @if (isset($_GET['filter_by']) ? ($_GET['filter_by'] == 'employee_id' ? true : false) : false) selected @endif>Employee ID
                                        </option>
                                        <option value="name" @if (isset($_GET['filter_by']) ? ($_GET['filter_by'] == 'name' ? true : false) : false) selected @endif>Name
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
@endpush
@push('scripts')
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                tags: true,
                placeholder: "Select Role",
                width: '100%'
            });
            $('.datatable').DataTable({
                dom: 'Blfrtip',
                "order": [],
                "showNEntries": true,
                buttons: [{
                        text: 'Filter',
                        exportOptions: {
                            columns: ':not(:contains("Action"))'
                        },
                        footer: true,
                        className: 'btn btn-sm btn-white btn-outline-primary shadow rounded filter'
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
                        $('.select2').select2({
                        tags: true,
                        placeholder: "Select Agent",
                        width: '100%'
                        });

                        });
                    });
                },
            });
        });





        $(document).ready(function () {

            $('.filter').attr('data-bs-toggle', 'modal');
            $('.filter').attr('data-bs-target', '#exampleModal');

            $('table.datatable').on('click','Button', function (e) {
                var row = $(this).closest('tr'),
                dataID = $('.dataID', row),
                email = $('.email', row),
                employee_id = $('.employee_id', row),
                role = $('.roleku', row);

                console.log(role);

                $('#id').val(dataID.val());
                $('#email').val(email.val());
                $('#employee_id').val(employee_id.val());
                $('#roleku').val(role.val());
                $('#FormActionRole').submit();

            });

        });
    </script>
@endpush
