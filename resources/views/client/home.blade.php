
@extends('layouts.app1')
@section('contenu')

	
	<section class="banner-area">
		<div class="container">
			<div class="row fullscreen align-items-center justify-content-start">
				<div class="col-lg-12">
					<div class="active-banner-slider owl-carousel">
						<!-- single-slide -->
						<div class="row single-slide align-items-center d-flex">
							<div class="col-lg-5 col-md-6">
								<div class="banner-content">
									<h1>Nike New <br>Collection!</h1>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
										dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
									
								</div>
							</div>
							<div class="col-lg-7">
								<div class="banner-img">
									<img class="img-fluid" src="{{asset('frontend/img/banner/f1.jfif')}}" alt="">
								</div>
							</div>
						</div>
						 <div class="row single-slide">
					
							
					
						</div> 
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<!-- End banner Area -->

	<!-- start features Area -->
	<section class="features-area section_gap">
		<div class="container">
			<div class="row features-inner">
				<!-- single features -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="{{asset('frontend/img/features/f-icon1.png')}}" alt="">
						</div>
						<h6>Free Delivery</h6>
						<p>Free Shipping on all order</p>
					</div>
				</div>
				<!-- single features -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="{{asset('frontend/img/features/f-icon2.png')}}" alt="">
						</div>
						<h6>Return Policy</h6>
						<p>Free Shipping on all order</p>
					</div>
				</div>
				<!-- single features -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="{{asset('frontend/img/features/f-icon3.png')}}" alt="">
						</div>
						<h6>24/7 Support</h6>
						<p>Free Shipping on all order</p>
					</div>
				</div>
				<!-- single features -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="{{asset('frontend/img/features/f-icon4.png')}}" alt="">
						</div>
						<h6>Secure Payment</h6>
						<p>Free Shipping on all order</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end features Area -->

	<!-- Start category Area -->
	<section class="category-area">
		<div class="container">
			<div class="row justify-content-center">
			
				@foreach ($categories as $categorie)
				<div class="col-lg-3 col-md-6">
					<div class="single-deal">
						<div class="overlay"></div>
						<img class="img-responsive w-100" height="300px"   src="/storage/category_images/{{$categorie->category_image}}" alt="">
						<a href="/storage/category_images/{{$categorie->category_image}}" class="img-pop-up" target="_blank">
							<div class="deal-details">
								<h6 class="deal-title">{{$categorie->category_name}}</h6>
							</div>
						</a>
					</div>
				</div>
					
				@endforeach
			
			</div>
		</div>
	</section>
	<!-- End category Area -->

	<!-- start product Area -->
	{{-- <section class="owl-carousel active-product-area section_gap"> --}}
		<!-- single product slide -->
		<div class="">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-6 text-center">
						<div class="section-title">
							<h1>Latest Products</h1>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
								dolore
								magna aliqua.</p>
						</div>
					</div>
				</div>
				<div class="row">
					<!-- single product -->
					@foreach ($produits as $produit )
						
					
					<div class="col-lg-3 col-md-6">
						<div class="single-product">
							<img class="img-responsive" height="270px" src="/storage/product_images/{{$produit->product_image}}" alt="">
							<div class="product-details">
								<h6>{{$produit->product_name}}</h6>
								<div class="price">
									<h6>{{$produit->product_price}}</h6>
									<h6 class="l-through">$210.00</h6>
								</div>
								<div class="prd-bottom">

									<a href="/ajouter_au_panier/{{$produit->id}}" class="social-info">
										<span class="ti-bag"></span>
										<p class="hover-text">add to bag</p>
									</a>
									{{-- <a href="" class="social-info">
										<span class="lnr lnr-heart"></span>
										<p class="hover-text">Wishlist</p>
									</a>
									<a href="" class="social-info">
										<span class="lnr lnr-sync"></span>
										<p class="hover-text">compare</p>
									</a> --}}
									<a href="{{url('/produitbyid/'.$produit->id)}}" class="social-info">
										<span class="lnr lnr-move"></span>
										<p class="hover-text">view more</p>
									</a>
								</div>
							</div>
						</div>
					</div>
					@endforeach
			
		
				
				
		
				</div>
			</div>
		</div>
		<!-- single product slide -->
		<div class="single-product-slider">
			
	{{-- </section> --}}
	
	<section class="related-product-area section_gap_bottom">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6 text-center">
					<div class="section-title">
						<h1>Deals of the Week</h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
							magna aliqua.</p>
					</div>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-lg-9">
					<div class="row ">
						@foreach ($latestProduct as $item)
						<div class="col-lg-4 col-md-4 col-sm-6 mb-20">
							<div class="single-related-product d-flex">
								<a href="{{url('/produitbyid/'.$item->id)}}"><img class="img-responsive"  height="50px" src="/storage/product_images/{{$item->product_image}}" alt=""></a>
								<div class="desc">
									<a href="#" class="title">{{$item->product_name}}</a>
									<div class="price">
										<h6>{{$item->product_price}}</h6>
										<h6 class="l-through">$210.00</h6>
									</div>
								</div>
							</div>
						</div>	
						@endforeach
			
			</div>
		</div>
	</section>
	@endsection
	<!-- End related-product Area -->

	<!-- start footer Area -->
	