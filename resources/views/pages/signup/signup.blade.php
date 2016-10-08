<!DOCTYPE html >
<html lang="en">
    <head>
        <meta name="csrf_token" content="{{ csrf_token() }}" />
        @include('plugins.plugins-styles')

    </head>

<body>

  @include('includes.index-header')

    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-wrap">
                    <h1 class="header">Sign Up</h1>
                    <div class="linebox"> </div>
                        <form role="form"  method="POST"  autocomplete="off" id="signUpForm">
                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                            <div class="form-group inner-addon left-addon" >
                              <i class="glyphicon glyphicon-envelope"></i>
                              <input type="email" class="form-control" name="email" placeholder="Email Address" id="email" required="" onchange="isEmailValidFunc()">
                              <div id="email-message" class="pull-left" style="font-size:11px;"></div>
                            </div>

                            <div class="form-group inner-addon left-addon">
                                <i class="glyphicon glyphicon-lock"></i>
                                <input type="password" name="password"  class="form-control" placeholder="Password" required="" id="password" onchange="isPasswordValidFunc()">
                                <div id="password-message" class="pull-left" style="font-size:11px;"></div>
                            </div>
                            <div class="form-group">
                                <img class="captcha" src="{{ asset('assets/img/hero-recaptcha-demo.gif')}}">
                            </div>
                            <div class="form-group">
                                <input type="button" class="btn btn-custom btn-lg btn-block" onclick="signUp()" value="Sign up">
                            </div>
                        </form>
                        <span class="ps"> Already have an account?    <a data-toggle="modal" data-target="#loginmodal" href="#">Log in</a>

                        <!-- <a href="sign_in.php#myModal" class="forget-modal" data-toggle="modal" data-target=".forget-modal">Log in</a> -->
                        </span>
                          @include('includes.forgotmodal')
                          @include('includes.loginmodal')

                    </div>
                </div> <!-- /.col-xs-12 -->
            </div> <!-- /.row -->

        </div> <!-- /.container -->

    </section>


  @include('includes.footer')
  <script src="{{ asset('assets/js/signup.js')}}"></script>
  <script src="{{ asset('assets/js/login.js')}}"></script>
  <script type="text/javascript"</script>
</body>
</html>
