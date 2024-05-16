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
								<h5>{{$userCount}}</h5>
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
								
								<h5>{{$publicationsCount}}</h5>
								<i class="icofont-newspaper"></i> <!-- Updated icon class -->
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4">
						<div class="d-widget soft-green">
							<div class="d-widget-title">
								<h5>Most Published Domain</h5>
							</div>
							<div class="d-widget-content" style="height: 100px;">
								<ul class="list-group">
									<li class="list-group-item d-flex justify-content-between align-items-center">
										{{ $mostPublishedDomain->domain }}
										<span class="badge badge-primary badge-pill">{{ $mostPublishedDomain->count }}</span>
									</li>
								</ul>
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
								<h5>{{$commentairesCount}}</h5>
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
								<h5>{{$abonnementsCount}}</h5>
								<i class="icofont-users-alt-5"></i> <!-- Updated icon class -->
							</div>
						</div>
					</div>

					<div class="col-lg-4 col-md-4 col-sm-4">
						<div class="d-widget soft-green">
							<div class="d-widget-title">
								<h5>Number of Like Posts</h5>
							</div>
							<div class="d-widget-content" style="height: 100px;"> <!-- Fixed height -->
								<span class="realtime-ico pulse"></span>
								<h6></h6>
								<h5>{{$jaimePublicationsCount}}</h5>
								<i class="icofont-thumbs-up"></i> <!-- Updated icon class -->
							</div>
						</div>
					</div>

				</div>
				
			</div>
		</div>
	</div>
</div><!-- main content -->


@endsection