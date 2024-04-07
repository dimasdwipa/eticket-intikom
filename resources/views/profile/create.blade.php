@extends('layouts.app', ['page' => 'Profile', 'pageSlug' => 'Profile', 'section' => 'Profile'])

@section('content')
    <div class="row mb-5">
        <div class="col-lg-3">
            <div class="card position-sticky top-1">
                <ul class="nav flex-column bg-white border-radius-lg p-3">
                    <li class="nav-item">
                        <a class="nav-link text-dark d-flex" data-scroll="" href="#profile">
                            <i class="material-icons text-lg me-2">person</i>
                            <span class="text-sm">Profile</span>
                        </a>
                    </li>
                    <li class="nav-item pt-2">
                        <a class="nav-link text-dark d-flex" data-scroll="" href="#basic-info">
                            <i class="material-icons text-lg me-2">receipt_long</i>
                            <span class="text-sm">Basic Info</span>
                        </a>
                    </li>
                    {{-- asdasd --}}
                    <li class="nav-item pt-2">
                        <a class="nav-link text-dark d-flex" data-scroll="" href="#password">
                            <i class="material-icons text-lg me-2">fingerprint</i>
                            <span class="text-sm">Permission</span>
                        </a>
                    </li>
                    {{-- <li class="nav-item pt-2">
                        <a class="nav-link text-dark d-flex" data-scroll="" href="#2fa">
                            <i class="material-icons text-lg me-2">security</i>
                            <span class="text-sm">2FA</span>
                        </a>
                    </li>
                    <li class="nav-item pt-2">
                        <a class="nav-link text-dark d-flex" data-scroll="" href="#accounts">
                            <i class="material-icons text-lg me-2">badge</i>
                            <span class="text-sm">Accounts</span>
                        </a>
                    </li>
                    <li class="nav-item pt-2">
                        <a class="nav-link text-dark d-flex" data-scroll="" href="#notifications">
                            <i class="material-icons text-lg me-2">campaign</i>
                            <span class="text-sm">Notifications</span>
                        </a>
                    </li>
                    <li class="nav-item pt-2">
                        <a class="nav-link text-dark d-flex" data-scroll="" href="#sessions">
                            <i class="material-icons text-lg me-2">settings_applications</i>
                            <span class="text-sm">Sessions</span>
                        </a>
                    </li>
                    <li class="nav-item pt-2">
                        <a class="nav-link text-dark d-flex" data-scroll="" href="#delete">
                            <i class="material-icons text-lg me-2">delete</i>
                            <span class="text-sm">Delete Account</span>
                        </a>
                    </li> --}}
                </ul>
            </div>
        </div>
        <div class="col-lg-9 mt-lg-0 mt-4">

            <div class="card card-body" id="profile">
                <div class="row justify-content-center align-items-center">
                    <div class="col-sm-auto col-4">
                        <div class="avatar avatar-xl position-relative">
                            <img src="{{ url('assets/img/avatar.jpg') }}" alt="bruce"
                                class="w-100 rounded-circle shadow-sm">
                        </div>
                    </div>
                    <div class="col-sm-auto col-8 my-auto">
                        <div class="h-100">
                            <h5 class="mb-1 font-weight-bolder">
                                {{ $data->name }}
                            </h5>
                            <p class="mb-0 font-weight-normal text-sm">
                                {{ $data->employee_id==null?'--':$data->employee_id }}
                            </p>
                            <p class="mb-0 font-weight-normal text-sm text-capitalize">
                                {{$data->role}}
                            </p>
                            <p class="mb-0 font-weight-normal text-sm text-capitalize">
                                {{ $data->position_corporate==null?'':$data->position_corporate }}
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-auto ms-sm-auto mt-sm-0 mt-3 d-flex">
                        {{-- <label class="form-check-label mb-0">
                            <small id="profileVisibility">Switch to invisible</small>
                        </label>
                        <div class="form-check form-switch ms-2 my-auto is-filled">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault23" checked=""
                                onchange="visible()">
                        </div> --}}
                    </div>
                </div>
            </div>

            <div class="card mt-4" id="basic-info">
                <div class="card-header">
                    <h5>Basic Info</h5>
                </div>
                <div class="card-body pt-0">
                    <form action="{{ route('profile.update',['profile'=>Auth::id()]) }}" method="POST">
                        @method('PUT')
                        @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="input-group required input-group-static">
                                <label>First Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Alec" value="{{ $data->name }}" onfocus="focused(this)"
                                    onfocusout="defocused(this)" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group input-group-static">
                                <label>Last Name</label>
                                <input type="text" name="last_name" class="form-control" placeholder="Thompson" value="{{ $data->last_name }}" onfocus="focused(this)"
                                    onfocusout="defocused(this)">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-6">
                            <div class="input-group required input-group-static">
                                <label>Email</label>
                                <input type="email" name="email" value="{{ $data->email }}" class="form-control" placeholder="example@email.com"
                                    onfocus="focused(this)" onfocusout="defocused(this)" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group required input-group-static">
                                <label>Confirm Email</label>
                                <input type="email"  name="email_confirmation" value="{{ $data->email }}" class="form-control" placeholder="example@email.com"
                                    onfocus="focused(this)" onfocusout="defocused(this)" required>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-6">
                            <div class="input-group input-group-static">
                                <label>Your location</label>
                                <input type="text" name="location" class="form-control" value="{{ $data->location }}" placeholder="Duren Tiga"
                                    onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group input-group-static">
                                <label>Phone Number</label>
                                <input type="number" name="phone" class="form-control" value="{{ $data->phone }}" placeholder="+62 81 252 081 088"
                                    onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-6">
                            <div class="input-group input-group-static">
                                <label>Business Unit</label>
                                <input type="text" name="departemen_corporate" class="form-control" value="{{ $data->departemen_corporate }}" placeholder="IT"
                                    onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group input-group-static">
                                <label>Position</label>
                                <input type="text" name="position_corporate" class="form-control" value="{{ $data->position_corporate }}" placeholder="Infra"
                                    onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-12" style="text-align: right">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            @if(Auth::user()->role!='user')
            <div class="card mt-4" id="password">
                <div class="card-header">
                    <h5>Permission</h5>
                </div>
                <div class="card-body pt-0">
                    <form action="{{ route('permission.update',['profile'=>Auth::id()]) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="input-group input-group-static">
                            <label>Status</label>
                           
                              <select class="form-control form-control-sm select2" name="permission" >
                                <option @if ("Active"==$data->permission) selected @endif>Active</option>
                                <option @if ("Non Active"==$data->permission) selected @endif>Non Active</option>
                              </select>
                        </div>
                        <div class="input-group input-group-static my-4">
                            <label>Permission Days</label>
                            <input type="number" name="permission_days" value="{{ $data->permission_days }}" class="form-control" 
                            >
                        </div>
                        <div class="input-group input-group-static">
                            <label>Permission Desc</label>
                            <input type="text" name="permission_desc" value="{{ $data->permission_desc }}" class="form-control" 
                            >
                        </div>
                        <button class="btn bg-gradient-dark btn-sm float-end mt-6 mb-0">Update Permission</button>
                    </form>
                </div>
            </div>
            @endif
            {{-- <div class="card mt-4" id="2fa">
                <div class="card-header d-flex">
                    <h5 class="mb-0">Two-factor authentication</h5>
                    <span class="badge badge-success ms-auto mb-auto">Enabled</span>
                </div>
                <div class="card-body">
                    <div class="d-flex">
                        <p class="my-auto">Security keys</p>
                        <p class="text-secondary text-sm ms-auto my-auto me-3">No Security Keys</p>
                        <button class="btn btn-sm btn-outline-dark mb-0" type="button">Add</button>
                    </div>
                    <hr class="horizontal dark">
                    <div class="d-flex">
                        <p class="my-auto">SMS number</p>
                        <p class="text-secondary text-sm ms-auto my-auto me-3">+4012374423</p>
                        <button class="btn btn-sm btn-outline-dark mb-0" type="button">Edit</button>
                    </div>
                    <hr class="horizontal dark">
                    <div class="d-flex">
                        <p class="my-auto">Authenticator app</p>
                        <p class="text-secondary text-sm ms-auto my-auto me-3">Not Configured</p>
                        <button class="btn btn-sm btn-outline-dark mb-0" type="button">Set up</button>
                    </div>
                </div>
            </div>

            <div class="card mt-4" id="accounts">
                <div class="card-header">
                    <h5>Accounts</h5>
                    <p class="text-sm">Here you can setup and manage your integration settings.</p>
                </div>
                <div class="card-body pt-0">
                    <div class="d-flex">
                        <img class="width-48-px" src="../../../assets/img/small-logos/logo-slack.svg"
                            alt="logo_slack">
                        <div class="my-auto ms-3">
                            <div class="h-100">
                                <h5 class="mb-0">Slack</h5>
                                <a class="text-sm text-body" href="javascript:;">Show less <i
                                        class="fas fa-chevron-up text-xs ms-1" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <p class="text-sm text-secondary ms-auto me-3 my-auto">Enabled</p>
                        <div class="form-check form-switch my-auto">
                            <input class="form-check-input" checked="" type="checkbox"
                                id="flexSwitchCheckDefault1">
                        </div>
                    </div>
                    <div class="ps-5 pt-3 ms-3">
                        <p class="mb-0 text-sm">You haven't added your Slack yet or you aren't authorized. Please add our
                            Slack Bot to your account by clicking on <a href="javascript">here</a>. When you've added the
                            bot, send your verification code that you have received.</p>
                        <div class="d-sm-flex bg-gray-100 border-radius-lg p-2 my-4 is-filled">
                            <p class="text-sm font-weight-bold my-auto ps-sm-2">Verification Code</p>
                            <input class="form-control form-control-sm ms-sm-auto mt-sm-0 mt-2 w-sm-15 w-40"
                                type="text" value="1172913" data-bs-toggle="tooltip" data-bs-placement="top"
                                aria-label="Copy!" data-bs-original-title="Copy!" onfocus="focused(this)"
                               >
                        </div>
                        <div class="d-sm-flex bg-gray-100 border-radius-lg p-2 my-4">
                            <p class="text-sm font-weight-bold my-auto ps-sm-2">Connected account</p>
                            <h6 class="text-sm ms-auto me-3 my-auto">hello@creative-tim.com</h6>
                            <button class="btn btn-sm bg-gradient-dark my-sm-auto mt-2 mb-0" type="button"
                                name="button">Delete</button>
                        </div>
                    </div>
                    <hr class="horizontal dark">
                    <div class="d-flex">
                        <img class="width-48-px" src="../../../assets/img/small-logos/logo-spotify.svg"
                            alt="logo_spotify">
                        <div class="my-auto ms-3">
                            <div class="h-100">
                                <h5 class="mb-0">Spotify</h5>
                                <p class="mb-0 text-sm">Music</p>
                            </div>
                        </div>
                        <p class="text-sm text-secondary ms-auto me-3 my-auto">Enabled</p>
                        <div class="form-check form-switch my-auto">
                            <input class="form-check-input" checked="" type="checkbox"
                                id="flexSwitchCheckDefault2">
                        </div>
                    </div>
                    <hr class="horizontal dark">
                    <div class="d-flex">
                        <img class="width-48-px" src="../../../assets/img/small-logos/logo-atlassian.svg"
                            alt="logo_atlassian">
                        <div class="my-auto ms-3">
                            <div class="h-100">
                                <h5 class="mb-0">Atlassian</h5>
                                <p class="mb-0 text-sm">Payment vendor</p>
                            </div>
                        </div>
                        <p class="text-sm text-secondary ms-auto me-3 my-auto">Enabled</p>
                        <div class="form-check form-switch my-auto">
                            <input class="form-check-input" checked="" type="checkbox"
                                id="flexSwitchCheckDefault3">
                        </div>
                    </div>
                    <hr class="horizontal dark">
                    <div class="d-flex">
                        <img class="width-48-px" src="../../../assets/img/small-logos/logo-asana.svg"
                            alt="logo_asana">
                        <div class="my-auto ms-3">
                            <div class="h-100">
                                <h5 class="mb-0">Asana</h5>
                                <p class="mb-0 text-sm">Organize your team</p>
                            </div>
                        </div>
                        <div class="form-check form-switch ms-auto my-auto">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault4">
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mt-4" id="notifications">
                <div class="card-header">
                    <h5>Notifications</h5>
                    <p class="text-sm">Choose how you receive notifications. These notification settings apply to the
                        things you’re watching.</p>
                </div>
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th class="ps-1" colspan="4">
                                        <p class="mb-0">Activity</p>
                                    </th>
                                    <th class="text-center">
                                        <p class="mb-0">Email</p>
                                    </th>
                                    <th class="text-center">
                                        <p class="mb-0">Push</p>
                                    </th>
                                    <th class="text-center">
                                        <p class="mb-0">SMS</p>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="ps-1" colspan="4">
                                        <div class="my-auto">
                                            <span class="text-dark d-block text-sm">Mentions</span>
                                            <span class="text-xs font-weight-normal">Notify when another user mentions you
                                                in a comment</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div
                                            class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                            <input class="form-check-input" checked="" type="checkbox"
                                                id="flexSwitchCheckDefault11">
                                        </div>
                                    </td>
                                    <td>
                                        <div
                                            class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                            <input class="form-check-input" type="checkbox"
                                                id="flexSwitchCheckDefault12">
                                        </div>
                                    </td>
                                    <td>
                                        <div
                                            class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                            <input class="form-check-input" type="checkbox"
                                                id="flexSwitchCheckDefault13">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="ps-1" colspan="4">
                                        <div class="my-auto">
                                            <span class="text-dark d-block text-sm">Comments</span>
                                            <span class="text-xs font-weight-normal">Notify when another user comments
                                                your item.</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div
                                            class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                            <input class="form-check-input" checked="" type="checkbox"
                                                id="flexSwitchCheckDefault14">
                                        </div>
                                    </td>
                                    <td>
                                        <div
                                            class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                            <input class="form-check-input" checked="" type="checkbox"
                                                id="flexSwitchCheckDefault15">
                                        </div>
                                    </td>
                                    <td>
                                        <div
                                            class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                            <input class="form-check-input" type="checkbox"
                                                id="flexSwitchCheckDefault16">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="ps-1" colspan="4">
                                        <div class="my-auto">
                                            <span class="text-dark d-block text-sm">Follows</span>
                                            <span class="text-xs font-weight-normal">Notify when another user follows
                                                you.</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div
                                            class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                            <input class="form-check-input" type="checkbox"
                                                id="flexSwitchCheckDefault17">
                                        </div>
                                    </td>
                                    <td>
                                        <div
                                            class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                            <input class="form-check-input" checked="" type="checkbox"
                                                id="flexSwitchCheckDefault18">
                                        </div>
                                    </td>
                                    <td>
                                        <div
                                            class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                            <input class="form-check-input" type="checkbox"
                                                id="flexSwitchCheckDefault19">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="ps-1" colspan="4">
                                        <div class="my-auto">
                                            <p class="text-sm mb-0">Log in from a new device</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div
                                            class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                            <input class="form-check-input" checked="" type="checkbox"
                                                id="flexSwitchCheckDefault20">
                                        </div>
                                    </td>
                                    <td>
                                        <div
                                            class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                            <input class="form-check-input" checked="" type="checkbox"
                                                id="flexSwitchCheckDefault21">
                                        </div>
                                    </td>
                                    <td>
                                        <div
                                            class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                            <input class="form-check-input" checked="" type="checkbox"
                                                id="flexSwitchCheckDefault22">
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card mt-4" id="sessions">
                <div class="card-header pb-3">
                    <h5>Sessions</h5>
                    <p class="text-sm">This is a list of devices that have logged into your account. Remove those that you
                        do not recognize.</p>
                </div>
                <div class="card-body pt-0">
                    <div class="d-flex align-items-center">
                        <div class="text-center w-5">
                            <i class="fas fa-desktop text-lg opacity-6" aria-hidden="true"></i>
                        </div>
                        <div class="my-auto ms-3">
                            <div class="h-100">
                                <p class="text-sm mb-1">
                                    Bucharest 68.133.163.201
                                </p>
                                <p class="mb-0 text-xs">
                                    Your current session
                                </p>
                            </div>
                        </div>
                        <span class="badge badge-success badge-sm my-auto ms-auto me-3">Active</span>
                        <p class="text-secondary text-sm my-auto me-3">EU</p>
                        <a href="javascript:;" class="text-primary text-sm icon-move-right my-auto">See more
                            <i class="fas fa-arrow-right text-xs ms-1" aria-hidden="true"></i>
                        </a>
                    </div>
                    <hr class="horizontal dark">
                    <div class="d-flex align-items-center">
                        <div class="text-center w-5">
                            <i class="fas fa-desktop text-lg opacity-6" aria-hidden="true"></i>
                        </div>
                        <p class="my-auto ms-3">Chrome on macOS</p>
                        <p class="text-secondary text-sm ms-auto my-auto me-3">US</p>
                        <a href="javascript:;" class="text-primary text-sm icon-move-right my-auto">See more
                            <i class="fas fa-arrow-right text-xs ms-1" aria-hidden="true"></i>
                        </a>
                    </div>
                    <hr class="horizontal dark">
                    <div class="d-flex align-items-center">
                        <div class="text-center w-5">
                            <i class="fas fa-mobile text-lg opacity-6" aria-hidden="true"></i>
                        </div>
                        <p class="my-auto ms-3">Safari on iPhone</p>
                        <p class="text-secondary text-sm ms-auto my-auto me-3">US</p>
                        <a href="javascript:;" class="text-primary text-sm icon-move-right my-auto">See more
                            <i class="fas fa-arrow-right text-xs ms-1" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="card mt-4" id="delete">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-sm-0 mb-4">
                        <div class="w-50">
                            <h5>Delete Account</h5>
                            <p class="text-sm mb-0">Once you delete your account, there is no going back. Please be
                                certain.</p>
                        </div>
                        <div class="w-50 text-end">
                            <button class="btn btn-outline-secondary mb-3 mb-md-0 ms-auto" type="button"
                                name="button">Deactivate</button>
                            <button class="btn bg-gradient-danger mb-0 ms-2" type="button" name="button">Delete
                                Account</button>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
@endsection

@push("scripts")
    <script>
       $(document).ready(function () {
           $('.select2').select2();
       }); 
    </script>
@endpush
