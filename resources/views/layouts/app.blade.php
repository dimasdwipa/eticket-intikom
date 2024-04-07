<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ url('assets') }}/img/favicon.png">
  <link rel="icon" type="image/png" href="{{ url('assets') }}/img/favicon.png">
  <title>{{$page}} - {{ config('app.name', 'Laravel') }}</title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
  <!-- Nucleo Icons -->
  <link href="{{ url('assets') }}/css/nucleo-icons.css" rel="stylesheet" />
  <link href="{{ url('assets') }}/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ url('assets') }}/css/color.min.css" rel="stylesheet" />
  <link id="pagestyle" href="{{ url('assets') }}/css/material-dashboard.css?v=3.0.4" rel="stylesheet" />
  <link href="{{url('/')}}/assets/select2/dist/css/select2.min.css" rel="stylesheet" />
  <link href="{{url('/') }}/assets/jquery-ui/jquery-ui.css" rel="stylesheet">
  <link href="{{url('/') }}/assets/datetimepicker/build/jquery.datetimepicker.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="{{ url('assets') }}/jquery-ui/jquery-ui.js"></script>
  <script src="{{ url('assets') }}/datetimepicker/build/jquery.datetimepicker.full.min.js"></script>
  <script src="{{url('/')}}/assets/select2/dist/js/select2.min.js"></script>
  <link rel="stylesheet" type="text/css" href="{{ url('assets') }}/DataTables/css/fixedColumns.bootstrap4.min.css"/>
  <link rel="stylesheet" type="text/css" href="{{ url('assets') }}/DataTables/css/jquery.dataTables.min.css"/>
