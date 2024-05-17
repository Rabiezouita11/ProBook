@extends('backoffice.layouts.index')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel-content">
                    <h4 class="main-title">Welcome To Xchange</h4>
                    <div class="row merged20 mb-4">
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="d-widget soft-red">
                                <div class="d-widget-title">
                                    <h5>Number of Users</h5>
                                </div>
                                <div class="d-widget-content" style="height: 100px;"> <!-- Fixed height -->
                                    <span class="realtime-ico pulse"></span>
                                    <h5>{{ $userCount }}</h5>
                                    <i class="icofont-users-alt-3"></i> <!-- Updated icon class -->
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="d-widget soft-blue">
                                <div class="d-widget-title">
                                    <h5>Number of Posts</h5>
                                </div>
                                <div class="d-widget-content" style="height: 100px;"> <!-- Fixed height -->
                                    <span class="realtime-ico pulse"></span>

                                    <h5>{{ $publicationsCount }}</h5>
                                    <i class="icofont-newspaper"></i> <!-- Updated icon class -->
                                </div>
                            </div>
                        </div>
                     

                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="d-widget soft-green">
                                <div class="d-widget-title">
                                    <h5>Number of Comments</h5>
                                </div>
                                <div class="d-widget-content" style="height: 100px;"> <!-- Fixed height -->
                                    <span class="realtime-ico pulse"></span>
                                    <h6></h6>
                                    <h5>{{ $commentairesCount }}</h5>
                                    <i class="icofont-comment"></i> <!-- Updated icon class -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row merged20 mb-4">
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="d-widget soft-green">
                                <div class="d-widget-title">
                                    <h5>Number of Published Domains</h5>
                                </div>
                                <div class="d-widget-content" style="height: 100px;"> <!-- Fixed height -->
                                    <span class="realtime-ico pulse"></span>
                                    <h6></h6>
                                    <h5>{{ $abonnementsCount }}</h5>
                                    <i class="icofont-users-alt-5"></i> <!-- Updated icon class -->
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div >
                                <div class="d-widget-title">
                                    <h5>Number of Followers</h5>
                                    <canvas id="domainChart" width="400" height="400"></canvas>
                                </div>

                            </div>
                        </div>

                

                        <!-- Chart container -->
                    </div>

                </div>
            </div>
        </div>
    </div><!-- main content -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var ctx = document.getElementById('domainChart').getContext('2d');
            var domainData = @json($domainData);
    
            var labels = domainData.map(item => item.domain);
            var data = domainData.map(item => item.count);
    
            var chart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Domain Distribution',
                        data: data,
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
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        tooltip: {
                            callbacks: {
                                label: function(tooltipItem) {
                                    var label = tooltipItem.label || '';
                                    var value = tooltipItem.raw;
                                    var total = data.reduce((acc, val) => acc + val, 0);
                                    var percentage = ((value / total) * 100).toFixed(2);
                                    return label + ': ' + value + ' (' + percentage + '%)';
                                }
                            }
                        }
                    }
                }
            });
        });
    </script>
    
@endsection

