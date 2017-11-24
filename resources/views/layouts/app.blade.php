<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Wedding Organizer @yield('title')</title>
    
    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    @yield('stylesheets')
    <style type="text/css">
        a:hover{
            background-color:#2980b9; 
        }
    </style>    

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar" style="background-color:#3498db; color:white;">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ asset('img/logo.png') }}" style="width:125px"><br>
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                            
                        @if(! Auth::guest())
    
                            @include('layouts.dropdown')
    
                        @else                            
    
                            <li><a class="btn btn-danger" href="{{ url('/login') }}">Login</a></li>
                            <li><a class="btn btn-success" href="{{ url('/register') }}">Register</a></li>
    
                        @endif
                        
                    </ul>
                </div>
            </div>
        </nav>

        @if(! Auth::guest())
            <div class="col-md-2 left_col">
        
     
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
         
                    <div class="menu_section">
                        <h3>Main Menu</h3>
                        <ul class="nav side-menu navbar-default">
                            <li class="active"><a href="/home">Beranda </a></li>
                            <li><a>Profil </a></li>
                            <li><a href="/booking">Booking</a>
                            <li><a href="/booking/status">Status Pemesanan </a></li>
                            <li><a href="/paket">Paket Wedding </a></li>
                        </ul>
                    </div>
                    
                </div>
        
            </div>

            <div class="col-md-8">
                
                @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        <strong>Success:</strong> {{ Session::get('success') }}
                    </div>
                @endif

                @if (count($errors) > 0)
                    <div class="alert alert-danger" role="alert"> 
                        <strong>Errors : </strong>
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>   
                    </div>
                @endif  
                @yield('content')
            
            </div>
                           


        @else

            @yield('content')
       
        @endif        
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    @yield('scripts')
</body>
</html>
