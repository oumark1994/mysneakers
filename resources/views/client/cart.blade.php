@extends('layouts.app1')
@section('contenu')


		<section class="banner-area organic-breadcrumb">
			<div class="container">
				<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
					<div class="col-first">
						<h1>Shopping Cart</h1>
						<nav class="d-flex align-items-center">
							<a href="{{url('/')}}">Home<span class="lnr lnr-arrow-right"></span></a>
							<a href="{{url('/panier')}}">Cart</a>
						</nav>
					</div>
				</div>
			</div>
		</section>
		<!-- End Banner Area -->
	
		<!--================Cart Area =================-->
		<section class="cart_area">
			<div class="container">
				<div class="cart_inner">
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									
									
									<th scope="col">Product</th>
									<th scope="col">Price</th>
									<th scope="col">Quantity</th>
									<th scope="col">Total</th>
									<th scope="col"></th>
								</tr>
							</thead>
							@if(Session::has('cart'))
							<tbody>
								@foreach ($products as $product )



								<tr>

									<td>
										<div class="media">
											<div class="d-flex">
												<img  class="img img-responsive" height="90px" src="storage/product_images/{{$product['product_image']}}" alt="">
											</div>
											<div class="media-body">
												<p>{{$product['product_name']}}</p>
											</div>
										</div>
									</td>
									<td >
										<h5>${{$product['product_price']}}</h5>
									</td>
									<td class="" >
										<form action="{{url('/modifier_qty/'.$product['product_id'])}}" method="POST">
											{{ csrf_field() }}
											
												<div class="product_count">
													<input type="text" name="quantity" id="sst" maxlength="12" value="{{$product['qty']}}" minlength="1" title="Quantity:"
														class="input-text qty">
													<button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
														class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
													<button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
														class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>
												</div>
											<input type="submit" value="Update" class=" btn-sm ml-5 btn btn-light lol"/>
			
										</form>
								
										
									</td>
									<td>
									
										<h5>${{$product['product_price']*$product['qty']}}</h5>
									</td>
									<td class="product-remove"><a href="/retirer_produit/{{$product['product_id']}}"><span class="fa fa-close text-danger"></span></a></td>

								</tr>
			
									
								@endforeach
					
							
								<tr class="out_button_area">
									<td>
	
									</td>
									<td>
	
									</td>
									<td>
	
									</td>
									<td>
										<div class="checkout_btn_inner d-flex align-items-center">
											<a class="gray_btn" href="{{url('/shop')}}">Continue Shopping</a>
											<a class="primary-btn"  href="{{url('/paiement')}}">Proceed to checkout</a>
										</div>
									</td>
								</tr>
							</tbody>
							@else
							@if (Session::has('status'))
							<div class="alert alert-success">
							  {{Session::get('status')}}
						  </div>
						   @endif
								
							@endif
						
						</table>
					</div>
				</div>
			</div>
 @endsection
 @section('scripts')
  <script>
		$(document).ready(function(){

		var quantitiy=0;
		   $('.quantity-right-plus').click(function(e){
		        
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		            
		            $('#quantity').val(quantity + 1);

		          
		            // Increment
		        
		    });

		     $('.quantity-left-minus').click(function(e){
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		      
		            // Increment
		            if(quantity>0){
		            $('#quantity').val(quantity - 1);
		            }
		    });
		    
		});
 @endsection



