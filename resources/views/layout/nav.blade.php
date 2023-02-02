<!-- Navbar -->
<nav class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
        </button>
        <a class="navbar-brand" href="/">Me
        <img src="{{ asset('assets/image/bird.jpg')}}" class="img-responsive img-circle margin" style="display:inline" alt="Bird" width="350" height="350">
      </a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
          @guest
          <li><a href="{{route('user.register')}}">Register</a></li>
          <li><a href="{{route('user.login')}}">Login</a></li>
          @endguest

          @auth
          <li><a href="#">{{Auth::user()->name}}</a></li> 
          <li><a href="#">{{auth()->user()->email}}</a></li> 
          <li><a href="{{route('user.logout')}}">Logout</a></li>
          @endauth
        </ul>
      </div>
    </div>
  </nav>
