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
    <div class="row">
        <div class="col-md-3">
            <strong>Extra Strength</strong>
            <canvas id="extra_extend_chart-area"/>
        </div>
        <div class="col-md-3">
            <strong>Extra Cardios</strong>
            <canvas id="extra_cardios_chart-area"/>
        </div>
        <div class="col-md-3">
            <strong>Extra Skills</strong>
            <canvas id="extra_skills_chart-area"/>
        </div>
        <div class="col-md-3">
            <strong>Watch Videos</strong>
            <canvas id="extra_watch_chart-area"/>
        </div>
    </div>

    <div class="row" style="margin-top:100px;">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="form-inline">

                        <div class="form-group">
                            <label for="exampleInputEmail2">Week Name</label>
                            <select class="form-control" id="changeWeek">

                                @foreach($weekList as $week)
                                    <option {{request()->id!=null && request()->id==$week->week_id?'selected':''}} value="{{$week->week_id}}">{{$week->week_name}}</option>
                                @endforeach

                            </select>
                        </div>

                    </div>

                </div>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover table-condensed" id="excellTable">

                            <thead>
                            <tr>
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

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($players as $key => $player)
                                <tr>
                                    <td>{{ $player->jersey_number }}</td>
                                    <td>{{ $player->hours_of_sleep }}</td>
                                    <td>{{ $player->how_many_naps }}</td>
                                    <td>{{ $player->nutrition }}</td>
                                    <td>{{ $player->breakfast }}</td>
                                    <td>{{ $player->lunch }}</td>
                                    <td>{{ $player->supper }}</td>
                                    <td>{{ $player->total_meals }}</td>
                                    <td>{{ $player->pre_game_snacks }}</td>
                                    <td>{{ $player->post_game_snack_refuel }}</td>
                                    <td>{{ $player->hydration }}</td>
                                    <td>{{ $player->stress_level }}</td>
                                    <td>{{ $player->stress_from_hockey }}</td>
                                    <td>{{ $player->stress_from_school }}</td>
                                    <td>{{ $player->stress_from_personal }}</td>
                                    <td>{{ $player->strength_workouts }}</td>
                                    <td>{{ $player->extra_strength }}</td>
                                    <td>{{ $player->cardio_workouts }}</td>
                                    <td>{{ $player->extra_cardio }}</td>
                                    <td>{{ $player->performance_in_practice }}</td>
                                    <td>{{ $player->focus_during_practice }}</td>
                                    <td>{{ $player->effort_during_practice }}</td>
                                    <td>{{ $player->execution_during_practice }}</td>
                                    <td>{{ $player->extra_skill }}</td>
                                    <td>{{ $player->watch_video }}</td>
                                    <td>{{ $player->game_performance }}</td>
                                    <td>{{ $player->offensive_game_performance }}</td>
                                    <td>{{ $player->defensive_game_performance }}</td>
                                    <td>{{ $player->special_teams_game_performance }}</td>
                                    <td>{{ $player->academic_progress }}</td>
                                    <td>{{ $player->relationship_teammates }}</td>
                                    <td>{{ $player->relationship_staff }}</td>
                                    <td>{{ $player->relationships_personal_life }}</td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('javascript')
    <script src="{{ asset('/js/Chart.min.js') }}"></script>
    <script src="{{ asset('/js/tableHeadFixer.js') }}"></script>
    <script>

        $(document).ready(function () {
            $("#excellTable").tableHeadFixer({'left': 1});

            $('#changeWeek').on('change', function() {
                var info = $("#changeWeek").val();
                window.location = "{{url('admin/home')}}/"+info;//here double curly bracket
            });


            $('#excellTable > tbody  > tr').each(function (i, row) {
                var row = $(row);
                if (this.cells[1].innerHTML != '' && this.cells[1].innerHTML < 6) {
                    $(this.cells[0]).css('background-color', 'yellow')
                    $(this.cells[1]).css('background-color', 'red')
                }
                if (this.cells[0].innerHTML == '') {
                    $(this.cells[0]).css('background-color', 'red')
                }

                if (this.cells[4].innerHTML == '' || this.cells[4].innerHTML < 3) {
                    $(this.cells[4]).css('background-color', 'red')
                }
                if (this.cells[5].innerHTML == '' || this.cells[5].innerHTML < 3) {
                    $(this.cells[5]).css('background-color', 'red')
                }
                if (this.cells[6].innerHTML == '' || this.cells[6].innerHTML < 3) {
                    $(this.cells[6]).css('background-color', 'red')
                }

                if (this.cells[7].innerHTML == '' || this.cells[7].innerHTML < 16) {
                    $(this.cells[7]).css('background-color', 'red')
                }

                if (this.cells[8].innerHTML == '' || this.cells[8].innerHTML < 3) {
                    $(this.cells[8]).css('background-color', 'red')
                }
                if (this.cells[9].innerHTML == '' || this.cells[9].innerHTML < 3) {
                    $(this.cells[9]).css('background-color', 'red')
                }
                if (this.cells[10].innerHTML == '' || this.cells[10].innerHTML < 3) {
                    $(this.cells[10]).css('background-color', 'red')
                }


                if (this.cells[11].innerHTML == '' || this.cells[11].innerHTML > 4) {
                    $(this.cells[11]).css('background-color', 'red')
                }
                if (this.cells[12].innerHTML == '' || this.cells[12].innerHTML > 4) {
                    $(this.cells[12]).css('background-color', 'red')
                }
                if (this.cells[13].innerHTML == '' || this.cells[13].innerHTML > 4) {
                    $(this.cells[13]).css('background-color', 'red')
                }
                if (this.cells[14].innerHTML == '' || this.cells[14].innerHTML > 4) {
                    $(this.cells[14]).css('background-color', 'red')
                }


                if (this.cells[25].innerHTML == '' || this.cells[25].innerHTML < 2) {
                    $(this.cells[25]).css('background-color', 'red')
                }
                if (this.cells[26].innerHTML == '' || this.cells[26].innerHTML < 2) {
                    $(this.cells[26]).css('background-color', 'red')
                }
                if (this.cells[27].innerHTML == '' || this.cells[27].innerHTML < 2) {
                    $(this.cells[27]).css('background-color', 'red')
                }
                if (this.cells[28].innerHTML == '' || this.cells[28].innerHTML < 2) {
                    $(this.cells[28]).css('background-color', 'red')
                }
                if (this.cells[29].innerHTML == '' || this.cells[29].innerHTML < 2) {
                    $(this.cells[29]).css('background-color', 'red')
                }
                if (this.cells[30].innerHTML == '' || this.cells[30].innerHTML < 2) {
                    $(this.cells[30]).css('background-color', 'red')
                }
                if (this.cells[31].innerHTML == '' || this.cells[31].innerHTML < 2) {
                    $(this.cells[31]).css('background-color', 'red')
                }
                if (this.cells[32].innerHTML == '' || this.cells[32].innerHTML < 2) {
                    $(this.cells[32]).css('background-color', 'red')
                }

            });


        });


        window.onload = function () {

            window.chartColors = {
                red: 'rgb(255, 99, 132)',
                orange: 'rgb(255, 159, 64)',
                yellow: 'rgb(255, 205, 86)',
                green: 'rgb(75, 192, 192)',
                blue: 'rgb(54, 162, 235)',
                purple: 'rgb(153, 102, 255)',
                grey: 'rgb(201, 203, 207)'
            };
            var ctx1 = document.getElementById("extra_extend_chart-area").getContext("2d");
            var lineChart1 = new Chart(ctx1, {
                type: 'pie',
                data: {
                    datasets: [{
                        data: [
                            {{$graphData['extra_strength_yes']}},{{$graphData['extra_strength_no']}}
                        ],
                        backgroundColor: [
                            window.chartColors.red,
                            window.chartColors.yellow,
                        ],
                        label: 'Dataset 1'
                    }],
                    labels: [
                        "YES",
                        "NO",
                    ]
                },
                options: {
                    responsive: true
                }


            });


            var ctx2 = document.getElementById("extra_cardios_chart-area").getContext("2d");
            var lineChart2 = new Chart(ctx2, {
                type: 'pie',
                data: {
                    datasets: [{
                        data: [
                            {{$graphData['extra_cardio_yes']}},{{$graphData['extra_cardio_no']}}
                        ],
                        backgroundColor: [
                            window.chartColors.red,
                            window.chartColors.yellow,
                        ],
                        label: 'Dataset 1'
                    }],
                    labels: [
                        "YES",
                        "NO",
                    ]
                },
                options: {
                    responsive: true
                }


            });

            var ctx3 = document.getElementById("extra_skills_chart-area").getContext("2d");
            var lineChart3 = new Chart(ctx3, {
                type: 'pie',
                data: {
                    datasets: [{
                        data: [
                            {{$graphData['extra_skill_yes']}},{{$graphData['extra_skill_no']}}
                        ],
                        backgroundColor: [
                            window.chartColors.red,
                            window.chartColors.yellow,
                        ],
                        label: 'Dataset 1'
                    }],
                    labels: [
                        "YES",
                        "NO",
                    ]
                },
                options: {
                    responsive: true
                }


            });

            var ctx4 = document.getElementById("extra_watch_chart-area").getContext("2d");
            var lineChart4 = new Chart(ctx4, {
                type: 'pie',
                data: {
                    datasets: [{
                        data: [
                            {{$graphData['watch_video_yes']}},{{$graphData['watch_video_no']}}
                        ],
                        backgroundColor: [
                            window.chartColors.red,
                            window.chartColors.yellow,
                        ],
                        label: 'Dataset 1'
                    }],
                    labels: [
                        "YES",
                        "NO",
                    ]
                },
                options: {
                    responsive: true
                }


            });


        }


    </script>
@endsection