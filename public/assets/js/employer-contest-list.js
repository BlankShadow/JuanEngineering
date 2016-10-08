var BASE_URL = 'http://localhost:8000/';
var filter='all-active';
$("#finishedTab").hide();

function closeHeaderNotif(){
  $(".header-notif").hide();
}

app = angular.module('contestApp', []);

app.controller('contestController', function($scope,$http) {


     $scope.getContestsList= function(filter){

         $http({
          method: 'GET',
          dataType: 'JSON',
          url: BASE_URL+'contest/employer/'+filter
        }).then(function(response) {
            $scope.contests = response.data;
        });
     };
     //
     $scope.getContestsList('all-active');

     $scope.switchContestsList = function() {
        selected = $scope.selected;
        $scope.getContestsList(selected);
        if(selected=='finished'){
          $("#activeTab").hide();
          $("#finishedTab").show()
        }else{
          $("#activeTab").show();
          $("#finishedTab").hide();
        }
    };

    $scope.sortContestsList = function() {
       sortBy = $scope.sortBy;
       $scope.getContestsList(sortBy);
    };



});
