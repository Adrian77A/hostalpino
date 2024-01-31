<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Prueba Adrian</title>
      <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css?family=Taviraj:300,400,500,600,700,800,900&display=swap"
            rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&display=swap" rel="stylesheet">

        <link rel="icon" type="image/x-icon" href="{{ asset('storage/images/logos/Logo_Hostal.png')}}">

        <!-- Scripts -->
        @vite('resources/css/bootstrap.min.css')
        @vite('resources/css/flaticon.css')
        @vite('resources/css/font-awesome.min.css')
        @vite('resources/css/jquery-ui.min.css')
        @vite('resources/css/linearicons.css')
        @vite('resources/css/magnific-popup.css')
        @vite('resources/css/nice-select.css')
        @vite('resources/css/owl.carousel.min.css')
        @vite('resources/css/slicknav.min.css')
        {{-- //style --}}
        @vite('resources/css/index.css')
        @vite('resources/css/app.css')
        {{-- @vite('resources/js/main.js') --}}
        {{-- @vite('resources/img/**') --}}
        {{-- @vite('resources/js/app.js') --}}

        <!-- Styles -->
        @livewireStyles
    </head>

  
    <body>

        @stack('modals')

        @livewireScripts
        
    </body>
    
</html>
