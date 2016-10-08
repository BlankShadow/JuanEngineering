<!--- .modal -->

    <!-- Login Modal -->
    <div id="loginmodal" class="modal fade" role="dialog">
      <div class="modal-dialog"  style="width:400px!important">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="row">
            <div class="col-md-12">
                <div style="padding:20px 50px;" id="login"> <!--Changed from form-wrap class-->
                <h1 class="header">Log In <button type="button" class="close" data-dismiss="modal">&times;</button> </h1>
                <div class="linebox"> </div>
                    <form role="form"  method="post" id="loginForm" autocomplete="off">
                      @if (session('verification_msg'))
                         <label class="text-success" style="font-size:11px;">
                               {{ session('verification_msg') }}
                         </label>
                       @endif
                        <div id="login-message" class="pull-left" style="font-size:11px;"></div><br>
                        @if (session('verification_msg')) <br>  @endif
                         <div class="form-group inner-addon left-addon">
                            <i class="glyphicon glyphicon-envelope"></i>
                            <input type="text" class="form-control" name="email" placeholder="Email Address" id="email-login" onchange="doesEmailExists()" >
                            <div id="email-login-message" class="pull-left" style="font-size:11px;"></div>
                        </div>
                        <div class="form-group inner-addon left-addon">
                            <i class="glyphicon glyphicon-lock"></i>
                            <input type="password" name="password"  class="form-control left-addon" placeholder="Password" id="password-login" >
                            <div id="password-login-message" class="pull-left" style="font-size:11px;"></div>
                        </div>
                        <div class="form-group">
                            <input type="checkbox">
                            <span class="label">Remember Password</span>

                           <span class="forgot pull-right"><a href="#" onclick="forgotPass()">Forgot Password</a></span>
                        </div>
                        <div class="form-group">
                            <input type="button" onclick="login()" class="btn btn-custom btn-lg btn-block" value="Log in">
                        </div>
                    </form>
                    <span class="ps center"> Not yet a member? <a href="signup">Sign up</a>
                    </span>
                </div>
            </div> <!-- /.col-xs-12 -->

          </div> <!-- /.container --><br><br>
        </div>
      </div>
    </div>
<!--- /.modal -->
