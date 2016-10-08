
  var LOGIN_BASE_URL = 'http://localhost:8000/';
  var isEmailValid='false';
  $("response-message").hide();
  $("response-message-password").hide();

  function closeHeaderNotif(){
    $(".header-notif").hide();
  }

  function doesEmailExists(){

    var email = $("#email").val();
    var myURL=LOGIN_BASE_URL+"account-settings/checkemail";

    if(email==''){

      $('#email').parent().removeClass('has-success has-error text-success text-danger');
      isEmailValid="false";

    }else{

      $.ajax({
        url: myURL,
        type: "GET",
        data: ({ 'email' : email}),
        success: function(responseData) {
          if (responseData=='false') {
            $('#email').parent().removeClass('has-error text-danger').addClass('has-success text-success');
            isEmailValid="true";
          }else{
            $('#email').parent().removeClass('has-success text-success').addClass('has-error text-danger');
            isEmailValid="false";
          }
        }
      });

    }

  }



function changeEmail(){

  var data=$("#changeEmailForm" ).serialize();
  var myURL=LOGIN_BASE_URL+"account-settings/changeemail";

  if(isEmailValid =='true' ){

      $.ajax({
        url: myURL,
        type: "GET",
        data: data,
        success: function(responseData) {

          if(responseData=='false'){

               isEmailValid="false";
               $('#response-message').html('<label class="text-danger">Incorrect Password</label>');
               $('#password').parent().addClass('has-error text-danger');

          }else{

              $('#response-message').html('<label class="text-success">Email changed successfully.</label>');
              $('#email').val('');
              $('#password').val('');
              $('#email').parent().removeClass('has-success text-success has-error text-danger');
              $('#password').parent().removeClass('has-success text-success has-error text-danger');

          }
          $('#response-message').fadeIn().delay(5000).fadeOut('slow');
        },
        error: function (responseData) {
          console.log('Error:', responseData);
        }
      });

    }else{

      doesEmailExists();
    }

 }


   function verifyPass(){

     var isValid=false;
     var newPassword=$("#newPassword").val();
     newPassword=newPassword.trim();
     var verifyPassword=$("#verifyPassword").val();
     if(newPassword.length>=8){
       if(newPassword==verifyPassword){
         $('#verifyPassword').parent().removeClass('has-error text-danger');
          $('#newPassword').parent().removeClass('has-error text-danger');
         isValid=true;
       }else{
         $('#verifyPassword').parent().addClass('has-error text-danger');
         isValid=false;
       }
     }else{
       $("#newPassword").parent().addClass('has-error text-danger');
     }

     return isValid;
   }

  function changePassword(){

    if(verifyPass()){

      var data=$("#changePasswordForm" ).serialize();
      var myURL=LOGIN_BASE_URL+"account-settings/changepassword";

      $.ajax({
        url: myURL,
        type: "GET",
        data: data,
        success: function(responseData) {

          if (responseData=='true') {
            $('#response-message-password').html('<label class="text-success">Password changed successfully.</label>');
          }else{
            $('#response-message-password').html('<label class="text-danger">The current password you have entered is incorrect. Please enter a different password.</label>');
          }

          $('#verifyPassword').parent().removeClass('has-error text-danger');
          $('#response-message-password').fadeIn().delay(5000).fadeOut('slow');
          $('#oldPassword').val('');
          $('#newPassword').val('');
          $('#verifyPassword').val('');

        }
      });

    }

  }
