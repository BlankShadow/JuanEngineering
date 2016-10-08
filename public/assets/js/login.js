
var LOGIN_BASE_URL = 'http://localhost:8000/';
var isPasswordLoginValid="false";
var isEmailLoginValid="false";





function doesEmailExists(){
  var email = $("#email-login").val();
  var myURL=LOGIN_BASE_URL+"login/checkemail";
  if(email==''){
    $('#email-login').parent().removeClass('has-success has-error text-success text-danger');
    $('#email-login-message').html('');
    isEmailLoginValid="false";
  }else{
    $.ajax({
      url: myURL,
      type: "GET",
      data: ({ 'email' : email}),
      success: function(responseData) {
        console.log('Success:');
        if (responseData=='true') {
          $('#email-login').parent().removeClass('has-error text-danger').addClass('has-success text-success');
          $('#email-login-message').html('');
          isEmailLoginValid="true";
        }else{
            $('#email-login-message').html('<label class="text-danger">This email address is not registered.</label>');
            $('#email-login').parent().removeClass('has-success text-success').addClass('has-error text-danger');
            isEmailLoginValid="false";
        }
      },
      error: function (responseData) {
      }
    });
  }
}
// function isPasswordLoginValidFunc(){
//   var password = $("#password-login").val().length;
//   if(password>=8){
//     $('#password-login').parent().removeClass('has-error text-danger').addClass('has-success text-success');
//     $('#password-login-message').html('');
//     isPasswordLoginValid="true";
//   }else if(password==0){
//     $('#password-login').parent().removeClass('has-success has-error text-success text-danger');
//     $('#password-login-message').html('');
//     isPasswordLoginValid="false";
//   }else{
//     $('#password-login-message').html('<label class="text-danger">Minimum of 8 characters</label>');
//     $('#password-login').parent().removeClass('has-success text-success').addClass('has-error text-danger');
//     isPasswordLoginValid="false";
//   }

//}

function login(){
  var data=$("#loginForm" ).serialize();
  var myURL=LOGIN_BASE_URL+"login/";
  if(isEmailLoginValid =='true' ){
    $.ajax({
      url: myURL+"checkaccount/",
      type: "GET",
      data: data,
      success: function(responseData) {
        console.log('Success:', responseData);
        if(responseData=='Active'){
          window.location.replace(LOGIN_BASE_URL+"profile");
        }else if(responseData=='New'){
          window.location.replace(LOGIN_BASE_URL+"signup/step-2");

        }else if(responseData=='Suspended'){
            $('#login-message').html('<label class="text-danger">Your account has been suspended.</label>');
            $('#email-login').parent().removeClass('has-success has-error text-success text-danger');
            $('#email-login-message').html('');
            isEmailLoginValid="false";
            $('#password-login').parent().removeClass('has-success has-error text-success text-danger');
            $('#password-login-message').html('');
            isPasswordLoginValid="false";

        }else if(responseData=='Unverified'){
            window.location.replace(LOGIN_BASE_URL+"signup/verifyaccount");

        }else if(responseData=='Invalid'){
           $('#email-login').parent().removeClass('has-success text-success').addClass('has-error text-danger');
           isEmailLoginValid="false";
           $('#login-message').html('<label class="text-danger">Invalid email address/password.</label>');

           $('#password-login').parent().removeClass('has-success text-success').addClass('has-error text-danger');
           isPasswordLoginValid="false";

        }else{
            //If account has no user status or banned, redirect to landing page
            window.location.replace(LOGIN_BASE_URL);
        }
      },
      error: function (responseData) {
        console.log('Error:', responseData);
      }
    });
  }else{
    // isPasswordLoginValidFunc();
    doesEmailExists();
  }
}


function forgotPass(){
  $("#loginmodal").modal("hide");
  $("#forgotmodal").modal("show");
}

$('.modal').on('show.bs.modal', function () {
    if ($(document).height() > $(window).height()) {
        // no-scroll
        $('body').addClass("modal-open-noscroll");
    }
    else {
        $('body').removeClass("modal-open-noscroll");
    }
});
$('.modal').on('hide.bs.modal', function () {
    $('body').removeClass("modal-open-noscroll");
});
function forgotEmail(){
  var email = $("#forgot-email").val();
  var myURL=LOGIN_BASE_URL+"login/checkemail";
  var emailReg= /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
  if(email==''){
    $('#forgot-email-message').parent().removeClass('has-success has-error text-success text-danger');
    $('#forgot-email').html('');
    isEmailLoginValid="false";
  }else{
     if( !emailReg.test( email ) ) {
      $('#forgot-email-message').html('<label class="text-danger">Please enter valid email address.</label>');
      $('#forgot-email').parent().removeClass('has-success text-success').addClass('has-error text-danger');
      isEmailLoginValid="false";
    }
    else{
    $.ajax({
      url: myURL,
      type: "GET",
      data: ({ 'email' : email}),
      success: function(responseData) {
        console.log('Success:');
        if (responseData=='true') {
          $('#forgot-email').parent().removeClass('has-error text-danger').addClass('has-success text-success');
          $('#forgot-email-message').html('');
          isEmailLoginValid="true";
        }else{
            $('#forgot-email-message').html('<label class="text-danger">This email address is not registered.</label>');
            $('#forgot-email').parent().removeClass('has-success text-success').addClass('has-error text-danger');
            isEmailLoginValid="false";
        }
      },
      error: function (responseData) {
      }
    });
  }
  }
}
// function forgotSend(){
//   var data=$("#login-form" ).serialize();
//   var myURL=LOGIN_BASE_URL+"login/forgot";
//     $.ajax({
//       url: myURL,
//       type: "GET",
//       data: data,
//       success: function(responseData) {
//         console.log('Success:', responseData);
//          window.location.replace(LOGIN_BASE_URL);
//       },
//       error: function (responseData) {
//         console.log('Error:', responseData);
//       }
//     });

  
// }

function forgotSend(){
  var data=$("#forgot-form" ).serialize();
  var myURL=LOGIN_BASE_URL+"login/";
  if(isEmailLoginValid=="true"){
    $.ajax({
      url: myURL+"forgot",
      type: "POST",
      data: data,
      success: function(responseData) {
        console.log('Success:', responseData);
         window.location.replace(myURL);
      },
      error: function (responseData) {
        console.log('Error:', responseData);
      }
    });
  }
  else{
    forgotEmail();
  }
  
}

 // function getInTouch(){ 
 //  var data=$("#gitForm" ).serialize();
 //  var myURL=BASE_URL;
 //  if (isEmailValid=="true"){
 //  $.ajax({
 //      url: myURL+"getInTouch",
 //      type: "POST",
 //      data: data,
 //      success: function(responseData) {
 //        console.log('Success:', responseData);
 //         window.alert('Sent!!');

 //         window.location.replace(myURL);
 //      },
 //      error: function (responseData) {
 //        console.log('Error:', responseData);
 //      }
 //    });
 //  }
 //  else{
 //    isEmailValidFunc();
 //  }


