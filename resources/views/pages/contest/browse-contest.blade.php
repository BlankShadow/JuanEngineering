
<!DOCTYPE html >
<html lang="en">
    <head>
    @include('plugins.plugins-artist-styles')
    </head>
<body ng-app="contestApp" ng-controller="contestController">

      <?=$header?>
      <div class="content-body-x ">
        <div class="container min-x">

            <div class="row ">
                <div class="col-md-8">
                  <h3 class="header">Browse contest</h3>
                </div>
              </div>

            <div class="row indention-x options">
              <div class="col-md-6">
                <select ng-model="category">
                  <option ng-selected="true" value=''>All Categories</option>
                  <?php
                      foreach ($classification as $c) {
                          echo "<option disabled>".$c->classification_name."</option>";
                        foreach ($category as $cat) {
                          if($cat->classification_id == $c->classification_id){ ?>
                            <option value="<?php echo $cat->category_name?>">&nbsp;&nbsp;<?php echo $cat->category_name?></option>

                    <?php   }
                        }
                      }?>
                  </select>
              </div>

              <div class="col-md-6">
                <select class="pull-right" ng-model="sortBy">
                    <option value='contest_date_added' ng-selected="true">Newest first</option>
                    <option value='-contest_date_added'>Oldest first</option>
                    <option value='-contest_prize'>Highest Price First</option>
                    <option value='contest_prize'>Lowest Price First</option>
                    <option value='-contest_days_left'>Most time left first</option>
                    <option value='contest_days_left'>Least time left first</option>
                    <option value='contest_total_designs'>Most entries first</option>
                    <option value='-contest_total_designs'>Least entries first</option>
                </select>
              </div>
            </div>

            <div ng-repeat="contest in contests | orderBy : sortBy | filter : {contest_tag:category}">
                <div class="row indention-x">
                  <div class="col-md-2">
                    <div class="contest-profile-pic-x">
                      <img src=<?php echo url("assets/img/contestentry/{{contest.contest_thumbnail}}")?> class="img-rounded pull-xs-right absolute-x" alt="" style="width:150px;height:150px">
                      <div class="contest-profile-pic-x-span">
                        Php @{{contest.contest_prize}}
                      </div>
                    </div>
                  </div>
                  <div class="col-md-8 ">
                    <div class="col-md-12">
                      <h5>
                        @{{contest.contest_title}}
                      </h5>
                    </div>
                    <div class="col-md-12 contest-info-x">
                        @{{contest.contest_description}}
                    </div>
                    <div class="col-md-12">
                      <div class="entry-artist entry-artist-contest">
                        <span>by:
                          <i><a class="" href=<?php echo url("profile/{{contest.user_name}}")?>>@{{contest.user_name}}</a></i>
                        </span>
                      </div>
                    </div>
                    <div class="col-md-12 indention-x">
                      <span class="tagBtn">  @{{contest.contest_status}}</span>
                      <span class="tagBtn">   @{{contest.contest_tag}}</span>
                    </div>
                  </div>
                  <div class="col-md-2 ">
                    <div class="col-md-12 contest-info-stats-x indention-x">
                      <i class="glyphicon glyphicon-picture"></i> @{{contest.contest_total_designs}} designs
                    </div>
                    <div class="col-md-12 contest-info-stats-x indention-x">
                      <i class="fa fa-clock-o"></i>
                        @{{contest.contest_days_left}}days left
                    </div>

                    <a href={{ URL::to("contest") }}/@{{contest.contest_id}} >
                     <button class="btn-md-x straight-header-x text-grey contest-info-stats-x winnerBtn" >View Contest</button>
                   </a>


                </div>
              </div>
            <hr class="hr-divider">
          </div>

        </div>

      @include('includes.footer')
      </div>




     <script src="{{ asset('assets/js/jquery.js')}}"></script>
     <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
     <script src="{{ asset('assets/js/browse-contest.js')}}"></script>

</body>
</html>
