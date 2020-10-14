@extends('layouts.adminpages')

@section('content')

<link rel="stylesheet" href={{URL('css/adminDash.css')}}>

<div class="platform">
    <div class="fixed-sidenav">
        <a href="/admin/dash">All Orders</a>
        <a href="/admin/dash/ongoing">Ongoing Orders</a>
        <a href="/admin/dash/unallocated">Unallocated Orders</a>
        <a href="/admin/analytics">Analytics</a>
    </div>
    <div class="content-area">
    
            <div class="weekly" style="text-align: center;">
                <h2>Weekly Report</h2>
                <div class="row" style="margin: 0; text-align: center;">
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
                                    <div>Ongoing</div>
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
                                    <div>Completed</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="yearly" style="text-align: center;">
                <h2>Yearly Data</h2>
                <div class="row" style="margin: 0;">
                    <div class="col-sm-12 col-md-4">
                        <div class="sq" style="min-height: 100px; width: 70%; margin: auto;">
                            <div class="sq-cont" style="background-color: rgba(100, 162, 255, 0.2)">
                                <div class="number">$134</div>
                                <div>
                                    <div>Money</div>
                                    <div>In</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="sq" style="min-height: 100px; width: 70%; margin: auto;">
                            <div class="sq-cont" style="background-color: rgba(7, 71, 248, 0.2)">
                                <div class="number">5</div>
                                <div>
                                    <div>New</div>
                                    <div>Users</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="sq" style="min-height: 100px; width: 70%; margin: auto;">
                            <div class="sq-cont" style="background-color: rgba(79, 5, 252, 0.2)">
                                <div class="number">134</div>
                                <div>
                                    <div>Total</div>
                                    <div>Users</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="visualized" style="text-align: center; margin-top: 70px; padding-bottom: 70px;">
                <h2>Visualized Trends</h2>
                <div class="work-freq" style="margin-top: 20px; text-align: center;">
                    <h2>Growth of users in the last year</h2>
                    <div class="graph rect" style="width: 70%; margin: auto;">
                        <div class="rect-cont" id="graph-holder">
                            <canvas id="myChart" width="100%" ></canvas>
                        </div>
                        
                    </div>
                </div>

                <div class="work-freq" style="margin: 70px 0; text-align: center;">
                    <h2>Distribution of jobs per month</h2>
                    <div class="graph rect" style="width: 70%; margin: auto;">
                        <div class="rect-cont" id="graph-holder">
                            <canvas id="myChart3" width="100%" ></canvas>
                        </div>
                        
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


        var ctx3 = document.getElementById('myChart3');
        ctx3.height = document.getElementById('graph-holder').clientHeight+'px';

        var myChart3 = new Chart(ctx3, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: 'Jobs',
                    data: [12, 19, 3, 5, 2, 3, 7, 6, 15, 9, 4, 14, 10],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(153, 102, 255, 0.6)',
                        'rgba(255, 159, 64, 0.6)',
                        'rgba(255, 106, 86, 0.6)',
                        'rgba(200, 106, 86, 0.6)',
                        'rgba(155, 206, 100, 0.6)',
                        'rgba(65, 156, 100, 0.6)',
                        'rgba(200, 76, 150, 0.6)',
                        'rgba(35, 146, 90, 0.6)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255, 106, 86, 1)',
                        'rgba(255, 106, 86, 1)',
                        'rgba(155, 206, 100, 1)',
                        'rgba(65, 156, 100, 1)',
                        'rgba(200, 76, 150, 1)',
                        'rgba(35, 146, 90, 1)',
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