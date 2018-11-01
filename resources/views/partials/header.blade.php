<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false"
        aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      <a class="navbar-brand" href="#">My Project</a>
    </div>
    <div id="app-navbar-collapse" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li class="{{request()->is('/') ? 'active' : ''}}"><a href="{{ url('/')}} ">
          <span class="glyphicon glyphicon-home"></span> Home </a></li>
        <li class="{{request()->is('about') ? 'active' : ''}}">
          <a href="#">About</a></li>
        <li class="{{request()->is('articles') ? 'active' : ''}}">
          <a href="{{url('articles')}}"><span class="glyphicon glyphicon-file">
              </span> Articles </a></li>
        <li class="{{request()->is('books') ? 'active' : ''}}">
          <a href="{{url('books')}}"><span class="glyphicon glyphicon-book">
            </span> Book </a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li class="dropdown-header">Nav header</li>
            <li><a href="#">Separated link</a></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
      <div class="collapse navbar-collapse" id="app-navbar-collapse">
        <!-- Left Side Of Navbar -->
        <ul class="nav navbar-nav">
          &nbsp;
        </ul>
        <!-- Right Side Of Navbar -->
        <ul class="nav navbar-nav navbar-right">
          <!-- Authentication Links -->
          @guest
          <li><a href="{{ route('login') }}"><span class="glyphicon glyphicon-user"></span> Login </a></li>
          {{--
          <li><a href="{{ route('register') }}">Register</a></li> --}} @else
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
              {{ Auth::user()->name }} <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">Logout</a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
                </form>
              </li>
            </ul>
          </li>
          @endguest
        </ul>
        {{--
        <li class="{{request()->is('login') ? 'active' : ''}}">
          <a href="{{url('login')}}"><span class="glyphicon glyphicon-user">
              </span> Login </a>
        </li> --}}
      </div>
      <!--/.nav-collapse -->
    </div>
</nav>