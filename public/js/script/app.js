// Define the `phonecatApp` module
var tms = angular.module('tms', [], function ($interpolateProvider) {

});
tms.config(function ($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});



