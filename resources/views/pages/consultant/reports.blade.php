@extends('layouts.consultantpages')

@section('content')

    <div class="content">
        <div class="side-nav">
            @include('inc.consultantSidenav')
        </div>
        <div class="main">
            <div class="jobs-analytics row" style="margin: 0 !important; margin-top: 70px">
                <div class="col-sm-12 col-md-4">
                    <div class="sq" style="min-height: 100px; width: 70%; margin: auto;">
                        <div class="sq-cont" style="background-color: rgba(255, 164, 100, 0.2)">
                            <div class="number">134</div>
                            <div>
                                <div>Jobs</div>
                                <div>Available</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="sq" style="min-height: 100px; width: 70%; margin: auto;">
                        <div class="sq-cont" style="background-color: rgba(248, 212, 7, 0.2)">
                            <div class="number">5</div>
                            <div>
                                <div>Jobs</div>
                                <div>I am handling</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="sq" style="min-height: 100px; width: 70%; margin: auto;">
                        <div class="sq-cont" style="background-color: rgba(252, 108, 5, 0.2)">
                            <div class="number">134</div>
                            <div>
                                <div>Jobs</div>
                                <div>I have completed</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="work-freq" style="margin: 70px 0; text-align: center;">
                <h2>Track your delivery progress</h2>
                <div class="graph rect" style="width: 70%; margin: auto;">
                    <div class="rect-cont" id="graph-holder">
                        <canvas id="myChart" width="100%" ></canvas>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <script type="application/javascript" defer>
    window.onload = function(){
        var ctx = document.getElementById('myChart');
        var ctx2 = document.createElement('canvas').getContext('2d');
        var gradientFill = ctx2.createLinearGradient(0, 100, 0, 500);
        gradientFill.addColorStop(0, "rgba(3, 132, 252, 0.8)");
        gradientFill.addColorStop(1, "rgba(244, 144, 128, 0.1)");
        ctx.height = document.getElementById('graph-holder').clientHeight+'px';
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
                datasets: [{
                    label: 'Tasks',
                    data: [12, 19, 3, 5, 2, 3, 7],
                    backgroundColor: gradientFill,
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }, 
                        gridLines: {
                            display: false
                        }
                    }],
                    xAxes: [{
                        gridLines: {
                            display: false
                        }
                    }]
                },
                responsive: true,
            }
        });
    }
        
        </script>
@endsection