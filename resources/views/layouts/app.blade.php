
<!DOCTYPE html>
<html lang="zxx">


<head>
    <title>ელექტრონული კითხვარი</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <!-- External CSS libraries -->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('assets/fonts/font-awesome/css/font-awesome.min.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('assets/fonts/flaticon/font/flaticon.css')}}">

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="{{asset('assets/img/logos/geostat.jpeg')}}" type="image/x-icon" >

    <!-- Google fonts -->
    <link href="fonts.googleapis.com/css22962.css?family=Jost:wght@300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">

    
    <!-- Custom Stylesheet -->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/style.css')}}">

</head>
<body id="top">
<div class="page_loader"></div>

  @yield('content')


<!-- External JS libraries -->
<script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>

</body>


</html>
