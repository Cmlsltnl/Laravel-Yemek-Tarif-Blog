@extends('app')
@section('icerik')


	<!-- Recipe details section -->
	<section class="recipe-details-section">
		<div class="container">
			<div class="recipe-meta">
				<div class="racipe-cata">
					<span>{{$blog[0]->getKategori->kategori_adi}}</span>
				</div>
				<h2>{{$blog[0]->baslik}}</h2>
				@php
					$zaman = $blog[0]->created_at;
					$zaman->setLocale('tr');
				@endphp
				<div class="recipe-date">{{$zaman->diffForHumans()}}</div>
				<div class="rating">
					<i class="far fa-eye"> {{$blog[0]->hit}}</i>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-5">
					<div class="recipe-filter-warp">
						<div class="filter-top">
							<div class="filter-top-text">
								<p>Hazırlama: {{$blog[0]->hazirlanma}} dakika</p>
								<p>Pişirme: {{$blog[0]->pisirme}} dakika</p>
								<p>Porsiyon: {{$blog[0]->porsiyon}} kişilik</p>
							</div>
						</div>
						<!-- recipe filter form -->
						<div class="filter-form-warp">
							<h2>Malzemeler</h2>
							<form class="filter-form">
								@php
							$malzemeler = explode(',',$blog[0]->malzemeler);
								@endphp
								@for($i=0;$i<count($malzemeler);$i++)
									<div class="check-warp">
									
									<label for="one">{{$malzemeler[$i]}}</label>
								</div>
								@endfor
								
								
							</form>
						</div>
					</div>
				</div>
				<div class="col-lg-7">
					{!!$blog[0]->icerik!!}
					
				</div>
			</div>
		</div>
	</section>
	<!-- Recipe details section end -->


	<!-- Comment section -->
	
	<!-- Comment section -->

@endsection
@section('js')
@endsection