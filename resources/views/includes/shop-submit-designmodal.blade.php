<!-- Modal fullscreen -->
<div class="modal modal-fullscreen fade" id="shop-submit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div id="main-wrap" class="modal-body">
          <div id="sidebar" class="dragfiles">
            <div class="drag">
              <span>Drag file here to upload or</span>
              <submit type="file" id="submit" class="btn-md-x straight-header-nav-x">Select files</submit>
              <ul>
                <li>PNG, GIF or JPG/JPEG</li>
                <li>Maximum file size of 8MB</li>
              </ul>
            </div>
          </div>
          <div id="content-wrap" class="sub-entry">
            
            <div class="sider-header">
              <div class="entry-num">Sell to shop
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
              </div>
            </div>
            <hr class="convo-hr">
            
            <div class="submit-entry">
              <form class="submit-form">
                <div class="input-group">
                  <div class="form-group submit-cmnt submit-frm">
                    <label>Price:</label> 
                    <input class="input-price" type="text" name="price">
                  </div>
                  <div class="form-group submit-cmnt submit-frm">
                    <label>Description</label> 
                    <textarea class="submit-comment">
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
                    <input type="checkbox" name="report"> 
                    <span class="chk-label">I have read and understand the above requirements</span>  
                  </div>
                  
                </div>
              </form>
              <button id="submit" class="btn-md-x straight-header-nav-x">Submit</button>
              <a data-dismiss="modal" class="cancel pull-right">Cancel</a>
            </div>
            
          </div>
        
      </div>
    </div>
  </div>
</div>