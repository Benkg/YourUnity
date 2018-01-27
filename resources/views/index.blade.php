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
			$('.card1').toggleClass('lighter');
		});
		$('.sc2').click(function() {
				window.location.replace("#service_leaders");
		});
		$('.sc3').hover(function() {
			$('.card2').toggleClass('lighter');
		});
		$('.sc3').click(function() {
				window.location.replace("#volunteers");
		});
	});

</script>
					  <!-- Nav Bar -->

<div class="container-fluid no-padding">
	<nav class="navbar navbar-light bg-faded" style="background-color: #3f3f3f;">
		<div class="row">
		<span class="col-6 media-icons">
			<a href="https://yourunity.org/blog" class="text-white">Blog</a>
			<a href="https://twitter.com/YourUnityApp"><img src="https://yourunity.org/images/twitter_white.png" class="head-twitter-icon" alt="Twitter"></a>
			<a href="https://www.facebook.com/YourUnityApp/"><img src="https://yourunity.org/images/facebook_white.png" class="head-social-icons" alt="Facebook"></a>	
		</span>
		<span class="col-6">
			<a href="/login" class="btn btn-outline-secondary white top-login">Login</a>
			<a href="/access" class="btn btn-primary white top-login top-btn top-reg">Register</a>
		</span>
		
		</div>
	</nav>
					  <!-- Background Image -->

	<div class="row justify-content-center splash-image">
		<div class="col-sm-12 ">
			<div class="text-center">
				<img src="{{ url('/images/YU_001_White.svg') }}" class="center logo-main" alt="YourUnity">
			</div>
			<div class="text-center landing-phrase">Community, everywhere.</div>
			<div class="down-circle "><span class="lnr lnr-chevron-down-circle"></span></div>
		</div>
	</div>
					<!-- Landing phrase and Options -->

	<section class="dark-grey p-3">
			<div class="text-center col-12">
				<div class="landing-phrase">Community, for everyone.</d>
				<br />
				<div class="landing-paragraph">We connect community service providers with volunteers to improve the community around you.</div>
			</div>
			<hr class="short"/>
			<div class="row">
				<div class="col-lg-6 col-sm-12 col-md-6 card-one">
					<span class="lnr lnr-store big-icons"></span>
					<h2 class="mt-2">Community Service Providers</h2>
					<span class="glyphicon glyphicon-resize-horizontal"></span>

				</div>
				<div class="col-lg-6 col-sm-12 col-md-6 card-two">
					<span class="lnr lnr-users big-icons"></span>
					<h2>Volunteers</h2>
				</div>
			</div>
	</section>
					<!-- 3 Images and Text Pitch -->

	<div class="row serviceProviders ">
		<div class="col-sm-12 p-4">
			
			<div class="row p-1 mt-4">
				<div class="col-lg-6 col-md-6 col-sm-6">
					<img src="{{ url('/images/post.png') }}" class="screenshot tinted" alt="Create an Event">
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 contentPad">
					<h2 class="mb-4 ">Publish and publicize your events to a large volunteer pool.</h2>
					<p>Unlimited events, with unlimited potential. Post your event to YourUnity, and let us do the rest of the work for you! Simply fill out the title of the event, location, time, a short description, and any requirements for the event.</p>
				</div>
			</div>
			<div class="row p-1 mt-4">
				<div class="col-lg-6 col-md-6 col-sm-6 contentPad flex-first">
					<h2 class="mb-4">Get data analytics from your past events.</h2>
					<p>Track every event that you post to YourUnity. See how many people are interested in your event, how many show up, and the number of hours that they log at your event. Many more analytics are coming every day to YourUnity to help you understand how to drive even more people to them.</p>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 flex-second">
					<img src="{{ url('/images/analytics.png') }}" class="screenshot tinted" alt="Track Events">
				</div>
			</div>
			<div class="row p-1 mt-4">
				<div class="col-lg-6 col-md-6 col-sm-6">
					<img src="{{ url('/images/notifications.png') }}" class="screenshot tinted" alt="Update Volunteers">
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 contentPad">
				<h2 class="mb-4">Send liabilty waivers and other documents to your volunteers.</h2>
				<p>YourUnity gives you the unique ability to send a notification to all of your volunteers with the click of a button, guaranteeing that any pertinent information for your events has the attention of the people that matter most.</p>
				</div>
			</div>
		</div>
	</div>

						<!-- App Pictures -->
	<div class="row black-background volunteers">
		<div class="col-sm-12 p-5">
			<div class="row">
				<div class="col-sm-12 center">
					<h2 class="landing-phrase">Community, for Volunteers.</h2>
					<a href="https://itunes.apple.com/us/app/yourunity/id1291525611?ls=1&mt=8"><img src="{{ url('/images/appstore.svg') }}" class="appstore" alt="Download YourUnity on the App Store"></a>
					<hr class="short" />
				</div>
			</div>
			<div class="row mt-4 p-2">
				<div class="col-sm-4 center">
					<img src="{{ url('/images/iphone_find_events.png') }}" class="iphone" alt="YourUnity iPhone app screenshot">
				</div>
				<div class="col-sm-4 center">
					<img src="{{ url('/images/iphone_register.png') }}" class="iphone" alt="YourUnity iPhone app screenshot">
				</div>
				<div class="col-sm-4 center">
					<img src="{{ url('/images/iphone_checkin.png') }}" class="iphone" alt="YourUnity iPhone app screenshot">
				</div>
			</div>
			<div class="row mt-4">
				<div class="col-sm-4 center">
					<h3>Find events that interest you.</h3>
				</div>
				<div class="col-sm-4 center vol-tit">
					<h3>Register from the palm of your hand.</h3>
				</div>
				<div class="col-sm-4 center vol-tit">
					<h3>Check in and track with ease.</h3>
				</div>
			</div>
		</div>
		<hr />
