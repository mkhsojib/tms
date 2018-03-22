@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.setup.title')</h3>


    <div class="row" ng-controller="temsSetupController">
        <form method="POST" ng-submit="submitSetupGraph()">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        @lang('global.setup.graph_create')
                    </div>

                    <div class="panel-body">
                        <div class="row">

                            <div class="col-lg-4 col-xs-12 form-group">
                                <label for="typeOf">Type of Graph Display* </label>
                                <select class="form-control" name="typeOf" ng-model="userVM.typeOf" required>
                                    <option value="">Select any one</option>
                                    <option value="Weekly">Weekly</option>
                                    <option value="yearly">yearly</option>
                                </select>
                            </div>
                            <div class="col-lg-4 col-xs-12 form-group">
                                <label for="graphNo">Number of Graph*</label>
                                <input type="number" name="graphNo" class="form-control" ng-model="userVM.graphNo"
                                       ng-blur="generateDiv()" required placeholder="Number of Graph">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default" ng-repeat="aGraphp in graphList">
                        <div class="panel-heading" role="tab" id="heading<% $index %>">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion"
                                   href="#collapse<% $index %>"
                                   aria-expanded="true" aria-controls="collapse<% $index %>">
                                    Graph No <% $index %>
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel"
                             aria-labelledby="heading<% $index %>">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-8" style="margin-top: 23px;">
                                        <div class="row">
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-3 control-label">Graph
                                                    Title*</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="graphTitle" ng-model="aGraphp.title"
                                                           class="form-control" id="inputEmail3"
                                                           placeholder="graph Title">
                                                </div>
                                            </div>
                                            <div class="form-group" style="margin-top: 60px;">
                                                <label for="inputEmail3" class="col-sm-3 control-label">Number Of
                                                    Column*</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="numberOfCol" ng-model="aGraphp.numberOfKey"
                                                           ng-blur="generateTitileDiv($index)" class="form-control"
                                                           id="inputEmail3" placeholder="number Of Col">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="row">
                                            <div class="col-lg-12" ng-repeat="aSingleEntry in aGraphp.ownData">
                                                <div class="row">
                                                    <div class="col-lg-8 col-xs-12 form-group">
                                                        <label for="nameOfCol">Name Of Graph Column*</label>
                                                        <input type="text" name="nameOfCol" class="form-control"
                                                               ng-model="aSingleEntry.name" required
                                                               placeholder="Name Of Col">
                                                    </div>
                                                    <div class="col-lg-4 col-xs-12 form-group">
                                                        <label for="alphabet">Alphabet*</label>
                                                        <input type="text" name="alphabet" class="form-control"
                                                               ng-model="aSingleEntry.alphabet" required
                                                               placeholder="alphabet">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-offset-5 col-lg-6">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <button type="reset" class="btn btn-danger">reset</button>
                    </div>
                </div>
            </div>
        </form>
    </div>


@stop

@section('javascript')
    <script>
        // Define the `PhoneListController` controller on the `phonecatApp` module
        angular.module('tms').controller('temsSetupController', function temsSetupController($scope, $http) {
            // $scope.userVM.userId = $routeParams.id;

            $scope.userVM = {};
            $scope.graphList = [];
            $scope.GetGraphData = function () {

                $http({
                    method : "get",
                    url : '{{ route('admin.users.getGraph',[$id]) }}'
                }).then(function mySuccess(response) {
                    $scope.graphList = response.data.generated_data;
                    $scope.userVM.graphNo = $scope.graphList.length;
                }, function myError(response) {
                    $scope.myWelcome = response.statusText;
                });
            };
            $scope.GetGraphData();
            $scope.generateDiv = function () {
                $scope.graphList = [];
                for (var i = 0; i < $scope.userVM.graphNo; i++) {
                    var info = {
                        title: "",
                        numberOfKey: 0,
                        ownData: []
                    };
                    $scope.graphList.push(info);
                }
            };

            $scope.generateTitileDiv = function (key) {
                var information = $scope.graphList[key];
                $scope.graphList[key]['ownData'] = [];
                for (var i = 0; i < information.numberOfKey; i++) {
                    var info = {
                        name: "",
                        alphabet: ""
                    };
                    information.ownData.push(info);
                }
                $scope.graphList[key] = information;

            };

            $scope.submitSetupGraph = function () {
                var submitInfo = {
                    '_token':'{{ csrf_token() }}',
                    'graph_data':$scope.graphList,
                    'graph_type':$scope.userVM.typeOf,
                    'user_id': '{{$id}}'
                };
                $http({
                    method : "post",
                    url : '{{ route('admin.users.totalInsertGraph') }}',
                    data: JSON.stringify(submitInfo)
                }).then(function mySuccess(response) {
                    alert(response.data.message);
                }, function myError(response) {
                    $scope.myWelcome = response.statusText;
                });

            }


        });
    </script>
@endsection