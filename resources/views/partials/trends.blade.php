@extends('layouts.app')

@section('content')



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

            $.ajax({
                type: 'GET',
                url:  "{{route('admin.geterateTandsData')}}",
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

                            info.data.datasets.push(myData);
                        }
                        console.log("this is our info"+ info);

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

        })
    </script>
@endsection
