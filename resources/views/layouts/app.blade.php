<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

</head>
<body class="">
    <div class="overflow-auto h-100" id="app">
      <header class="my-6">
        <side-bar></side-bar>
      </header>

        <div class="text-center css-loader pt-5">
          <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status"> <span class="sr-only">Loading...</span> 
          </div>
        </div>

        <main class="py-5 px-md-4 container-fluid text-break ">
            @yield('content')
        </main>
        
        <footer class="fixed-bottom bg-primadry py-3 px-3 text-center">
          <strong>Copyright &copy; 2021. </strong>
            All rights reserved.
        </footer>
        
    </div>
</body>
</html>
