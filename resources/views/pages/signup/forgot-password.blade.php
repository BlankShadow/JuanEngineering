<!DOCTYPE html >
<html lang="en">
    <head>
        @include('plugins.plugins-styles')
    </head>

<body>

  @include('includes.index-header')

    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-wrap">
                    <h1 class="header">Forgot Password</h1>
                    <div class="linebox"> </div>
                    <div class="forgot-pas">
                       We'll send you an email with further instructions on how to reset your password.
                    </div>
                        <form role="form" action="javascript:;" method="post"  autocomplete="off">
                            <div class="form-group inner-addon left-addon">
                              <i class="glyphicon glyphicon-envelope"></i>
                              <input type="text" class="form-control" placeholder="Email Address">
                            </div>


                            <div class="form-group">
                                <input type="submit" class="btn btn-custom btn-lg btn-block" value="Send email">
                            </div>
                        </form>
                        <a class="pull-right">Cancel</a>

                          @include('includes.loginmodal')
                    </div>
                </div> <!-- /.col-xs-12 -->
            </div> <!-- /.row -->

        </div> <!-- /.container -->

    </section>


 @include('includes.footer')

</body>
</html>
