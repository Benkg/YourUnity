@extends('layouts.master')

@section('page_title')
YourUnity
@endsection

@section('content')

<div class="container-fluid no-padding">

                      <!-- Top Bar and Logo -->
	<div class="black-background-transp absolute">
		<div class="row-fluid center">
			<img src="{{ url('/images/whitegreen.svg') }}" class="logo-main" alt="YourUnity">
		</div>
	</div>

                      <!-- Background Image, Sign In and Register Buttons -->
	<div class="row justify-content-center splash-image">
    <div class="col-4 text-right">
    	<button onclick="location.href='/login';" type="button" class="btn btn-primary btn-lg">Sign In</button>
    </div>
<!--		Original Register Button. Uncomment when access code is no longer needed.
    <div class="col-4 text-left">
    	<button onclick="location.href='/register';" type="button" class="blue-outline btn btn-outline-secondary btn-lg">Register</button>
    </div>
-->
		<!-- Access Code Button -->
		<div class="col-4 text-left">
    	<button onclick="location.href='/access';" type="button" class="blue-outline btn btn-outline-secondary btn-lg">Register</button>
    </div>
	</div>

</div>

                      <!-- Style for Background Image and Logo -->
<style>

	.content {
		margin-top: 0 !important;
	}

	.splash-image {
  	background-image: url("/images/splash-background.jpg");
  	background-size: cover;
  	background-repeat: no-repeat;
  	background-position: center center;
  	height: 100vh;
  	padding-top: 85vh;
	}

	.logo {
		width: 14%;
		margin: 1%;
	}

</style>

@endsection
