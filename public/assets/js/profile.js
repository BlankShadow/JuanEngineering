var BASE_URL = 'http://localhost:8000/';

function closeHeaderNotif(){
  $(".header-notif").hide();
}

function validateUpdateForm(){
    console.log("Validate Form");
    var name=$('#name').val();
    var location=$('#location').val();
    var flag=true;

    name = name.trim();
    location = location.trim();

    if(name.length<1){
      $('#name').parent().addClass('has-error text-danger');
      flag=false;
    }else{
      $('#name').parent().removeClass('has-error text-danger');
    }

    if(location.length<1){
      $('#location').parent().addClass('has-error text-danger');
      flag=false;
    }else{
      $('#location').parent().removeClass('has-error text-danger');

    }

    submitUpdateForm(flag);

}


function submitUpdateForm(flag){
  console.log("Submit Form");
  if(flag){
    $("#editForm").submit();
  }

}

function readURL(input) {
  $("#image-preview").modal('show');
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
        $('#imgfile-preview').attr('src', e.target.result);
        var height=$('#imgfile-preview').height();
        var width=$('#imgfile-preview').width();
        if(height>=width){
          $('#imgfile-preview').css({ height:200 });
        }
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#filePhoto").change(function() {
  readURL(this);
});

function updateImage(){
  $("#updateImageForm").submit();
}

function validateName(){

    var myURL=BASE_URL+"account-settings/checkusername";
    var name=$("#name").val();
    $.ajax({
      url: myURL,
      type: "GET",
      data: ({ 'username' : name})}).done(function(responseData){

        var valid=isUserNameValid(name);
        if(responseData=='true' || !valid){

          $('#name').parent().addClass('has-error text-danger');
          $('#submitBtn').prop('disabled', true);
        }else{
          $('#name').parent().removeClass('has-error text-danger');
          $('#submitBtn').prop('disabled', false);
        }
    });

}

function isUserNameValid(name){

    var regex=/^[a-zA-Z0-9\_]{3,30}$/;
    var flag=regex.test(name);
    return flag;

}

app = angular.module('profileApp', []);

app.controller('profileController', function($scope,$http) {

  $scope.selected_entry=[];
    $scope.selected_no=12;

  $scope.managePortfolio= function(userid){
    $("#manage-portfolio").modal('show');
      $http({
       method: 'GET',
       dataType: 'JSON',
       url: BASE_URL+'profile/'+userid+'/portfolio'
     }).then(function(response) {
        $scope.contest_entry = response.data;
     });


       $http({
        method: 'GET',
        dataType: 'JSON',
        url: BASE_URL+'profile/'+userid+'/portfolio/get'
      }).then(function(response) {
         $scope.selected_entry = response.data;
         $scope.selected_no-=$scope.selected_entry.length;
         selected_entry=$scope.selected_entry;
         angular.forEach(selected_entry, function(value, key) {
           var selector='#'+value.contest_entry_id;
           $(selector).css("border","3px solid #EEC643");
          });


      });
  };

  $scope.selectEntry= function(entryid,entry){
        var selector='#'+entryid;
        $(selector).css("border","3px solid #EEC643");
        $scope.selected_entry.push(entry);
        $scope.selected_no-=1;
  };

  $scope.removeEntry= function(entry){
        var selector='#'+entry.contest_entry_id;
        $(selector).css("border","none");
        var index = $scope.selected_entry.indexOf(entry);
        $scope.selected_entry.splice(index, 1);
        $scope.selected_no+=1;
  };

    $scope.getNumber = function(num) {
        return new Array(num);
    };

    $scope.savePortfolio=function(){

      $http({
          method  : 'POST',
          url     : BASE_URL+'profile/portfolio/save',
          dataType: JSON,
          data    : { portfolio_entry : $scope.selected_entry }

         })
          .success(function(data) {

              $("#manage-portfolio").modal('hide');
        });
        window.location.reload();
    }

});
