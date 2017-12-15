@extends('layouts.app')

@section('content')

    <!-- Player Select Start Here -->
    <div class="row">
        <div class="col-md-4">
            <form method="POST" action="{{route('admin.players')}}" name="myform" class="form-inline">
            <div class="form-group">
            <label class=" control-label">Select a player: </label>
            {{ csrf_field() }}

            <select class="form-control" id="player_id" name="player_id" value="{{ old('player_id') }}">>
            <option value="">Select a Player</option>
            @foreach($players as $item)
            <option value="{{$item->id}}" {{request()->has('player_id') && request()->player_id== $item->id? 'selected':''}}>{{$item->id}}</option>
            @endforeach

            </select>
            </div>
            </form>
        </div>
    </div>




    <div class="row" style="background-color: white !important;">

        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-6">
                    <canvas id="myChart1"></canvas>
                </div>
                <div class="col-lg-6">
                    <canvas id="myChart2"></canvas>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <canvas id="myChart3"></canvas>
                </div>
                <div class="col-lg-6">
                    <canvas id="myChart5"></canvas>
                </div>
            </div>

        </div>


    </div>

@stop

@section('javascript')
    <script src="{{ asset('/js/Chart.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#player_id').on('change', function() {
                document.forms["myform"].submit();
            });
        });
        @if(isset($player_information))
        window.onload = function() {
            window.chartColors = {
                red: 'rgb(255, 99, 132)',
                orange: 'rgb(255, 159, 64)',
                yellow: 'rgb(255, 205, 86)',
                green: 'rgb(75, 192, 192)',
                blue: 'rgb(54, 162, 235)',
                purple: 'rgb(153, 102, 255)',
                grey: 'rgb(201, 203, 207)'
            }
            var ctx1 = document.getElementById("myChart1");
            var lineChart1 = new Chart(ctx1, {
                type: 'line',
                data: {
                    labels: {!! isset($player_information)?$player_information->pluck('wk'):''!!},
                    datasets: [{
                        label: "Breakfast",
                        backgroundColor: window.chartColors.red,
                        borderColor: window.chartColors.red,
                        data: [{{ isset($player_information)?$player_information->implode('breakfast', ','):''}}],
                        fill: false,
                    }, {
                        label: "Lunch",
                        fill: false,
                        backgroundColor: window.chartColors.blue,
                        borderColor: window.chartColors.blue,
                        data: [{{isset($player_information)?$player_information->implode('lunch', ','):''}}],
                    },{
                        label: "Dinner",
                        fill: false,
                        backgroundColor: window.chartColors.green,
                        borderColor: window.chartColors.green,
                        data: [{{isset($player_information)?$player_information->implode('supper', ','):''}}],
                    },{
                        label: "Total Meals",
                        fill: false,
                        backgroundColor: window.chartColors.yellow,
                        borderColor: window.chartColors.yellow,
                        data: [{{isset($player_information)? $player_information->implode('total_meals', ','):''}}],
                    },{
                        label: "Nutrition",
                        fill: false,
                        backgroundColor: window.chartColors.orange,
                        borderColor: window.chartColors.orange,
                        data: [{{isset($player_information)?$player_information->implode('nutrition', ','):''}}],
                    },]
                },options: {
                    responsive: true,
                    title:{
                        display:true,
                        text:'Nutrition'
                    },
                    tooltips: {
                        mode: 'index',
                        intersect: false,
                    },
                    hover: {
                        mode: 'nearest',
                        intersect: true
                    },
                    scales: {
                        xAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Week'
                            }
                        }],
                        yAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Value'
                            }
                        }]
                    }
                }


            });

            var ctx2 = document.getElementById("myChart2");
            var lineChart2 = new Chart(ctx2, {
                type: 'line',
                data: {
                    labels: {!! isset($player_information)?$player_information->pluck('wk'):''!!},
                    datasets: [{
                        label: "Hours of Sleep",
                        backgroundColor: window.chartColors.red,
                        borderColor: window.chartColors.red,
                        data: [{{ isset($player_information)?$player_information->implode('hours_of_sleep', ','):''}}],
                        fill: false,
                    }, {
                        label: "Naps",
                        fill: false,
                        backgroundColor: window.chartColors.blue,
                        borderColor: window.chartColors.blue,
                        data: [{{isset($player_information)?$player_information->implode('how_many_naps', ','):''}}],
                    }]
                },options: {
                    responsive: true,
                    title:{
                        display:true,
                        text:'Sleep'
                    },
                    tooltips: {
                        mode: 'index',
                        intersect: false,
                    },
                    hover: {
                        mode: 'nearest',
                        intersect: true
                    },
                    scales: {
                        xAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Week'
                            }
                        }],
                        yAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Value'
                            }
                        }]
                    }
                }
            });

            var ctx3 = document.getElementById("myChart3");
            var lineChart3 = new Chart(ctx3, {
                type: 'line',
                data: {
                    labels: {!! isset($player_information)?$player_information->pluck('wk'):''!!},
                    datasets: [{
                        label: "Total Stress Level",
                        backgroundColor: window.chartColors.red,
                        borderColor: window.chartColors.red,
                        data: [{{ isset($player_information)?$player_information->implode('stress_level', ','):''}}],
                        fill: false,
                    }, {
                        label: "Stress from Hockey",
                        fill: false,
                        backgroundColor: window.chartColors.blue,
                        borderColor: window.chartColors.blue,
                        data: [{{isset($player_information)?$player_information->implode('stress_from_hockey', ','):''}}],
                    },{
                        label: "Stress from School",
                        backgroundColor: window.chartColors.green,
                        borderColor: window.chartColors.green,
                        data: [{{ isset($player_information)?$player_information->implode('stress_from_school', ','):''}}],
                        fill: false,
                    }, {
                        label: "Stress from Personal",
                        fill: false,
                        backgroundColor: window.chartColors.yellow,
                        borderColor: window.chartColors.yellow,
                        data: [{{isset($player_information)?$player_information->implode('stress_from_personal', ','):''}}],
                    }]
                },options: {
                    responsive: true,
                    title:{
                        display:true,
                        text:'Stress'
                    },
                    tooltips: {
                        mode: 'index',
                        intersect: false,
                    },
                    hover: {
                        mode: 'nearest',
                        intersect: true
                    },
                    scales: {
                        xAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Week'
                            }
                        }],
                        yAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Value'
                            }
                        }]
                    }
                }
            });





            var ctx5 = document.getElementById("myChart5");
            var lineChart5 = new Chart(ctx5, {
                type: 'line',
                data: {
                    labels: {!! isset($player_information)?$player_information->pluck('wk'):'[]'!!},
                    datasets: [{
                        label: "Relationship Teammates",
                        backgroundColor: window.chartColors.red,
                        borderColor: window.chartColors.red,
                        data: [{{ isset($player_information)?$player_information->implode('relationship_teammates', ','):''}}],
                        fill: false,
                    }, {
                        label: "Relationship Staff",
                        fill: false,
                        backgroundColor: window.chartColors.blue,
                        borderColor: window.chartColors.blue,
                        data: [{{isset($player_information)?$player_information->implode('relationship_staff', ','):''}}],
                    },{
                        label: "Relationship Personal Life",
                        backgroundColor: window.chartColors.yellow,
                        borderColor: window.chartColors.yellow,
                        data: [{{ isset($player_information)?$player_information->implode('relationships_personal_life', ','):''}}],
                        fill: false,
                    }]
                },options: {
                    responsive: true,
                    title:{
                        display:true,
                        text:'Relationship'
                    },
                    tooltips: {
                        mode: 'index',
                        intersect: false,
                    },
                    hover: {
                        mode: 'nearest',
                        intersect: true
                    },
                    scales: {
                        xAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Week'
                            }
                        }],
                        yAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Value'
                            }
                        }]
                    }
                }
            });
        }

        @endif

    </script>
@endsection
