<?php
  $labels = array("Short Description","Text to incorporate","Preferences","Others");
?>

<!DOCTYPE html >
<html lang="en">
    <head>
    @include('plugins.plugins-artist-styles')
    </head>

<body ng-app="contestView" ng-controller="designController">

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
          	<div class="container min-x contest">
				<div class="c-header row">
					<div class="col-md-6">
						<h3 class="c-title"><?=$contest['contest_title']?></h3>
                	</div>
					<div class="col-md-6">
                  		<h3 class="c-price pull-right">P <?=$contest['contest_prize']?></h3>
					</div>
					<div class="col-md-6">

						<h5>by <a class="c-artist" href=<?php echo url("profile/".$user['user_name'])?>><?=$user['user_name']?></a></h5>
                	</div>
					<div class="col-md-6">
                  		<h5 class="pull-right"><a id="watch" onclick=watch(<?=$contest['contest_id']?>) class="c-watch" href="#"><?php if($is_watched){echo 'Watched';}else{echo'Watch';}?></a></h5>
					</div>
				</div>




				<div class="row indention-x options">
				  <div class="col-md-12">
				    <ul class="nav nav-pills">
              <li class="nav-item">
                <a class="btn-md-y straight-header-nav-x active " id="briefTab" href="#tab1" role="tab" data-toggle="tab">Brief</a>
              </li>
              <li class="nav-item">
                <a class="btn-md-y straight-header-nav-x" href="#tab2" role="tab" data-toggle="tab" id="designTab">Designs</a>
              </li>
				      <li>
				      	<hr class="pill-hr">
				      </li>

						<!-- Please read
							Disable submit button if:
							if: contest already finished
							else: enable
              -->
              <?php if($contest['contest_status_id']<3){?>
				      <button class="btn-md-x straight-header-nav-x text-grey pull-right" data-toggle="modal" data-target="#submit-design"> Submit </button>
              <?php }?>
            </ul>
				  </div>
				</div>

				<div class="tab-content">
				<!-- Brief Tab -->
        <div role="tabpanel" class="tab-pane active brief" id="tab1">
          <div class="row indention-x">
            <div class="row brief-desc">
              <div class="col-md-5">
                <label>Short Description</label>
              </div>
              <div class="col-md-6">
                <p><?=$contest['contest_description']?></p>
              </div>
            </div>

            <div class="row brief-desc">
              <div class="col-md-5">
                <label>Text to incorporate</label>
              </div>
              <div class="col-md-6">
                <p><?=$contest['contest_text']?></p>
              </div>
            </div>

            <div class="row brief-desc">
              <div class="col-md-5">
                <label>Preferences</label>
              </div>
              <div class="col-md-6">
                <p><?=$contest['contest_preferences']?></p>
              </div>
            </div>

            <div class="row brief-desc">
              <div class="col-md-5">
                <label>Others</label>
              </div>
              <div class="col-md-6">
                <p><?=$contest['contest_others']?></p>
              </div>
            </div>

          </div>
        </div>

					<!-- Design Tab -->
          <div role="tabpanel" class="tab-pane active" id="tab2">
            <div class="row indention-x">

              <?php
              if(count($contest_entry_list)==0){
                echo "	<div class='col-md-offset-1'>No contest entry designs uploaded yet.</div>";
              }else{
                  foreach ($contest_entry_list as $contest_entry) { ?>

                    <div class="entry">
                      <div class="col-lg-2 col-md-3 col-xs-5 thumb">
                        <div class="thumbnail">
                          <?php if($contest['contest_status_id']>2){?>
                          <a ng-click="getDesignInfo(<?=$contest_entry['contest_entry_id']; ?>,<?=$contest_entry['user_id']; ?>,<?php echo Session::get('userid');?>)" style="cursor:pointer">
                          <?php }?>
                            <?php $file_name=$contest_entry['file_name']; ?>
                            <img src={{ asset("assets/img/contestentry/$file_name") }} > <!--style="width:200px; height:190px;"-->
                          <?php if($contest['contest_status_id']>2){?>
                          </a>
                          <?php }?>
                          <div class="caption">
                            <div class="design-num">Entry <?=$contest_entry['contest_entry_no']; ?> </div>
                            <div class="entry-artist">
                              <span>by:
                                <?php $user_name=$contest_entry['user_name'];?>
                                <a class="" href={{ URL::to("profile/$user_name") }}><?=$contest_entry['user_name']; ?></a>
                              </span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

              <?php	}
              }	?>

            </div>
          </div>
				</div>
      </div>

          @include('includes.design-viewmodal')
          @include('includes.view-designmodal')
          @include('includes.submit-designmodal')
          @include('includes.footer')

        </div>

     <script src="{{ asset('assets/js/jquery.js')}}"></script>
     <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
     <script src="{{ asset('assets/js/contest.js')}}"></script>
     <script src="{{ asset('assets/js/submit-design.js')}}"></script>
     <script src="{{ asset('assets/js/watch.js')}}"></script>

</body>
</html>
