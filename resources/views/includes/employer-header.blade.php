
<nav class="navbar navbar-default">
<div class="container-fluid">

    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ asset('/') }}"><img id="logo" src="{{ asset('assets/img/Logo-yellow.png')}}"></a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li>
                <a class="dropdown-toggle" href="{{ URL::to('/discover') }}">Discover</a>
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle" href="{{ URL::to('/contest') }}">Contest </a>
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle" href="{{ URL::to('/shop') }}">Shop </a>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li>
                <a class="dropdown-toggle" href="">
                  <i class="fa fa-envelope" aria-hidden="true"></i>
                </a>
            </li>
            <li>
                <a class="dropdown-toggle" href="">
                  <i class="fa fa-bell" aria-hidden="true"></i>
                </a>
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                  <img src={{ asset("assets/img/profilepics/$picture") }}  height="20px" class="img-circle special-img">
                  <span><b class="caret"></b></span></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ URL::to('/account-settings') }}">Account Settings</a></li>
                    <li class="divider"></li>
                    <li><a href="{{ URL::to('/profile') }}">Profile</a></li>
                    <li class="divider"></li>
                    <li><a  href="{{ URL::to('/logout') }}">Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>

</nav>
