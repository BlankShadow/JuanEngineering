var BASE_URL = 'http://localhost:8000/';

var app = angular.module('contestApp', []);

app.controller('contestController', function($scope,$http) {


     $scope.getContestsList= function(){

         $http({
          method: 'GET',
          dataType: 'JSON',
          url: BASE_URL+'contest/browse/'
        }).then(function(response) {
            $scope.contests = response.data;
        });
     };

     $scope.getContestsList();

     $scope.getContestsListBy = function() {
        selected = $scope.selected;
        $scope.getContestsList(selected);
    };


});
