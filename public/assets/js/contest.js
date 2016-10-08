var BASE_URL = 'http://localhost:8000/';

$(document).ready(function(){
  $("#tab2").hide();
  $("#tab1").show();
  $(".report").hide();
  $(".comment").show();


});

$("#report").click(function(){
    $(".comment").hide();
    $(".report").show();
});

$("#show").click(function(){
    $(".report").hide();
    $(".comment").show();
});

$("#submit").click(function(){
    $(".report").hide();
    $(".comment").show();
});

$('#briefTab').click(function () {
      $("#briefTab").addClass('active');
      $('#designTab').removeClass('active');
      $("#tab2").hide();
      $("#tab1").show();
 });

 $('#designTab').click(function () {
       $("#designTab").addClass('active');
       $('#briefTab').removeClass('active');
       $("#tab2").show();
       $("#tab1").hide();
  });




function validateReportForm(){

  var flag=true;
  var report_comment=$('#report_comment').val();
  report_comment = report_comment.trim();


  if(report_comment.length<1){
    flag=false;
  }

  if($('input:radio:checked').length < 1){
    flag=false;
  }

  if(flag){
    $("#reportForm").submit();

  }else{
    $('#message-report').css('display','block');
    $('#message-report').html('Fill out all required fields to submit report.');
  }

}

function resetReport(){
  $('#message-report').css('display','none');
  $('#message-report').html('');
}

function closeHeaderNotif(){
  $(".header-notif").hide();
}

var app = angular.module('contestView', []);

app.controller('designController', function($scope,$http) {


     $scope.contest_entry = [];

     $scope.getDesignInfo= function(contest_entry_id,user_id,session_user_id){
         $http({
          method: 'GET',
          dataType: 'JSON',
          url: BASE_URL+'contest/entry/'+contest_entry_id
        }).then(function(response) {

            $scope.contest_entry = response.data;

            var loc=BASE_URL+"assets/img/contestentry/"+$scope.contest_entry.file_name;
            $('#file-image').attr("src",loc);
            $('#design-view').modal("show");
            if(user_id==session_user_id){
              $("#report").hide();
            }else{
              $("#report").show();
            }
            $scope.getContestEntryComments(contest_entry_id);
            $scope.getContestEntryLikes(contest_entry_id);

        });
     };


     $scope.getContestEntryComments= function(contest_entry_id){

           $http({
            method: 'GET',
            dataType: 'JSON',
            url: BASE_URL+'contest/entry/'+contest_entry_id+'/comments'
          }).then(function(response) {

              $scope.comments = response.data;

          });
     };


     $scope.getContestEntryLikes= function(contest_entry_id){

           $http({
            method: 'GET',
            dataType: 'JSON',
            url: BASE_URL+'contest/entry/'+contest_entry_id+'/likes'
          }).then(function(response) {
              $scope.likes = response.data;

          });

     };


     $scope.addComment= function(contest_entry_id){

          var comment_entry=$("#comment-entry").val();

           $http({
            method: 'POST',
            url     : BASE_URL+'contest/entry/'+contest_entry_id+'/comment/add',
            data    : 'comment_entry='+comment_entry,
            headers : {'Content-Type': 'application/x-www-form-urlencoded'}
          }).then(function(response) {

              $scope.getContestEntryComments(contest_entry_id);
              $("#comment-entry").val('');

          });

     };


     $scope.deleteComment= function(contest_entry_id,comment_id){

           $http({
            method: 'GET',
            dataType: 'JSON',
            url: BASE_URL+'contest/entry/'+contest_entry_id+'/comment/'+comment_id+'/delete'
          }).then(function(response) {

              $scope.getContestEntryComments(contest_entry_id);

          });

     };


     $scope.addLike= function(contest_entry_id){

           $http({
            method: 'GET',
            dataType: 'JSON',
            url: BASE_URL+'contest/entry/'+contest_entry_id+'/like/add'
          }).then(function(response) {
            $scope.getContestEntryLikes(contest_entry_id);


          });

     };


     $('#design-view').on('hidden.bs.modal', function () {
       $scope.comments = '';
       $(".report").hide();
       $(".comment").show();
    })

});
