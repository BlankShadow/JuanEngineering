          <!-- Edit profile modal here -->

          <div class="modal modal-fullscreen fade" id="editProfile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <div class="modal-body">
                  <form action="{{ URL::to('/profile/update') }}" method="POST" id="editForm">
                  <input type="hidden" name="_token" value="{{ Session::token() }}">
                  <div class="row">
                    <div class="col-md-6">
                      <h3 class="c-title">Edit Profile</h3>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group">
                      <div class="col-md-5 ">
                          <div class="input-group">
                            <label>Display Name<span class="red">*</span></label>
                            <input class="form-control" id="name" type="text" name="name" required="required" value="<?=$user['user_name']?>" onkeyup="validateName()">
                          </div>

                          <div class="input-group">
                            <label>Location<span class="red">*</span></label>
                            <input class="form-control" id="location" type="text" name="location" required="required" value="<?=$user['user_location']?>">
                          </div>

                          <div class="input-group">
                            <label>Personal website</label>
                              <input class="form-control" type="text" name="url" value="<?=$user['user_url']?>">
                          </div>
                      </div>

                      <div class="col-sm-1">
                        <div class="centerline">

                        </div>
                      </div>

                      <div class="col-md-6">
                          <div class="input-group">
                            <label>Short Bio</label>
                              <textarea class="form-control" type="text" name="bio"><?=$user['user_bio']?></textarea>
                          </div>
                      </div>
                    </div>

                  </div>
                   <input class="btn-md-x pull-right submitBtn" type="button" id="submitBtn" onclick="validateUpdateForm()" value="Save">
                  </form>
                </div>
              </div>
            </div>
          </div>
