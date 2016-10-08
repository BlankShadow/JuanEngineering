<!DOCTYPE html >
<html lang="en">
    <head>
    @include('plugins.plugins-artist-styles')
    </head>

<body ng-app="profileApp" ng-controller="profileController">

        <?=$header?>

        <div id="profile">
              <div class="container">
                  <div class="row profile-header">
                      <div class="col-md-2">
                        <div class="profile-pic-x">
                          <img src=<?php echo url("assets/img/profilepics");?>/<?=$user['user_picture']?> class="img-rounded pull-xs-right absolute-x" alt="">
                          <form action="{{ URL::to('/profile/updateimage') }}" method="POST" id="updateImageForm" enctype="multipart/form-data" >
                              <input type="hidden" name="_token" value="{{ Session::token() }}">
                              <button class="profile-img-edit-x" type="button" onclick="document.getElementById('filePhoto').click()" >
                                    <i class="fa fa-pencil"></i>
                                    <input  name="picture" type="file" id="filePhoto" style="display: none;" >
                              </button>
                         </form>
                        </div>
                      </div>
                      <div class="col-md-9 profile-details">
                          <div class="row">
                              <div class="col-md-9">
                                  <span class="username"><?=$user['user_name']?></span>
                                  <span class="location pull-right"><?=$user['user_location']?></span>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-6">
                                  <span class="bio"><?=$user['user_bio']?></span>
                              </div>
                          </div>


                          <div class="row">
                              <div class="col-md-1">
                                  <span><i>Expertise</i></span>
                              </div>
                              <div class="col-md-7">
                                <?php foreach ($user_tags as $tags ) { ?>
                                    <span class="tagBtn"><?php echo $tags['category_name']?></span>
                                <?php } ?>


                              </div>
                          </div>

                          <div class="row">
                              <div class="col-md-9">
                                  <div class="more">
                                      <span><i><?=$user['user_url']?></i></span>
                                      <span class="followerBtn"><span class="count"><?=$following?></span>  followers</span>
                                      <span class="followerBtn pull-right"><span class="count"><?=$followers?></span> following</span>
                                  </div>
                              </div>
                          </div>
                      </div>

                      <div class="col-md-12 indention-x">
                          <button class="btn-md-x" data-toggle="modal" data-target="#editProfile"> Edit Profile </button>
                      </div>
                  </div>
              </div>
          </div>

          <div class="profile-section-a">
              <div class="container profile-container">
                  <div class="row header-title">
                    <div class="col-md-8">
                      <h3>Contest</h3>
                    </div>
                    <div class="col-md-4">
                      <div class="pull-right">
                        <button class="btn-md-x straight-header-x" ng-click="managePortfolio(<?=$user['user_id']?>)"> Manage Portfolio</button>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <?php foreach($contest_entry as $entry){?>
                      <div class="col-sm-2" >
                          <?php $filename=$entry['file_name'];?>
                          <img src=<?php echo url("/assets/img/contestentry/$filename");?>>
                      </div>
                    <?php }?>
                  </div>
              </div>
          </div>

          <div class="profile-section-a">
              <div class="container profile-container">
                  <div class="row header-title">
                      <div class="col-md-8">
                        <h3>Arts on Sale</h3>
                      </div>
                      <div class="col-md-4">
                        <div class="pull-right">
                          <button class="btn-md-x straight-header-x" > Manage Shop </button>
                        </div>
                      </div>
                  </div>

                  <div class="row">
                      <div class="col-sm-2">
                          <img src="{{ asset('assets/img/1.png')}}">
                      </div>
                      <div class="col-sm-2">
                          <img src="{{ asset('assets/img/2.png')}}">
                      </div>
                      <div class="col-sm-2">
                          <img src="{{ asset('assets/img/3.png')}}">
                      </div>
                      <div class="col-sm-2">
                        <img src="{{ asset('assets/img/4.png')}}">
                      </div>
                      <div class="col-sm-2">
                          <img src="{{ asset('assets/img/5.png')}}">
                      </div>
                      <div class="col-sm-2">
                          <img src="{{ asset('assets/img/6.png')}}">
                      </div>
                      <div class="col-sm-2">
                          <img src="{{ asset('assets/img/7.jpg')}}">
                      </div>
                      <div class="col-sm-2">
                          <img src="{{ asset('assets/img/8.jpg')}}">
                      </div>
                      <div class="col-sm-2">
                         <img src="{{ asset('assets/img/9.jpg')}}">
                      </div>
                      <div class="col-sm-2">
                         <img src="{{ asset('assets/img/10.jpg')}}">
                      </div>
                      <div class="col-sm-2">
                          <img src="{{ asset('assets/img/11.png')}}">
                      </div>
                  </div>
              </div>
          </div>

          <div class="profile-section-a">
              <div class="container profile-container">
                  <div class="row header-title">
                      <div class="col-md-8">
                        <h3>Artworks</h3>
                      </div>
                      <div class="col-md-4">
                        <div class="pull-right">
                          <button class="btn-md-x straight-header-x"> Manage Artworks </button>
                        </div>
                      </div>
                  </div>

                  <div class="row">
                      <div class="col-sm-2">
                          <img src="{{ asset('assets/img/1.png')}}">
                      </div>
                      <div class="col-sm-2">
                          <img src="{{ asset('assets/img/2.png')}}">
                      </div>
                      <div class="col-sm-2">
                          <img src="{{ asset('assets/img/3.png')}}">
                      </div>
                      <div class="col-sm-2">
                        <img src="{{ asset('assets/img/4.png')}}">
                      </div>
                      <div class="col-sm-2">
                          <img src="{{ asset('assets/img/5.png')}}">
                      </div>
                  </div>
              </div>
          </div>


      @include('includes.manage-artworksmodal')
      @include('includes.manage-portfoliomodal')
      @include('includes.manage-shopmodal')
      @include('includes.change-picturemodal')
      @include('includes.edit-profilemodal')
      @include('includes.footer')


      <script src="{{ asset('assets/js/jquery.js')}}"></script>
      <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
      <script src="{{ asset('assets/js/profile.js')}}"></script>

</body>
</html>
