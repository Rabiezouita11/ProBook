@extends('backoffice.layouts.index')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel-content">
                    <h4 class="main-title">Welcome To Xchange</h4>
                    <div class="row merged20 mb-4">
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div>
                                <div class="d-widget-title">
                                    <h5>Domain</h5>
                                    <canvas id="domainChart" width="400" height="400"></canvas>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Chart for domain distribution
            var ctx = document.getElementById('domainChart').getContext('2d');
            var domainData = @json($domainData);
            var labels = domainData.map(item => item.domain);
            var data = domainData.map(item => item.count);
            var total = data.reduce((acc, val) => acc + val, 0);

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
                                    var percentage = ((value / total) * 100).toFixed(2);
                                    return `${label}: ${value} (${percentage}%)`;
                                }
                            }
                        },
                        datalabels: {
                            formatter: function(value, context) {
                                var label = context.chart.data.labels[context.dataIndex];
                                var percentage = ((value / total) * 100).toFixed(2);
                                return `${label}\n${percentage}%`;
                            },
                            color: function(context) {
                                return context.dataset.borderColor[context.dataIndex];
                            },
                            backgroundColor: function(context) {
                                return 'rgba(255, 255, 255, 0.7)';
                            },
                            borderColor: function(context) {
                                return context.dataset.borderColor[context.dataIndex];
                            },
                            borderRadius: 3,
                            borderWidth: 1,
                            padding: 6,
                            font: {
                                weight: 'bold'
                            }
                        }
                    }
                },
                plugins: [ChartDataLabels]
            });

            // Chart for user publication distribution
            var userCtx = document.getElementById('userPublicationChart').getContext('2d');
            var userData = @json($userData);
            var userLabels = userData.map(item => item.username);
            var userDataPoints = userData.map(item => item.count);
            var userChart = new Chart(userCtx, {
                type: 'bar',
                data: {
                    labels: userLabels,
                    datasets: [{
                        label: 'Publications by Users',
                        data: userDataPoints,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
@endsection
