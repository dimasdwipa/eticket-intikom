<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guest Dashboard</title>

    <!-- Highcharts untuk Chart -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <!-- Tambahkan Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    <style>
        body {
            background-image: url('{{ asset("assets/img/office-dark.jpg") }}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
    
        .bg-primary {
            background-color: #1e3a8a;
        }
    
        .bg-secondary {
            background-color: #2563eb;
        }
    </style>

    @livewireStyles
</head>

<body class="bg-gray-100">

    <!-- Container Utama -->
    <div class="container-fluid mx-auto p-6" style="padding: 1% 5%">

        <!-- Bagian Daftar e-Ticket -->
      

        <!-- Bagian Statistik -->
        <div class="row justify-content-center align-items-center">
            <div class="col-md-12">
                <div class="bg-white/25 shadow-md shadow-white rounded-md p-6 mt-6 backdrop-blur-md">
                    <!-- Panggil Komponen Livewire List e-Ticket -->
                    @livewire('guest.eticket-list')
                </div>
            </div>
            <div class="col-md-6">
                @livewire('guest.eticket-statistik')
            </div>
            <div class="col-md-6">
                @livewire('guest.eticket-daily-statistik')
            </div>
        </div>

    </div>

    @livewireScripts
</body>

</html>
