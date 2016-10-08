<!DOCTYPE html >
<html lang="en">
    <head>
        @include('plugins.plugins-styles')
    </head>

<body>

        @include('includes.index-header')



          <div id="verify">
      	    <div class="container">
      	    	<div class="row">
      	    	    <div class="col-md-12">
      	        	    <div class="form-wrap">
      	                   <p class="p-bigger">A verification email was sent to your email <span><?php echo $email?></span>. <br> Please check your email and verify your account to get started</p>
                             <br>
                             <p>
                                <a href="<?php echo url('/').'/signup/verifyaccount/'.$userid.'/'.$verificationCode;?>">Click this link. (Temporary)</a>
                                  <i>Haven't received the email? <a href="verifyaccount"> Resend verification email </i></a>
                             </p>
      	        	    </div>
      	    		</div> <!-- /.col-xs-12 -->
      	    	</div> <!-- /.row -->
      	    </div> <!-- /.container -->
      	</div>

        @include('includes.footer')
   </body>
   </html>
