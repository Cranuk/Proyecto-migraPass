<!-- NOTE: Plantilla predeterminada sobre el diseño de la web-->
<!-- NOTE: layouts.web-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="{{ asset('migraPass.png')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>MigraPass - @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    {{--@include('includes.header')--}}
    <main>
        <div class="container">
            <div class="container-content">
                <!-- Contenido dinamico de la pagina -->
                @yield('content-main')
            </div>
        </div>
    </main>
    {{--@include('includes.footer')--}}
</body>
</html>
