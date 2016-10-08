<!DOCTYPE html >
<html lang="en">
    <head>
    @include('plugins.plugins-artist-styles')
    </head>

<body>

      <?=$header?>

        <div id="profile">
              <div class="container">
                  <div class="row profile-header">
                      <div class="col-md-2">
                        <div class="profile-pic-x">
                          <img  src=<?php echo url("assets/img/profilepics");?>/<?=$user['user_picture']?> class="img-rounded pull-xs-right absolute-x" alt="">
                        </div>
                      </div>
                      <div class="col-md-9 profile-details">
                          <div class="row">
                              <div class="col-md-9">
                                  <span class="username"><?=$user['user_name']?></span>
                                  <a class="icon-message" href="#"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></a>
                                  <span><input type="button" value="<?php if($is_followed){echo 'Unfollow';}else{echo'Follow';}?>" class="btn-md-x follow pull-right" id="follow" onclick="follow(<?=$user['user_id']?>)"></span>

                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-6">
                                  <span class="bio"><?=$user['user_bio']?></span>
                              </div>
                          </div>


                          <div class="row">
                              <div class="col-md-1">
                                  <span><i>Interests:</i></span>
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
                                      <span class="followerBtn"><span class="count" id="followers_count"><?=$followers?></span>  followers</span>
                                      <span class="followerBtn pull-right"><span class="count"><?=$following?></span> following</span>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

          <div class="profile-section-a">
              <div class="container profile-container">

                  <div class="row">
                    <div class="col-md-8">
                      <h3>Contest</h3>
                    </div>
                  </div>

                  <?php  //contests
                    if(count($contests)==0){
                      echo "<div class='row' style='text-align:center;'>No Contests</div>";
                    }
                    foreach ($contests as $contest) { ?>
                    <hr class="hr-divider">

                      <div class="row indention-x">
                        <div class="col-md-2">
                          <div class="contest-profile-pic-x">
                            <?php $thumbnail=$contest['contest_thumbnail']; ?>
                            <img src={{ asset("assets/img/$thumbnail") }} class="img-rounded pull-xs-right absolute-x" alt="">
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
                        <div class="col-md-12">
                          <div class="entry-artist entry-artist-contest">
                            <span>by:
                              <i><a class="" href=<?php echo url("profile/".$user['user_name'])?>><?=$user['user_name']?></a></i>
                            </span>
                          </div>
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



     @include('includes.footer')

     <script src="{{ asset('assets/js/jquery.js')}}"></script>
     <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
     <script src="{{ asset('assets/js/follow.js')}}"></script>

</body>
</html>
