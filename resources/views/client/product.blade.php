@extends('layouts.app1')
@section('contenu')

	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Product Details Page</h1>
					<nav class="d-flex align-items-center">
						<a href="{{url('/')}}">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="{{url('/shop')}}">Shop<span class="lnr lnr-arrow-right"></span></a>
						<a href="/produitbyid/{{$product->id}}">product-details</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<!--================Single Product Area =================-->
	<div class="product_image_area">
		<div class="container">
			<div class="row s_product_inner">
				<div class="col-lg-6">
					<div class="s_Product_carousel">
						<div class="single-prd-item">
							<img class="img-responsive" height="450px" src="/storage/product_images/{{$product->product_image}}" alt="">
						</div>
						<div class="single-prd-item">
							<img class="img-fluid" src="img/category/s-p1.jpg" alt="">
						</div>
						<div class="single-prd-item">
							<img class="img-fluid" src="img/category/s-p1.jpg" alt="">
						</div>
					</div>
				</div>
				<div class="col-lg-5 offset-lg-1">
					<div class="s_product_text">
						<h3>{{$product->product_name}}</h3>
						<h2>${{$product->product_price}}</h2>
						<ul class="list">
							<li><a class="active" href="#"><span>Category</span> :{{$product->product_category}}</a></li>
							<li><a href="#"><span>Availibility</span> : @if ($product->status === 1)
								In Stock	
								@else
								Out Stock	
							@endif
						
						</a></li>
						</ul>
						<p>Mill Oil is an innovative oil filled radiator with the most modern technology. If you are looking for
							something that can make your interior look awesome, and at the same time give you the pleasant warm feeling
							during the winter.</p>
					
						<div class="card_area d-flex align-items-center">
							<a class="primary-btn" href="/ajouter_au_panier/{{$product->id}}">Add to Cart</a>
							<a class="icon_btn" href="#"><i class="lnr lnr lnr-diamond"></i></a>
							<a class="icon_btn" href="#"><i class="lnr lnr lnr-heart"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--================End Single Product Area =================-->

	<!--================Product Description Area =================-->
	<section class="product_description_area my-5">

	</section>


    @endsection