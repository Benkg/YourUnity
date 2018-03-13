	<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>YourUnity</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta charset="utf-8">

        <!--Google fonts links-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">

		 <!-- SITE-WIDE CSRF-TOKEN -->
		 <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="stylesheet" href="assets/css/fonticons.css">
        <link rel="stylesheet" href="assets/css/slider-pro.css">
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">

		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-108463199-1"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());

			gtag('config', 'UA-108463199-1');
		</script>


						<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<script>
			window.Laravel = {!! json_encode([
				'csrfToken' => csrf_token(),
			]) !!};
		</script>

        <!--For Plugins external css-->
        <link rel="stylesheet" href="assets/css/plugins.css" />

        <!--Theme custom css -->
        <link rel="stylesheet" href="assets/css/style.css">

        <!--Theme Responsive css-->
        <link rel="stylesheet" href="assets/css/responsive.css" />
        <script src="assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>


	</head>
	<body>
		<header id="main_menu" class="header navbar-fixed-top">
            <div class="main_menu_bg">
                <div class="container">
                    <div class="row">
                        <div class="nave_menu">
                            <nav class="navbar navbar-default" id="navmenu">
                                <div class="container-fluid">
                                    <!-- Brand and toggle get grouped for better mobile display -->
                                    <div class="navbar-header">
                                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                            <span class="sr-only">Toggle navigation</span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>

                                    </div>

                                    <!-- Collect the nav links, forms, and other content for toggling -->



                                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                        <ul class="nav navbar-nav navbar-right">

                                            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true">About Us</a>
                                                <ul class="dropdown-menu">
													<li><a href="/public/blog">Blog</a></li>
                                                    <li><a href="#team">The Team</a></li>
                                                </ul>
                                            </li>
											<li><a href="#contact">Contact</a></li>
											</li>
                                            <li><a href="/login" style="font-weight:600;">Login</a></li>
											</li>
                                            <li><a href="/access" style="font-weight:600;">Register</a></li>
                                        </ul>
                                    </div>

                                </div>
                            </nav>
                        </div>
                    </div>

                </div>

			</div>

		</header> <!--End of header -->

		  <!-- Home Section -->
        <section id="home" class="home">
				<div class="text-center">
					<div class="single_home_slider">
						<div class="home-overlay"></div>
						<div class="main_home wow fadeInUp" data-wow-duration="700ms">
							<img src="https://yourunity.org/images/YU_001_White.svg" class="home-logo" alt="YourUnity">
							<div class="separator"></div>
							<h4 class="subtitle">Community, Everywhere</h4>
							<div class="home_btn">
								<a href="#overview" class="btn">Learn More</a>
							</div>
						</div>
					</div><!-- End of single_home_slider -->
				</div>

		</section><!-- End of Home Section -->

		<!-- Overview Section with Two Options -->
		<section id="overview" class="overview sections">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 text-center">
							<span class="head_title"><h1>Community, for everyone.</h1></span>
							<h5 class="margin-bottom-20">We connect community service providers with volunteers to </br> improve the community around you.</h5>
							<div class="row">
								<div class="col-sm-6">
									<div class="lnr lnr-users big-icons blue-color icon"></div>
									<a href="#volunteers" class="btn">For Volunteers</a>
								</div>
								<div class="col-sm-6 ">
									<div class="lnr lnr-store big-icons blue-color icon"></div>
									<a href="#service_providers" class="btn"> For Community </br> Service Providers</a>
								</div>
							</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End of Overview Section -->

		<!-- Volunteer Section -->
		<section id="volunteers" class="volunteer sections">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 text-center">
						<span class="head_title"><h1 class="margin-bottom-40">Community, for Volunteers.</h1></span>
						<a href="https://itunes.apple.com/us/app/yourunity/id1291525611?ls=1&amp;mt=8"><img src="https://yourunity.org/images/AppleAppStore.png" class="appImage" alt="Get the App"></a>
                        <a href="https://play.google.com/store/apps/details?id=org.yourunity.YourUnity&hl=en"><img src="https://yourunity.org/images/GooglePlayStore.png" class="appImage" alt="Get the App"></a>                    
                    </div>
				</div>
				<div class="row margin-top-40">
					<div class="col-sm-4 margin-top-40">
						<img src="https://yourunity.org/images/iphone_find_events.png" class="app_screenshot" alt="YourUnity iPhone app screenshot">
						<p class="text-center margin-top-40 line-height-2">Find events that interest you.</p>
					</div>
					<div class="col-sm-4 margin-top-40">
						<img src="https://yourunity.org/images/iphone_register.png" class="app_screenshot" alt="YourUnity iPhone app screenshot">					
						<p class="text-center margin-top-40">Register from the palm of your hand.</p>
					</div>
					<div class="col-sm-4 margin-top-40">
						<img src="https://yourunity.org/images/iphone_view_stats.png" class="app_screenshot" alt="YourUnity iPhone app screenshot">				
						<p class="text-center margin-top-40">Track your progress with ease.</p>
					</div>
				</div>
		</section> <!-- End of Volunteer Section -->

		<!-- Service Section -->
		<section id="service_providers" class="service sections ">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
						<div class=" text-center">
							<span class="head_title"><h1 class="margin-bottom-40"style="line-height:2em;">A Service... for Community Service Providers.</h1></span>
						</div>
						<div class="main_service_area">
                            <div class="single_service_area">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="signle_service_left">
											<img src="https://yourunity.org/images/post.png" alt="Post events">
                                        </div>
                                    </div>
                                    <div class="col-sm-5 col-sm-push-1">
                                        <div class="single_service">
                                            <h2>Publish and publicize your events to a large volunteer pool.</h2>
                                            <div class="separator2"></div>
                                            <p>Unlimited events, with unlimited potential. Post your event to YourUnity, and let us do the rest of the work for you! Simply fill out
												the title of the event, location, time, a short description, and any requirements for the event.</p>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- End of single service area -->

                            <div class="single_service_area  margin-top-80">
                                <div class="row">
                                    <div class="col-sm-6 col-sm-push-6">
                                        <div class="signle_service_left">
											<img src="https://yourunity.org/images/analytics.png" alt="Track Events">
                                        </div>
                                    </div>

                                    <div class="col-sm-5 col-sm-pull-6">
                                        <div class="single_service">
                                            <h2>Get data analytics from your past events.</h2>
                                            <div class="separator2"></div>
                                            <p>Track every event that you post to YourUnity. See how many people are interested in your event, how many show up, and the number
												of hours that they log at your event. Many more analytics are coming every day to YourUnity to help you understand how to drive even more people to them.</p>
                                        </div>
                                    </div>

                                </div>
                            </div><!-- End of single service area -->

                            <div class="single_service_area margin-top-80">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="signle_service_left">
											<img src="https://yourunity.org/images/notifications.png" alt="Update Volunteers">
                                        </div>
                                    </div>
                                    <div class="col-sm-5 col-sm-push-1">
                                        <div class="single_service">
                                            <h2>Send liabilty waivers and other documents to your volunteers.</h2>
                                            <div class="separator2"></div>
                                            <p>YourUnity gives you the unique ability to send a notification to all of your volunteers with the click of
												a button, guaranteeing that any pertinent information for your events has the attention of the people that matter most.  </p>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- End of single service area -->
                        </div>
                    </div><!-- End of col-sm-12 -->
                </div><!-- End of row -->
            </div><!-- End of Container -->
		</section><!-- End of Service Section -->

		<!-- Team Section -->
        <section id="team" class="team sections">
            <div class="container">
                <div class="row">
                    <div class="main_team_area">
                        <div class="head_title text-center">
                            <h1>The Team</h1>
                        </div><!-- End of head title -->

                        <div class=" text-center">
                            <div class="single_team">
                                <div class="col-sm-10 col-sm-offset-1">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="team">
                                                <img class="img-circle" src="/images/benHeadshot.jpeg" alt="" />
                                                <h4>Benjamin Gutierrez</h4>
                                                <div class="separator"></div>
                                                <p>co-founder</p>
                                            </div>
                                        </div> <!-- End of col-sm-4 -->
                                        <div class="col-sm-4">
                                            <div class="team">
                                                <img class="img-circle" src="/images/alexHeadshot.jpeg" alt="" />
                                                <h4>Alexander Pearson-Goulart</h4>
                                                <div class="separator"></div>
                                                <p>co-founder</p>
                                            </div>
                                        </div> <!-- End of col-sm-4 -->
                                        <div class="col-sm-4">
                                            <div class="team">
                                                <img class="img-circle" src="/images/nehaHeadshot.jpeg" alt="" />
                                                <h4>Neha Nene</h4>
                                                <div class="separator"></div>
                                                <p>co-founder</p>
                                            </div>
                                        </div><!-- End of col-sm-4 -->
                                    </div>
                                </div><!-- End of col-sm-10 -->
                            </div>


                        </div>
                    </div>
                </div><!-- End of row -->
            </div><!-- End of Contaier -->
		</section><!-- End of portfolio Section -->

		<section id="contact" class="contact">
			<div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="main_contact sections">
                            <div class="head_title text-center">
                                <h1>Contact Us</h1>
                            </div><!-- End of head title -->

                            <div class="row">
                                <div class="contact_contant">
                                    <div class="col-sm-6 col-xs-12">
                                        <div class="single_message_right_info">
                                            <ul>
                                                <li><i class="fa fa-map-marker"></i> <span>San Diego</span></li>
                                                <li><i class="fa fa-envelope-o"></i> <span class="p-8">contact@yourunity.org</span></li>
                                            </ul>

                                            <div class="contact_social transition">
                                                <a target="_blank" href="https://www.facebook.com/YourUnityApp/"><i class="fa fa-facebook img-circle"></i></a>
                                                <a target="_blank" href="https://twitter.com/YourUnityApp"><i class="fa fa-twitter img-circle"></i></a>
                                                <a target="_blank" href="https://www.instagram.com/yourunityapp/"><i class="fa fa-instagram img-circle"></i></a>
                                            </div>
                                        </div>
                                    </div><!-- End of col-sm-6 -->

                                    <div class="col-sm-6 col-xs-12">
                                        <div class="single_contant_left margin-top-60">
											<form action="/email/contact" method="post" id="formid">
												{{ csrf_field() }}
                                                <!--<div class="col-lg-8 col-md-8 col-sm-10 col-lg-offset-2 col-md-offset-2 col-sm-offset-1">-->

                                                <div class="form-group">
													<label for="name">Name</label>
                                                    <input type="text" class="form-control" name="name" placeholder="Full Name" required="true">
                                                </div>

                                                <div class="form-group">
                                                    <label for="email">e-mail</label>
                                                    <input type="email" class="form-control" name="email" placeholder="Email" required="true">
                                                </div>

                                                <div class="form-group">
                                                    <label for="message">your message</label>
                                                    <textarea class="form-control" name="message" rows="8" placeholder="Write a message!" required ="true"></textarea>
                                                </div>

                                                <div class="form-group">
                                                    <input type="submit" value="submit" name="submit" class="btn">
												</div>


                                                <!--</div>-->
                                            </form>
                                        </div>
                                    </div>
                                </div> <!-- End of messsage contant-->
                            </div>
                        </div>
                    </div><!-- End of col-sm-12 -->
                </div><!-- End of row -->
            </div><!-- End of Contaier -->
        </section><!-- End of portfolio Section -->

		<!-- footer Section -->
        <footer id="footer" class="footer">
			<div class="container">
                <div class="main_footer">
                    <div class="row">
                        <div class="col-sm-12 padding-fourty">
                            <div class="text-center">
								<a class="blue-color" href="/legal/ip">&copy; YourUnity 2018 - Community, everywhere</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- End of container -->
		</footer><!-- End of footer -->


		<!-- START SCROLL TO TOP  -->

        <div class="scrollup">
            <a href="#"><i class="fa fa-chevron-up"></i></a>
        </div>

		<script src="assets/js/vendor/jquery-1.11.2.min.js"></script>
        <script src="assets/js/vendor/bootstrap.min.js"></script>

        <script src="assets/js/jquery.easing.1.3.js"></script>
        <script src="assets/js/masonry/masonry.min.js"></script>
        <script type="text/javascript">
            $('.mixcontent').masonry();
        </script>

        <script src="assets/js/jquery.sliderPro.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function ($) {
                $('#example3').sliderPro({
                    width: 960,
                    height: 200,
                    fade: true,
                    arrows: false,
                    buttons: true,
                    fullScreen: false,
                    shuffle: true,
                    smallSize: 500,
                    mediumSize: 1000,
                    largeSize: 3000,
                    thumbnailArrows: true,
                    autoplay: false,
                    thumbnailsContainerSize: 960

                });
            });
        </script>
        <script src="assets/js/plugins.js"></script>
        <script src="assets/js/main.js"></script>

	</body>
