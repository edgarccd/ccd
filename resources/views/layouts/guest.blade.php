<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>CCD</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body style="background-image: url(/images/fondo.jpg);background-repeat: no-repeat;background-size: cover;">
 
    <div class="container-sm text-center">
        <div class="row align-items-center justify-content-center">
            <div class="col-sm-3">
                <br>
                <a href="/"><img src="/images/icono.png" alt="Inicio" style="width: 80px;height:80px;"></a>
                {{ $slot }}
                <br><br>
            </div>
            <div class="col-sm-3">
                <img src="/images/login.jpg" alt="CCD" class="img-fluid rounded float-start">
            </div>
        </div>
        <br>
    </div>
</body>

</html>
