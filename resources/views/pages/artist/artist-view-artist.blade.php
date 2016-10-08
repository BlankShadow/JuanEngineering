<!DOCTYPE html >
<html lang="en">
    <head>
    @include('plugins.plugins-artist-styles')
    </head>

<body >

        <?=$header?>

        <div id="profile">
              <div class="container">
                  <div class="row profile-header">
                      <div class="col-md-2">
                          <img src=<?php echo url("assets/img/profilepics");?>/<?=$user['user_picture']?> class="img-rounded pull-xs-right" alt="">
                      </div>
                      <div class="col-md-9 profile-details">
                          <div class="row">
                              <div class="col-md-9">
                                  <span class="username"><?=$user['user_name']?></span>
                                  <a class="icon-message" href="#"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></a>
                                  <span><input type="button"value="<?php if($is_followed){echo 'Unfollow';}else{echo'Follow';}?>" class="btn-md-x follow pull-right" id="follow" onclick="follow(<?=$user['user_id']?>)"></span>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-6">
                                  <span class="bio"><?=$user['user_bio']?></span>
                              </div>
                          </div>


                          <div class="row">
                              <div class="col-md-1">
                                  <span><i>Expertise:</i></span>
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
                                      <span class="followerBtn pull-right"><span class="count" ><?=$following?></span> following</span>
                                  </div>
                              </div>
                          </div>

                      </div>
                  </div>
              </div>
          </div>

          <div class="profile-section-a">
              <div class="container profile-container">
                  <div class="row header-title">
                      <div class="col-md-12">
                        <h3>Contest
                          <span><hr class="line-break pull-right"></span>
                        </h3>
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
                      <div class="col-md-12">
                        <h3>Arts on Sale
                          <span><hr class="line-break pull-right"></span>
                        </h3>
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
                      <div class="col-md-12">
                        <h3>Artworks
                          <span><hr class="line-break pull-right"></span>
                        </h3>
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

     @include('includes.footer')

     <script src="{{ asset('assets/js/jquery.js')}}"></script>
     <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
     <script src="{{ asset('assets/js/follow.js')}}"></script>

</body>
</html>
