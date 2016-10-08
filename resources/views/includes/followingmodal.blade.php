<div class="modal fade" id="following" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">

        
            
        <div class="modal-body">

          <div class="row">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h3 class="c-title">Following</h3>
          </div>

          <hr class="convo-hr">

          <div class="followerlist">

            <?php
              for($i=0; $i<12; $i++){  ?>

            
            <div class="follower-list">
              <div class="row">
                <div class="col-md-2">
                  <img class="img-circle" src="{{ asset('assets/img/4.png')}}" alt="" >
                </div>
                <div class="col-md-7 span-follower">
                  <span class="follower-name">Yellow Corn</span>
                </div>
                <div class="col-md-3">
                  <button type="button" class="btn-md-x straight-header-nav-x btn-unfollow">Following</button>
                </div>
              </div>  
            </div>

            <?php
              }
            ?>

          </div>

            
            

        </div>



      </div>
    </div>

</div>
