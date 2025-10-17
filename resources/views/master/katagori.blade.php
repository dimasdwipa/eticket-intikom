@extends('layouts.app', ['page' => 'Category And SLA', 'pageSlug' => 'Category And SLA', 'section' => 'Category And SLA'])

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-2 pb-1">
                            <h6 class="text-white text-capitalize ps-3">Locations</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table
                                class="table-location align-items-center justify-content-center my-0 tablesorter table-hover striped">
                                <thead>

                                    <tr>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder  ps-3">
                                            Location
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xs font-weight-bolder  ps-3">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lokasi as $item)
                                        <tr>
                                            <td>
                                                <div class="input-group input-group-dynamic m-0">
                                                    <input type="text" placeholder="Location Name" autocomplete="on"
                                                        name="lokasi" value="{{ $item->lokasi }}"
                                                        class="form-control form-control-sm lokasi" required>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <input type="hidden" name="id" class="dataID"
                                                    value="{{ $item->id }}">
                                                <button type="button" class="btn btn-sm btn-warning m-0 p-1 UpdateLocation"
                                                    style="width: 5rem">Edit</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-2 pb-1">
                            <h6 class="text-white text-capitalize ps-3">Base Unit</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table
                                class="table-base-unit align-items-center justify-content-center my-0 tablesorter table-hover striped">
                                <thead>

                                    <tr>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder  ps-3">
                                            Base Unit
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder  ps-3">
                                            Desc
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder  ps-3">
                                            Super SA
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder  ps-3">
                                            Default SA
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xs font-weight-bolder  ps-3">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($baseunit as $item)
                                        <tr>
                                            <td>
                                                <div class="input-group input-group-dynamic m-0">
                                                    <input type="text" placeholder="BES" autocomplete="on" name="code"
                                                        value="{{ $item->code }}"
                                                        class="form-control form-control-sm code" required>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group input-group-dynamic m-0">
                                                    <input type="text" placeholder="Description" autocomplete="on"
                                                        name="desc" value="{{ $item->desc }}"
                                                        class="form-control form-control-sm desc" required>
                                                </div>
                                            </td>
                                            <td>
                                                <select class="form-control su_user su_user_id" name="su_user_id">
                                                    <option></option>
                                                    @foreach ($supervisors as $value)
                                                        <option @if ($value->id == $item->su_user_id) selected @endif
                                                            value="{{ $value->id }}">
                                                            @if ($value->permission == 'Non Active')
                                                                {{ $value->name }} ( leave )
                                                            @else
                                                                {{ $value->name }}
                                                            @endif
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control user user_id" name="user_id">
                                                    <option></option>
                                                    @foreach ($agents as $value)
                                                        <option @if ($value->id == $item->user_id) selected @endif
                                                            value="{{ $value->id }}">
                                                            @if ($value->permission == 'Non Active')
                                                                {{ $value->name }} ( leave )
                                                            @else
                                                                {{ $value->name }}
                                                            @endif
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="text-center">
                                                <input type="hidden" name="id" class="BaseUnitID"
                                                    value="{{ $item->id }}">
                                                <button type="button" class="btn btn-sm btn-warning m-0 p-1 BaseUnitUpdate"
                                                    style="width: 5rem">Edit</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-4">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-2 pb-1">
                            <h6 class="text-white text-capitalize ps-3">Categories</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table
                                class="table-category align-items-center justify-content-center my-0 tablesorter table-hover striped">
                                <thead>

                                    <tr>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder  ps-3">
                                            Category
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xs font-weight-bolder  ps-3">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($category as $item)
                                        <tr>
                                            <td>
                                                <div class="input-group input-group-dynamic m-0">
                                                    <input type="text" placeholder="Category Name" autocomplete="on"
                                                        name="kategori" value="{{ $item->kategori }}"
                                                        class="form-control form-control-sm kategori" required>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <input type="hidden" name="id" class="dataID"
                                                    value="{{ $item->id }}">
                                                <button type="button"
                                                    class="btn btn-sm btn-warning m-0 p-1 Update-Category"
                                                    style="width: 5rem">Edit</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-8">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-2 pb-1">
                            <h6 class="text-white text-capitalize ps-3">Sub Categories</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table
                                class="table-subcategory align-items-center justify-content-center my-0 tablesorter table-hover striped">
                                <thead>

                                    <tr>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder  ps-3">
                                            Sub Category
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder  ps-3">
                                            Category
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder  ps-3">
                                            Extend SLA Ticket
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder  ps-3">
                                            Extend SLA Reponse
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder  ps-3">
                                            Auto Assignment Time
                                        </th>
                                        <!-- <th class="text-uppercase text-secondary text-xs font-weight-bolder  ps-3">
                                                        Default Supervisor
                                                    </th>
                                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder  ps-3">
                                                        Default Agent
                                                    </th> -->
                                        <th
                                            class="text-center text-uppercase text-secondary text-xs font-weight-bolder  ps-3">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($subcategory as $item)
                                        <tr>
                                            <td>
                                                <div class="input-group input-group-dynamic m-0">
                                                    <input type="text" placeholder="Sub Category Name"
                                                        autocomplete="on" name="sub_kategori"
                                                        value="{{ $item->sub_kategori }}"
                                                        class="form-control form-control-sm sub_kategori" required>
                                                </div>
                                            </td>
                                            <td>{{ $item->katagori->kategori }}</td>
                                            <td>
                                                <div class="input-group input-group-dynamic m-0">
                                                    <input type="number" placeholder="Extend Ticket SLA Default"
                                                        autocomplete="on" name="extend_ticket_SLA_default"
                                                        value="{{ $item->extend_ticket_SLA_default }}"
                                                        class="form-control form-control-sm extend_ticket_SLA_default">
                                                </div>
                                            </td>

                                            <td>
                                                <div class="input-group input-group-dynamic m-0">
                                                    <input type="number" placeholder="Extend Response SLA Default"
                                                        autocomplete="on" name="extend_response_SLA_default"
                                                        value="{{ $item->extend_response_SLA_default }}"
                                                        class="form-control form-control-sm extend_response_SLA_default">
                                                </div>
                                            </td>

                                            <td>
                                                <div class="input-group input-group-dynamic m-0">
                                                    <input type="number" placeholder="Auto Send Assignment"
                                                        autocomplete="on" name="send_assignment_default"
                                                        value="{{ $item->send_assignment_default }}"
                                                        class="form-control form-control-sm send_assignment_default">
                                                </div>
                                            </td>
                                            <!-- <td>
                                                            <div class="input-group input-group-static m-0">
                                                                <select class="form-control supervisor supervisor_id" name="supervisor_id">
                                                                    <option></option>
                                                                    @foreach ($supervisors as $value)
    <option @if ($value->id == $item->supervisor_id) selected @endif value="{{ $value->id }}"> @if ($value->permission == 'Non Active')
    {{ $value->name }} ( leave )
