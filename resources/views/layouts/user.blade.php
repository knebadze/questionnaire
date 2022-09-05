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
  <header class="p-3 mb-3 ">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            <a class="navbar-brand" href="#">
                <img src="{{asset('assets/img/logos/geostat.jpeg')}}" alt="" width="30" height="24" class="d-inline-block align-text-top">
               <span style="color: red">საქ</span>სტატი
              </a> 
        </ul>
        <div class="dropdown text-end">
          <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false"> 
            <i class="fa fa-user-circle-o"></i>
          </a>
          <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
            <li><a class="dropdown-item" href="{{url('profile')}}">პროფილი</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                 {{ __('გასვლა') }}
             </a>

             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                 @csrf
             </form></li>
          </ul>
        </div>
      </div>
    </div>
  </header>
<body id="top">
<div class="page_loader"></div>

  @yield('content')

  <footer class="footer mt-auto py-3 bg-light">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="{{asset('assets/img/logos/geostat.jpeg')}}" alt="" width="30" height="24" class="d-inline-block align-text-top">
       <span style="color: red">საქ</span>სტატი
      </a> 
    </div>
  </footer>

<!-- External JS libraries -->
<script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>

</body>


</html>
