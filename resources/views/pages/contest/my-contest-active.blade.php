<?php
  $sorts = array("Newest first", "Oldest first", "Highest price first", "Lowest price first", "Most time left first", "Least time left first", "Most entries first", "Least entries first");
?>

<!DOCTYPE html >
<html lang="en">
    <head>
    @include('plugins.plugins-artist-styles')
    </head>

<body>

          <?=$header?>
        <div class="content-body-x">
          <div class="container min-x">
              <div class="row ">
                <div class="col-md-8">
                  <h3 class="header">My contest</h3>
                </div>
              </div>


              <div class="row indention-x options">
                  <div class="col-md-3">
                    <select>
                      <option>Active</option>
                      <option>Finished</option>
                    </select>
                  </div>
                  <div class="col-md-5">
                    <ul class="nav nav-pills">
                      <li lcass="nav-item">
                        <a class="btn-md-x straight-header-nav-x " id="activeTab" href="#tab1" role="tab" data-toggle="tab">All Active</a>
                      </li>
                      <li class="nav-item">
                        <a class="btn-md-x straight-header-nav-x" href="#tab2" role="tab" data-toggle="tab">Watching</a>
                      </li>
                      <li class="nav-item">
                        <a class="btn-md-x straight-header-nav-x" href="#tab3" role="tab" data-toggle="tab">Entering</a>
                      </li>
                      <li class="nav-item">
                        <a class="btn-md-x straight-header-nav-x" href="#tab4" role="tab" data-toggle="tab">Eliminated</a>
                      </li>
                    </ul>
                  </div>
                  <div class="col-md-4">
                    <select class="pull-right">
                      <?php
                        foreach($sorts as $sort){
                          echo "<option value='<?php echo $sort?>'>" .$sort. "</option>";
                        }
                      ?>
                    </select>
                  </div>
              </div>

              <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="tab1">
                    <div class="row indention-x">
                      <div class="col-md-2">
                        <div class="contest-profile-pic-x">
                          <img src="http://placehold.it/150x150" class="img-rounded pull-xs-right absolute-x" alt="">
                          <div class="contest-profile-pic-x-span">
                            $1000
                          </div>
                        </div>
                      </div>
                      <div class="col-md-8 ">
                        <div class="col-md-12">
                          <h5>
                            Create the easiest financial check-up ever!!
                          </h5>
                        </div>
                        <div class="col-md-12 contest-info-x">
                          We are working in the field of financial consulting and do in-person financial check-ups in order to improve the fina...
                        </div>
                        <div class="col-md-12">
                          <div class="entry-artist">
                            <span>by:
                              <a class="" href="artist-view-employer">Juan dela Cruz</a>
                            </span>
                          </div>
                        </div>
                        <div class="col-md-12 indention-x">
                          <span class="tagBtn">Watching</span>
                          <span class="tagBtn">Fine Arts</span>
                        </div>
                      </div>
                      <div class="col-md-2 ">
                        <div class="col-md-12 contest-info-stats-x indention-x">
                          <i class="glyphicon glyphicon-picture"></i> 0 designs
                        </div>
                        <div class="col-md-12 contest-info-stats-x indention-x">
                          <i class="fa fa-clock-o"></i>
                          3 days left
                        </div>
                        <div class="col-md-12 contest-info-stats-x indention-x">
                         <i class="fa fa-comment"></i> No feedback
                      </div>
                      <button class="btn-md-x straight-header-x text-grey contest-info-stats-x winnerBtn" onclick="window.location.href='/contest-view'">View Contest</button>

                    </div>
                  </div>

                  <hr class="hr-divider">

                  <div class="row indention-x">
                      <div class="col-md-2">
                        <div class="contest-profile-pic-x">
                          <img src="http://placehold.it/150x150" class="img-rounded pull-xs-right absolute-x" alt="">
                          <div class="contest-profile-pic-x-span">
                            $1000
                          </div>
                        </div>
                      </div>
                      <div class="col-md-8 ">
                        <div class="col-md-12">
                          <h5>
                            Create the easiest financial check-up ever!!
                          </h5>
                        </div>
                        <div class="col-md-12 contest-info-x">
                          We are working in the field of financial consulting and do in-person financial check-ups in order to improve the fina...
                        </div>
                        <div class="col-md-12">
                          <div class="entry-artist">
                            <span>by:
                              <a class="" href="artist-view-employer">Juan dela Cruz</a>
                            </span>
                          </div>
                        </div>
                        <div class="col-md-12 indention-x">
                          <span class="tagBtn">Entering</span>
                          <span class="tagBtn">Fine Arts</span>
                        </div>
                      </div>
                      <div class="col-md-2 ">
                        <div class="col-md-12 contest-info-stats-x indention-x">
                          <i class="glyphicon glyphicon-picture"></i> 5 designs
                        </div>
                        <div class="col-md-12 contest-info-stats-x indention-x">
                          <i class="fa fa-clock-o"></i>
                          2 days left
                        </div>
                        <div class="col-md-12 contest-info-stats-x indention-x">
                         <i class="fa fa-comment"></i> 19% feedback
                      </div>
                      <button class="btn-md-x straight-header-x text-grey contest-info-stats-x winnerBtn" onclick="window.location.href='/contest-view'">View Contest</button>

                    </div>
                  </div>

                  <hr class="hr-divider">

                  <div class="row indention-x">
                      <div class="col-md-2">
                        <div class="contest-profile-pic-x">
                          <img src="http://placehold.it/150x150" class="img-rounded pull-xs-right absolute-x" alt="">
                          <div class="contest-profile-pic-x-span">
                            $1000
                          </div>
                        </div>
                      </div>
                      <div class="col-md-8 ">
                        <div class="col-md-12">
                          <h5>
                            Create the easiest financial check-up ever!!
                          </h5>
                        </div>
                        <div class="col-md-12 contest-info-x">
                          We are working in the field of financial consulting and do in-person financial check-ups in order to improve the fina...
                        </div>
                        <div class="col-md-12">
                          <div class="entry-artist">
                            <span>by:
                              <a class="" href="artist-view-employer">Juan dela Cruz</a>
                            </span>
                          </div>
                        </div>
                        <div class="col-md-12 indention-x">
                          <span class="tagBtn">Eliminated</span>
                          <span class="tagBtn">Body Arts</span>
                        </div>
                      </div>
                      <div class="col-md-2 ">
                        <div class="col-md-12 contest-info-stats-x indention-x">
                          <i class="glyphicon glyphicon-picture"></i> 0 designs
                        </div>
                        <div class="col-md-12 contest-info-stats-x indention-x">
                          <i class="fa fa-clock-o"></i>
                          1 day left
                        </div>
                        <div class="col-md-12 contest-info-stats-x indention-x">
                         <i class="fa fa-comment"></i> 30% feedback
                      </div>
                      <button class="btn-md-x straight-header-x text-grey contest-info-stats-x winnerBtn" onclick="window.location.href='/contest-view'">View Contest</button>

                    </div>
                  </div>
                </div>

                <div role="tabpanel" class="tab-pane" id="tab2">
                  <div class="row indention-x">
                      <div class="col-md-2">
                        <div class="contest-profile-pic-x">
                          <img src="http://placehold.it/150x150" class="img-rounded pull-xs-right absolute-x" alt="">
                          <div class="contest-profile-pic-x-span">
                            $1000
                          </div>
                        </div>
                      </div>
                      <div class="col-md-8 ">
                        <div class="col-md-12">
                          <h5>
                            Create the easiest financial check-up ever!!
                          </h5>
                        </div>
                        <div class="col-md-12 contest-info-x">
                          We are working in the field of financial consulting and do in-person financial check-ups in order to improve the fina...
                        </div>
                        <div class="col-md-12">
                          <div class="entry-artist">
                            <span>by:
                              <a class="" href="artist-view-employer">Juan dela Cruz</a>
                            </span>
                          </div>
                        </div>
                        <div class="col-md-12 indention-x">
                          <span class="tagBtn">Watching</span>
                          <span class="tagBtn">Contemporary Arts</span>
                        </div>
                      </div>
                      <div class="col-md-2 ">
                        <div class="col-md-12 contest-info-stats-x indention-x">
                          <i class="glyphicon glyphicon-picture"></i> 0 designs
                        </div>
                        <div class="col-md-12 contest-info-stats-x indention-x">
                          <i class="fa fa-clock-o"></i>
                          4 days left
                        </div>
                        <div class="col-md-12 contest-info-stats-x indention-x">
                         <i class="fa fa-comment"></i> No feedback
                      </div>
                      <button class="btn-md-x straight-header-x text-grey contest-info-stats-x winnerBtn" onclick="window.location.href='/contest-view'">View Contest</button>

                    </div>
                  </div>
                </div>

                <div role="tabpanel" class="tab-pane" id="tab3">
                  <div class="row indention-x">
                      <div class="col-md-2">
                        <div class="contest-profile-pic-x">
                          <img src="http://placehold.it/150x150" class="img-rounded pull-xs-right absolute-x" alt="">
                          <div class="contest-profile-pic-x-span">
                            $1000
                          </div>
                        </div>
                      </div>
                      <div class="col-md-8 ">
                        <div class="col-md-12">
                          <h5>
                            Create the easiest financial check-up ever!!
                          </h5>
                        </div>
                        <div class="col-md-12 contest-info-x">
                          We are working in the field of financial consulting and do in-person financial check-ups in order to improve the fina...
                        </div>
                        <div class="col-md-12">
                          <div class="entry-artist">
                            <span>by:
                              <a class="" href="artist-view-employer">Juan dela Cruz</a>
                            </span>
                          </div>
                        </div>
                        <div class="col-md-12 indention-x">
                          <span class="tagBtn">Entering</span>
                          <span class="tagBtn">Applied Arts</span>
                        </div>
                      </div>
                      <div class="col-md-2 ">
                        <div class="col-md-12 contest-info-stats-x indention-x">
                          <i class="glyphicon glyphicon-picture"></i> 0 designs
                        </div>
                        <div class="col-md-12 contest-info-stats-x indention-x">
                          <i class="fa fa-clock-o"></i>
                          1 day left
                        </div>
                        <div class="col-md-12 contest-info-stats-x indention-x">
                         <i class="fa fa-comment"></i> No feedback
                      </div>
                      <button class="btn-md-x straight-header-x text-grey contest-info-stats-x winnerBtn" onclick="window.location.href='/contest-view'">View Contest</button>

                    </div>
                  </div>
                </div>

                <div role="tabpanel" class="tab-pane" id="tab4">
                  <div class="row indention-x">
                      <div class="col-md-2">
                        <div class="contest-profile-pic-x">
                          <img src="http://placehold.it/150x150" class="img-rounded pull-xs-right absolute-x" alt="">
                          <div class="contest-profile-pic-x-span">
                            $1000
                          </div>
                        </div>
                      </div>
                      <div class="col-md-8 ">
                        <div class="col-md-12">
                          <h5>
                            Create the easiest financial check-up ever!!
                          </h5>
                        </div>
                        <div class="col-md-12 contest-info-x">
                          We are working in the field of financial consulting and do in-person financial check-ups in order to improve the fina...
                        </div>
                        <div class="col-md-12">
                          <div class="entry-artist">
                            <span>by:
                              <a class="" href="artist-view-employer">Juan dela Cruz</a>
                            </span>
                          </div>
                        </div>
                        <div class="col-md-12 indention-x">
                          <span class="tagBtn">Eliminated</span>
                          <span class="tagBtn">Body Arts</span>
                        </div>
                      </div>
                      <div class="col-md-2 ">
                        <div class="col-md-12 contest-info-stats-x indention-x">
                          <i class="glyphicon glyphicon-picture"></i> 70 designs
                        </div>
                        <div class="col-md-12 contest-info-stats-x indention-x">
                          <i class="fa fa-clock-o"></i>
                          10 hours left
                        </div>
                        <div class="col-md-12 contest-info-stats-x indention-x">
                         <i class="fa fa-comment"></i> No feedback
                      </div>
                      <button class="btn-md-x straight-header-x text-grey contest-info-stats-x winnerBtn" onclick="window.location.href='/contest-view'">View Contest</button>

                    </div>
                  </div>
                </div>

              </div>
          </div>

          @include('includes.footer')
        </div>

     <script src="{{ asset('assets/js/jquery.js')}}"></script>
     <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>

     <script type="text/javascript">
      $('#activeTab').click() // Select first tab
     </script>

</body>
</html>
