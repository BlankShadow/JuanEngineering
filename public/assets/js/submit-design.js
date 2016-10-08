


function readURL(input){

        var reader=new FileReader();
        reader.onload = function (e){
          $("#file-image2").attr('src',e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
        $(".drag").hide();


}

$("#selectedFile").change(function(){
  readURL(this);
});

function validateSubmitDesignForm(){
  var desc=$('#desc').val();
  var flag=true;
  desc= desc.trim();

  if(desc.length<1){
    flag=false;
  }

  //condition for checkbox if checked

  if(flag){
    $("#submitDesignForm").submit();
  }else{
    $('#message').html('<label class="text-danger">Fill out all required fields.</label>');
  }
}
