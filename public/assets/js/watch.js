

function watch(contestid){
  $.ajax({
    url: 'http://localhost:8000/'+'contest/'+contestid+'/watch',
    type: "GET",
    success: function(responseData) {
      if(responseData=='unwatched'){

        $('#watch').text('Watch');
      }
      else{
        $('#watch').text('Watched');
      }
    }
  });


}
