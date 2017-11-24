
    <nav class="navbar navbar-default navbar-fixed">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">
            <img src="{{ asset('img/logo.png') }}" style="width:125px"><br>
          </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="{{ Request::is('/') ? "active" : "" }}">
            <a href="/">Beranda</a></li>
            
            <li class="{{ Request::is('tentang_kami') ? "active" : "" }}">
            <a href="/tentang_kami">Tentang Kami</a></li>

            <li class="{{ Request::is('paket') ? "active" : "" }}"><a href="/paket">Paket Wedding</a></li>
            <li class="{{ Request::is('booking-guide') ? "active" : "" }}"><a href="/booking-guide">Cara Booking</a></li>
          </ul>
          
          <ul class="nav navbar-nav navbar-right">

           @if(! Auth::guest())
    
               @include('layouts.dropdown')
    
               @else
                <li><a href="/login" >Login</a></li>                      
               @endif
            
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

