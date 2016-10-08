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
            <div class="row indention-x shop-header">
	            <div class="col-md-5">
	            	<h3 class="shopheader">Creative Shop</h3>
	            </div>
	            <div class="col-md-4 inputtype">
	            	<div class="search-box pull-right">
        				<input class="searchBox" type="text" name="search" placeholder="Search">
        				<span class="glyphicon glyphicon-search searchIcon" aria-hidden="true"></span>
        			</div>
        		</div>
	            <div class="col-md-3 inputtype">
	                <select class="pull-right">
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
					for($x=0;$x<35;$x++){  ?>

				<div class="entry">
					<div class="col-lg-2 col-md-3 col-xs-5 thumb">
						<div class="thumbnail">
							<a data-toggle="modal" data-target="#shop-design">
								<img src="http://placehold.it/200x190">
							</a>
							<div class="caption">
								<div class="entry-artist">
									<span>by:
										<i><a class="" href="artist-view-artist">Yellowcorn</a></i>
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php	}	?>
			</div>
          </div>

          @include('includes.shop-view-designmodal')
          @include('includes.footer')
        </div>

     <script src="{{ asset('assets/js/jquery.js')}}"></script>
     <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>

     <script type="text/javascript">
	  $(document).ready(function(){
	    $(".buy").hide();
	    $(".comment").show();

	    $("#buy").click(function(){
	        $(".comment").hide();
	        $(".buy").show();
	    });
	    $("#show").click(function(){
	        $(".buy").hide();
	        $(".comment").show();
	    });

	    $("#submit").click(function(){
	        $(".buy").hide();
	        $(".comment").show();
	    });

	  });
	</script>

</body>
</html>
