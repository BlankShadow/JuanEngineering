<!DOCTYPE html >
<html lang="en">
    <head>
    @include('plugins.plugins-artist-styles')
    </head>

<body>
        <?=$header?>

        <div class="content-body-x">
          	<div class="container min-x contest">
				<div class="c-header row">
					<div class="col-md-6">
						<h3 class="c-title">Create contest</h3>
        </div>
				</div>

				<div id="create" class="row indention-x ">
           <div id="message" style="margin-left:15px"></div>
            <form action="{{ URL::to('/contest/add') }}" id="createContestForm" method="POST">
              <input type="hidden" name="_token" value="{{ Session::token() }}">
			        <div class="form-group">
			          <div class="col-md-5 ">
			              <div class="input-group">
			                <label>Contest Title<span class="red">*</span></label>
			                <input class="form-control" type="text" name="title" required="required" id="title">
			              </div>

			              <div class="input-group">
			                <label>Category<span class="red">*</span></label>
			                <!-- <input class="form-control" type="text" name="category" required="required"> -->

                      <select class="form-control" name="category" >

                        <?php
                            foreach ($classification as $c) {
                                echo "<option selected disabled>".$c->classification_name."</option>";
                              foreach ($category as $cat) {
                                if($cat->classification_id == $c->classification_id){
                                  echo "<option name='category' value='".$cat->category_id."'>&nbsp;&nbsp;$cat->category_name</option>";
                                }
                              }
                            }?>
                      </select>
			              </div>

			              <div class="input-group">
			                <label>Text to incorporate<span class="red">*</span></label>
			                <input class="form-control" type="text" name="text" required="required" id="text">
			              </div>

			              <div class="input-group">
			                <label>Prize<span class="red">*</span></label>
			                <input class="form-control" type="text" name="prize" required="required" id="prize">
			              </div>

                    <div class="input-group">
			                <label>Deadline<span class="red">*</span></label>
			                <input class="form-control" type="date" name="deadline" required="required" id="deadline">
			              </div>

			          </div>

			          <div class="col-sm-1">
			            <div class="centerline">

			            </div>
			          </div>

			          <div class="col-md-5">

			              <div class="input-group">
			                <label>Short Description<span class="red">*</span></label>
			                <textarea class="form-control" type="text" name="desc" id="desc"></textarea>
			              </div>

			              <div class="input-group">
			                <label>Preferences</label>
			                <textarea class="form-control" type="text" name="preferences" placeholder="Colors, font style, etc"></textarea>
			              </div>

			              <div class="input-group ">
			                <label>Others</label>
			                <textarea class="form-control" type="text" name="others"></textarea>
			              </div><br>

                    <div class="col-md-12 indention-x">
                        <button class="btn-md-x pull-right" type="button" onclick="validateCreateContestForm()" data-toggle="modal" data-target="#">Create</button>
                    </div>

    			          </div>
    			        </div>
                </form>
			      </div>


            </div>

          @include('includes.footer')
        </div>

     <script src="{{ asset('assets/js/jquery.js')}}"></script>
     <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
     <script src="{{ asset('assets/js/employer-create-contest.js')}}"></script>

	</script>

</body>
</html>
