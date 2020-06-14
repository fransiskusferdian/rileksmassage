<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Proudct</title>
	<meta charset="UTF-8">
	<meta name="description" content="Cassi Photo Studio HTML Template">
	<meta name="keywords" content="photo, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Stylesheets -->
	<link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/elegant-icons.css') }}" />

	<!-- Main Stylesheets -->
	<link rel="stylesheet" href="{{ asset('frontend/sass/style.css') }}" />


	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>

<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Offcanvas Menu Section -->
	<div class="offcanvas-menu-wrapper">
		<div class="menu-header">
			<a href="{{url('/')}}" class="site-logo">
				<img src="{{url('frontend/img/logo.png')}}" alt="">
			</a>
			<div class="menu-switch" id="menu-canvas-close">
				<i class="icon_close"></i>
			</div>
		</div>
		<ul class="main-menu">
			<li><a href="{{url('/')}}">Home</a></li>
			<li><a href="{{url('/ourwork')}}">Our Work</a></li>
			<li><a href="{{url('/about')}}" class="active">About</a></li>
			<li><a href="{{url('/blog')}}">Blog</a></li>
		</ul>
		<div class="menu-footer">
			<div class="footer-social">
				<a href="#">Facebook</a>
				<a href="https://wa.me/6285726908787?text=Hi%20can%20I%20look%20your%20pricelist">Whatsapp</a>
				<a href=" #">Instagram</a>
				<a href=" #">Studio</a>
			</div>
			<div class="copyright">
				<p>
					Copyright &copy;<script>
						document.write(new Date().getFullYear());
					</script> All rights reserved Show Me Your Wish Production
				</p>
			</div>
		</div>
	</div>
	<!-- Offcanvas Menu Section end -->

	<!-- Header section -->
	<header id="header" class="header-section headroom header--fixed" style="background-color: #0d2237;">
		<a href="{{url('/')}}" class="site-logo">
			<img src="{{url('frontend/img/logo.png')}}" alt="">
		</a>
		<div class="menu-switch" id="menu-canvas-show">
			<i class="icon_menu"></i>
		</div>
	</header>
	<!-- Header section end -->

	<!-- Page top section -->
	<div class="page-top-section">
		<div class="page-top-warp set-bg" data-setbg="{{Storage::url($items->image)}}">
		</div>
	</div>
	<!-- Page top section end -->

	<!-- About section -->
	<section class="about-section">
		<div class="container">
			<div class="row about-item d-flex justify-content-center">
				{{!! $items->content !!}}
			</div>
			<div class="row d-flex justify-content-center">
				<a href="{{$items->link}}" class="btn btn-outline-warning btn-lg ml-4">ORDER NOW</a>
			</div>
		</div>
	</section>
	<!-- About section end -->>

	<!-- Footer section -->
	<footer class="footer-section" style="padding-bottom: 0px;">
		<div class="footer-social">
			<a href="#">Facebook</a>
			<a href="https://wa.me/6285726908787?text=Hi%20can%20I%20look%20your%20pricelist">Whatsapp</a>
			<a href="#">Instagram</a>
			<a href="#">Studio</a>
		</div>
		<div class="copyright">
			<p>
				Copyright &copy;<script>
					document.write(new Date().getFullYear());
				</script> All rights reserved Show Me Your Wish Production
			</p>
		</div>
	</footer>
	<!-- Footer section end -->

	<!--====== Javascripts & Jquery ======-->
	<script src="{{ asset('frontend/js/vendor/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/js/masonry.pkgd.min.js') }}"></script>
	<script src="{{ asset('frontend/js/main.js') }}"></script>
	<script src="https://unpkg.com/headroom.js@0.11.0/dist/headroom.min.js"></script>
	<script>
		(function ($) {
			"use strict";
			// headroom js activation
			var myElement = document.querySelector("header");
			// construct an instance of Headroom, passing the element
			var headroom = new Headroom(myElement);
			// initialise
			headroom.init();
		}(jQuery));
	</script>
</body>

</html>