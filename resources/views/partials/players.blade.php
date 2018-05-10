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
            <option value="{{$item->coachInfo}}" {{request()->has('player_id') && request()->player_id== $item->coachInfo? 'selected':''}}>{{$item->coachInfo}}</option>
            @endforeach

            </select>
            </div>
            </form>
        </div>
    </div>




    <div id="chartGenerate" class="row" style="background-color: white !important;">


    </div>

@stop


@section('javascript')
    <script src="{{ asset('/js/Chart.min.js') }}"></script>


    <script>

        $(window).ready(function () {
            window.chartColors = [
                'rgb(255, 99, 132)',
                'rgb(255, 159, 64)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',
                'rgb(54, 162, 235)',
                'rgb(153, 102, 255)',
                'rgb(201, 203, 207)'
            ];
            $('#player_id').on('change', function() {
                var selectedValue = $(this).find('option:selected').val();
              //  alert(selectedValue);
                var url = "{{route('admin.geterateTandsDataSinglePlayer')}}/"+selectedValue;
                $.ajax({
                    type: 'GET',
                    url:  url,
                    dataType: "json"
                })
                    .done( function (response) {
                        // Triggered if response status code is 200 (OK)
                        var GraphData = response.generated_data;
                        console.log(response);
                        var myIndex = 0;
                        GraphData.forEach(function (aValue) {
                            var info = {
                                type: 'line',
                                data:{
                                    labels:aValue.labels,
                                    datasets:[],
                                },

                                options: {
                                    responsive: true,
                                    title: {
                                        display: true,
                                        text: aValue.title
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
                                        yAxes: [{
                                            ticks: {
                                                beginAtZero: true
                                            }
                                        }]
                                    }
                                }
                            };
                            for(var i=0;i<aValue.series.length;i++){
                                var number =  Math.floor(Math.random() * window.chartColors.length);
                                var myData = {
                                    label: aValue.series[i],
                                    backgroundColor: window.chartColors[number],
                                    borderColor: window.chartColors[number],
                                    data: [],
                                    fill: false,
                                };
                                for(var lavelData=0;lavelData<aValue.labels.length;lavelData++){
                                    myData.data.push(aValue.data[lavelData][i]);
                                }
                                //  console.log(myData);
                                info.data.datasets.push(myData);
                            }
                            console.log(info);

                            var ids = "myChart"+myIndex;
                            $divStyle = "";
                            if(myIndex%2==0){
                                $divStyle = '<div class="col-md-6" width="100%" style="height: 300px">';
                            }else{
                                $divStyle = '<div class="col-md-6" width="100%" style="height: 300px">';
                            }
                            $($divStyle+'<canvas id='+ids+'></canvas></div>').appendTo($("#chartGenerate"));

                            var ctx = document.getElementById(ids);
                            var myChart = new Chart(ctx, info);
                            myIndex++;


                        })
                    })
                    .fail( function (jqXHR, status, error) {
                        // Triggered if response status code is NOT 200 (OK)
                        alert(jqXHR.responseText);
                    })
                    .always( function() {
                        // Always run after .done() or .fail()
                        $('p:first').after('<p>Thank you.</p>');
                    });
            });


        })
    </script>
@endsection
