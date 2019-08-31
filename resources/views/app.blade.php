<!DOCTYPE html>
<html lang="en">
<head>
	
	<title>{{$ayar['site']->site_baslik}}</title>
	<meta charset="UTF-8">
	<meta name="description" content="Tarif Blog">
	<meta name="keywords" content="food, unica, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->   
	<link href="/img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,400i,500,500i,600,600i,700" rel="stylesheet">
	<script src="https://kit.fontawesome.com/966eb971e4.js"></script>

	<!-- Stylesheets -->
	<link rel="stylesheet" href="/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="/css/font-awesome.min.css"/>
	<link rel="stylesheet" href="/css/owl.carousel.css"/>
	<link rel="stylesheet" href="/css/animate.css"/>
	<link rel="stylesheet" href="/css/style.css"/>


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

	<!-- Header section -->
	<header class="header-section">
		<div class="header-top">
			<div class="container">
				<div class="header-social">

					<a href="{{$ayar['ss']->instagram}}"><i class="fab fa-instagram"></i></a>
					<a href="{{$ayar['ss']->facebook}}"><i class="fab fa-facebook"></i></a>
					<a href="{{$ayar['ss']->twitter}}"><i class="fab fa-twitter"></i></a>
					<a href="{{$ayar['ss']->youtube}}"><i class="fab fa-youtube"></i></a>
					
				</div>
				
			</div>
		</div>
		<div class="header-bottom">
			<div class="container">

				<a href="{{URL::to('/')}}" class="site-logo">
					<img src="/img/{{$ayar['site']->site_logo}}" alt="">
				</a>
				<div class="nav-switch">
					<i class="fa fa-bars"></i>
				</div>
				
				<ul class="main-menu">
						<li><a href="{{URL::to('/')}}">Anasayfa</a></li>
						<li><a href="{{URL::to('/kategoriler')}}">Kategoriler</a></li>
						<li><a href="{{URL::to('/tarifler')}}">Tarifler</a></li>
						<li><a href="{{URL::to('/iletisim')}}">İletişim</a></li>
				</ul>
			</div>
		</div>
	</header>
	<!-- Header section end -->
	@yield('icerik')
	<footer class="footer-section set-bg" data-setbg="/img/footer-bg.jpg">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-6">
					<div class="footer-logo">
						<img src="img/logo.png" alt="">
					</div>
					<div class="footer-social">
						<a href="{{$ayar['ss']->instagram}}"><i class="fab fa-instagram"></i></a>
					<a href="{{$ayar['ss']->facebook}}"><i class="fab fa-facebook"></i></a>
					<a href="{{$ayar['ss']->twitter}}"><i class="fab fa-twitter"></i></a>
					<a href="{{$ayar['ss']->youtube}}"><i class="fab fa-youtube"></i></a>
					
					</div>
				</div>
				<div class="col-lg-6 text-lg-right">
					<ul class="footer-menu">
						<li><a href="{{URL::to('/')}}">Anasayfa</a></li>
						<li><a href="{{URL::to('/kategoriler')}}">Kategoriler</a></li>
						<li><a href="{{URL::to('/tarifler')}}">Tarifler</a></li>
						<li><a href="{{URL::to('/iletisim')}}">İletişim</a></li>
					</ul>
					<p class="copyright" style="font-size: 3px;"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</p>
				</div>
			</div>
		</div>
	</footer>
	<!-- Footer section end -->



	<!--====== Javascripts & Jquery ======-->
	<script src="/js/jquery-3.2.1.min.js"></script>
	<script src="/js/owl.carousel.min.js"></script>
	<script src="/js/main.js"></script>
</body>
</html>