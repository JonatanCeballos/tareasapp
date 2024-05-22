<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{{asset('css/app.css') }}" rel="stylesheet" >

    <title>@yield('title', 'App Crud')</title>
  </head>
  <body style="
              background: #000000;  /* fallback for old browsers */
              background: -webkit-linear-gradient(to bottom, #434343, #000000);  /* Chrome 10-25, Safari 5.1-6 */
              background: linear-gradient(to bottom, #434343, #000000); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
              height: 100vh;
  ">

    @include('partials.header')

    <div class="container pt-5">
      
        @yield('content') 

    </div>
    

    <script src="{{asset('js/app.js') }}"></script>

  </body>
</html>