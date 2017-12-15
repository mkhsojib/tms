@extends('layouts.app')

@section('content')
    <!-- File Upload Start Here -->
    <div class="row">
        <h1 class="text-center">Player Chart</h1>
    </div>
    <!-- All Updates and Login Times End -->




    <div class="panel-body">
        {!! $chart->html() !!}
    </div>


    {!! Charts::scripts() !!}
    {!! $chart->script() !!}
@stop
