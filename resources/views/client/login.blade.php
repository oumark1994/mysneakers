
	@extends('layouts.app1')
	@section('contenu')
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Login/Register</h1>
					<nav class="d-flex align-items-center">
						<a href="{{url('/')}}">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="{{url('/client_login')}}">Login</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<!--================Login Box Area =================-->
	<section class="login_box_area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<img class="img-fluid" src="{{asset('frontend/img/login.jpg')}}" alt="">
						<div class="hover">
							<h4>New to our website?</h4>
							<p>There are advances being made in science and technology everyday, and a good example of this is the</p>
							<a class="primary-btn" href="{{URL::to('/signup')}}">Create an Account</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h3>Log in to enter</h3>
						<form class="row login_form" action="{{url('/acceder_compte')}}" method="POST" id="contactForm" novalidate="novalidate">
							@if (Session::has('status'))
							<div class="col-lg-12 justify-content-center alert alert-danger">
							  {{Session::get('status')}}
					</div>
						   @endif
						   @if (count($errors) >0)
						   <div class="col-lg-12 text-center alert alert-danger">
							  <ul>
								@foreach ($errors->all() as $error)
								
								<li>{{$error}}</li>
								@endforeach
							  </ul>
							  </div>
						   @endif
							{{csrf_field()}}
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="name" name="email" placeholder="Enter email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'">
							</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="password" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
							</div>
							{{-- <div class="col-md-12 form-group">
								<div class="creat_account">
									<input type="checkbox" id="f-option2" name="selector">
									<label for="f-option2">Keep me logged in</label>
								</div>
							</div> --}}
							<div class="col-md-12 form-group">
								<button type="submit" value="submit" class="primary-btn">Log In</button>
								<a href="{{url('signup')}}">Don't have an account?</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	@endsection
