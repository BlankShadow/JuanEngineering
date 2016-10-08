<?php
  $categories = array("All categories", "Fine Arts", "Contemporary Arts", "Decorative Arts and Crafts", "Applied Arts", "Body Arts");

?>

<!DOCTYPE html >
<html lang="en">
    <head>
    @include('plugins.plugins-artist-styles')
    </head>

<body>

        <?=$header?>
      <div class="content-body-x ">
        <div class="container min-x">
            <div class="row indention-x">
	            <div class="col-md-6">
	            	<h3 class="header">Discover</h3>
	            </div>

	            <div class="col-md-6">
	                <select class="cat-opts pull-right">
	                    <?php
	                      foreach($categories as $category){
	                        echo "<option value='<?php echo $category?>'>" .$category. "</option>";
	                      }
	                    ?>
	                  </select>
	              </div>
	        </div>

            <div class="row indention-x">
				<?php
					for($x=0;$x<18;$x++){  ?>

				<div class="entry">
					<div class="col-lg-2 col-md-3 col-xs-5 thumb">
						<div class="thumbnail">
							<a data-toggle="modal" data-target="#design-view">
								<img src="http://placehold.it/200x190">
							</a>
							<div class="caption">
								<div class="entry-artist">
									<span>by:
										<a class="" href="view-artist"><i>Yellowcorn</i></a>
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php	}	?>
			</div>

			<div class="row indention-x">
	            <div class="col-md-6">
	            	<h3 class="header">Discover for more</h3>
	            </div>
	        </div>

            <div class="row indention-x">
				<?php
					for($x=0;$x<30;$x++){  ?>

				<div class="entry">
					<div class="col-lg-2 col-md-3 col-xs-5 thumb">
						<div class="thumbnail">
							<a data-toggle="modal" data-target="#design-view">
								<img src="http://placehold.it/200x190">
							</a>
							<div class="caption">
								<div class="entry-artist">
									<span>by:
										<i><a class="" href="view-artist">Yellowcorn</a></i>
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php	}	?>
			</div>

          </div>
        	@include('includes.design-viewmodal')
        	@include('includes.footer')
        </div>

     <script src="{{ asset('assets/js/jquery.js')}}"></script>
     <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>

     <script type="text/javascript">
	  $(document).ready(function(){
	    $(".report").hide();
	    $(".comment").show();

	    $("#report").click(function(){
	        $(".comment").hide();
	        $(".report").show();
	    });
	    $("#show").click(function(){
	        $(".report").hide();
	        $(".comment").show();
	    });

	    $("#submit").click(function(){
	        $(".report").hide();
	        $(".comment").show();
	    });

	  });
	</script>

</body>
</html>
