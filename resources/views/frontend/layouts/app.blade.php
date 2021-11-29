<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('assets/frontend/images/bn-logo.png')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="{{asset('assets/frontend/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/bootstrap/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/style.css')}}">
    <title>Shera | Home </title>
    <script>
        var SRM = SRM || {};        
    </script>
</head>
<body>
    
    @include('frontend.inc.header')
    @yield('content')
    @include('frontend.inc.footer')

    <script src="{{asset('assets/frontend/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/main.js')}}"></script>
    <script src="{{asset('assets/frontend/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/frontend/bootstrap/js/select2.min.js')}}"></script>
</body>
</html>