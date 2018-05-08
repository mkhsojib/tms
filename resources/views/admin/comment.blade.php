@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <style>
        .remove{
            background: #C76868;
            color: #FFF;
            font-weight: bold;
            font-size: 21px;
            border: 0;
            cursor: pointer;
            display: inline-block;
            padding: 4px 9px;
            vertical-align: top;
            line-height: 100%;
        }
    </style>
    <div ng-controller="commentController">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="input-group">
                        <span class="input-group-addon">
                            <input type="radio" name="option" ng-model="option" value="excel" aria-label="...">
                        </span>
                            <input type="text" class="form-control" value="Excel" aria-label="...">
                        </div><!-- /input-group -->
                    </div><!-- /.col-lg-6 -->
                    {{--<div class="col-lg-6">--}}
                        {{--<div class="input-group">--}}
                        {{--<span class="input-group-addon">--}}
                            {{--<input type="radio" name="option" ng-model="option" value="normal"  aria-label="...">--}}
                        {{--</span>--}}
                            {{--<input type="text" class="form-control" value="Normal comment" aria-label="...">--}}
                        {{--</div><!-- /input-group -->--}}
                    {{--</div><!-- /.col-lg-6 -->--}}
                </div>
            </div>
        </div><!-- /.row -->

        <div ng-show="option == 'excel'" class="row" style="margin-top: 20px;">
            <div class="col-md-8 col-md-offset-2">
                <form class="form-horizontal" name="excelUploadform" method="POST" action="{{route('admin.comment.insert')}}" enctype="multipart/form-data" role="form">
                    <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                    <fieldset>
                        <!-- Form Name -->
                        <legend>Excel Upload Option</legend>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="textinput">Upload Excel</label>
                            <div class="col-sm-9">
                                <input type="file" name="file" ng-model="excelUploadVM.uploadExcel" placeholder="Upload Excel" class="form-control">
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="textinput">Select Coach</label>
                            <div class="col-sm-9">
                                <select ng-change="getCoach()" name="coachId" id="mySelect"
                                        ng-options="option.name for option in CoachList track by option.id"
                                        ng-model="excelUploadVM.coachId" class="form-control">
                                    <option value="">Select a Coach</option>
                                </select>
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="textinput">Select File</label>
                            <div class="col-sm-9">
                                <select ng-change="getCoach()" name="weekId" id="mySelect"
                                        ng-options="option.week_name for option in WeekList track by option.id"
                                        ng-model="excelUploadVM.weekId" class="form-control">
                                    <option value="">Select a TimePreod</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </div>

                    </fieldset>
                </form>
            </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->
        <div ng-show="option == 'normal'" class="row" style="margin-top: 20px;">
            <div class="col-md-8 col-md-offset-2">
                <form class="form-horizontal" name="normalCommentForm" ng-submit="normalCommentSubmir()" role="form">
                    <fieldset>
                        <!-- Form Name -->
                        <legend>Normal Comment Option</legend>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="textinput">Select Coach</label>
                            <div class="col-sm-9">
                                <select ng-change="getCoach()" name="coachId" id="mySelect"
                                        ng-options="option.name for option in CoachList track by option.id"
                                        ng-model="excelUploadVM.coachId" class="form-control">
                                    <option value="">Select a Coach</option>
                                </select>
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="textinput">Select File</label>
                            <div class="col-sm-9">
                                <select ng-change="getCoach()" name="weekId" id="mySelect"
                                        ng-options="option.week_name for option in WeekList track by option.id"
                                        ng-model="excelUploadVM.weekId" class="form-control">
                                    <option value="">Select a TimePreod</option>
                                </select>
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <div class="col-sm-9 col-sm-offset-3">
                                <button class="btn btn-success" ng-click="addNewChoice($event)">Add Comment</button>
                            </div>
                        </div>



                        <!-- Text input-->
                        <div data-ng-repeat="field in choiceSet.choices track by $index">
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="textinput">Comments</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" ng-model="choiceSet.choices[$index]" name="" placeholder="Enter Comment Here">
                                </div>
                                <div class="col-sm-1">
                                    <button class="remove" ng-click="removeChoice($event,$index)">-</button>
                                </div>
                            </div>
                        </div>




                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </div>

                    </fieldset>
                </form>
            </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->
    </div>

@stop

@section('javascript')
   <script>
        // var jQuery = $.noConflict();

        angular.module('tms').controller("commentController", function ($scope, $http) {


            $scope.CoachList = [];
            $scope.WeekList = [];

            $http({
                method: "get",
                url:  "{{ route('admin.comment.coach') }}",
            }).then(function mySuccess(response) {
                var info = response.data;
                if (info.success) {

                    $scope.CoachList = info.coachList;
                }
                console.log(response.data);

            }, function myError(response) {

            });


            $scope.getCoach = function(){
                console.log($scope.excelUploadVM.coachId);
                var url = "{{ route('admin.comment.coachWeeklist') }}/"+$scope.excelUploadVM.coachId.id;
                $http({
                    method: "get",
                    url:  url
                }).then(function mySuccess(response) {
                    var info = response.data;
                    if (info.success) {

                        $scope.WeekList = info.weeklist;
                    }else{
                        alert("no updated data");
                    }
                    console.log(response.data);

                }, function myError(response) {

                });
            };
            $scope.option = 'excel';

            $scope.choiceSet = {choices: []};
            $scope.quest = {};

            $scope.choiceSet.choices = [];
            $scope.addNewChoice = function (event) {
                $scope.choiceSet.choices.push('');
                event.preventDefault();
            };

            $scope.removeChoice = function (event,z) {
                $scope.choiceSet.choices.splice(z,1);
                event.preventDefault();
            };
            
            
            $scope.normalCommentSubmir = function () {
                var coachId = $scope.excelUploadVM.coachId.id;
                var FileUploadId = $scope.excelUploadVM.weekId.id;
                var comments = $scope.choiceSet.choices;

                $http({
                    method: "post",
                    url:  "{{ route('admin.comment.store') }}",
                    data: JSON.stringify({
                        coachId : coachId,
                        fileUploadId : FileUploadId,
                        comments:comments
                    })
                }).then(function mySuccess(response) {
                    var info = response.data;
                    if (info.success) {

                        alert("comments insert successfully");
                        $scope.choiceSet.choices = [];
                        $scope.excelUploadVM = {};
                    }else{
                        alert("something wrong");
                    }


                }, function myError(response) {

                });
            }

        });

    </script>
@endsection