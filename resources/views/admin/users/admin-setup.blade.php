@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.setup.title')</h3>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    @lang('global.setup.graph_create')
                </div>

                <div class="panel-body">
                    <div class="row">
                        {!! Form::open(['method' => 'POST', 'route' => ['admin.users.store']]) !!}
                        <div class="col-lg-4 col-xs-12 form-group">
                            {!! Form::label('graphNo', 'Number of Graph*', ['class' => 'control-label']) !!}
                            {!! Form::text('graphNo', old('graphNo'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('graphNo'))
                                <p class="help-block">
                                    {{ $errors->first('graphNo') }}
                                </p>
                            @endif
                        </div>
                        <div class="col-lg-4 col-xs-12 form-group">
                            {!! Form::label('typeOf', 'Type of*', ['class' => 'control-label']) !!}
                            {{ Form::select('typeOf', [ 'weekly' => 'Weekly', 'yearly' => 'Yearly' ], old('typeOf'), ['class' => 'form-control', 'required' => ''])}}
                            <p class="help-block"></p>
                            @if($errors->has('typeOf'))
                                <p class="help-block">
                                    {{ $errors->first('typeOf') }}
                                </p>
                            @endif
                        </div>
                        <div class="col-lg-4 col-xs-12 form-group" style="margin-top: 25px;">
                            {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-success']) !!}
                            {!! Form::reset(trans('global.app_reset'), ['class' => 'btn btn-danger']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
                               aria-expanded="true" aria-controls="collapseOne">
                                Graph No 1
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel"
                         aria-labelledby="headingOne">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-8" style="margin-top: 23px;">
                                    <div class="row">

                                            {!! Form::open(['method' => 'POST', 'route' => ['admin.users.store'],'class' => 'form-horizontal']) !!}
                                            <div class="form-group">
                                                {!! Form::label('graphTitle', 'Graph Title*', ['class' => 'col-sm-3 control-label text-right']) !!}
                                                <div class="col-sm-9">
                                                    {!! Form::text('graphTitle', old('graphTitle'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                                                    <p class="help-block"></p>
                                                    @if($errors->has('graphNo'))
                                                        <p class="help-block">
                                                            {{ $errors->first('graphNo') }}
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                {!! Form::label('numberOfCol', 'Number Of Column*', ['class' => 'col-sm-3 control-label text-right']) !!}
                                                <div class="col-sm-9">
                                                    {{ Form::text('numberOfCol', old('typeOf'), ['class' => 'form-control', 'required' => ''])}}
                                                    <p class="help-block"></p>
                                                    @if($errors->has('typeOf'))
                                                        <p class="help-block">
                                                            {{ $errors->first('typeOf') }}
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-offset-3 col-sm-9">
                                                    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-success']) !!}
                                                    {!! Form::reset(trans('global.app_reset'), ['class' => 'btn btn-danger']) !!}
                                                </div>
                                            </div>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="row">
                                        {!! Form::open(['method' => 'POST', 'route' => ['admin.users.store']]) !!}
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-lg-8 col-xs-12 form-group">
                                                    {!! Form::label('NameOfCol', 'Name Of Graph Column*', ['class' => 'control-label']) !!}
                                                    {!! Form::text('NameOfCol', old('NameOfCol'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                                                    <p class="help-block"></p>
                                                    @if($errors->has('graphNo'))
                                                        <p class="help-block">
                                                            {{ $errors->first('graphNo') }}
                                                        </p>
                                                    @endif
                                                </div>
                                                <div class="col-lg-4 col-xs-12 form-group">
                                                    {!! Form::label('numberOfCol', 'Alphabet*', ['class' => 'control-label']) !!}
                                                    {{ Form::text('numberOfCol', old('typeOf'), ['class' => 'form-control', 'required' => ''])}}
                                                    <p class="help-block"></p>
                                                    @if($errors->has('typeOf'))
                                                        <p class="help-block">
                                                            {{ $errors->first('typeOf') }}
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-lg-8 col-xs-12 form-group">
                                                    {!! Form::label('NameOfCol', 'Name Of Graph Column*', ['class' => 'control-label']) !!}
                                                    {!! Form::text('NameOfCol', old('NameOfCol'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                                                    <p class="help-block"></p>
                                                    @if($errors->has('graphNo'))
                                                        <p class="help-block">
                                                            {{ $errors->first('graphNo') }}
                                                        </p>
                                                    @endif
                                                </div>
                                                <div class="col-lg-4 col-xs-12 form-group">
                                                    {!! Form::label('numberOfCol', 'Alphabet*', ['class' => 'control-label']) !!}
                                                    {{ Form::text('numberOfCol', old('typeOf'), ['class' => 'form-control', 'required' => ''])}}
                                                    <p class="help-block"></p>
                                                    @if($errors->has('typeOf'))
                                                        <p class="help-block">
                                                            {{ $errors->first('typeOf') }}
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-lg-8 col-xs-12 form-group">
                                                    {!! Form::label('NameOfCol', 'Name Of Graph Column*', ['class' => 'control-label']) !!}
                                                    {!! Form::text('NameOfCol', old('NameOfCol'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                                                    <p class="help-block"></p>
                                                    @if($errors->has('graphNo'))
                                                        <p class="help-block">
                                                            {{ $errors->first('graphNo') }}
                                                        </p>
                                                    @endif
                                                </div>
                                                <div class="col-lg-4 col-xs-12 form-group">
                                                    {!! Form::label('numberOfCol', 'Alphabet*', ['class' => 'control-label']) !!}
                                                    {{ Form::text('numberOfCol', old('typeOf'), ['class' => 'form-control', 'required' => ''])}}
                                                    <p class="help-block"></p>
                                                    @if($errors->has('typeOf'))
                                                        <p class="help-block">
                                                            {{ $errors->first('typeOf') }}
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-lg-12 col-xs-12 form-group" style="margin-top: 25px;">
                                                    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-success']) !!}
                                                    {!! Form::reset(trans('global.app_reset'), ['class' => 'btn btn-danger']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingTwo">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                               href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Graph No 2
                            </a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-8"  style="margin-top: 23px;">
                                    <div class="row">

                                        {!! Form::open(['method' => 'POST', 'route' => ['admin.users.store'],'class' => 'form-horizontal']) !!}
                                        <div class="form-group">
                                            {!! Form::label('graphTitle', 'Graph Title*', ['class' => 'col-sm-3 control-label text-right']) !!}
                                            <div class="col-sm-9">
                                                {!! Form::text('graphTitle', old('graphTitle'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                                                <p class="help-block"></p>
                                                @if($errors->has('graphNo'))
                                                    <p class="help-block">
                                                        {{ $errors->first('graphNo') }}
                                                    </p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('numberOfCol', 'Number Of Column*', ['class' => 'col-sm-3 control-label text-right']) !!}
                                            <div class="col-sm-9">
                                                {{ Form::text('numberOfCol', old('typeOf'), ['class' => 'form-control', 'required' => ''])}}
                                                <p class="help-block"></p>
                                                @if($errors->has('typeOf'))
                                                    <p class="help-block">
                                                        {{ $errors->first('typeOf') }}
                                                    </p>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-9">
                                                {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-success']) !!}
                                                {!! Form::reset(trans('global.app_reset'), ['class' => 'btn btn-danger']) !!}
                                            </div>
                                        </div>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="row">
                                        {!! Form::open(['method' => 'POST', 'route' => ['admin.users.store']]) !!}
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-lg-8 col-xs-12 form-group">
                                                    {!! Form::label('NameOfCol', 'Name Of Graph Column*', ['class' => 'control-label']) !!}
                                                    {!! Form::text('NameOfCol', old('NameOfCol'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                                                    <p class="help-block"></p>
                                                    @if($errors->has('graphNo'))
                                                        <p class="help-block">
                                                            {{ $errors->first('graphNo') }}
                                                        </p>
                                                    @endif
                                                </div>
                                                <div class="col-lg-4 col-xs-12 form-group">
                                                    {!! Form::label('numberOfCol', 'Alphabet*', ['class' => 'control-label']) !!}
                                                    {{ Form::text('numberOfCol', old('typeOf'), ['class' => 'form-control', 'required' => ''])}}
                                                    <p class="help-block"></p>
                                                    @if($errors->has('typeOf'))
                                                        <p class="help-block">
                                                            {{ $errors->first('typeOf') }}
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-lg-8 col-xs-12 form-group">
                                                    {!! Form::label('NameOfCol', 'Name Of Graph Column*', ['class' => 'control-label']) !!}
                                                    {!! Form::text('NameOfCol', old('NameOfCol'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                                                    <p class="help-block"></p>
                                                    @if($errors->has('graphNo'))
                                                        <p class="help-block">
                                                            {{ $errors->first('graphNo') }}
                                                        </p>
                                                    @endif
                                                </div>
                                                <div class="col-lg-4 col-xs-12 form-group">
                                                    {!! Form::label('numberOfCol', 'Alphabet*', ['class' => 'control-label']) !!}
                                                    {{ Form::text('numberOfCol', old('typeOf'), ['class' => 'form-control', 'required' => ''])}}
                                                    <p class="help-block"></p>
                                                    @if($errors->has('typeOf'))
                                                        <p class="help-block">
                                                            {{ $errors->first('typeOf') }}
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-lg-8 col-xs-12 form-group">
                                                    {!! Form::label('NameOfCol', 'Name Of Graph Column*', ['class' => 'control-label']) !!}
                                                    {!! Form::text('NameOfCol', old('NameOfCol'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                                                    <p class="help-block"></p>
                                                    @if($errors->has('graphNo'))
                                                        <p class="help-block">
                                                            {{ $errors->first('graphNo') }}
                                                        </p>
                                                    @endif
                                                </div>
                                                <div class="col-lg-4 col-xs-12 form-group">
                                                    {!! Form::label('numberOfCol', 'Alphabet*', ['class' => 'control-label']) !!}
                                                    {{ Form::text('numberOfCol', old('typeOf'), ['class' => 'form-control', 'required' => ''])}}
                                                    <p class="help-block"></p>
                                                    @if($errors->has('typeOf'))
                                                        <p class="help-block">
                                                            {{ $errors->first('typeOf') }}
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-lg-12 col-xs-12 form-group" style="margin-top: 25px;">
                                                    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-success']) !!}
                                                    {!! Form::reset(trans('global.app_reset'), ['class' => 'btn btn-danger']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingThree">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                               href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Graph No 3
                            </a>
                        </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel"
                         aria-labelledby="headingThree">
                        <div class="panel-body">

                            <div class="row">
                                <div class="col-lg-8" style="margin-top: 23px;">
                                    <div class="row">
                                        {!! Form::open(['method' => 'POST', 'route' => ['admin.users.store']]) !!}
                                        <div class="col-lg-4 col-xs-12 form-group">
                                            {!! Form::label('graphTitle', 'Graph Title*', ['class' => 'control-label']) !!}
                                            {!! Form::text('graphTitle', old('graphTitle'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                                            <p class="help-block"></p>
                                            @if($errors->has('graphNo'))
                                                <p class="help-block">
                                                    {{ $errors->first('graphNo') }}
                                                </p>
                                            @endif
                                        </div>
                                        <div class="col-lg-4 col-xs-12 form-group">
                                            {!! Form::label('numberOfCol', 'Number Of Column*', ['class' => 'control-label']) !!}
                                            {{ Form::text('numberOfCol', old('typeOf'), ['class' => 'form-control', 'required' => ''])}}
                                            <p class="help-block"></p>
                                            @if($errors->has('typeOf'))
                                                <p class="help-block">
                                                    {{ $errors->first('typeOf') }}
                                                </p>
                                            @endif
                                        </div>
                                        <div class="col-lg-4 col-xs-12 form-group" style="margin-top: 25px;">
                                            {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-success']) !!}
                                            {!! Form::reset(trans('global.app_reset'), ['class' => 'btn btn-danger']) !!}
                                        </div>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="row">
                                        {!! Form::open(['method' => 'POST', 'route' => ['admin.users.store']]) !!}
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-lg-8 col-xs-12 form-group">
                                                    {!! Form::label('NameOfCol', 'Name Of Graph Column*', ['class' => 'control-label']) !!}
                                                    {!! Form::text('NameOfCol', old('NameOfCol'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                                                    <p class="help-block"></p>
                                                    @if($errors->has('graphNo'))
                                                        <p class="help-block">
                                                            {{ $errors->first('graphNo') }}
                                                        </p>
                                                    @endif
                                                </div>
                                                <div class="col-lg-4 col-xs-12 form-group">
                                                    {!! Form::label('numberOfCol', 'Alphabet*', ['class' => 'control-label']) !!}
                                                    {{ Form::text('numberOfCol', old('typeOf'), ['class' => 'form-control', 'required' => ''])}}
                                                    <p class="help-block"></p>
                                                    @if($errors->has('typeOf'))
                                                        <p class="help-block">
                                                            {{ $errors->first('typeOf') }}
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-lg-8 col-xs-12 form-group">
                                                    {!! Form::label('NameOfCol', 'Name Of Graph Column*', ['class' => 'control-label']) !!}
                                                    {!! Form::text('NameOfCol', old('NameOfCol'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                                                    <p class="help-block"></p>
                                                    @if($errors->has('graphNo'))
                                                        <p class="help-block">
                                                            {{ $errors->first('graphNo') }}
                                                        </p>
                                                    @endif
                                                </div>
                                                <div class="col-lg-4 col-xs-12 form-group">
                                                    {!! Form::label('numberOfCol', 'Alphabet*', ['class' => 'control-label']) !!}
                                                    {{ Form::text('numberOfCol', old('typeOf'), ['class' => 'form-control', 'required' => ''])}}
                                                    <p class="help-block"></p>
                                                    @if($errors->has('typeOf'))
                                                        <p class="help-block">
                                                            {{ $errors->first('typeOf') }}
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-lg-8 col-xs-12 form-group">
                                                    {!! Form::label('NameOfCol', 'Name Of Graph Column*', ['class' => 'control-label']) !!}
                                                    {!! Form::text('NameOfCol', old('NameOfCol'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                                                    <p class="help-block"></p>
                                                    @if($errors->has('graphNo'))
                                                        <p class="help-block">
                                                            {{ $errors->first('graphNo') }}
                                                        </p>
                                                    @endif
                                                </div>
                                                <div class="col-lg-4 col-xs-12 form-group">
                                                    {!! Form::label('numberOfCol', 'Alphabet*', ['class' => 'control-label']) !!}
                                                    {{ Form::text('numberOfCol', old('typeOf'), ['class' => 'form-control', 'required' => ''])}}
                                                    <p class="help-block"></p>
                                                    @if($errors->has('typeOf'))
                                                        <p class="help-block">
                                                            {{ $errors->first('typeOf') }}
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-lg-12 col-xs-12 form-group" style="margin-top: 25px;">
                                                    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-success']) !!}
                                                    {!! Form::reset(trans('global.app_reset'), ['class' => 'btn btn-danger']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@stop

