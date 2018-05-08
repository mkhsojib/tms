@extends('layouts.app')

@section('content')
    <style>
        .table > tbody > tr > td {
            line-height: 0.42;
        }

        .table-responsive > .fixed-column {
            position: absolute;
            display: inline-block;
            width: auto;
            border-right: 1px solid #ddd;
        }

        @media (min-width: 768px) {
            .table-responsive > .fixed-column {
                display: none;
            }
        }



    </style>

    <div ng-controller="dashboardGraphController">
        <div class="row">
            <div class="col-md-3" ng-repeat="aGraph in graphList">
                <strong><% aGraph.graph_name %></strong>
                <canvas width="400" height="300" id="polar-area" class="chart chart-pie"
                        chart-data="aGraph.data" chart-labels="aGraph.labels" chart-options="options">
                </canvas>
            </div>
        </div>

        <div class="row" style="margin-top:100px;">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="form-inline">

                            <div class="form-group">
                                <label for="exampleInputEmail2">Week Name</label>
                                <select class="form-control"  id="changeWeek">
                                    <option value="<% aWeek.id %>"   ng-repeat="aWeek in weekList"><% aWeek.week_name %></option>
                                    {{--@foreach($weekList as $week)--}}
                                    {{--<option {{request()->id!=null && request()->id==$week->id?'selected':''}} value="{{$week->id}}">{{$week->week_name}}</option>--}}
                                    {{--@endforeach--}}

                                </select>
                            </div>

                        </div>

                    </div>

                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover table-condensed"
                                   id="excellTable">
                                <thead>
                                <tr>
                                    <th ng-repeat="aHeader in excellDataHeader" repeat-end="onEnd()"><% aHeader %></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr ng-repeat="aBody in excellDataBody">
                                    <td ng-repeat="aTd in aBody"><% aTd %></td>
                                </tr>
                                <tbody>
                            </table>


                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
@section('javascript')
    <script src="{{ asset('/js/Chart.min.js') }}"></script>
    <script src="{{ asset('/js/angular-chart.min.js') }}"></script>
    <script src="{{ asset('/js/tableHeadFixer.js') }}"></script>
    <script>
       // var jQuery = $.noConflict();
        angular.module('tms').requires.push('chart.js');
        angular.module('tms').config(['ChartJsProvider', function (ChartJsProvider) {
            // Configure all charts
            ChartJsProvider.setOptions({
                chartColors: ['#FF6384', '#FFCD56'],
                responsive: true,
                type: 'pie'
            });
        }]);
        angular.module('tms').directive("repeatEnd", function(){
            return {
                restrict: "A",
                link: function (scope, element, attrs) {
                    if (scope.$last) {
                        scope.$eval(attrs.repeatEnd);
                    }
                }
            };
        });
        angular.module('tms').controller("dashboardGraphController", function ($scope, $http,$timeout) {
            $scope.graphList = [];
            $scope.excellDataHeader = [];
            $scope.excellDataBody = [];
            $scope.weekList = [];
            $scope.selectweek = {};

            jQuery("#changeWeek").on('change',function () {
                var optionSelected = jQuery("option:selected", this).val();
                $scope.generateMyData(optionSelected,true);
            });

            $scope.onEnd = function(){

                $timeout(function(){
                    jQuery("#excellTable").tableHeadFixer({'left': 2});
                   // alert(document.getElementById("excellTable").getElementsByTagName("tr").length);
                }, 10);
            };


            $scope.generateMyData = function (id,statusData) {
                var url = "{{ route('admin.coach.dashboardData') }}";
                if(id !== undefined){
                    url += "/"+id;
                }
                $http({
                    method: "get",
                    url: url
                }).then(function mySuccess(response) {
                    var info = response.data;
                    if (info.success) {
                        $scope.graphList = [];
                        info.graph.forEach(function (aData) {
                            $scope.graphList.push({
                                "graph_name": aData.graph_name,
                                "labels": aData.labels,
                                "data": [aData.yes, aData.no]
                            });
                        });
                        $scope.excellDataHeader = info.excellData[0];
                        $scope.excellDataBody = info.excellData;
                        $scope.excellDataBody.shift();

                        if (statusData === undefined) {
                            $scope.weekList = info.week_list;
                            $scope.selectweek = $scope.weekList[0];
                        }


                        console.log("my body", $scope.excellDataBody);

                    }
                    console.log(response.data);

                }, function myError(response) {

                }).then(function () {

                });
            };

            $scope.generateMyData();


        });
        jQuery(document).ready(function () {
          //



            jQuery('#changeWeek').on('change', function () {
                var info = jQuery("#changeWeek").val();
                window.location = "{{url('admin/home')}}/" + info;//here double curly bracket
            });


        });





    </script>
@endsection