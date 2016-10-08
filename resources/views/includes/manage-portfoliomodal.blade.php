<!-- Modal fullscreen -->
<div class="modal modal-fullscreen fade" id="manage-portfolio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div id="manage-wrap" class="modal-body">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <div id="headbar" class="design-selection">
            <h3>Manage designs on portfolio</h3>
            <div class="row">
              <div class="col-sm-12">
                  <div class="col-sm-1" ng-repeat="selected in selected_entry">
                    <div class="design-pic-x">
                     <img class = "design-image" src=<?php echo url("/assets/img/contestentry");?>/@{{selected.file_name}} >
                      <button class="design-img-edit-x" ng-click="removeEntry(selected)"><i class="fa fa-remove"></i></button>
                    </div>
                  </div>

                <div class="col-sm-1" ng-repeat="i in getNumber(selected_no)  track by $index">
                  <div class="design-pic-empty">

                  </div>
                </div>



              </div>
            </div>
            <hr class="section-divider">
          </div>

          <div id="cont">
            <div class="row">
              <div class="col-sm-12">

                  <img class = "design-image" ng-repeat="entry in contest_entry" ng-click="selectEntry(entry.contest_entry_id,entry)"  src=<?php echo url("/assets/img/contestentry");?>/@{{entry.file_name}} id=@{{entry.contest_entry_id}}>

              </div>
            </div>
          </div>

          <div id="footbar">
            <div class="pull-right">
              <button id="submit" type="button" ng-click="savePortfolio()"class="btn-md-x straight-header-nav-x ">Save</button>
              <a data-dismiss="modal" class="cancel ">Cancel</a>
            </div>

          </div>

      </div>

    </div>
  </div>
</div>
