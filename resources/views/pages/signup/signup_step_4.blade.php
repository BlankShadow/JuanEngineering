<!DOCTYPE html >
<html lang="en">
    <head>
        @include('plugins.plugins-styles')
    </head>

<body>

  @include('includes.index-header')
  <div id="more">
    <div class="container">
      <div class="row">
          <div class="col-md-12">
             <p class="header">
                  Let us know more about you
             </p>
          </div> <!-- /.col-xs-12 -->
      </div> <!-- /.row -->
      <div class="row">
        <form action="{{ URL::to('/signup/step-4') }}" method="POST" enctype="multipart/form-data"  id="submitForm" >
            <input type="hidden" name="_token" value="{{ Session::token() }}">
            <div class="form-group">
              <div class="col-md-5 ">
                  <div class="input-group">
                    <label>User Name<span class="red">*</span></label>
                    <input class="form-control" type="text" name="name" required="required" id="name" onchange="validateName()">
                  </div>

                  <div class="input-group">
                    <label>Location<span class="red">*</span></label>
                    <input class="form-control" type="text" name="location" required="required" id="location">
                  </div>

                  <div class="input-group">
                    <label>Personal website</label>
                      <input class="form-control" type="text" name="url" >
                  </div>
              </div>

              <div class="col-sm-1">
                <div class="centerline">

                </div>
              </div>

              <div class="col-md-5">

                  <div class="input-group">
                      <div class="input-group-btn" >
                          <span class="btn btn-primary" onclick="document.getElementById('selectedFile').click()">
                              Browse <input class="" name="picture" type="file" id="selectedFile" style="display: none;"  onchange="fileChosen()">
                          </span>
                      </div>
                      <input class="form" type="text" id="fileText"  readonly placeholder="No file chosen">
                  </div>

                  <div class="input-group">
                    <label>Short Bio</label>
                      <textarea class="form-control" type="text" name="bio"></textarea>
                  </div>


                  <button class="btn btn-md" type="button" onclick="validateSignUp4()" id="submitBtn">Submit</button>

              </div>



            </div>
      </form>
      </div>
    </div> <!-- /.container -->
  </div>

          @include('includes.footer')
          <script src="{{ asset('assets/js/signup.js')}}"></script>
    </body>
</html>
