@extends('layouts.app1')
@section('contenu')
    {{-- <div class="hero-wrap hero-bread" style="background-image: url('frontend/images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Checkout</span></p>
            <h1 class="mb-0 bread">Checkout</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-7 ftco-animate">
						<form action="{{url('/payer')}}" class="billing-form" method="POST" id="checkout-form">
							{{ csrf_field() }}

							<h3 class="mb-4 billing-heading">Billing Details</h3>
							@if(Session::has('error'))
							 <div class="alert alert-danger">
								{{Session::get('error')}}
								{{Session::put('error',null)}}
							 </div>
							@endif
	          	<div class="row align-items-end">
	          		<div class="col-md-12">
	                <div class="form-group">
	                	<label for="firstname">Full Name</label>
	                  <input type="text" class="form-control" placeholder="" name="name">
	                </div>
	              </div>
	        
                <div class="w-100"></div>
		           
		            <div class="w-100"></div>
		            <div class="col-md-12">
		            	<div class="form-group">
	                	<label for="streetaddress"> Address</label>
	                  <input type="text" id="address" class="form-control"  name="address" >
	                </div>
		            </div>
		            <div class="col-md-12">
		            	<div class="form-group">
					<label for="streetaddress"> Name on Card</label>
	                  <input type="text" class="form-control" name="card-name" id="card-name">
	                </div>
		            </div>
		            <div class="w-100"></div>
		            <div class="col-md-12">
		            	<div class="form-group">
	                	<label for="towncity">Number</label>
	                  <input type="text" id="card-number" class="form-control" placeholder="">
	                </div>
		            </div>
		            <div class="col-md-6">
		            	<div class="form-group">
		            		<label for="postcodezip">Expiration Month</label>
	                  <input type="text" id="card-expiry-month" class="form-control" placeholder="">
	                </div>
		            </div>
		            
		            <div class="col-md-6">
	                <div class="form-group">
	                	<label for="phone">Expiration Year</label>
	                  <input type="text" id="card-expiry-year" class="form-control" placeholder="">
	                </div>
	              </div>
	              <div class="col-md-12">
	                <div class="form-group">
	                	<label for="emailaddress">CVC</label>
	                  <input type="text" id="card-cvc" class="form-control" placeholder="">
	                </div>
                </div>
              
                <div class="col-md-12">
                	<div class="form-group">
									
		      <input type="submit" class="btn  lol " value="Payer"> 
										
				</div>
                </div>
	            </div>
	          </form><!-- END -->
					</div>
					<div class="col-xl-5">
	          <div class="row mt-5 pt-3">
	          	<div class="col-md-12 d-flex mb-5">
	          		<div class="cart-detail cart-total p-3 p-md-4">
	          			<h3 class="billing-heading mb-4">Cart Total</h3>
	          			<p class="d-flex">
		    						<span>Subtotal</span>
		    						<span>$20.60</span>
		    					</p>
		    					<p class="d-flex">
		    						<span>Delivery</span>
		    						<span>$0.00</span>
		    					</p>
		    					<p class="d-flex">
		    						<span>Discount</span>
		    						<span>$3.00</span>
		    					</p>
		    					<hr>
		    					<p class="d-flex total-price">
		    						<span>Total</span>
		    						<span>${{Session::get('cart')->totalPrice}}</span>
		    					</p>
								</div>
	          	</div>
	          	<div class="col-md-12">
	          		<div class="cart-detail p-3 p-md-4">
	          			<h3 class="billing-heading mb-4">Payment Method</h3>
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											   <label><input type="radio" name="optradio" class="mr-2"> Direct Bank Tranfer</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											   <label><input type="radio" name="optradio" class="mr-2"> Check Payment</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											   <label><input type="radio" name="optradio" class="mr-2"> Paypal</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<div class="checkbox">
											   <label><input type="checkbox" value="" class="mr-2"> I have read and accept the terms and conditions</label>
											</div>
										</div>
									</div>
									<p><a href="#"class="btn  lol py-3 px-4">Place an order</a></p>
								</div>
	          	</div>
	          </div>
          </div> <!-- .col-md-8 -->
        </div>
      </div>
    </section> <!-- .section --> --}}
	<section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Checkout</h1>
                    <nav class="d-flex align-items-center">
                        <a href="{{url('/')}}">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="{{url('/paiement')}}">Checkout</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Checkout Area =================-->
    <section class="checkout_area section_gap">
        <div class="container">
            <div class="billing_details">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <h3>Billing Details</h3>
                        <form class="row contact_form" action="{{url('/payer')}}" method="post" novalidate="novalidate">
							{{ csrf_field() }}
							@if(Session::has('error'))
							<div class=" col-md-12 alert alert-danger">
							   {{Session::get('error')}}
							   {{Session::put('error',null)}}
							</div>
							@endif
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" placeholder="Fullname"  name="name">
                                {{-- <span class="placeholder" data-placeholder="Full name"></span> --}}
                            </div>
							<div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="card-name" placeholder="Name on Card" name="card-name">
                            </div>
							<div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="card-number" placeholder="Card Number" name="card-number">
                            </div>
							<div class="col-md-6">
								<div class="form-group">
							  <input type="text" id="card-expiry-month" placeholder="Expiration Month" class="form-control" placeholder="">
							</div>
							</div>
							<div class="col-md-6 form-group p_star">
								<div class="form-group">
								  <input type="text" id="card-expiry-year" class="form-control" placeholder="Expiration Year">
								</div>
							  </div>
							  <div class="col-md-6 form-group p_star">
								<div class="form-group ">
								  <input type="text" id="card-cvc" class="form-control" placeholder="CVC">
								</div>
							</div>
                           
                       
                            
                    
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="address" name="address">
                            </div>
							<div class="col-lg-12 mt-4">
								<div class="order_box">
						   
									
		
										Total<span class="m-3">${{Session::get('cart')->totalPrice}}</span>
									</ul>
									<input type="submit" class="btn mt-3 primary-btn " value="Proceed to Payment"> 

							
									{{-- <a class="primary-btn mt-3" href="#">Proceed to Paypal</a> --}}
								</div>
							</div>
							
                    
                        </form>
                    </div>
                  
                </div>
            </div>
        </div>
    </section>

@endsection
@section('scripts')
<script src="https://js.stripe.com/v2/"></script>
<script src="src/js/checkout.js"></script>
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
	</script>
@endsection
    
