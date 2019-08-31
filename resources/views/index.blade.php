@extends('app')
@section('icerik')

<!-- Hero section -->
	<section class="hero-section">
		<div class="hero-slider owl-carousel">
			
			@foreach($slider as $slide)
			<div class="hero-slide-item set-bg" data-setbg="img/{{$slide->slider_resim}}">
				<div class="hs-text">
					@php
					$yazi = $slide->slider_metin;
					$parcala = explode(',',$yazi);
					@endphp
					<h2 class="hs-title-1"><span>{{$parcala[0]}}</span></h2>
					<h2 class="hs-title-2"><span>{{$parcala[1]}}</span></h2>
					<h2 class="hs-title-3"><span>{{$parcala[2]}}</span></h2>

				</div>
			</div>
			
			@endforeach
		</div>
	</section>
	<!-- Hero section end -->


	<!-- Add section end -->
	<section class="add-section spad">
		<div class="container">
			<div class="add-warp">
				<div class="add-slider owl-carousel">
					@foreach($ayar['altslide'] as $resim)
					<div class="as-item set-bg" data-setbg="img/{{$resim->altslide_resim}}"></div>
					@endforeach
				
				</div>
				<div class="row add-text-warp">
					<div class="col-lg-4 col-md-5 offset-lg-8 offset-md-7">
						<div class="add-text text-white">
							<div class="at-style"></div>
							<h2>{{$ayar['maddeler']->baslik}}</h2>
							<ul>
								
								<li>{{$ayar['maddeler']->madde_bir}}</li>
								<li>{{$ayar['maddeler']->madde_iki}}</li>
								<li>{{$ayar['maddeler']->madde_uc}}</li>
								<li>{{$ayar['maddeler']->madde_dort}}</li>
								<li>{{$ayar['maddeler']->madde_bes}}</li>
								
								
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Add section end -->


	<!-- Recipes section -->
	<section class="recipes-section spad pt-0">
		<div class="container">
			<div class="section-title">
				<h2>Yeni Tarifler</h2>
			</div>
			<div class="row">
				@foreach($bloglar as $blog)
				<div class="col-lg-4 col-md-6">
					<div class="recipe">
						<img style="min-height: 100%;"src="img/{{$blog->resim}}" alt="">
						<div class="recipe-info-warp">
							<div class="recipe-info">

								<a href="{{URL::to('tarif/'.$blog->getKategori->slug.'/'.$blog->slug)}}"><h3>{{$blog->baslik}}</h3></a>
								
							</div>
						</div>
					</div>
				</div>
				@endforeach
				
			</div>
		</div>
	</section>
	<!-- Recipes section end -->


	<!-- Footer widgets section -->
	<section class="bottom-widgets-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-6 ftw-warp">
					<div class="section-title">
						<h3>Popüler Tarifler</h3>
					</div>
					<ul class="sp-recipes-list">
						@foreach($pop as $populer)
						<li>
							<div class="rl-thumb set-bg" data-setbg="img/{{$populer->resim}}"></div>
							<div class="rl-info">
								<span>March 14, 2018</span>
								<a href="/tarif{{URL::to('tarif/'.$populer->getKategori->slug.'/'.$populer->slug)}}"><h6>{{$populer->baslik}}</h6></a>
								<div class="rating">
									<i class="far fa-eye"> {{$populer->hit}}</i>
									
								</div>
							</div>
						</li>
						@endforeach
					</ul>
				</div>
				<div class="col-lg-4 col-md-6 ftw-warp">
					<div class="section-title">
						<h3>Keşfet</h3>
					</div>
					<ul class="sp-recipes-list">
						@foreach($begenilenbloglar as $blogs)
						<li>
							<div class="rl-thumb set-bg" data-setbg="img/{{$blogs->resim}}"></div>
							<div class="rl-info">
								<span>March 14, 2018</span>
								<a href="/tarif{{URL::to('tarif/'.$blogs->getKategori->slug.'/'.$blogs->slug)}}"><h6>{{$blogs->baslik}}</h6></a>
								<div class="rating">
									<i class="far fa-eye"> {{$blogs->hit}}</i>
								</div>
							</div>
						</li>
						@endforeach
						
					</ul>
				</div>
				<div class="col-lg-4">
					<div class="sp-blog-item">
						<div class="blog-thubm">
							<img src="img/blog/1.jpg" alt="">
							<div class="blog-date">
								<span>Biz Bir Aileyiz</span>
							</div>
						</div>
						<div class="blog-text">
							<h5></h5>
							
							<p>Size en iyi tarifleri sunmak için çalışıyoruz.</br>Yorum yapmayı bizimle iletişimde kalmayı unutmayın! </p>
							
				
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Footer widgets section end -->


	<!-- Review section end -->
	


	<!-- Gallery section -->
	<div class="gallery">
		<div class="gallery-slider owl-carousel">
			<div class="gs-item set-bg" data-setbg="img/instagram/1.jpg"></div>
			<div class="gs-item set-bg" data-setbg="img/instagram/2.jpg"></div>
			<div class="gs-item set-bg" data-setbg="img/instagram/3.jpg"></div>
			<div class="gs-item set-bg" data-setbg="img/instagram/4.jpg"></div>
			<div class="gs-item set-bg" data-setbg="img/instagram/5.jpg"></div>
			<div class="gs-item set-bg" data-setbg="img/instagram/6.jpg"></div>
		</div>
	</div>
	<!-- Gallery section end -->

	@endsection

	@section('js')

	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/main.js"></script>

	@endsection