            <!-- Edit Brief Modal -->
            <div class="modal modal-fullscreen fade" id="editContest" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <div class="modal-body">

                	<div class="row">
          					<div class="col-md-6">
          						<h3 class="c-title">Update contest</h3>
                    </div>
    				      </div>

                  <div id="message" ></div>
                  <form action="{{ URL::to('/contest/update') }}" method="POST" id="editContestForm">
                  <input type="hidden" name="_token" value="{{ Session::token() }}">
                  <input type="hidden" name="contest_id" value="<?=$contest['contest_id']?>">


                    <div class="row">
          			        <div class="form-group">
          			          <div class="col-md-5 ">
          			              <div class="input-group">
          			                <label>Contest Title<span class="red">*</span></label>
          			                <input class="form-control" type="text" id="title" name="title" required="required" value="<?=$contest['contest_title']?>">
          			              </div>

          			              <div class="input-group">
          			                <label>Category<span class="red">*</span></label>
                                <select class="form-control" name="category" >
                                  <?php
                                      foreach ($classification as $c) {
                                          echo "<option disabled>".$c->classification_name."</option>";
                                        foreach ($category as $cat) {
                                          if($cat->classification_id == $c->classification_id){ ?>
                                              <option name='category' value=<?=$cat->category_id?> <?php if($cat->category_id==$contest['tag_id']){echo "selected";}?>>
                                              &nbsp;&nbsp;<?=$cat->category_name?></option>;
                                          <?php
                                          }
                                        }
                                      }?>
                                </select>
          			              </div>

          			              <div class="input-group">
          			                <label>Text to incorporate<span class="red">*</span></label>
          			                <input class="form-control" type="text" name="text" id="text" required="required" value="<?=$contest['contest_text']?>">
          			              </div>

          			              <div class="input-group">
          			                <label>Prize<span class="red">*</span></label>
          			                <input class="form-control" type="text" id="prize" name="prize" required="required" value="<?=$contest['contest_prize']?>">
          			              </div>

                              <div class="input-group">
          			                <label>Deadline<span class="red">*</span></label>
          			                <input class="form-control" type="date" id="deadline" name="deadline" required="required" id="deadline" value="<?=$contest['contest_deadline']?>">
          			              </div>

          			          </div>

          			          <div class="col-sm-1">
          			            <div class="centerline">

          			            </div>
          			          </div>

          			          <div class="col-md-5">

          			              <div class="input-group">
          			                <label>Short Description<span class="red">*</span></label>
          			                <textarea class="form-control" id="desc" type="text" name="desc"><?=$contest['contest_description']?></textarea>
          			              </div>

          			              <div class="input-group">
          			                <label>Preferences</label>
          			                <textarea class="form-control" type="text" name="preferences" placeholder="Colors, font style, etc"><?=$contest['contest_preferences']?></textarea>
          			              </div>

          			              <div class="input-group ">
          			                <label>Others</label>
          			                <textarea class="form-control" type="text" name="others"><?=$contest['contest_others']?></textarea>
          			              </div>

          	                      <div class="col-md-12 indention-x">
          	                          <button class="btn-md-x pull-right" type="button" onclick="validateUpdateForm()">Update</button>
          	                      </div>

          			          </div>
          			        </div>
      			        </div>
                  </form>
                </div>
              </div>
            </div>
          </div> <!-- End of modal -->