@else
    {{ $value->name }}
    @endif
            </option>
    @endforeach
                                                                </select>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <select class="form-control agent agent_id" name="agent_id" >
                                                                <option></option>
                                                                @foreach ($agents as $value)
    <option @if ($value->id == $item->agent_id) selected @endif value="{{ $value->id }}"> @if ($value->permission == 'Non Active')
    {{ $value->name }} ( leave )
@else
    {{ $value->name }}
    @endif
            </option>
    @endforeach
                                                            </select>
                                                        </td> -->
                                            <td class="text-center">
                                                <input type="hidden" name="id" class="dataID"
                                                    value="{{ $item->id }}">
                                                <button type="button"
                                                    class="btn btn-sm btn-warning m-0 p-1 Update-SubCategory"
                                                    style="width: 5rem">Edit</button>
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
    <form action="{{ route('location.update', 0) }}" style="display: none" method="post" id="FormActionLocation">
        @method('PATCH')
        @csrf
        <input type="text" name="id" id="lokasiId">
        <input type="text" name="lokasi" id="lokasi">
    </form>
    <form action="{{ route('base-unit.update', 0) }}" style="display: none" method="post" id="FormActionBaseUnit">
        @method('PATCH')
        @csrf
        <input type="text" name="id" id="BaseUnitId">
        <input type="text" name="code" id="code">
        <input type="text" name="desc" id="desc">
        <input type="text" name="user_id" id="user_id">
        <input type="text" name="su_user_id" id="su_user_id">
    </form>
    <form action="{{ route('category.update', 0) }}" style="display: none" method="post" id="FormActionCategory">
        @method('PATCH')
        @csrf
        <input type="text" name="id" id="kategoriId">
        <input type="text" name="kategori" id="kategori">
    </form>
    <form action="{{ route('sub-category.update', 0) }}" style="display: none" method="post"
        id="FormActionSubCategory">
        @method('PATCH')
        @csrf
        <input type="text" name="id" id="sub_kategoriId">
        <input type="text" name="sub_kategori" id="sub_kategori">
        <input type="text" name="extend_ticket_SLA_default" id="extend_ticket_SLA_default">
        <input type="text" name="extend_response_SLA_default" id="extend_response_SLA_default">
        <input type="text" name="agent_id" id="agent_id">
        <input type="text" name="supervisor_id" id="supervisor_id">
        <input type="text" name="send_assignment_default" id="send_assignment_default">
    </form>