<style>
    .input-group.required label:after {
        content:" *";
        color:red;
    }
    table.dataTable tbody tr:hover {
        background-color:#39a3ff10 !important;
        color: #000;
        cursor: pointer;
    }
    .odd{
        background:#cccccc20 !important;
    }
    .even{
        background:#fff !important;
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
    .text-right{
        text-align: right;
    }
    .card-select:hover {
        background-color:#39a3ff10 !important;
        color: #000;
        cursor: pointer;
    }
</style>
  @stack('style')
  @livewireStyles
</head>

<body class="g-sidenav-show  bg-gray-200">
@include('layouts.flash-message')
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="# " target="_blank">
        <img src="{{ url('assets') }}/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">{{ config('app.name', 'Laravel') }}</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " style="height: calc(100vh - 20px)" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        @include('layouts.slider')

        <hr class="horizontal light mb-0 mt-4">
        <li class="nav-item">
          <a class="nav-link text-white"  href="{{ route('logout') }}"
          onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">logout</i>
            </div>
            <span class="nav-link-text ms-1">{{ __('Sign Out') }}</span>
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
        </li>
        {{-- <li class="nav-item">
          <a class="nav-link text-white {{ $page == 'Dashboard' ? 'active bg-gradient-primary' : '' }}" href="{{ url('/') }}/pages/sign-up.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">assignment</i>
            </div>
            <span class="nav-link-text ms-1">Sign Up</span>
          </a>
        </li> --}}
      </ul>
    </div>
    {{-- <div class="sidenav-footer position-absolute w-100 bottom-0 ">
      <div class="mx-3">
        <a class="btn bg-gradient-primary mt-4 w-100" href="https://www.creative-tim.com/product/material-dashboard-pro?ref=sidebarfree" type="button">Upgrade to pro</a>
      </div>
    </div> --}}
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active text-capitalize" aria-current="page">{{ Auth::user()->role ?? $page}}</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">{{ $page }}</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group input-group-outline">
              <label class="form-label"></label>
            </div>
          </div>
          <ul class="navbar-nav  justify-content-end">
              @if (Auth::user()->role!='user')
            <li class="nav-item dropdown pe-3 mb-2 d-flex align-items-center ">
                <a href="javascript:;" class="nav-link text-body p-0 font-weight-bold" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                   <h6></h6> <i class="fa fa-building cursor-pointer"></i> &nbsp; {{ Auth::user()->currentTeam->name ?? ""}} &nbsp;<i class="fa fa-sort-desc cursor-pointer"></i>
                </a>
                <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                   <div class="pb-1">
                        <h6 class="font-weight-bold ">Tenants <br></h6>
                    </div>

                    @foreach ( Auth::user()->teams as $item )
                        @if(Auth::user()->current_team_id != $item->id )
                            <li class="mb-2">
                                <a class="dropdown-item border-radius-md active bg-gradient-secondary" href="{{route('teams.switch', $item->id)}}">
                                <div class="d-flex py-0 ">
                                    {{--  <div class="my-auto">
                                    <img src="{{ url('assets') }}/img/team-2.jpg" class="avatar avatar-sm  me-3 ">
                                    </div>  --}}
                                    <div class="d-flex flex-column justify-content-center">
                                    <h6 class="text-sm font-weight-normal  text-white p-0 m-0">
                                        <i class="fa fa-sign-in"></i> Switch To  <span class="font-weight-bold  text-white">{{ $item->name }}</span>
                                    </h6>
                                    </div>
                                </div>
                                </a>
                            </li>
                        @else
                            <li class="mb-2">
                                <div class="d-flex py-1">
                                    {{--  <div class="my-auto">
                                    <img src="{{ url('assets') }}/img/team-2.jpg" class="avatar avatar-sm  me-3 ">
                                    </div>  --}}
                                    <a class="dropdown-item border-radius-md active bg-gradient-primary" href="#">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="text-sm font-weight-normal mb-1 text-white">
                                                <i class="fa fa-check"></i> Active Is  <span class="font-weight-bold">{{ $item->name }}</span>
                                            </h6>
                                        </div>
                                    </a>
                                </div>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </li>
            @endif
            <li class="nav-item d-flex align-items-center">
              <a href="#" class="nav-link text-body font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none">{{ Auth::user()->name??'' }}</span>
              </a>
            </li>
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
             <li class="nav-item px-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0">
                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
              </a>
            </li>
            <livewire:job />
            <livewire:notification />

          </ul>


        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">

        @yield('content')
        @stack('modal')
      <footer class="footer py-4  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              {{-- <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                    document.write(new Date().getFullYear())
                </script>,
                made with <i class="fa fa-globe" aria-hidden="true"></i> by
                <a href="https://mohfebrinurulqorik.com.com" class="font-weight-bold"
                    target="_blank">Grafis Media Website</a>
                for a better web.
              </div> --}}
            </div>
            {{-- <div class="col-lg-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                  <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About Us</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a>
                </li>
              </ul>
            </div> --}}
          </div>
        </div>
      </footer>
    </div>
  </main>
  @livewireScripts

  <script>
    $(document).ready(function () {
        $('#close_alert').click(function(e) {
                $(".alert").alert('close');
            });
    });

  </script>


  @stack('scripts')

    <script type="text/javascript" charset="utf8" src="{{ url('assets') }}/DataTables/cdn/datatable.js"></script>
    <script type="text/javascript" charset="utf8" src="{{ url('assets') }}/DataTables/js/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="{{ url('assets') }}/DataTables/js/buttons/2.1.0/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" charset="utf8" src="{{ url('assets') }}/DataTables/js/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" charset="utf8" src="{{ url('assets') }}/DataTables/js/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" charset="utf8" src="{{ url('assets') }}/DataTables/js/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" charset="utf8" src="{{ url('assets') }}/DataTables/js/buttons/2.1.0/js/buttons.html5.min.js"></script>
    <script type="text/javascript" charset="utf8" src="{{ url('assets') }}/DataTables/js/buttons/2.1.0/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" charset="utf8" src="{{ url('assets') }}/DataTables/js/fixedcolumns/4.0.1/js/dataTables.fixedColumns.min.js"></script>
    <script type="text/javascript" charset="utf8" src="{{ url('assets') }}/DataTables/js/fixedheader/3.2.0/js/dataTables.fixedHeader.min.js"></script>
    <script type="text/javascript" charset="utf8" src="{{ url('assets') }}/DataTables/js/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script type="text/javascript" charset="utf8" src="{{ url('assets') }}/DataTables/js/buttons/2.2.2/js/buttons.print.min.js"></script>



  <!--   Core JS Files   -->
  <script src="{{ url('assets') }}/js/core/popper.min.js"></script>
  <script src="{{ url('assets') }}/js/core/bootstrap.min.js"></script>
  <script src="{{ url('assets') }}/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="{{ url('assets') }}/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="{{ url('assets') }}/js/plugins/chartjs.min.js"></script>

  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ url('assets') }}/js/material-dashboard.min.js?v=3.0.4"></script>

</body>

</html>
