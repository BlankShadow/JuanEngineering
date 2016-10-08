<!DOCTYPE html >
<html lang="en">
    <head>
        @include('plugins.plugins-styles')
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
    </head>

<body>

    @include('includes.index-header')

    <div id="exp" class="content-body-x">
        <div class="container min-x">
          <form role="form"  method="POST"  autocomplete="off" id="signUpForm3">
          <input type="hidden" name="_token" value="{{ Session::token() }}">
            <div class="row">
                <div class="col-md-12">
                   <span class="header">
                        What are your expertise?
                   </span>
                   <span class="helper">
                       Select maximum of  five per category
                   </span>
                </div> <!-- /.col-xs-12 -->
            </div> <!-- /.row -->

            <div class="category">
              <?php $i=0;
                  foreach ($classification as $c) {
              ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 type="button" class="panel-title">
                                <?php echo " ". $c->classification_name ." "; ?>
                            </h3>
                            <span class="pull-right"><i class="glyphicon glyphicon-chevron-down"></i></span>
                        </div>
                        <div class="panel-body">
                            <div class="row" ><label id="c<?php echo $i?>"></label></div>
                            <?php
                                foreach ($category as $cat) {  ?>
                                    <?php
                                        if($cat->classification_id != $c->classification_id){
                                          echo "<div class='row'>";
                                        }
                                        if($cat->classification_id == $c->classification_id){
                                          echo "<div class='col-md-4'><input type='checkbox' name='category[".$i."][]' value='".$cat->category_id."'>
                                            <span class='choice'>". $cat->category_name."
                                            </span></div>";
                                            }
                                        if($cat->classification_id != $c->classification_id){
                                          echo "</div>";
                                        }

                                    ?>
                            <?php  } ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php $i++;  }  ?>
          </div>

        <div class="input-group">
            <input class="btn btn-md" type="button" onclick="signUp3()" value="Next">
        </div>
        </form>
      </div>
      @include('includes.footer')
    </div>



      <script src="{{ asset('assets/js/signup.js')}}"></script>

      <script type="text/javascript">
          $(document).ready(function(){
              $('.panel-body').hide();
              $(document).on('click', '.panel-heading', function(e){
                  var $this = $(this);
                  if(!$this.hasClass('panel-collapsed')) {
                      $this.parents('.panel').find('.panel-body').slideUp();
                      $this.addClass('panel-collapsed');
                      $this.find('i').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
                  } else {
                      $this.parents('.panel').find('.panel-body').slideDown();
                      $this.removeClass('panel-collapsed');
                      $this.find('i').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
                  }
              });
          });
      </script>

    </body>
</html>
