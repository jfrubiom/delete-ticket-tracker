<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Basic Page Needs
		================================================== -->
		<meta charset="utf-8" />
		<title>
			@section('title')
			Issue Tracker
			@show
		</title>
		<meta name="keywords" content="your, awesome, keywords, here" />
		<meta name="author" content="Jon Doe" />
		<meta name="description" content="Lorem ipsum dolor sit amet, nihil fabulas et sea, nam posse menandri scripserit no, mei." />

		<!-- Mobile Specific Metas
		================================================== -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- CSS
		================================================== -->
		<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
		<link href="{{ asset('assets/css/bootstrap-responsive.min.css') }}" rel="stylesheet">
		<link href="{{ asset('packages/datatables/css/jquery.dataTables.css') }}" rel="stylesheet">
		<link href="{{ asset('assets/css/project.css') }}" rel="stylesheet">

		<style>
		@section('styles')
		body {
			padding: 60px 0;
		}
		@show
		</style>
		@yield('css')

		@include('frontend/partials/favicons')
	</head>

	<body>
		@include('frontend/partials/navbar')

		<!-- Container -->
		<div class="container">

			<!-- Notifications -->
			@include('frontend/partials/notifications')

			<!-- Content -->
			@yield('content')

			<hr />

			<!-- Footer -->
			<footer>
			</footer>
		</div>

		@include('frontend/partials/scripts')

		@yield('js')
	</body>
</html>
