<!DOCTYPE html >
<html lang="en">
    <head>

          <title>Welcome to JuanCreatives!</title>

          <link href="{{ asset('assets/img/logo_icon.png')}}" rel="shortcut icon" type="image/x-icon">

          <!-- Bootstrap Core CSS -->

          <link href="{{ asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
          <!-- Custom CSS -->
          <link href="{{ asset('assets/css/landing-page.css')}}" rel="stylesheet">
          <link href="{{ asset('assets/css/full-slider.css')}}" rel="stylesheet">
          <link href="{{ asset('assets/css/footer.css')}}" rel="stylesheet">


          <!-- Custom Fonts -->
          <link href="{{ asset('assets/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">

          <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">


        <!-- jQuery -->
          <script src="{{ asset('assets/js/jquery.js')}}"></script>

          <!-- Bootstrap Core JavaScript -->
          <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>

    </head>

<body>


        @include('includes.index-header')


        <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for Slides -->
        <div class="carousel-inner">
            <div class="item active">
                <!-- Set the first background image using inline CSS below. -->
                <div class="fill" style="background-image:url('assets/img/intro-bg.jpg');"></div>
                <div class="carousel-caption">
                    <h1>Showcase artworks you love!</h1>
                    <h2>and discover creative works</h2>
                    <a href="{{ URL::to('/signup') }}" class="btn btn-md" type="submit" value="Get Started" name="get_started">Get Started</a>
                </div>
            </div>
            <div class="item">
                <!-- Set the second background image using inline CSS below. -->
                <div class="fill" style="background-image:url('assets/img/paint.jpg');"></div>
                <div class="carousel-caption">
                    <h1>Showcase artworks you love!</h1>
                    <h2>and discover creative works</h2>
                    <a href="{{ URL::to('/signup') }}" class="btn btn-md" type="submit" value="Get Started" name="get_started">Get Started</a>
                </div>
            </div>
            <div class="item">
                <!-- Set the third background image using inline CSS below. -->
                <div class="fill" style="background-image:url('assets/img/img.png');"></div>
                <div class="carousel-caption">
                    <h1>Showcase artworks you love!</h1>
                    <h2>and discover creative works</h2>
                    <a href="{{ URL::to('/signup') }}" class="btn btn-md" type="submit" value="Get Started" name="get_started">Get Started</a>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>

    </header>

    <!-- Page Content -->
    <div class="content-section-a">
        <div class="container">
            <div class="row">
                <h2 class="section-heading">Featured Designs</h2>
            </div>
            <div class="row">
                <div class="col-sm-2">
                    <img src="assets/img/1.png">
                </div>
                <div class="col-sm-2">
                    <img src="assets/img/2.png">
                </div>
                <div class="col-sm-2">
                    <img src="assets/img/3.png">
                </div>
                <div class="col-sm-2">
                    <img src="assets/img/4.png">
                </div>
                <div class="col-sm-2">
                    <img src="assets/img/5.png">
                </div>
                <div class="col-sm-2">
                    <img src="assets/img/6.png">
                </div>
                <div class="col-sm-2">
                    <img src="assets/img/11.png">
                </div>
                <div class="col-sm-2">
                    <img src="assets/img/1.png">
                </div>
                <div class="col-sm-2">
                    <img src="assets/img/5.png">
                </div>
                <div class="col-sm-2">
                    <img src="assets/img/6.png">
                </div>
                <div class="col-sm-2">
                    <img src="assets/img/11.png">
                </div>
                <div class="col-sm-2">
                    <img src="assets/img/1.png">
                </div>
            </div>

        </div>
        <!-- /.container -->
    </div>
    <!-- /.content-section-a -->


    <div id="contact">
        <div class="container">
            <div class="row">
                <h2 class="section-heading">Get in touch</h2>
            </div>
            <form role="form" autocomplete="off" id="gitForm" method="post">
             <input name="_token" type="hidden" id="_token" value="{{ csrf_token() }}" />
            <div class="row">
                <div class="form-group">
                    <div class="input-group">
                        <input class="form-control" type="text" name="name" required="" placeholder="Name">
                    </div>
                    <div class="input-group">
                        <input class="form-control" type="email" onchange="isForgotEmailValid()" id="email" required="" name="email" placeholder="Email">
                        <div id="email-message" class="pull-left" style="font-size:11px;"></div>
                    </div>

                    <div class="input-group">
                        <textarea class="form-control" type="text" name="mess" required="" placeholder="Message"></textarea>
                    </div>

                    <div >
                        <input class="btn btn-md" type="button" onclick="getInTouch()" value="Submit">
                   </div>
                </div>
            </div>
            </form>
        </div>
    </div>
    <!-- /.banner -->


     @include('includes.loginmodal')
     @include('includes.forgotmodal')
     @include('includes.footer')
     @if (session('verification_msg'))
      <script>
        $('#loginmodal').modal('show');
      </script>
      @endif
     <script src="assets/js/landing.js"></script>
     <script src="assets/js/login.js"></script>
     <script src="assets/js/signup.js">"></script>
</body>
</html>
