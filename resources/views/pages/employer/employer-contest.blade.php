

<!DOCTYPE html >
<html lang="en">
    <head>
    @include('plugins.plugins-artist-styles')
    </head>

<body ng-app="contestApp" ng-controller="contestController">

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
        <div class="content-body-x">
          <div class="container min-x">
              <div class="row ">
                <div class="col-md-8">
                  <h3 class="header">My contest</h3>
                </div>
                <div class="col-md-4">
                  <div class="pull-right create-cont">
                    <a href="{{ URL::to('/contest/new') }}"><button  class="btn-md-x straight-header-x text-grey"> Create Contest</button></a>
                  </div>

               </div>
              </div>


              <div class="row indention-x options">
                  <div class="col-md-3">
                    <select ng-model="selected" ng-change="switchContestsList()">
                      <option value="all-active" ng-selected="true">Active</option>
                      <option value="finished">Finished</option>
                    </select>
                  </div>
                  <div class="col-md-5" >
                    <ul class="nav nav-pills" id="activeTab">
                      <li lcass="nav-item">
                        <a class="btn-md-x straight-header-nav-x " href="#tab1" role="tab" data-toggle="tab" ng-click="getContestsList('all-active')">All Active</a>
                      </li>
                      <li class="nav-item">
                        <a class="btn-md-x straight-header-nav-x" href="#tab2" role="tab" data-toggle="tab" ng-click="getContestsList('qualifying')">Qualifying</a>
                      </li>
                      <li class="nav-item">
                        <a class="btn-md-x straight-header-nav-x" href="#tab3" role="tab" data-toggle="tab" ng-click="getContestsList('choosing')">Choosing</a>
                      </li>
                    </ul>

                    <ul class="nav nav-pills" id="finishedTab">
                      <li lcass="nav-item">
                        <a class="btn-md-x straight-header-nav-x" href="#tab1" role="tab" data-toggle="tab">All Finished</a>
                      </li>
                      <li class="nav-item">
                        <a class="btn-md-x straight-header-nav-x" href="#tab2" role="tab" data-toggle="tab">Finished</a>
                      </li>
                      <li class="nav-item">
                        <a class="btn-md-x straight-header-nav-x" href="#tab3" role="tab" data-toggle="tab">Cancelled</a>
                      </li>
                    </ul>
                  </div>


                  <div class="col-md-4">
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

              
               <div class="tab-content">
                 <div ng-show="!contests.length">No contests</div>
                <div role="tabpanel" class="tab-pane active" id="tab1" ng-repeat="contest in contests | orderBy : sortBy">
                    <div class="row indention-x">
                      <div class="col-md-2">
                        <div class="contest-profile-pic-x">
                          <img src=<?php echo url("assets/img/contestentry/{{contest.contest_thumbnail}}")?> class="img-rounded pull-xs-right absolute-x" style="width:150px;height:150px" >
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
                        <div class="col-md-12 indention-x">
                          <span class="tagBtn">  @{{contest.contest_status}}</span>
                          <span class="tagBtn">   @{{contest.contest_tag}}</span>
                        </div>
                      </div>
                      <div class="col-md-2 ">
                        <div class="col-md-12 contest-info-stats-x indention-x">
                          <i class="glyphicon glyphicon-picture"></i>   @{{contest.contest_total_designs}} designs
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
          </div>
            @include('includes.footer')
        </div>




     <script src="{{ asset('assets/js/jquery.js')}}"></script>
     <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
      <script src="{{ asset('assets/js/employer-contest-list.js')}}"></script>

     <script type="text/javascript">
      $('#activeTab').click() // Select first tab
     </script>

</body>
</html>
