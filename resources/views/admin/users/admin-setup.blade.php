@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.setup.title')</h3>


    <div class="row"  ng-controller="temsSetupController">
        <form method="POST" ng-submit="submitSetupGraph()">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    @lang('global.setup.graph_create')
                </div>

                <div class="panel-body">
                    <div class="row">

                        <div class="col-lg-4 col-xs-12 form-group">
                            <label for="typeOf">Number of Graph* </label>
                            <select class="form-control" name="typeOf" ng-model="userVM.typeOf" required>
                                <option value="">Select any one</option>
                                <option value="Weekly">Weekly</option>
                                <option value="yearly">yearly</option>
                            </select>
                        </div>
                        <div class="col-lg-4 col-xs-12 form-group">
                            <label for="graphNo">Number of Graph*</label>
                            <input type="number" name="graphNo" class="form-control" ng-model="userVM.graphNo" ng-blur="generateDiv()" required placeholder="Number of Graph">

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
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<% $index %>"
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
                                            <label for="inputEmail3" class="col-sm-3 control-label">Graph Title*</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="graphTitle" ng-model="aGraphp.title" class="form-control" id="inputEmail3" placeholder="graph Title">
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-top: 60px;">
                                            <label for="inputEmail3" class="col-sm-3 control-label">Number Of Column*</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="numberOfCol" ng-model="aGraphp.numberOfKey" ng-blur="generateTitileDiv($index)" class="form-control" id="inputEmail3" placeholder="number Of Col">
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
                                                    <input type="text" name="nameOfCol" class="form-control" ng-model="aSingleEntry.name" required placeholder="Name Of Col">
                                                </div>
                                                <div class="col-lg-4 col-xs-12 form-group">
                                                    <label for="alphabet">Alphabet*</label>
                                                    <input type="text" name="alphabet" class="form-control" ng-model="aSingleEntry.alphabet" required placeholder="alphabet">
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

