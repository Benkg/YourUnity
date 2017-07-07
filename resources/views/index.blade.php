@extends('layouts.master')

@section('page_title')
YourUnity
@endsection

@section('content')

<div class="container-fluid no-padding">
                      <!-- Background Image, Sign In and Register Buttons -->
	<div class="row justify-content-center splash-image">
		<div class="col-12">
			<div class="row mt-2">
				<div class="col-3 text-right">
					<img src="{{ url('/images/logo_white.png') }}" class="logo-main" alt="YourUnity">
				</div>
				<div class="col-8 text-right vertical-align">
					<span class="head-links white"><a href="http://blog.yourunity.com">Blog</a></span>
					<img src="{{ url('/images/twitter_white.png') }}" class="head-twitter-icon" alt="Twitter">
					<img src="{{ url('/images/facebook_white.png') }}" class="head-social-icons ml-2" alt="Facebook">
					<img src="{{ url('/images/instagram_white.png') }}" class="head-social-icons ml-4" alt="Instagram">
					<a href="/register" class="btn btn-outline-primary white ml-4">Community Service Provider?</a>
				</div>
			</div>

                      <!-- Top Bar and Logo -->
	<div class="black-background-transp absolute">
		<div class="row-fluid center">
			<div class="row">
				<div class="col-6 phrase">
					<span class="landing-phrase">Community, everywhere.</span>
					<br />
					<p class="landing-paragraph">We help you connect with countless community service providers in your area and improve the community around you.</p>
				</div>
			</div>
			<div class="down-circle center"><span class="lnr lnr-chevron-down-circle"></span></div>
		</div>
	</div>

	<div class="row dark-grey pt-4 pb-4">
		<div class="col-12 p-4">
			<div class="row">
				<div class="col-12 ml-3">
					<h2>Community, for everyone.</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-4 center">
					<span class="lnr lnr-store big-icons"></span>
				</div>
				<div class="col-4 center pt-4">
					<span class="lnr lnr-user big-icons-user"></span>
				</div>
				<div class="col-4 center pt-2">
					<span class="lnr lnr-users big-icons"></span>
				</div>
			</div>
			<div class="row">
				<div class="col-4 center">
					<h3>Community Service Providers</h3>
				</div>
				<div class="col-4 center">
					<h3>Community Service Leaders</h3>
				</div>
				<div class="col-4 center">
					<h3>Volunteers</h3>
				</div>
			</div>
		</div>
	</div>

	<div class="row pt-4 pb-4">
		<div class="col-12 p-4">
			<div class="row">
				<div class="col-5 ml-3">
					<h2>Community, for Service Providers.</h2>
				</div>
				<div class="col-6">
					<a href="/register" class="btn btn-primary white">Register</a>
					<a href="/login" class="btn btn-outline-secondary white ml-2">Login</a>
				</div>
			</div>
			<div class="row mt-4 p-1">
				<div class="col-5 blue_background pt-3 pb-3 mr-4">
					<img src="{{ url('/images/screenshot_create_event.png') }}" class="screenshot" alt="Create an Event">
				</div>
				<div class="col-6">
					<h3>Create events for volunteers to join.</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur interdum id enim id tempor. Donec tempor odio et risus sagittis, nec lacinia leo tempus. Nam sit amet ligula suscipit, semper ipsum ut, auctor dui. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed finibus vel nunc sit amet viverra. Morbi accumsan ipsum vitae enim pharetra, id facilisis ipsum venenatis. Ut tellus orci, blandit eu facilisis vel, dignissim at massa.</p>
				</div>
			</div>
			<div class="row p-1 mt-4">
				<div class="col-1"></div>
				<div class="col-6">
					<h3>Track your events.</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur interdum id enim id tempor. Donec tempor odio et risus sagittis, nec lacinia leo tempus. Nam sit amet ligula suscipit, semper ipsum ut, auctor dui. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed finibus vel nunc sit amet viverra. Morbi accumsan ipsum vitae enim pharetra, id facilisis ipsum venenatis. Ut tellus orci, blandit eu facilisis vel, dignissim at massa.</p>
				</div>
				<div class="col-5 blue_background pt-3 pb-3 text-right">
					<img src="{{ url('/images/screenshot_tracking.png') }}" class="screenshot" alt="Track Events">
				</div>
			</div>
			<div class="row p-1 mt-4">
				<div class="col-5 blue_background pt-3 pb-3 mr-4">
					<img src="{{ url('/images/screenshot_update.png') }}" class="screenshot" alt="Update Volunteers">
				</div>
				<div class="col-6">
				<h3>Update volunteers on any sudden event changes.</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur interdum id enim id tempor. Donec tempor odio et risus sagittis, nec lacinia leo tempus. Nam sit amet ligula suscipit, semper ipsum ut, auctor dui. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed finibus vel nunc sit amet viverra. Morbi accumsan ipsum vitae enim pharetra, id facilisis ipsum venenatis. Ut tellus orci, blandit eu facilisis vel, dignissim at massa. Nulla tristique ipsum ut luctus malesuada.</p>
				</div>
			</div>
		</div>
	</div>

	<div class="row dark-grey pt-4 pb-4">
		<div class="col-12 p-4">
			<div class="row">
				<div class="col-12">
					<h2>Community, for Service Leaders.</h2>
				</div>
			</div>
			<div class="row mt-4">
				<div class="col-1 text-right">
					<span class="lnr lnr-checkmark-circle md-icon"></span>
				</div>
				<div class="col-11">
					<span class="leader-checklist">Check individual volunteer hours within volunteer group.</span>
				</div>
			</div>
			<div class="row mt-4">
				<div class="col-1 text-right">
					<span class="lnr lnr-checkmark-circle md-icon"></span>
				</div>
				<div class="col-11">
					<span class="leader-checklist">Upload required documents through docusign.</span>
				</div>
			</div>
			<div class="row mt-4">
				<div class="col-1 text-right">
					<span class="lnr lnr-checkmark-circle md-icon"></span>
				</div>
				<div class="col-11">
					<span class="leader-checklist">Directly contact service providers through the YourUnity app.</span>
				</div>
			</div>
			<div class="row mt-4">
				<div class="col-12 center">
					<span class="coming-soon">Coming Soon...</span>
				</div>
			</div>
		</div>
	</div>

	<div class="row pt-3 pb-3">
		<div class="col-12 p-4">
			<div class="row">
				<div class="col-12">
					<h2>Community, for Volunteers.</h2>
				</div>
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
	}

	.logo {
		width: 14%;
		margin: 1%;
	}

</style>

@endsection
