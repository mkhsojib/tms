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

    <div ng-controller="displayCommentController">


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
                                    <th>Comments</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr ng-repeat="aBody in comments">
                                    <td><% aBody.message %></td>
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

    <script>

        angular.module('tms').controller("displayCommentController", function ($scope, $http) {

            $scope.weekList = [];
            $scope.comments = [];
            var url = "{{ route('admin.comment.coachWeeklist',[0]) }}"
            $http({
                method: "get",
                url:  url
            }).then(function mySuccess(response) {
                var info = response.data;
                if (info.success) {

                    $scope.weekList = info.weeklist;
                    $scope.comments = info.comments;
                }else{
                    alert("no updated data");
                }
                console.log(response.data);

            }, function myError(response) {

            });





        });






    </script>
@endsection