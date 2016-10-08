<!DOCTYPE html >
<html lang="en">
    <head>
        @include('plugins.plugins-artist-styles')
    </head>

<body>

    <?=$header?>

    
    <div id="set" class="content-body-x">
        <div class="container min-x">
            <div class="row">
                <div class="col-md-12">
                   <p class="header">
                        Change email
                   </p>
                   <hr>
                   <div id="response-message" style="font-size:11px;margin-left:40px;">&nbsp;</div>
                </div> <!-- /.col-xs-12 -->
            </div> <!-- /.row -->
            <div class="row">
                <div class="col-md-12">
                  <form id="changeEmailForm">
                    <div class="input-group">
                        <div class="col-md-4"><br>
                            <label>New email address</label>
                        </div>
                        <div class="col-md-5">
                            <input class="form-control" id="email" type="email" name="email" placeholder="" required="required" onkeyup="doesEmailExists()">
                        </div>
                    </div>

                    <div class="input-group">
                        <div class="col-md-4"><br>
                            <label>Enter password to change email</label>
                        </div>

                        <div class="col-md-5">
                            <input class="form-control" id="password" type="password" name="password" placeholder="" required="required">
                        </div>
                        <div class="col-md-3">
                            <input class="btn btn-md-x" type="button" name="submit" value="Change email" onclick="changeEmail()">
                        </div>
                    </div>
                  </form>
                </div>

            </div>


            <div class="row">
                <div class="col-md-12">
                   <p class="header">
                        Change password
                   </p>
                   <hr>
                    <div id="response-message-password" style="font-size:11px;margin-left:40px;">&nbsp;</div>
                </div> <!-- /.col-xs-12 -->
            </div> <!-- /.row -->
            <div class="row">
                <div class="col-md-12">
                  <form id="changePasswordForm">
                    <div class="input-group">
                        <div class="col-md-4"><br>
                            <label>Current password</label>
                        </div>

                        <div class="col-md-5">
                            <input class="form-control" type="password" id="oldPassword" name="oldpassword" placeholder="" required="required">
                        </div>
                    </div>

                    <div class="input-group">
                        <div class="col-md-4"><br>
                            <label>New Password</label>
                        </div>

                        <div class="col-md-5">
                            <input class="form-control" type="password" id="newPassword" name="newpassword" placeholder="" required="required" >
                        </div>
                    </div>

                    <div class="input-group">
                        <div class="col-md-4"><br>
                            <label>Verify Password</label>
                        </div>

                        <div class="col-md-5">
                            <input class="form-control" type="password" id="verifyPassword" name="verifypassword" placeholder="" required="required" onkeyup="verifyPass()">
                        </div>

                        <div class="col-md-3">
                            <input class="btn btn-md-x" type="button"  value="Change password" onclick="changePassword()">
                        </div>
                    </div>
                  </form>
                </div>
            </div>

        </div>

         @include('includes.footer')
    </div>

    <script src="{{ asset('assets/js/jquery.js')}}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('assets/js/account-settings.js')}}"></script>

</body>
</html>
