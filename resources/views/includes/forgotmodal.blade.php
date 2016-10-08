<!--- .modal -->

    <!-- Forgot Password Modal -->
    <div id="forgotmodal" class="modal fade" role="dialog">
      <div class="modal-dialog"  style="width:400px!important">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="row">
            <div class="col-md-12">
                <div style="padding:20px 50px;" id="login"> <!--Changed from form-wrap class-->
                <h1 class="header">Forgot password <button type="button" class="close" data-dismiss="modal">&times;</button> </h1>
                <div class="linebox"> </div><br><br>
                    <span class="ps center">Enter email address to recover account
                    </span>
                    <form role="form" id="forgot-form" method="post" autocomplete="off" >
                    <input name="_token" type="hidden" id="_token" value="{{ csrf_token() }}" />
                        <div class="form-group inner-addon left-addon">
                            <i class="glyphicon glyphicon-envelope"></i>
                            <input type="text" class="form-control" onchange="forgotEmail()" placeholder="Email Address" name="email" id="forgot-email">
                            <div id="forgot-email-message" class="pull-left" style="font-size:11px;"></div>
                            <!-- <div id="email-message" class="pull-left" style="font-size:11px;"></div> -->
                        </div>
                        <div class="form-group">
                            <input type="button" onclick="forgotSend()" class="btn btn-custom btn-lg btn-block" value="Send">
                        </div>
                    </form>

                </div>
            </div> <!-- /.col-xs-12 -->

          </div> <!-- /.container --><br><br>
        </div>
      </div>
    </div>
<!--- /.modal -->
