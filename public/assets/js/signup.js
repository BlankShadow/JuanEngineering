

var BASE_URL = 'http://localhost:8000/';
var isPasswordValid="false";
var isEmailValid="false";
var category1=0;
var category2=0;
var category3=0;

function isEmailValidFunc(){
  var email = $("#email").val();
  var myURL=BASE_URL+"signup/checkemail";
  var emailReg= /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
  if(email==''){
    $('#email').parent().removeClass('has-success has-error text-success text-danger');
    $('#email-message').html('');
    isEmailValid="false";
  }else{
    if( !emailReg.test( email ) ) {
      $('#email-message').html('<label class="text-danger">Please enter valid email address.</label>');
      $('#email').parent().removeClass('has-success text-success').addClass('has-error text-danger');
      isEmailValid="false";
    }
      else{
    $.ajax({
      url: myURL,
      type: "GET",
      data: ({ 'email' : email}),
      success: function(responseData) {
        console.log('Success:');
        if (responseData=='true') {
            $('#email-message').html('<label class="text-danger">This email address already exists.</label>');
            $('#email').parent().removeClass('has-success text-success').addClass('has-error text-danger');
            isEmailValid="false";
        }else{
            $('#email').parent().removeClass('has-error text-danger').addClass('has-success text-success');
            $('#email-message').html('');
            isEmailValid="true";
        }
      },
      error: function (responseData) {
      }
    });
  }
  }
}

function isPasswordValidFunc(){
  var password = $("#password").val().length;
  if(password>=8){
    $('#password').parent().removeClass('has-error text-danger').addClass('has-success text-success');
    $('#password-message').html('');
    isPasswordValid="true";
  }else if(password==0){
    $('#password').parent().removeClass('has-success has-error text-success text-danger');
    $('#password-message').html('');
    isPasswordValid="false";
  }else{
    $('#password-message').html('<label class="text-danger">Minimum of 8 characters</label>');
    $('#password').parent().removeClass('has-success text-success').addClass('has-error text-danger');
    isPasswordValid="false";
  }

}function signUp(){
  var data=$("#signUpForm" ).serialize();

  var myURL=BASE_URL+"signup/";
  if(isPasswordValid == 'true' && isEmailValid =='true' ){
    $.ajax({
      url: myURL,
      type: "POST",
      data: data,
      success: function(responseData) {
        console.log('Success:', responseData);
         window.location.replace(myURL+"verifyaccount");
      },
      error: function (responseData) {
        console.log('Error:', responseData);
      }
    });
  }else{
    isPasswordValidFunc();
    isEmailValidFunc();
  }
}



function signUp2(){
  var data=$("#signUpForm2" ).serialize();
  var myURL=BASE_URL+"signup/step-2";
  $.ajax({
    url: myURL,
    type: "POST",
    data: data,
    success: function(responseData) {
      console.log('Success:', responseData);
      window.location.replace(BASE_URL+"signup/step-3");
    },
    error: function (responseData) {
      console.log('Error:', responseData);
    }
  });
}

function validateSignUp3(){
  var cat1=$('input[name="category[0][]"]:checked').length;
  var cat2=$('input[name="category[1][]"]:checked').length;
  var cat3=$('input[name="category[2][]"]:checked').length;
  var i=0;
  var flag=true;
  if(cat1>5){
    $('#c0').html('A maximum of five only for this category.');
    $('#c0').parent().addClass('text-danger');
    flag=false;
  }else{
    $('#c0').parent().removeClass('text-danger');
    $('#c0').html('');
  }
  if(cat2>5){
    $('#c1').html('A maximum of five only for this category');
    $('#c1').parent().addClass('text-danger');
    flag=false;
  }else{
    $('#c1').parent().removeClass('text-danger');
    $('#c1').html('');
  }
  if(cat3>5){
    $('#c2').html('A maximum of five only for this category');
    $('#c2').parent().addClass('text-danger');
    flag=false;
  }else{
    $('#c2').parent().removeClass('text-danger');
    $('#c2').html('');
  }

  return flag;
}
function signUp3(){
  var data=$("#signUpForm3" ).serialize();
  var myURL=BASE_URL+"signup/step-3";

  if(validateSignUp3()){
    $.ajax({
      url: myURL,
      type: "POST",
      data: data,
      success: function(responseData) {
        console.log('Success:', responseData);
        window.location.replace(BASE_URL+"signup/step-4");
      },
      error: function (responseData) {
        console.log('Error:', responseData);
      }
    });
  }
}

function fileChosen(){
  var val=$('#selectedFile').val();
  val = val.replace(/.*[\/\\]/, '');
  $('#fileText').val(val);
}

function validateSignUp4(){
  var name=$('#name').val();
  var location=$('#location').val();
  var flag=true;

  location = location.trim();
  name = name.trim();
  if(location.length<1){
    $('#location').parent().addClass('has-error text-danger');
    flag=false;
  }else{
    $('#location').parent().removeClass('has-error text-danger');

  }

  if(name.length<1){
    $('#name').parent().addClass('has-error text-danger');
    flag=false;
  }else{
    $('#name').parent().removeClass('has-error text-danger');

  }

  signUp4(flag);
}


function isUserNameValid(name){

    var regex=/^[a-zA-Z0-9\_]{3,30}$/;
    var flag=regex.test(name);
    return flag;

}

function validateName(){

    var myURL=BASE_URL+"signup/checkusername";
    var name=$("#name").val();
    $.ajax({
      url: myURL,
      type: "GET",
      data: ({ 'username' : name}),
    success: function(responseData) {
        console.log(responseData);
        var valid=isUserNameValid(name);
        if(responseData=='true' || !valid){
          $('#name').parent().addClass('has-error text-danger');
          $('#submitBtn').prop('disabled', true);
        }else{
          $('#name').parent().removeClass('has-error text-danger');
          $('#submitBtn').prop('disabled', false);
        }
      }
    });

}



function signUp4(flag){
  if(flag){
    $("#submitForm").submit();
  }

 }
 function isForgotEmailValid(){
  var email = $("#email").val();
  var myURL=BASE_URL+"signup/checkemail";
  var emailReg= /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
  if(email==''){
    $('#email').parent().removeClass('has-success has-error text-success text-danger');
    $('#email-message').html('');
    isEmailValid="false";
  }else{
    if( !emailReg.test( email ) ) {
      $('#email-message').html('<label class="text-danger">Please enter valid email address.</label>');
      $('#email').parent().removeClass('has-success text-success').addClass('has-error text-danger');
      isEmailValid="false";
    }
      else{
    $.ajax({
      url: myURL,
      type: "GET",
      data: ({ 'email' : email}),
      success: function(responseData) {
        console.log('Success:');
            $('#email').parent().removeClass('has-error text-danger').addClass('has-success text-success');
            $('#email-message').html('');
            isEmailValid="true";
        
      },
      error: function (responseData) {
      }
    });
  }
  }
} 
 function getInTouch(){ 
  var data=$("#gitForm" ).serialize();
  var myURL=BASE_URL;
  if (isEmailValid=="true"){
  $.ajax({
      url: myURL+"getInTouch",
      type: "POST",
      data: data,
      success: function(responseData) {
        console.log('Success:', responseData);
         window.alert('Sent!!');

         window.location.replace(myURL);
      },
      error: function (responseData) {
        console.log('Error:', responseData);
      }
    });
  }
  else{
    isEmailValidFunc();
  }


}