<!DOCTYPE html >
<html lang="en">
    <head>
        @include('plugins.plugins-styles')
    </head>

<body>

        @include('includes.index-header')
        <div id="what">
      	    <div class="container">
              <form role="form"  method="POST"  autocomplete="off" id="signUpForm2">
              <input type="hidden" name="_token" value="{{ Session::token() }}">
      	    	<div class="row">
      	    	    <div class="col-md-12">
                      <p class="header">
                        What are you?
                      </p>
      	    		</div> <!-- /.col-xs-12 -->
      	    	</div> <!-- /.row -->
                <div class="row">
                    <div class="col-sm-1">
                        <input  name="user_type_id" class="radiobtn" type="radio" value="1">
                    </div>
                    <div class="col-md-5">
                        <span class="user-title">I'm an artist</span>
                        <p> I want to showcase my talent </p>
                    </div> <!-- /.col-xs-12 -->
                    <div class="col-sm-1">
                        <input type="radio" class="radiobtn" name="user_type_id" value="3" >
                    </div>
                    <div class="col-md-5">
                        <span class="user-title">I'm a creative business</span>
                        <p>I want to advertise my business and hire creative talents</p>
                    </div>
                </div> <!-- /.row -->
                <div class="row">
                    <div class="col-sm-1">
                        <input type="radio" class="radiobtn"  name="user_type_id"  value="2" >
                    </div>
                    <div class="col-md-5">
                        <span class="user-title">I'm an independent employer</span>
                        <p> I want to hire creative talents</p>
                    </div> <!-- /.col-xs-12 -->
                    <div class="col-sm-1">
                        <input type="radio" class="radiobtn"  name="user_type_id"  value="4"  >
                    </div>
                    <div class="col-md-5">
                        <span class="user-title">I'm an art supplier</span>
                        <p>I want to provide art supplies and advertise my business</p>
                    </div>
                </div> <!-- /.row -->
                <div class="row">
                    <div class="col-md-12">
                        <input class="btn btn-md" type="button" onclick="signUp2()" name="submit" value="Next">
                    </div>
                </div>
              </form>
      	    </div> <!-- /.container -->
      	</div>
          @include('includes.footer')
          <script src="{{ asset('assets/js/signup.js')}}"></script>
    </body>
</html>
