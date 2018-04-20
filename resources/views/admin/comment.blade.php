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
                    <div class="col-lg-6">
                        <div class="input-group">
                        <span class="input-group-addon">
                            <input type="radio" name="option" ng-model="option" value="normal"  aria-label="...">
                        </span>
                            <input type="text" class="form-control" value="Normal comment" aria-label="...">
                        </div><!-- /input-group -->
                    </div><!-- /.col-lg-6 -->
                </div>
            </div>
        </div><!-- /.row -->

        <div ng-show="option == 'excel'" class="row" style="margin-top: 20px;">
            <div class="col-md-8 col-md-offset-2">
                <form class="form-horizontal" name="excelUploadform" ng-submit="excelUploadSubmitForm()" role="form">
                    <fieldset>
                        <!-- Form Name -->
                        <legend>Excel Upload Option</legend>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="textinput">Upload Excel</label>
                            <div class="col-sm-9">
                                <input type="file" name="uploadExcel" ng-model="excelUploadVM.uploadExcel" placeholder="Upload Excel" class="form-control">
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="textinput">Select Coach</label>
                            <div class="col-sm-9">
                                <select name="coachId" ng-model="excelUploadVM.coachId" class="form-control">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="textinput">Select File</label>
                            <div class="col-sm-9">
                                <select name="fileUploadLogerId" ng-model="excelUploadVM.fileUploadLogerId" class="form-control">
                                    <option>Week1</option>
                                    <option>Week1</option>
                                    <option>Week1</option>
                                    <option>Week1</option>
                                    <option>Week1</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <button type="submit" class="btn btn-default">Cancel</button>
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
                                <select name="coachId" ng-model="normalCommentVM.coachId" class="form-control">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="textinput">Select File</label>
                            <div class="col-sm-9">
                                <select name="fileUploadLogerId" ng-model="normalCommentVM.fileUploadLogerId" class="form-control">
                                    <option>Week1</option>
                                    <option>Week1</option>
                                    <option>Week1</option>
                                    <option>Week1</option>
                                    <option>Week1</option>
                                </select>
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <div class="col-sm-9 col-sm-offset-3">
                                <button class="btn btn-success" ng-click="addNewChoice()">Add fields</button>
                            </div>
                        </div>



                        <!-- Text input-->
                        <div data-ng-repeat="field in choiceSet.choices track by $index">
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="textinput">Message</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" ng-model=" choiceSet.choices[$index]" name="" placeholder="Enter mobile number">
                                </div>
                                <div class="col-sm-1">
                                    <button class="remove" ng-click="removeChoice($index)">-</button>
                                </div>
                            </div>
                        </div>




                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-default">Cancel</button>
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
            $scope.option = 'excel';

            $scope.choiceSet = {choices: []};
            $scope.quest = {};

            $scope.choiceSet.choices = [];
            $scope.addNewChoice = function () {
                $scope.choiceSet.choices.push('');
            };

            $scope.removeChoice = function (z) {
                //var lastItem = $scope.choiceSet.choices.length - 1;
                $scope.choiceSet.choices.splice(z,1);
            };




            /*$scope.messages = [{id: 'message1'}];

            $scope.addNewMessage = function() {
                var newItemNo = $scope.messages.length+1;
                $scope.messages.push({'id':'message'+newItemNo});
            };

            $scope.removeMessage = function() {
                var lastItem = $scope.messages.length-1;
                $scope.messages.splice(lastItem);
            };*/
        });

    </script>
@endsection