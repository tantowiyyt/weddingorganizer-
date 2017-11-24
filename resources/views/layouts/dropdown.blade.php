<li class="dropdown">
    
    <a style="color:white;" href="#" class="dropdown-toggle user-data" data-toggle="dropdown" role="button" aria-expanded="false">
        {{ Auth::user()->name }} <span class="caret"></span>
    </a>

    <ul class="dropdown-menu" role="menu">
     <li>
        <a href="{{ url('/logout') }}"
          onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
            Logout
        </a>

       <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
         {{ csrf_field() }}
       </form>
     </li>
    </ul>
</li>