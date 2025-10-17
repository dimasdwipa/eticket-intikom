<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ url('') }}/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="{{ url('') }}/assets/img/favicon.png">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="{{ url('') }}/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="{{ url('') }}/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="{{ url("assets/font/js/all.js") }}" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ url('') }}/assets/css/material-dashboard.css?v=3.0.4" rel="stylesheet" />
</head>

<body class="bg-gray-200">

    <main class="main-content  mt-0">
        <div class="page-header align-items-start min-vh-100"
            style="background-image: url('{{ url('assets/photo.png') }}');">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container my-auto">
                <div class="row">
                    <div class="col-lg-4 col-md-8 col-12 mx-auto">
                        <div class="card z-index-0 fadeIn3 fadeInBottom">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 card-blog card-plain">
                                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                                    <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Sign in</h4>
                                    <div class="row mt-3 justify-content-md-center">
                                        <div class="col-8 col-md-8 mx-auto">

                                                <img src="{{ url('assets/logo2.png') }}" alt="img-blur-shadow" class="img-fluid">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                {{-- <form method="POST" action="{{ route('login') }}" class="text-start">
                                    @csrf
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">{{ __('Username')}}</label>
                                        <input id="username" type="username"
                                            class="form-control @error('username') is-invalid @enderror" name="username"
                                            value="{{ old('username') }}" required autocomplete="username" autofocus>
                                        @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="input-group input-group-outline mb-3">
                                        <label class="form-label">{{ __('Password')}}</label>
                                        <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-check form-switch d-flex align-items-center mb-3">
                                        <input class="form-check-input" type="checkbox" id="rememberMe" checked>
                                        <label class="form-check-label mb-0 ms-3" for="rememberMe">Remember me</label>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-sm bg-gradient-primary w-100 my-4 mb-2" >{{ __('Login') }}</button>
                                    </div>
                                </form> --}}
                                <a  class="btn bg-gradient-primary w-100 my-4 mb-2"  href="{{ route('connect') }}"><i class='fab fa-microsoft'></i> Microsoft Account</a>
                                @if (env('APP_TEST'))
                                    <div for="" class="text-center text-title alert alert-small alert-warning mt-3 mb-0 p-1 text-white">Development Login</div>
                                    <a  class="btn btn-sm bg-gradient-dark w-100 my-1 mb-0 text-start"  href="{{ url('test/38') }}"><i class='fas fa-sign-in-alt'></i> User 1</a>
                                    <a  class="btn btn-sm bg-gradient-dark w-100 my-1 mb-0 text-start"  href="{{ url('test/112') }}"><i class='fas fa-sign-in-alt'></i> User 2</a>
                                    <a  class="btn btn-sm bg-gradient-dark w-100 my-1 mb-0 text-start"  href="{{ url('test/217') }}"><i class='fas fa-sign-in-alt'></i> Agent 1</a>
                                    <a  class="btn btn-sm bg-gradient-dark w-100 my-1 mb-0 text-start"  href="{{ url('test/161') }}"><i class='fas fa-sign-in-alt'></i> Agent 2</a>
                                    <a  class="btn btn-sm bg-gradient-dark w-100 my-1 mb-0 text-start"  href="{{ url('test/16') }}"><i class='fas fa-sign-in-alt'></i> Supervisor</a>
                                    <a  class="btn btn-sm bg-gradient-dark w-100 my-1 mb-0 text-start"  href="{{ url('test/16') }}"><i class='fas fa-sign-in-alt'></i> Supervisor</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       <!--     <footer class="footer position-absolute bottom-2 py-2 w-100">
                <div class="container">
                    <div class="row align-items-center justify-content-lg-between">
                        <div class="col-12 col-md-6 my-auto">
                            <div class="copyright text-center text-sm text-white text-lg-start">
                                © 2023,
                                made with <i class="fas fa-dove" aria-hidden="true"></i> by
                                <a href="https://mohfebrinurulqorik.com" class="font-weight-bold text-white"
                                    target="_blank">Grafis Media Website</a>
                                for a better business.
                            </div>
                        </div>
                    </div>
                </div>
            </footer> -->
        </div>
    </main>
    <!--   Core JS Files   -->
    <script src="{{ url('') }}/assets/js/core/popper.min.js"></script>
    <script src="{{ url('') }}/assets/js/core/bootstrap.min.js"></script>
    <script src="{{ url('') }}/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="{{ url('') }}/assets/js/plugins/smooth-scrollbar.min.js"></script>
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
    <script src="{{ url('') }}/assets/js/material-dashboard.min.js?v=3.0.4"></script>
</body>

</html>
