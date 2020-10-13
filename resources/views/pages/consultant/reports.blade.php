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
                            <div>134</div>
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
                            <div>5</div>
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
                            <div>134</div>
                            <div>
                                <div>Jobs</div>
                                <div>I have completed</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="work-freq">
                <div class="graph rect">
                    <div class="rect-cont">
                        <canvas id="myChart" width="100%" height="100%"></canvas>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <script type="application/javascript" defer>
    window.onload = function(){
        var ctx = document.getElementById('myChart');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
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
                        }
                    }]
                }
            }
        });
    }
        
        </script>
@endsection