// Define the `phonecatApp` module
var tms = angular.module('tms', []);

// Define the `PhoneListController` controller on the `phonecatApp` module
tms.controller('temsSetupController', function temsSetupController($scope) {

    $scope.userVM = {};

    // $scope.userVM.userId = $routeParams.id;

    $scope.generateDiv = function () {
        $scope.userVM.graphNo
    }

    $scope.submitSetupGraph = function () {
        $scope.userVM.usersId = $scope.userVM.userId;
        console.log($scope.userVM);
    }



});