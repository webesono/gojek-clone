<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
     <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
    
    {{-- My Style --}}
    <link rel="stylesheet" href="{{ asset('public/css/style.css') }}">

    {{-- <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.0.min.js"></script> --}}
    <title>Glone | {{ $title }}</title>
  </head>
  <body>
  
    

    @include('partials.navbar')

    <div class="container mt-4">
        @yield('container')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>

{{-- <!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Glone | {{ $title }}</title>
<!--

Lava Landing Page

https://templatemo.com/tm-540-lava-landing-page

-->

    <!-- Additional CSS Files -->

    <link rel="stylesheet" type="text/css" href="{{ asset('public/css/font-awesome.css') }}">

    <link rel="stylesheet" href="{{ asset('public/css/templatemo-lava.css') }}">

    <link rel="stylesheet" href="{{ asset('public/css/owl-carousel.css') }}">



</head>
  <body>
    
    @include('partials.navbar')

    <div class="container mt-4">
        @yield('container')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
     <!-- jQuery -->
     <script href="{{ asset('public/js/jquery-2.1.0.min.js') }}"></script>

     <!-- Bootstrap -->
     <script href="{{ asset('public/js/popper.js') }}"></script>
     <script href="{{ asset('public/js/bootstrap.min.js') }}"></script>
 
     <!-- Plugins -->
     <script href="{{ asset('public/js/owl-carousel.js') }}"></script>
     <script href="{{ asset('public/js/scrollreveal.min.js') }}"></script>
     <script href="{{ asset('public/js/waypoints.min.js') }}"></script>
     <script href="{{ asset('public/js/jquery.counterup.min.js') }}"></script>
     <script href="{{ asset('public/js/imgfix.min.js') }}"></script>
 
     <!-- Global Init -->
     <script href="{{ asset('public/js/custom.js') }}"></script>
 
  </body>
</html> --}}