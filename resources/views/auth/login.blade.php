<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ url('') }}/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="{{ url('') }}/assets/img/favicon.png">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" type="text/css"
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <script src="{{ url("assets/font/js/all.js") }}" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background: url('assets/img/bg-smart-home-1.jpg') no-repeat center center;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            display: flex;
            width: 80%;
            min-height: 80vh;
            height: auto;
            max-width: 100%;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
            background: rgba(0, 0, 0, 0.6);
        }
        .left-panel {
            flex: 1;
            background: url('assets/img/mention-concept-illustration.png') no-repeat center center;
            background-size: cover;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 20px;
        }
        .right-panel {
            flex: 1;
            padding: 50px;
            margin :14px;
            display: flex;
            flex-direction: column;
            justify-content: center; /* Transparansi untuk elegan */
            border-radius: 0 15px 15px 0;
            color: white;
        }
        .right-panel h4,
        .right-panel p,
        .right-panel a {
            color: white !important;
        }
        .btn-primary {
            background: #2575fc;
            border: none;
            transition: 0.3s;
        }
        .btn-primary:hover {
            background:rgb(17, 98, 203);
        }
        .btn-outline-dark {
            color: white;
            border-color: white;
            transition: 0.3s;
        }
        .btn-outline-dark:hover {
            background: white;
            color: #000 !important;
        }
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                width: 90%;
            }
            .left-panel, .right-panel {
                width: 100%;
                padding: 30px;
            }
            .right-panel {
                border-radius: 0 0 15px 15px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="left-panel">
            <h3 class="text-white " style="    position: absolute; top: 16%;">Welcome to E-Ticket</h3>
        </div>
        <div class="right-panel">
        <img src="{{ url('assets/img/intikom.png') }}" alt="Logo" class="img-fluid mb-4 mx-auto d-block" style="max-width: 150px;">
            <h4 class="mb-3 text-center">Sign In</h4>
            <a class="btn btn-primary w-100 mb-3" href="{{ route('connect') }}" style=" border: none; display: flex; align-items: center; justify-content: center; gap: 8px;">
                <i class="fab fa-windows"></i> Sign in with Intikom SSO
            </a>

            @if (env('APP_TEST'))
                <p class="text-center">Development Login</p>
                <a class="btn btn-outline-dark w-100 mb-2" href="{{ url('test/38') }}">User 1</a>
                <a class="btn btn-outline-dark w-100 mb-2" href="{{ url('test/112') }}">User 2</a>
                <a class="btn btn-outline-dark w-100 mb-2" href="{{ url('test/217') }}">Agent 1</a>
                <a class="btn btn-outline-dark w-100 mb-2" href="{{ url('test/161') }}">Agent 2</a>
                <a class="btn btn-outline-dark w-100 mb-2" href="{{ url('test/16') }}">Supervisor</a>
            @endif
        </div>
    </div>
</body>
</html>
