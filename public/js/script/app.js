// Define the `phonecatApp` module
var tms = angular.module('tms', [], function ($interpolateProvider) {

});
tms.config(function ($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});


// Define the `PhoneListController` controller on the `phonecatApp` module
tms.controller('temsSetupController', function temsSetupController($scope) {
    // $scope.userVM.userId = $routeParams.id;

     $scope.graphList = [];
     $scope.generateDiv = function(){
         $scope.graphList = [];
         for(var i=0; i<$scope.userVM.graphNo; i++){
             var info = {
                 title : "",
                 numberOfKey:0,
                 ownData : []
             };
             $scope.graphList.push(info);
         }
     };

     $scope.generateTitileDiv = function(key){

         var information = $scope.graphList[key];
         $scope.graphList[key]['ownData'] = [];
         for(var i=0; i<information.numberOfKey; i++){
             var info = {
                 name : "",
                 alphabet : ""
             };
             information.ownData.push(info);
         }
         $scope.graphList[key] = information;

     };

     $scope.submitSetupGraph = function () {

         $scope.graphList.push($scope.userVM);
         console.log($scope.graphList);
     }



});

