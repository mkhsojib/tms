@extends('layouts.app')

@section('content')


    <!-- All Updates and Login Times Start -->
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading">All Uploads <i class="fa fa-angle-down pull-right"></i></div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Date of Upload</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>AUG 31, 2017</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>AUG 31, 2017</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>AUG 31, 2017</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div><!-- All Updates -->
        <div class="col-md-8">
            <div class="panel panel-primary">
                <div class="panel-heading">All Login Time <i class="fa fa-angle-down pull-right"></i></div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>User Name</th>
                                <th>Login Time</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>John</td>
                                <td>NOV 07, 2017</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Admin</td>
                                <td>NOV 12, 2017</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>User</td>
                                <td>NOV 15, 2017</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div><!-- Login Times -->
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">All Players Information <i class="fa fa-angle-down pull-right"></i></div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <div class="pull-right"> {{$players->links()}} </div>
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>id</th>
                                <th>Week</th>
                                <th>Jersey Number</th>
                                <th>Hours of sleep</th>
                                <th>How many naps</th>
                                <th>Nutrition</th>
                                <th>Breakfast</th>
                                <th>Lunch</th>
                                <th>Supper</th>
                                <th>Total meals</th>
                                <th>Pre game snacks</th>
                                <th>Post game snack refuel</th>
                                <th>Hydration</th>
                                <th>Stress level</th>
                                <th>Stress from Hockey</th>
                                <th>Stress from school</th>
                                <th>Stress from Personal</th>
                                <th>Strength workouts</th>
                                <th>Extra strength</th>
                                <th>Cardio workouts</th>
                                <th>Extra cardio</th>
                                <th>Performance in practice</th>
                                <th>Focus during practice</th>
                                <th>Effort during practice</th>
                                <th>Execution during practice</th>
                                <th>Extra skill</th>
                                <th>Watch video</th>
                                <th>Game performance</th>
                                <th>Offensive game performance</th>
                                <th>Defensive game performance</th>
                                <th>Special teams game performance</th>
                                <th>Academic progress</th>
                                <th>Relationship teammates</th>
                                <th>Relationship staff</th>
                                <th>Relationships personal life</th>
                                <th>Create At</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($players as $key => $player)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $player->id }}</td>
                                    <td style="background-color: #{{$player->wk_color!="000000"?$player->wk_color:''}}">{{ $player->wk }}</td>
                                    <td style="background-color: #{{$player->jersey_number_color!="000000"?$player->jersey_number_color:''}}">{{ $player->jersey_number }}</td>
                                    <td style="background-color: #{{$player->hours_of_sleep_color!="000000"?$player->hours_of_sleep_color:''}}">{{ $player->hours_of_sleep }}</td>
                                    <td style="background-color: #{{$player->how_many_naps_color!="000000"?$player->how_many_naps_color:''}}">{{ $player->how_many_naps }}</td>
                                    <td style="background-color: #{{$player->nutrition_color!="000000"?$player->nutrition_color:''}}">{{ $player->nutrition }}</td>
                                    <td style="background-color: #{{$player->breakfast_color!="000000"?$player->breakfast_color:''}}">{{ $player->breakfast }}</td>
                                    <td style="background-color: #{{$player->lunch_color!="000000"?$player->lunch_color:''}}">{{ $player->lunch }}</td>
                                    <td style="background-color: #{{$player->supper_color!="000000"?$player->supper_color:''}}">{{ $player->supper }}</td>
                                    <td style="background-color: #{{$player->total_meals_color!="000000"?$player->total_meals_color:''}}">{{ $player->total_meals }}</td>
                                    <td style="background-color: #{{$player->pre_game_snacks_color!="000000"?$player->pre_game_snacks_color:''}}">{{ $player->pre_game_snacks }}</td>
                                    <td style="background-color: #{{$player->post_game_snack_refuel_color!="000000"?$player->post_game_snack_refuel_color:''}}">{{ $player->post_game_snack_refuel }}</td>
                                    <td style="background-color: #{{$player->hydration_color!="000000"?$player->hydration_color:''}}">{{ $player->hydration }}</td>
                                    <td style="background-color: #{{$player->stress_level_color!="000000"?$player->stress_level_color:''}}">{{ $player->stress_level }}</td>
                                    <td style="background-color: #{{$player->stress_from_hockey_color!="000000"?$player->stress_from_hockey_color:''}}">{{ $player->stress_from_hockey }}</td>
                                    <td style="background-color: #{{$player->stress_from_school_color!="000000"?$player->stress_from_school_color:''}}">{{ $player->stress_from_school }}</td>
                                    <td style="background-color: #{{$player->stress_from_personal_color!="000000"?$player->stress_from_personal_color:''}}">{{ $player->stress_from_personal }}</td>
                                    <td style="background-color: #{{$player->strength_workouts_color!="000000"?$player->strength_workouts_color:''}}">{{ $player->strength_workouts }}</td>
                                    <td style="background-color: #{{$player->extra_strength_color!="000000"?$player->extra_strength_color:''}}">{{ $player->extra_strength }}</td>
                                    <td style="background-color: #{{$player->cardio_workouts_color!="000000"?$player->cardio_workouts_color:''}}">{{ $player->cardio_workouts }}</td>
                                    <td style="background-color: #{{$player->extra_cardio_color!="000000"?$player->extra_cardio_color:''}}">{{ $player->extra_cardio }}</td>
                                    <td style="background-color: #{{$player->performance_in_practice_color!="000000"?$player->performance_in_practice_color:''}}">{{ $player->performance_in_practice }}</td>
                                    <td style="background-color: #{{$player->focus_during_practice_color!="000000"?$player->focus_during_practice_color:''}}">{{ $player->focus_during_practice }}</td>
                                    <td style="background-color: #{{$player->effort_during_practice_color!="000000"?$player->effort_during_practice_color:''}}">{{ $player->effort_during_practice }}</td>
                                    <td style="background-color: #{{$player->execution_during_practice_color!="000000"?$player->execution_during_practice_color:''}}">{{ $player->execution_during_practice }}</td>
                                    <td style="background-color: #{{$player->extra_skill_color!="000000"?$player->extra_skill_color:''}}">{{ $player->extra_skill }}</td>
                                    <td style="background-color: #{{$player->eatch_video_color!="000000"?$player->eatch_video_color:''}}">{{ $player->eatch_video }}</td>
                                    <td style="background-color: #{{$player->eame_performance_color!="000000"?$player->eame_performance_color:''}}">{{ $player->eame_performance }}</td>
                                    <td style="background-color: #{{$player->offensive_game_performance_color!="000000"?$player->offensive_game_performance_color:''}}">{{ $player->offensive_game_performance }}</td>
                                    <td style="background-color: #{{$player->defensive_game_performance_color!="000000"?$player->defensive_game_performance_color:''}}">{{ $player->defensive_game_performance }}</td>
                                    <td style="background-color: #{{$player->special_teams_game_performance_color!="000000"?$player->special_teams_game_performance_color:''}}">{{ $player->special_teams_game_performance }}</td>
                                    <td style="background-color: #{{$player->academic_progress_color!="000000"?$player->academic_progress_color:''}}">{{ $player->academic_progress }}</td>
                                    <td style="background-color: #{{$player->relationship_teammates_color!="000000"?$player->relationship_teammates_color:''}}">{{ $player->relationship_teammates }}</td>
                                    <td style="background-color: #{{$player->relationship_staff_color!="000000"?$player->relationship_staff_color:''}}">{{ $player->relationship_staff }}</td>
                                    <td style="background-color: #{{$player->relationships_personal_life_color!="000000"?$player->relationships_personal_life_color:''}}">{{ $player->relationships_personal_life }}</td>
                                    <td>{{ $player->created_at }}</td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <div class="pull-right"> {{$players->links()}} </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@stop

