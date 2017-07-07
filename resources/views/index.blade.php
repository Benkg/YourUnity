@extends('layouts.master')

@section('page_title')
YourUnity
@endsection

@section('content')

<script>
	$('document').ready(function() {
		$('.sc1').hover(function() {
			$('.splash-card-1').toggleClass('lighter');
		});
		$('.sc1').click(function() {
				window.location.replace("#service_providers");
		});
		$('.sc2').hover(function() {
			$('.splash-card-2').toggleClass('lighter');
		});
		$('.sc2').click(function() {
				window.location.replace("#service_leaders");
		});
		$('.sc3').hover(function() {
			$('.splash-card-3').toggleClass('lighter');
		});
		$('.sc3').click(function() {
				window.location.replace("#volunteers");
		});
	});
</script>

<div class="container-fluid no-padding">
                      <!-- Background Image, Sign In and Register Buttons -->
	<div class="row justify-content-center splash-image">
		<div class="col-12">
			<div class="row mt-2">
				<div class="col-3 text-right">
					<img src="{{ url('/images/whitelogo.svg') }}" class="logo-main" alt="YourUnity">
				</div>
				<div class="col-8 text-right vertical-align">
					<span class="head-links white"><a href="http://blog.yourunity.org">Blog</a></span>
					<img src="{{ url('/images/twitter_white.png') }}" class="head-twitter-icon" alt="Twitter">
					<img src="{{ url('/images/facebook_white.png') }}" class="head-social-icons ml-2" alt="Facebook">
					<img src="{{ url('/images/instagram_white.png') }}" class="head-social-icons ml-4" alt="Instagram">
					<a href="/access" class="btn btn-outline-primary white ml-4">Community Service Provider?</a>
				</div>
			</div>

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
				<div class="col-12 center mb-4">
					<h2 class="thick">Community, for everyone.</h2>
					<hr class="short" />
				</div>
			</div>
			<div class="row pb-4">
				<div class="splash-card-1"></div>
				<div class="col-4 center sc1">
					<span class="lnr lnr-store big-icons"></span>
					<h3 class="mt-2">Community Service Providers</h3>
				</div>
				<div class="splash-card-2"></div>
				<div class="col-4 center pt-4 sc2">
					<span class="lnr lnr-user big-icons-user"></span>
					<h3 class="mt-3">Community Service Leaders</h3>
				</div>
				<div class="splash-card-3"></div>
				<div class="col-4 center pt-2 sc3">
					<span class="lnr lnr-users big-icons"></span>
					<h3>Volunteers</h3>
				</div>
			</div>
			<br />
		</div>
	</div>

	<div id="service_providers" class="row pt-4 pb-4">
		<div class="col-12 p-4">
			<div class="row">
				<div class="col-12 center">
					<h2 class="thick">Community, for Service Providers.</h2>
					<a href="/access" class="btn btn-primary white mt-2">Register</a>
					<a href="/login" class="btn btn-outline-secondary white ml-3 mt-2">Login</a>
					<hr class="short" />
				</div>
			</div>
			<div class="row mt-4 p-1">
				<div class="col-5 blue_background pt-3 pb-3 mr-4">
					<img src="{{ url('/images/screenshot_create_event.png') }}" class="screenshot" alt="Create an Event">
				</div>
				<div class="col-6">
					<h3>Create events for volunteers to join.</h3>
					<p></p>
				</div>
			</div>
			<div class="row p-1 mt-4">
				<div class="col-1"></div>
				<div class="col-6">
					<h3>Track your events.</h3>
					<p></p>
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
				<p></p>
				</div>
			</div>
		</div>
	</div>

	<div id="service_leaders" class="row dark-grey pt-4 pb-4">
		<div class="col-12 p-4">
			<div class="row">
				<div class="col-12 center">
					<h2 class="thick">Community, for Service Leaders.</h2>
					<hr class="short" />
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

	<div id="volunteers" class="row pt-3 pb-3">
		<div class="col-12 p-4">
			<div class="row">
				<div class="col-12 center">
					<h2 class="thick">Community, for Volunteers.</h2>
					<hr class="short" />
				</div>
			</div>
			<div class="row mt-4">
				<div class="col-4 center">
					<img src="{{ url('/images/iphone.png') }}" class="iphone" alt="YourUnity iPhone app screenshot">
				</div>
				<div class="col-4 center">
					<img src="{{ url('/images/iphone.png') }}" class="iphone" alt="YourUnity iPhone app screenshot">
				</div>
				<div class="col-4 center">
					<img src="{{ url('/images/iphone.png') }}" class="iphone" alt="YourUnity iPhone app screenshot">
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-4 center">
					<h3>Find events that interest you.</h3>
				</div>
				<div class="col-4 center vol-tit">
					<h3>Track your hours.</h3>
				</div>
				<div class="col-4 center vol-tit">
					<h3>No paper. Anytime.</h3>
				</div>
			</div>
			<div class="row mt-4">
				<div class="col-12 center">
					<span class="coming-soon">Coming Soon...</span>
				</div>
			</div>
		</div>

		<hr />
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
