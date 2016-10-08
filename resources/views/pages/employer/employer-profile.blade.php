<!DOCTYPE html >
<html lang="en">
    <head>
    @include('plugins.plugins-artist-styles')
    </head>

<body>

        <?=$header?>
        @if (session('msg'))
          <br>
          <div class="header-notif" >
             <button type="button" onclick="closeHeaderNotif()" class="close"><span aria-hidden="true">&times;</span></button>
             <label  style="font-size:12px;">
                   &#10003; &nbsp; {{ session('msg') }}
             </label>
          </div>
        @endif

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
                                  <span><i>Interests</i></span>
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
                                      <span class="followerBtn"><span class="count"><?=$followers?></span>  followers</span>
                                      <span class="followerBtn pull-right"><span class="count"><?=$following?></span> following</span>
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

                  <div class="row">
                    <div class="col-md-8">
                      <h3>Finished Contests</h3>
                    </div>
                    <div class="col-md-4">
                      <div class="pull-right">
                        <a href="{{ URL::to('/contest/new') }}"><button  class="btn-md-x straight-header-x">Add contest</button></a>
                      </div>
                    </div>
                  </div>

                  <?php  //contests
                    if(count($contests)==0){
                      echo "<div class='row' style='text-align:center;'>No Finished Contests</div>";
                    }
                    foreach ($contests as $contest) { ?>

                        <hr class="hr-divider">



                      <div class="row indention-x">
                        <div class="col-md-2">
                          <div class="contest-profile-pic-x">
                            <?php $thumbnail=$contest['contest_thumbnail']; ?>
                            <img src={{ asset("assets/img/contestentry/$thumbnail") }} class="img-rounded pull-xs-right absolute-x" alt="{{ asset('assets/img/$thumbnail') }}">
                            <div class="contest-profile-pic-x-span">
                              Php <?php echo $contest['contest_prize'] ?>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-8 ">
                          <div class="col-md-12">
                            <h5>
                              <?php echo $contest['contest_title'] ?>
                            </h5>
                          </div>
                          <div class="col-md-12 contest-info-x">
                          <?php echo $contest['contest_description']  ?>
                          </div>
                          <div class="col-md-12 indention-x">
                            <span class="tagBtn"><?php echo $contest['contest_status']   ?></span>
                            <span class="tagBtn"><?php echo $contest['contest_tag']  ?></span>
                          </div>
                        </div>
                        <div class="col-md-2 ">
                          <div class="col-md-12 contest-info-stats-x indention-x">
                            <i class="glyphicon glyphicon-picture"></i> <?php echo $contest['contest_total_designs']   ?> designs
                          </div>
                          <div class="col-md-12 contest-info-stats-x indention-x">
                            <i class="fa fa-clock-o"></i>
                            <?php echo $contest['contest_days_left']   ?> days left
                          </div>

                          <?php $contest_id=$contest['contest_id'] ;?>
                           <a href={{ URL::to("contest/$contest_id") }} >
                            <button class="btn-md-x straight-header-x text-grey contest-info-stats-x winnerBtn" >View Contest</button>
                          </a>

                      </div>
                    </div>



                  <?php   }  ?>

              </div>
          </div>




      @include('includes.change-picturemodal')
      @include('includes.edit-profilemodal')
      @include('includes.footer')

     <script src="{{ asset('assets/js/jquery.js')}}"></script>
     <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
     <script src="{{ asset('assets/js/profile.js')}}"></script>

</body>
</html>
