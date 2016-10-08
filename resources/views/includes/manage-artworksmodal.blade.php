<!-- Modal fullscreen -->
<div class="modal modal-fullscreen fade" id="manage-artwork" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div id="manage-wrap" class="modal-body">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <div id="headbar" class="design-selection">
            <h3>Manage artworks</h3>
            <div class="row">
              <div class="col-sm-12">
              <?php
                for ($i=0; $i < 6; $i++) { ?>
                  <div class="col-sm-1">
                    <div class="design-pic-x">
                     <img class = "design-image" src="{{ asset('assets/img/4.png')}}">
                      <button class="design-img-edit-x"><i class="fa fa-remove"></i></button>
                    </div>
                  </div>
             <?php
                }
              ?>

              <?php
                for ($i=0; $i < 6; $i++) { ?>
                  <div class="col-sm-1">
                  <div class="design-pic-empty">
 
                  </div>
                </div>
             <?php
                }
              ?>
                

              </div>
            </div>
            <hr class="section-divider">
          </div>

          <div id="cont">
            <div class="row">
              <button id="submit" type="file" class="btn-md-x straight-header-nav-x btn-shop-x pull-right">Upload</button>
            </div>
            <div class="row">
              <div class="col-sm-12">
              <?php
                for ($i=0; $i < 15; $i++) { ?>

                  <img class = "design-image" src="{{ asset('assets/img/11.png')}}">
                  
             <?php
                }
              ?>
              </div>
            </div>
          </div>

          <div id="footbar">  
            <div class="pull-right">
              <button id="submit" class="btn-md-x straight-header-nav-x ">Save</button>
              <a data-dismiss="modal" class="cancel ">Cancel</a>
            </div>
            
          </div>

      </div>
     
    </div>
  </div>
</div>