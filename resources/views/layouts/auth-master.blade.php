<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.87.0">
     <!-- Favicon -->
     <link rel="icon" type="image/png" href="{{ asset('/img/1609823498ousc-logo.png') }}">
    <title>USC Car Information</title>

    <!-- Example of including SB Admin 2 CSS in your Blade layout -->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

        <style>
          .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
          }

          @media (min-width: 768px) {
            .bd-placeholder-img-lg {
              font-size: 3.5rem;
            }
          }
        </style>              

    
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
</head>
<body class="bg-gradient-primary">
    <div class="container">
        @yield('content') 
    </div>
    <!-- Example of including SB Admin 2 JS in your Blade layout -->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
</body>

</html>