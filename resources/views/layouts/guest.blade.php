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
    <br>
    <div id="cLogin">
        <div style="float: left;width: 45%;">
            <img src="/images/login.jpg" alt="CCD" style="width: 100%;height: 330px;;border-radius: 25px;">
        </div>
        <div style="float: right;width:50%">

            <div>
                <a href="/">
                    <img src="/images/icono.png" alt="Inicio" style="width: 80px;height:80px;">
                </a>
            </div>
            {{ $slot }}
        </div>
    </div>
    </div>
</body>

</html>