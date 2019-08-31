@extends('app')
@section('icerik')

<section class="page-top-section set-bg" data-setbg="img/page-top-bg.jpg">
		<div class="container">
			<h2>Kategoriler</h2>
		</div>
	</section>
	<!-- Hero section end -->


	<!-- Search section end -->


	<!-- Recipes section -->
	<section class="recipes-page spad">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="section-title">
						<h2>Tüm Kategoriler</h2>
					</div>
				</div>
				<div class="col-md-4">
					<div class="recipe-view">
						<i class="fa fa-bars"></i>
						<i class="fa fa-th active"></i>
					</div>
				</div>
			</div>
			<div class="row">
				@foreach($tarifler as $tarif)
				<div class="col-lg-4 col-md-6">
					<div class="recipe">
						<img src="/img/blog/1.jpg" alt="">
						<div class="recipe-info-warp">
							<div class="recipe-info">
								<a href="{{URL::to('kategoriye-gore/'.$tarif->slug)}}"><h3>{{$tarif->kategori_adi}}</h3></a>
								<div class="rating">
									
								</div>
							</div>
						</div>
					</div>
				</div>
				@endforeach
				
			</div>
			<div class="site-pagination">

				{{$tarifler->links()}}
				
			</div>
		</div>
	</section>

	@endsection
