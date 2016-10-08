

function follow(userid){
  $.ajax({
    url: 'http://localhost:8000/'+'profile/'+userid+'/follow',
    type: "GET",
    success: function(responseData) {
    
      if(responseData=='unfollowed'){
        $('#follow').val('Follow');
        $('#followers_count').text(parseInt($("#followers_count").text()) - 1);
      }
      else{
        $('#follow').val('Unfollow');
        $('#followers_count').text(parseInt($("#followers_count").text()) + 1);
      }
    }
  });


}
