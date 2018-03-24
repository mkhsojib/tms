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

    // $scope.newUserVM = [];
    // $scope.graphVM1 = [];
    // $scope.excelColVM1 = [];
    //
    //
    // $scope.generateDiv = function () {
    //     $scope.newUserVM = [];
    //     $scope.graphVM1 = [];
    //     var graph_count = $scope.userVM.graphNo;
    //
    //     $scope.graphVM = {};
    //
    //     for($i=1; $i <= parseInt(graph_count); $i++){
    //         $scope.graphVM.graphTitle = "";
    //         $scope.graphVM.numberOfCol = "";
    //         $scope.graphVM1.push($scope.graphVM);
    //     }
    //
    //     $scope.newUserVM.push($scope.graphVM1);
    //     $scope.newUserVM.push($scope.userVM);
    //
    //     console.log('part', $scope.newUserVM[0]);
    //
    //     console.log('check1', $scope.newUserVM);
    //
    // }
    // /*$scope.generateTitileDiv = function () {
    //     var other_count = $scope.graphVM.numberOfCol;
    //
    //     for($i=1; $i <= parseInt(other_count); $i++){
    //         $scope.excelColVM.nameOfCol = "";
    //         $scope.excelColVM.alphabet = "";
    //         $scope.excelColVM1.push($scope.excelColVM);
    //     }
    // }*/
    //
    //
    // // console.log('check12', $scope.excelColVM1);
    //
    // $scope.submitSetupGraph = function () {
    //     $scope.userVM.usersId = $scope.userVM.userId;
    //     console.log($scope.userVM);
    // }



});