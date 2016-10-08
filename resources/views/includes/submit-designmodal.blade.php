<!-- Modal fullscreen -->

<div class="modal modal-fullscreen fade" id="submit-design" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">


      <div id="main-wrap" class="modal-body">
        <?php $contest_id=$contest['contest_id'];?>
        <form action=<?php echo url("contest/$contest_id/entry/add");?> method="POST" enctype="multipart/form-data" id="submitDesignForm">
            <input type="hidden" name="_token" value="{{ Session::token() }}"><br>
          <div id="sidebar" class="dragfiles" style="height:600px; margin-top:0px;!important">
            <div class="drag" >
              <button class="btn-md-x straight-header-nav-x" type="button" onclick="document.getElementById('selectedFile').click()" >
                    Select file
                    <input  name="picture" type="file" id="selectedFile" style="display: none;"  >
              </button><br>
                <br>PNG, GIF or JPG/JPEG
                <br>Maximum file size of 8MB
            </div>
            <div class="file-image">
              <span class="img-helper"></span>
              <img id="file-image2" style="max-height:500px">
            </div>
          </div>

          <div id="content-wrap" class="sub-entry">

            <div class="sider-header">

              <div class="entry-num">Submit Design
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
              </div>
            </div>
            <hr class="convo-hr">

            <div class="submit-entry">
              <div class="submit-form">
                <div id="message"></div>
                <div class="input-group">
                  <div class="form-group submit-cmnt submit-frm">
                    <label>Description</label><span class="red">*</span>
                    <textarea class="submit-comment" name="contest_entry_desc" id="desc">
                    </textarea>
                  </div>
                  <div class="form-group submit-frm">
                    <label>Requirements</label>
                    <ul>
                      <li>I have read the design brief</li>
                      <li>I created this design as a vector</li>
                      <li>I did not use stock or clip art</li>
                    </ul>
                  </div>
                  <div class="form-group submit-frm chk">
                    <input type="checkbox" name="conditions">
                    <span class="chk-label">I have read and understand the above requirements</span>
                  </div>

                </div>
              </div>
              <button  type="button" class="btn-md-x straight-header-nav-x" onclick="validateSubmitDesignForm()">Submit</button>
              <a href="" data-dismiss="modal" class="cancel pull-right">Cancel</a>
            </div>

          </div>
          </form>
      </div>

    </div>
  </div>
</div>
