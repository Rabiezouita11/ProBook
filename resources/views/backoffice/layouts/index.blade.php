<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<title>Admin</title>
	<link rel="icon" href="/backoffice/images/fav.png" type="image/png" sizes="16x16">

	<link rel="stylesheet" href="/backoffice/css/main.min.css">
	<link rel="stylesheet" href="/backoffice/css/style.css">
	<link rel="stylesheet" href="/backoffice/css/color.css">
	<link rel="stylesheet" href="/backoffice/css/responsive.css">
	<link href="/backoffice/plugins/apex/apexcharts.css" rel="stylesheet" type="text/css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet">
	<meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body>
	<div class="page-loader" id="page-loader">
		<div class="lds-ellipsis">
			<div></div>
			<div></div>
			<div></div>
			<div></div>
		</div>
		<span>Loading...</span>
	</div><!-- page loader -->
	<div class="theme-layout">

		<div class="responsive-header">
			<div class="res-logo"><img src="/backoffice/images/logo.png" alt=""></div>

			<div class="user-avatar mobile">
				<a href="'{{route('showProfile')}}'" title="View Profile"><img alt="" src="/backoffice/images/resources/user.jpg"></a>
				<div class="name">
					<h4>Saim Turan</h4>
					<span>Antalaya, Turky</span>
				</div>
			</div>
			<div class="right-compact">
				<div class="menu-area">
					<div id="nav-icon3">
						<i>
							<svg class="feather feather-grid" stroke-linejoin="round" stroke-linecap="round"
								stroke-width="2" stroke="currentColor" fill="none" viewBox="0 0 24 24" height="18"
								width="18" xmlns="http://www.w3.org/2000/svg">
								<rect height="7" width="7" y="3" x="3" />
								<rect height="7" width="7" y="3" x="14" />
								<rect height="7" width="7" y="14" x="14" />
								<rect height="7" width="7" y="14" x="3" />
							</svg>
						</i>
					</div>
					<ul class="drop-menu">
						<li><a title="profile.html" href="{{route('showProfile')}}"><i class="icofont-user-alt-1"></i>Your
								Profile</a></li>
						<li><a title="" href="#"><i class="icofont-question-circle"></i>Help</a></li>
						<li><a title="" href="#"><i class="icofont-gear"></i>Setting</a></li>
						<li><a class="dark-mod" title="" href="#"><i class="icofont-moon"></i>Dark Mode</a></li>
						<li><a title="" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" class="logout"><i
									class="icofont-logout"></i>Logout</a></li>
					</ul>
				</div>
				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
					@csrf
				</form>
				<div class="res-search">
					<span><i>
							<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
								fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
								stroke-linejoin="round" class="feather feather-search">
								<circle cx="11" cy="11" r="8"></circle>
								<line x1="21" y1="21" x2="16.65" y2="16.65"></line>
							</svg></i></span>
				</div>
			</div>
			<div class="restop-search">
				<span class="hide-search"><i class="icofont-close-circled"></i></span>
				<form method="post">
					<input type="text" placeholder="Search...">
				</form>
			</div>
		</div><!-- responsive header -->

		<header class="">
			<div class="topbar stick">
				<div class="logo"><img alt="" src="/backoffice/images/logo.png"><span>Xchange</span></div>
				<div class="searches">
					<form method="post">
						<input type="text" placeholder="Search...">
						<button type="submit"><i class="icofont-search"></i></button>
					</form>
				</div>
				<ul class="web-elements">
					<li>
						<div class="user-dp">
						<a title="profile.html" href="{{route('showProfile')}}">
								<img src="/backoffice/images/resources/user.jpg" alt="">
								<div class="name">
									<h4  id="userName">{{ auth()->user()->name }}</h4>
								</div>
							</a>
						</div>
					</li>
					<li>
						<a href="{{route('admin')}}" title="Home" data-toggle="tooltip">
							<i>
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
									fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
									stroke-linejoin="round" class="feather feather-home">
									<path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
									<polyline points="9 22 9 12 15 12 15 22"></polyline>
								</svg></i>
						</a>
					</li>

					
					<li>
						<a title="" href="#">
							<i>
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
									fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
									stroke-linejoin="round" class="feather feather-grid">
									<rect x="3" y="3" width="7" height="7"></rect>
									<rect x="14" y="3" width="7" height="7"></rect>
									<rect x="14" y="14" width="7" height="7"></rect>
									<rect x="3" y="14" width="7" height="7"></rect>
								</svg>
							</i>
						</a>
						<ul class="dropdown">
							<li><a href="{{route('showProfile')}}" title=""><i class="icofont-user-alt-3"></i> Your Profile</a></li>
							
							<li><a class="dark-mod" title="" href="#"><i class="icofont-moon"></i> Dark Mode</a></li>
							<li class="logout"><a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" title=""><i class="icofont-power"></i>
									Logout</a></li>

							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								@csrf
							</form>
						</ul>
					</li>
				</ul>
			</div>

		</header><!-- header -->

		<div class="top-sub-bar">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6">
						<div class="menu-btn">
							<i class="">
								<svg id="menu-btn" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
									viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
									stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu">
									<line x1="3" y1="12" x2="21" y2="12"></line>
									<line x1="3" y1="6" x2="21" y2="6"></line>
									<line x1="3" y1="18" x2="21" y2="18"></line>
								</svg></i>
						</div>
						<div class="page-title">
							<h4>Dashboard</h4>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6">
						<ul class="breadcrumb">
							<li><a href="{{route('admin')}}" title="">Home</a></li>
							<li><a href="#" title="">Dashboard</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div><!-- top sub bar -->

		<nav class="sidebar">
			<ul class="menu-slide">
				<li class="{{ request()->route()->getName() === 'admin' ? 'active' : '' }}">
					<a class="" href="{{ route('admin') }}" title="">
						<i><svg id="icon-home" class="feather feather-home" stroke-linejoin="round"
								stroke-linecap="round" stroke-width="2" stroke="currentColor" fill="none"
								viewBox="0 0 24 24" height="14" width="14" xmlns="http://www.w3.org/2000/svg">
								<path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
								<polyline points="9 22 9 12 15 12 15 22" />
							</svg></i> Dashboard
					</a>
				</li>
				<li class="{{ request()->route()->getName() === 'showPageUtilisateurs' ? 'active' : '' }}">
					<a class="" href="{{ route('showPageUtilisateurs') }}" title="">
						<i><svg id="icon-user" class="feather feather-user" stroke-linejoin="round"
								stroke-linecap="round" stroke-width="2" stroke="currentColor" fill="none"
								viewBox="0 0 24 24" height="14" width="14" xmlns="http://www.w3.org/2000/svg">
								<path
									d="M12 2a5 5 0 0 1 5 5c0 2.533-2.087 4.624-5 4.949V15c0 .955-.812 1.949-2 2H9c-1.188-.051-2-.045-2-2v-.051C6.087 11.623 4 9.532 4 7A5 5 0 0 1 12 2z" />
								<path d="M12 14a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" />
							</svg></i> Users
					</a>
				</li>
				

				<li class="">
					<a class="" href="{{route('analytics')}}" title="">
						<i class=""><svg id="ab7" class="feather feather-zap" stroke-linejoin="round"
								stroke-linecap="round" stroke-width="2" stroke="currentColor" fill="none"
								viewBox="0 0 24 24" height="14" width="14" xmlns="http://www.w3.org/2000/svg">
								<polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2" />
							</svg></i>Analytics
					</a>
				</li>
				<li class="">
					<a class="" href="{{route('showProfile')}}" title="">
						<i><svg id="ab1" class="feather feather-users" stroke-linejoin="round" stroke-linecap="round"
								stroke-width="2" stroke="currentColor" fill="none" viewBox="0 0 24 24" height="14"
								width="14" xmlns="http://www.w3.org/2000/svg">
								<path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
								<circle r="4" cy="7" cx="9" />
								<path d="M23 21v-2a4 4 0 0 0-3-3.87" />
								<path d="M16 3.13a4 4 0 0 1 0 7.75" />
							</svg></i>
						Profile
					</a>
				</li>
				<li class="">
					<a class="" href="{{route('Contact')}}" title="">
						<i><svg id="ab1" class="feather feather-users" stroke-linejoin="round" stroke-linecap="round"
								stroke-width="2" stroke="currentColor" fill="none" viewBox="0 0 24 24" height="14"
								width="14" xmlns="http://www.w3.org/2000/svg">
								<path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
								<circle r="4" cy="7" cx="9" />
								<path d="M23 21v-2a4 4 0 0 0-3-3.87" />
								<path d="M16 3.13a4 4 0 0 1 0 7.75" />
							</svg></i>
						Contact
					</a>
				</li>
				
				
			</ul>
		</nav><!-- sidebar -->

		@yield('content')


		<div class="popup-wraper">
			<div class="popup">
				<span class="popup-closed"><i class="icofont-close"></i></span>
				<div class="popup-meta">
					<div class="popup-head">
						<h5><i class="icofont-envelope"></i> Send Message</h5>
					</div>
					<div class="send-message">
						<form method="post" class="c-form">
							<input type="text" placeholder="Enter Name..">
							<input type="text" placeholder="Subject">
							<textarea placeholder="Write Message"></textarea>
							<div class="uploadimage">
								<i class="icofont-file-jpg"></i>
								<label class="fileContainer">
									<input type="file">Attach file
								</label>
							</div>
							<button type="submit" class="main-btn">Send</button>
						</form>
					</div>
				</div>
			</div>
		</div><!-- send message popup -->

		
	</div>

	<script src="/backoffice/js/main.min.js"></script>
	<script src="/backoffice/js/vivus.min.js"></script>
	<script src="/backoffice/js/script.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

	<script src="/backoffice/plugins/apex/apexcharts.min.js"></script>
	<script src="/backoffice/js/graphs-scripts.js"></script>



</body>

</html>