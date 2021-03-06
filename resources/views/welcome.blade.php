<!doctype html>
<html lang="{{ app()->getLocale() }}">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>TEST - @yield('title')</title>

      <meta name="csrf-token" content="{{ csrf_token() }}">
      
      <!-- Scripts -->
      <script src="{{ asset('js/app.js') }}" defer></script>
      
      <!-- Styles -->
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
   </head>
   <body>
      <div id="app">
         <section class="hero is-primary is-medium">
            <!-- Hero head: will stick at the top -->
           @include('defaults.header')
            
            <!-- Hero content: will be in the middle -->

             @yield('content')

            <!-- Hero footer: will stick at the bottom -->
            @include('defaults.footer')
         </section>
      </div>
   </body>
</html>