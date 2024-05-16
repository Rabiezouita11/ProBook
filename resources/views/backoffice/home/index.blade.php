@extends('backoffice.layouts.index')

@section('content')
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
                                    <h5>Number of Followers</h5>
                                </div>
                                <div class="d-widget-content" style="height: 100px;"> <!-- Fixed height -->
                                    <span class="realtime-ico pulse"></span>
                                    <h6></h6>
                                    <h5>{{ $abonnementsCount }}</h5>
                                    <i class="icofont-users-alt-5"></i> <!-- Updated icon class -->
                                </div>
                            </div>
                        </div>

                
                        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

                        <!-- Chart container -->
                        <div id="mostPublishedDomainChartContainer" style="height: 250px;"></div>
                    </div>

                </div>
            </div>
        </div>
    </div><!-- main content -->
    <script>
        // Extract data for chart
        var domainData = [];
        var countData = [];
        @foreach($mostPublishedDomains as $domain)
            domainData.push("{!! addslashes($domain->domain) !!}");
            countData.push({{ $domain->count() }});
        @endforeach
    
        console.log("Domain Data: ", domainData);
        console.log("Count Data: ", countData);
    
        // Chart options
        var options = {
            chart: {
                type: 'bar',
                height: 250
            },
            series: [{
                name: 'Count',
                data: countData
            }],
            xaxis: {
                categories: domainData
            }
        };
    
        // Wait for the DOM to be fully loaded
        document.addEventListener("DOMContentLoaded", function() {
            var chart = new ApexCharts(document.querySelector("#mostPublishedDomainChartContainer"), options);
            chart.render();
        });
    </script>
    
@endsection

