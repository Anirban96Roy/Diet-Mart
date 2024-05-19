<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Diet-Mart::Admin Panel</title>
		<!-- Google Font: Source Sans Pro -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
		<link rel="stylesheet" href="{{asset('newAsset/plugins/fontawesome-free/css/all.min.css')}}">
		<link rel="stylesheet" href="{{asset('newAsset/css/adminlte.min.css')}}">
		<link rel="stylesheet" href="{{asset('newAsset/css/custom.css')}}">
		<meta name="csrf-token" content="{{csrf_token() }}">
	</head>
	<body class="hold-transition sidebar-mini">
		<div class="wrapper">
			<nav class="main-header navbar navbar-expand navbar-white navbar-light">
				<ul class="navbar-nav">
					<li class="nav-item">
					  	<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
					</li>					
				</ul>
				<div class="navbar-nav pl-2">
				</div>
				
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" data-widget="fullscreen" href="#" role="button">
							<i class="fas fa-expand-arrows-alt"></i>
						</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link p-0 pr-3" data-toggle="dropdown" href="#">
							<img src="{{asset('newAsset/img/avatar5.png')}}" class='img-circle elevation-2' width="40" height="40" alt="">
						</a>
						<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-3">
							<h4 class="h4 mb-0"><strong>{{Auth::guard('admin')->user()->name}}</strong></h4>
							<div class="mb-3">{{Auth::guard('admin')->user()->email}}</div>
							<div class="dropdown-divider"></div>
							
							<div class="dropdown-divider"></div>
							
							<div class="dropdown-divider"></div>
							<a href="{{route('admin.logout')}}" class="dropdown-item text-danger">
								<i class="fas fa-sign-out-alt mr-2"></i> Logout							
							</a>							
						</div>
					</li>
				</ul>
			</nav>
			<!-- /.navbar -->
			<!-- Main Sidebar Container -->
			@include('admin.layout.sidebar')
			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">

				<!-- /.content -->
				<!--child class comes here-->
				@yield('child')

			</div>
			<!-- /.content-wrapper -->
			<footer class="main-footer">
				
				<strong>Copyright &copy; 2024 Diet-Mart All rights reserved.
			</footer>
			
		</div>
		
		<script src="{{asset('newAsset/plugins/jquery/jquery.min.js')}}"></script>
		
		<script src="{{asset('newAsset/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
		
		<script src="{{asset('newAsset/js/adminlte.min.js')}}"></script>
	
		<script src="{{asset('newAsset/js/demo.js')}}"></script>
	

		<script type="text/javascript">
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
</script>

		@yield('customJs')
	</body>
</html>