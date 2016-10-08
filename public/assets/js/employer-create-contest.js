var BASE_URL = 'http://localhost:8000/';


function validateCreateContestForm(){

  var title=$('#title').val();
  var text=$('#text').val();
  var prize=$('#prize').val();
  var desc=$('#desc').val();

  var flag=true;

  title = title.trim();
  text = text.trim();
  prize = prize.trim();
  desc = desc.trim();


  if(title.length<1){
    $('#title').parent().addClass('has-error text-danger');
    flag=false;
  }else{
    $('#title').parent().removeClass('has-error text-danger');
  }

  if(text.length<1){
    $('#text').parent().addClass('has-error text-danger');
    flag=false;
  }else{
    $('#text').parent().removeClass('has-error text-danger');
  }

  if(prize.length<1){
    $('#prize').parent().addClass('has-error text-danger');
    flag=false;
  }else{
    $('#prize').parent().removeClass('has-error text-danger');
  }

  if(desc.length<1){
    $('#desc').parent().addClass('has-error text-danger');
    flag=false;
  }else{
    $('#desc').parent().removeClass('has-error text-danger');
  }

  console.log("Flag value: ",flag);
  if(flag){
    console.log("To submit");
    $("#createContestForm").submit();
  }else{
    $('#message').html('<label class="text-danger">Fill out all required fields.</label>');
  }


}
