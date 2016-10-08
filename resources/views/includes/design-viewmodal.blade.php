<!-- Modal fullscreen -->
		<div class="modal modal-fullscreen fade" id="design-view" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div id="main-wrap" class="modal-body">

		          <div id="sidebar">
								<div class="row file-image" >
											<span class="img-helper"></span>
										  <img src="" id="file-image" >
								</div>
								<br>
		            <div class="react pull-right">
		              <button id="report" class="btn btn-default btn-report"><span class="glyphicon glyphicon-exclamation-sign"></span></button>&nbsp;&nbsp;
		              <button class="btn btn-default btn-like" ng-click="addLike(contest_entry.contest_entry_id)"><span class="glyphicon glyphicon-thumbs-up"></span> @{{ likes.length }} </button>

								</div>
		          </div>
		          <div id="content-wrap">

		            <div class="sider-header">
		              <div class="entry-num">#@{{ contest_entry.contest_entry_no  }}
		                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		              </div>
		              <div class="entry-artist">by

										<a href="<?php echo url("/profile/{{ contest_entry.user_name  }}")?>"> @{{ contest_entry.user_name  }}</a>
									</div>
									<h6> @{{ contest_entry.contest_entry_desc  }}</h6><br>
		            </div>
		            <hr class="convo-hr convo-hr-gray">
		            <div class="comment" >
									<div ng-repeat="comment in comments">
			              <div class="sider-convo">
			                <div class="message-right">
			                  <div class="row">

			                    <img class="img-circle"  src=<?php echo url("/assets/img/profilepics");?>/@{{comment.user_picture}}  style="width:30px; height:30px;">
							
													<button type="button" ng-show="comment.user_id == <?php echo Session::get('userid')?>" ng-click="deleteComment(contest_entry.contest_entry_id,comment.comment_id)" class="close"><span aria-hidden="true">&times;</span></button>

													<span class="sender-name">@{{comment.user_name}}</span>
			                  </div>
			                  <div class="message">
			                    @{{comment.comment_entry}}
			                  </div>
			                </div>
			              </div>
			              <hr class="convo-hr">
									</div>
									<div class="message-box">
										<form class="form-inline" role="form">
											<div class="form-group">
													<input class="form-control message-form" id="comment-entry" type="text" placeholder="Write a comment.." />
													<button class="btn btn-default" ng-click="addComment(contest_entry.contest_entry_id)"><span class="glyphicon glyphicon-comment"></span></button>
											</div>

										</form>
									</div>
		            </div>

		            <div class="report">
		              <h4 class="report-header">Report this design</h4>
									<label id="message-report" class="text-danger" style="font-size:10px;display:none"></label>
		              <h6>Tell us your reason for reporting this design and we'll get into it as fast as we can<span class="red">*</span></h6>


		              <form class="report-form" action=<?php echo url("/contest/entry/report");?> method="POST" enctype="multipart/form-data" id="reportForm">
		                <div class="input-group input-report-form">
											<input type="hidden" name="_token" value="{{ Session::token() }}">
											<input type="hidden" name="contest_entry_id" value="@{{ contest_entry.contest_entry_id  }}">
											<input type="hidden" name="contest_id" value="@{{ contest_entry.contest_id  }}">
		                  <div class="form-group">
		                    <input type="radio" name="report_desc" id="report_desc"> <label>Copy of other design</label>
		                  </div>
		                  <div class="form-group">
		                    <input type="radio" name="report_desc" id="report_desc"> <label>Stock image</label>
		                  </div>
		                  <div class="form-group">
		                    <input type="radio" name="report_desc" id="report_desc"> <label>Inappropriate content</label>
		                  </div>
		                  <div class="form-group report-cmnt">
		                    <label>Comment</label><span class="red">*</span> <br>
		                    <textarea class="report-comment" id="report_comment" name="report_comment">
		                    </textarea>
		                  </div>
											<div class="form-group pull-right">
												<button class="btn btn-default btn-sm" type="button" onclick="document.getElementById('filePhoto').click()" >
															Attach file
															<input  name="picture" type="file" id="filePhoto" style="display: none;" >
												</button>
											</div>
		                </div>
		              <button type="button" id="button" class="btn-md-x straight-header-nav-x" onclick="validateReportForm()">Submit</button> &nbsp;
		              <a id="show" onclick="resetReport()" href="#" >Cancel</a>
									</form>
		            </div>

		          </div>

		      </div>
		    </div>
		  </div>
		</div>
		<!-- End of modal -->