@endsection
@push('modal')
    <!-- location -->


    <!-- location -->
    <div class="modal fade" id="LocationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header py-2 bg-gray-primary">
                    <h6 class="modal-title" id="exampleModalLabel">New Location</h6>
                    <button type="button" class="btn btn-outline m-0 p-1" data-bs-dismiss="modal" aria-label="Close">
                        <span class="text-primary h7">
                            <i class="fas fa-external-link-alt"></i>
                        </span>
                    </button>
                </div>
                <form class="pt-1" method="POST" action="{{ route('location.store') }}">
                    <div class="modal-body">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="input-group input-group-dynamic m-0">
                                    <input type="text" placeholder="Location Name" autocomplete="on" name="lokasi"
                                        class="form-control form-control-sm" required>
                                </div>
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

    <!-- category -->
    <div class="modal fade" id="CategoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header py-2 bg-gray-primary">
                    <h6 class="modal-title" id="exampleModalLabel">New Category</h6>
                    <button type="button" class="btn btn-outline m-0 p-1" data-bs-dismiss="modal" aria-label="Close">
                        <span class="text-primary h7">
                            <i class="fas fa-external-link-alt"></i>
                        </span>
                    </button>
                </div>
                <form class="pt-1" method="POST" action="{{ route('category.store') }}">
                    <div class="modal-body">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="input-group input-group-dynamic m-0">
                                    <input type="text" placeholder="Category Name" autocomplete="on" name="kategori"
                                        class="form-control form-control-sm" required>
                                </div>
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

    <!-- location -->
    <div class="modal modal-lg fade" id="SubCategoryModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header py-2 bg-gray-primary">
                    <h6 class="modal-title" id="exampleModalLabel">New Sub Category</h6>
                    <button type="button" class="btn btn-outline m-0 p-1" data-bs-dismiss="modal" aria-label="Close">
                        <span class="text-primary h7">
                            <i class="fas fa-external-link-alt"></i>
                        </span>
                    </button>
                </div>
                <form class="pt-3" method="POST" action="{{ route('sub-category.store') }}">
                    <div class="modal-body">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="input-group input-group-dynamic mb-4">
                                    <input type="text" placeholder="Sub Category Name" autocomplete="on"
                                        name="sub_kategori" class="form-control form-control-sm" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group input-group-static mb-4">
                                    <select class="form-control form-control-sm select2" name="katagori_id" required>
                                        <option></option>
                                        @foreach ($category as $item)
                                            <option value="{{ $item->id }}">{{ $item->kategori }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="input-group input-group-dynamic mb-3">
                                    <input type="number" placeholder="Auto Send Assignment" autocomplete="on"
                                        name="send_assignment_default"
                                        class="form-control form-control-sm send_assignment_default">
                                </div>
                            </div>

                            <!-- <div class="col-6">
                                            <div class="input-group input-group-static mb-3">
                                                <select class="form-control agent agent_id" name="agent_id">
                                                    <option></option>
                                                    @foreach ($agents as $value)
    <option value="{{ $value->id }}"> @if ($value->permission == 'Non Active')
    {{ $value->name }} ( leave )
@else
    {{ $value->name }}
    @endif
            </option>
    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="input-group input-group-static mb-3">
                                                <select class="form-control supervisor supervisor_id" name="supervisor_id">
                                                    <option></option>
                                                    @foreach ($supervisors as $value)
    <option value="{{ $value->id }}"> @if ($value->permission == 'Non Active')
    {{ $value->name }} ( leave )
@else
    {{ $value->name }}
    @endif
            </option>
    @endforeach
                                                </select>
                                            </div>
                                        </div> -->
                            <div class="col-6">
                                <div class="input-group input-group-dynamic mb-4">
                                    <input type="number" placeholder="Extend Ticket SLA Default" autocomplete="on"
                                        name="extend_ticket_SLA_default"
                                        class="form-control form-control-sm extend_ticket_SLA_default">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group input-group-dynamic mb-4">
                                    <input type="number" placeholder="Extend Response SLA Default" autocomplete="on"
                                        name="extend_response_SLA_default"
                                        class="form-control form-control-sm extend_response_SLA_default">
                                </div>
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


    <div class="modal fade" id="BaseUnitModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header py-2 bg-gray-primary">
                    <h6 class="modal-title" id="exampleModalLabel">Base Unit</h6>
                    <button type="button" class="btn btn-outline m-0 p-1" data-bs-dismiss="modal" aria-label="Close">
                        <span class="text-primary h7">
                            <i class="fas fa-external-link-alt"></i>
                        </span>
                    </button>
                </div>
                <form class="pt-1" method="POST" action="{{ route('base-unit.store') }}">
                    <div class="modal-body">
                        @csrf
                        <div class="row">
                            <div class="col-4">
                                <div class="input-group input-group-dynamic m-0">
                                    <input type="text" placeholder="BES" autocomplete="on" name="code"
                                        class="form-control form-control-sm" required>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="input-group input-group-dynamic m-0">
                                    <input type="text" placeholder="Description" autocomplete="on" name="desc"
                                        class="form-control form-control-sm" required>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="input-group input-group-static mt-3">
                                    <select class="form-control user user_id" name="user_id">
                                        <option>Select Defaul SA</option>
                                        @foreach ($agents as $value)
                                            <option value="{{ $value->id }}">
                                                {{ $value->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div>
                                    </div>
                                    <div class="col-12">
                                        <div class="input-group input-group-static mt-3">
                                            <select class="form-control su_user su_user_id" name="su_user_id">
                                                <option>Select Defaul Super SA</option>
                                                @foreach ($supervisors as $value)
                                                    <option value="{{ $value->id }}">
                                                        {{ $value->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <div>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer py-2 bg-gray-200" style="width:100%">
                                        <button type="submit" class="btn btn-outline-success btn-sm m-0">
                                            Submit
                                        </button>
                                    </div>
                </form>
            </div>
        </div>
    </div>
@endpush
@push('scripts')
    <style>
        [aria-disabled="true"] {
            background-image: linear-gradient(195deg, #747b8a 0%, #495361 100%);
            color: #fff !important;
        }
    </style>
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                tags: true,
                placeholder: "Select Category",
                width: '100%'
            });
            $('.agent').select2({
                tags: true,
                placeholder: "Select Agent",
                width: '100%'
            });
            $('.supervisor').select2({
                tags: true,
                placeholder: "Select Supervisor",
                width: '100%'
            });
            $('.user').select2({
                tags: true,
                placeholder: "Select Default SA",
                width: '100%'
            });
            $('.su_user').select2({
                tags: true,
                placeholder: "Select Super SA",
                width: '100%'
            });

            // base unit table
            $('.table-base-unit').DataTable({
                dom: 'Blfrtip',
                "order": [],
                "showNEntries": true,
                buttons: [{
                        text: 'Add New',
                        footer: true,
                        className: 'btn btn-sm btn-white btn-outline-primary shadow rounded addbase-unit'
                    }
                ],
                language: {
                    'search': '' /*Empty to remove the label*/
                },
                "paging": true,
                "bAutoWidth": false,
                // initComplete: function() {
                // $(this).on('draw.dt', function() {
                //     $(document).ready(function() {
                //         $('.agent').select2({
                //         tags: true,
                //         placeholder: "Select Agent",
                //         width: '100%'
                //         });

                //         });
                //     });
                // },
            });

            // location
            $('.table-location').DataTable({
                dom: 'Blfrtip',
                "order": [],
                "showNEntries": true,
                buttons: [{
                        text: 'Add New',
                        footer: true,
                        className: 'btn btn-sm btn-white btn-outline-primary shadow rounded addlocation'
                    }
                ],
                language: {
                    'search': '' /*Empty to remove the label*/
                },
                "paging": true,
                "bAutoWidth": false,
                // initComplete: function() {
                // $(this).on('draw.dt', function() {
                //     $(document).ready(function() {
                //         $('.agent').select2({
                //         tags: true,
                //         placeholder: "Select Agent",
                //         width: '100%'
                //         });

                //         });
                //     });
                // },
            });

            // katagori

            $('.table-category').DataTable({
                dom: 'Blfrtip',
                "order": [],
                "showNEntries": true,
                buttons: [{
                        text: 'Add New',
                        footer: true,
                        className: 'btn btn-sm btn-white btn-outline-primary shadow rounded addcategory'
                    }
                ],
                language: {
                    'search': '' /*Empty to remove the label*/
                },
                "paging": true,
                "bAutoWidth": false,
                // initComplete: function() {
                // $(this).on('draw.dt', function() {
                //     $(document).ready(function() {
                //         $('.agent').select2({
                //         tags: true,
                //         placeholder: "Select Agent",
                //         width: '100%'
                //         });

                //         });
                //     });
                // },
            });

            // sub-categori
            $('.table-subcategory').DataTable({
                dom: 'Blfrtip',
                "order": [],
                "showNEntries": true,
                initComplete: function() {
                    $(this).on('draw.dt', function() {
                        $(document).ready(function() {
                            $('.agent').select2({
                                tags: true,
                                placeholder: "Select Agent",
                                width: '100%',

                            });
                            $('.supervisor').select2({
                                tags: true,
                                placeholder: "Select Supervisor",
                                width: '100%',

                            });

                        });
                    });
                },
                buttons: [{
                        text: 'Add New',
                        footer: true,
                        className: 'btn btn-sm btn-white btn-outline-primary shadow rounded addsub-category'
                    }

                ],
                language: {
                    'search': '' /*Empty to remove the label*/
                },
                "paging": true,
                "bAutoWidth": false,
            });
        });




        $(document).ready(function() {
            $('.addlocation').attr('data-bs-toggle', 'modal');
            $('.addlocation').attr('data-bs-target', '#LocationModal');
            $('.addbase-unit').attr('data-bs-toggle', 'modal');
            $('.addbase-unit').attr('data-bs-target', '#BaseUnitModal');
            $('.addcategory').attr('data-bs-toggle', 'modal');
            $('.addcategory').attr('data-bs-target', '#CategoryModal');
            $('.addsub-category').attr('data-bs-toggle', 'modal');
            $('.addsub-category').attr('data-bs-target', '#SubCategoryModal');
        });


        $(document).ready(function() {
            $('table.table-base-unit').on('click', 'Button', function(e) {

                console.log('oke');
                var row = $(this).closest('tr'),
                    dataID = $('.BaseUnitID', row),
                    code = $('.code', row);
                desc = $('.desc', row);
                user_id = $('.user_id', row);
                su_user_id = $('.su_user_id', row);

                $('#BaseUnitId').val(dataID.val());
                $('#code').val(code.val());
                $('#desc').val(desc.val());
                $('#user_id').val(user_id.val());
                $('#su_user_id').val(su_user_id.val());
                $('#FormActionBaseUnit').submit();

            });

            $('table.table-location').on('click', 'Button', function(e) {

                var row = $(this).closest('tr'),
                    dataID = $('.dataID', row),
                    lokasi = $('.lokasi', row);

                $('#lokasiId').val(dataID.val());
                $('#lokasi').val(lokasi.val());
                $('#FormActionLocation').submit();

            });
            $('table.table-category').on('click', 'Button', function(e) {
                console.log(123132);
                var row = $(this).closest('tr'),
                    dataID = $('.dataID', row),
                    kategori = $('.kategori', row);

                $('#kategoriId').val(dataID.val());
                $('#kategori').val(kategori.val());
                $('#FormActionCategory').submit();

            });
            $('table.table-subcategory').on('click', 'Button', function(e) {

                var row = $(this).closest('tr'),
                    dataID = $('.dataID', row),
                    sub_kategori = $('.sub_kategori', row);
                extend_ticket_SLA_default = $('.extend_ticket_SLA_default', row);
                extend_response_SLA_default = $('.extend_response_SLA_default', row);
                send_assignment_default = $('.send_assignment_default', row);
                agent_id = $('.agent_id', row);
                supervisor_id = $('.supervisor_id', row);

                $('#sub_kategoriId').val(dataID.val());
                $('#agent_id').val(agent_id.val());
                $('#supervisor_id').val(supervisor_id.val());
                $('#sub_kategori').val(sub_kategori.val());
                $('#extend_ticket_SLA_default').val(extend_ticket_SLA_default.val());
                $('#extend_response_SLA_default').val(extend_response_SLA_default.val());
                $('#send_assignment_default').val(send_assignment_default.val());
                $('#FormActionSubCategory').submit();

            });
        });
    </script>
@endpush
