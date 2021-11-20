@extends('layouts.app1')
@section('contenu')

	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Shop Category page</h1>
					<nav class="d-flex align-items-center">
						<a href="{{url('/')}}">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="{{url('/shop')}}">Shop<span class="lnr lnr-arrow-right"></span></a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->
	<div class="container">
		<div class="row ">
			<div class="col-xl-3 col-lg-4 col-md-5 mt-5">
				<div class="sidebar-categories">
					<div class="head">Browse Categories</div>
				
					<ul class="main-categories">
						<li  class="main-nav-list child" ><a href="{{URL::to('/shop')}}" class="{{(request()->is('shop')?'active':'')}}">All</a></li>
						@foreach ($categories as $categorie)
						<li  class="main-nav-list child"><a class="{{(request()->is('select_par_cat/'.$categorie->category_name)?'active':'')}}" href="/select_par_cat/{{$categorie->category_name}}">{{$categorie->category_name}}</a></li>	
						@endforeach
				


					</ul>
				</div>
			
			</div>
			<div class="col-xl-9 mt-3 col-lg-8 col-md-7">
				<!-- Start Filter Bar -->
			
				<!-- End Filter Bar -->
				<!-- Start Best Seller -->
				<section class="lattest-product-area pb-40 category-list">
					<div class="row">
						@if (Session::has('status'))
						<div class="col-lg-12 justify-content-center alert alert-danger">
						  {{Session::get('status')}}
				</div>
					   @endif
						<!-- single product -->
						@foreach ($produits as $produit)
						<div class="col-lg-4 col-md-6">
							<div class="single-product">
								<img class="img-responsive" height="200px" src="/storage/product_images/{{$produit->product_image}}" alt="">
								<div class="product-details">
									<h6>{{$produit->product_name}}</h6>
									<div class="price">
										<h6>${{$produit->product_price}}</h6>
										<h6 class="l-through">$210.00</h6>
									</div>
									<div class="prd-bottom">

										<a href="/ajouter_au_panier/{{$produit->id}}" class="social-info">
											<span class="ti-bag"></span>
											<p class="hover-text">add to bag</p>
										</a>
										<a href="{{url('/produitbyid/'.$produit->id)}}" class="social-info">
											<span class="lnr lnr-move"></span>
											<p class="hover-text">view more</p>
										</a>
									</div>
								</div>
							</div>
						</div>
						@endforeach
					
						<!-- single product -->
					
					</div>
				</section>
				<!-- End Best Seller -->
				<!-- Start Filter Bar -->
			</div>
		</div>
	</div>

	<!-- Start related-product Area -->
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