</div>

                      <!-- Style for Background Image and Logo -->
<style>
	.media-icons {
		padding-left:3vw;
	}

	.content {
		margin-top: 0 !important;
	}

	.iphone {
  		width: 60%;
	}

	.top-reg {
		margin-right: 2%;
	}

	.top-login {
		float:right;
		margin-top: 5px;
	}

	.contentPad {
		padding-right: 5%;
    	padding-left: 5%;
		padding-top: 1%;
	}

	.splash-image {
  	/* background-image: url("/images/splash-background.jpg"); */
	/* background-image: url("/images/pexels-photo-207896.jpeg"); */
	background-image: url("/images/pexels-photo-325521.jpeg");
  	background-size: cover;
  	background-repeat: no-repeat;
	background-position: center center;
	background-attachment: fixed;
	height:90vh;
	}

	.serviceProviders {
		display:flex;
  		flex-flow: row wrap;
		justify-content:space-between;
		padding-bottom: 3%
	}

	,volunteers {
		display: flex;
		flex-flow: row wrap;
		justify-content:space-between;
	}

	.logo {
		width: 25%;
		margin: 1%;
	}

	.tinted { opacity: 0.7; }

	@media (max-width: 376px) {
		.serviceProviders{
			flex-direction:column;
		}
		.flex-first {
			order:2;
		}
		.flex-second {
			order:1;
		}
		.screenshot {
			width: 65vw;
			border-radius: 40px;
			display: block;
			margin: auto;
			padding-bottom:2vh;
		}

		.iphone{
			width:60%;
			padding-bottom:5%;
		}

		.volunteers {
			flex-direction: column;
		}

		.top-btn {
			display: none;
		}


	}

	@media (max-width: 768px) and (min-width : 377px) {

		html {
			overflow-x: hidden;
			max-width: 100%;
		}

		.center {
			width: 60vh;
		}

		
	    .splash-image {
	        width: 104vw !important;
		}
		
		.screenshot {
			width: 50vw;
			border-radius: 40px;
			display: block;
			margin: auto;
		}

		.serviceProviders{
			flex-direction:column;
		}
		.flex-first {
			order:2;
		}
		.flex-second {
			order:1;
		}

		.vertical-align {
		    display: block;
		}

		.contentPad {
			padding-right: 4%;
    		padding-left: 4%;
			padding-top: 3%;
		}

		.top-btn {
			display: none;
		}

		.phrase {
			margin-top: 25vh;
		}

		.landing-phrase {
			padding-top: 7vh;
		}

		.down-circle {
			top: 70vh;
			padding-bottom:3vh;
		}

		.mr-4 {
			margin-right: 0px !important;
		}

		.blue_background {
			margin-bottom: 5%;
		}

		.leader-checklist {
			margin-left: 2%;
		}

		.iphone {
			margin-bottom: 6%;
		}
	}

</style>

@endsection
