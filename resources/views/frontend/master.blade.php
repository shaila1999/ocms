
	<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="Colorlib">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>Charity</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="{{url('/frontend/css/linearicons.css')}}">
			<link rel="stylesheet" href="{{url('/frontend/css/font-awesome.min.css')}}">
			<link rel="stylesheet" href="{{url('/frontend/css/magnific-popup.css')}}">
			<link rel="stylesheet" href="{{url('/frontend/css/nice-select.css')}}">
			<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
			<link rel="stylesheet" href="{{url('/frontend/css/bootstrap.css')}}">
			<link rel="stylesheet" href="{{url('/frontend/css/main.css')}}">
		</head>
		<body>

			
  @include('frontend.partials.header')




  @yield('content') 
 
  @include('frontend.partials.footer')





			<script src="{{url('/frontend/js/vendor/jquery-2.2.4.min.js')}}"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
			<script src="{{url('/frontend/js/vendor/bootstrap.min.js')}}"></script>
			<script src="{{url('/frontend/js/jquery.ajaxchimp.min.js')}}"></script>
			<script src="{{url('/frontend/js/jquery.nice-select.min.js')}}"></script>
			<script src="{{url('/frontend/js/jquery.sticky.js')}}"></script>
			<script src="{{url('/frontend/js/parallax.min.js')}}"></script>
			<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
			<script src="{{url('/frontend/js/jquery.magnific-popup.min.js')}}"></script>
			<script src="{{url('/frontend/js/main.js')}}"></script>
		</body>
	</html>
