<!-- App Interior -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>CCD</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div>        
        @include('layouts.navigation')
        @if (isset($header))
            <header>
                <div style="  box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.3);">
                    {{ $header }}
                </div>
            </header>
        @endif
        <main>
            {{ $slot }}
           
        </main>
        
    </div>
    
</body>

</html>
