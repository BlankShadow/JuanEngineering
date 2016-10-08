
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
                <a class="dropdown-toggle" href="discover.php">Discover</a>
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Contest <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ URL::to('/contest') }}">Browse Contest</a></li>
                    <li class="divider"></li>
                    <li><a href="{{ URL::to('/contest/my-contest') }}">My Contest</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Shop <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ URL::to('/shop') }}">Creative Shop</a></li>
                    <li class="divider"></li>
                    <li><a href="{{ URL::to('/shop/my-shop') }}">My Shop</a></li>
                </ul>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li>
                <a href="" class="dropdown-toggle">
                  <i class="fa fa-envelope" aria-hidden="true"></i>
                </a>
            </li>
            <li>
                <a href="" class="dropdown-toggle">
                  <i class="fa fa-bell" aria-hidden="true"></i>
                </a>
            </li>
            
        </ul>
    </div>
</div>

</nav>
