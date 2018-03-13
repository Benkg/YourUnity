@extends('layouts.master')

@extends('layouts.publicHeader')

@section('content')
<div class="container">

  <div class="row">
    <div class="login-card org-vol">
      <div class="row">

        <div id="org-card" class="col-lg-6 col-sm-12 col-md-6 access-btns">
          <span class="lnr lnr-store big-icons"></span>
          <h3 class="mt-2">Organization</h3>
          <span class="glyphicon glyphicon-resize-horizontal"></span>
        </div>

        <div id="vol-card" class="col-lg-6 col-sm-12 col-md-6 access-btns">
          <span class="lnr lnr-user big-icons"></span>
          <h3 class="mt-2">Volunteer</h3>
        </div>

      </div>
    </div>
  </div>

  <div class="row">
    <div class="login-card reg-req">
      <div class="row">

				<div id="req-card" class="col-lg-6 col-sm-12 col-md-6 access-btns">
					<span class="lnr lnr-link big-icons"></span>
					<h3 class="mt-2">Request Access</h3>
					<span class="glyphicon glyphicon-resize-horizontal"></span>
				</div>

				<div id="reg-card" class="col-lg-6 col-sm-12 col-md-6 access-btns">
					<span class="lnr lnr-enter big-icons"></span>
					<h3 class="mt-2">Register</h3>
				</div>

			</div>
    </div>
  </div>

  <!-- Register Card -->
  <div class="row">
    <div class="login-card reg-card">
      <h3 class="card-text text-center">To register your organization,<br/>Enter your unique access code</h3>
      <hr />
      <br />

      <!-- Form -->
      <form class="form-horizontal col-8 col-centered" role="form" method="POST" action="/access">
          {{ csrf_field() }}
          <div class="form-group">
              <input type="text" class="form-control" placeholder="Enter Access Code" name="code"></input>
          </div>
          <!-- Back and Submit Buttons -->
          <a class="btn" href="">
              Back
          </a>
          <button type="submit" class="btn btn-primary float-right">
              Access
          </button>
      </form>
    </div>
  </div>

  <!-- Request Card -->
  <div class="row">
    <div class="login-card req-card">
      <h3 class="card-text text-center">To request access,<br/>Enter your organizations name and email</h3>
      <hr />
      <br />

      <!-- Form -->
      <form class="form-horizontal col-8 col-centered" role="form" method="POST" action="/email/orgRequest">
          {{ csrf_field() }}
          <div class="form-group">
              <input type="text" class="form-control" placeholder="Name of Organization" name="name" required="true"></input>
          </div>
          <div class="form-group">
              <input type="email" class="form-control" placeholder="Email" name="email" required="true"></input>
          </div>
          <!-- Back and Submit Buttons -->
          <a class="btn" href="">
              Back
          </a>
          <button type="submit" class="btn btn-primary float-right">
              Request to Join
          </button>
      </form>
    </div>
  </div>

  <!-- App Pictures -->
<div class="row">
  <div class="col-sm-12 p-2 vol-card">

    <div class="row">
      <div class="col-sm-12 center">
        <h2 class="landing-phrase">Community, for Volunteers.</h2>
        <a target="_blank" href="https://itunes.apple.com/us/app/yourunity/id1291525611?ls=1&mt=8"><img src="{{ url('/images/AppleAppStore.png') }}" class="appstoreIcon" alt="Download YourUnity on the App Store"></a>
        <a target="_blank" href="https://play.google.com/store/apps/details?id=org.yourunity.YourUnity"><img src="{{ url('/images/GooglePlayStore.png') }}" class="appstoreIcon" alt="Download YourUnity on Google Play"></a>
        <hr class="short" />
      </div>
    </div>

    <!-- Missing Screenshots -->
    <div class="row mt-4 p-2">
      <div class="col-sm-4 center">
        <img src="" class="iphone" alt="YourUnity iPhone app screenshot">
      </div>
      <div class="col-sm-4 center">
        <img src="" class="iphone" alt="YourUnity iPhone app screenshot">
      </div>
      <div class="col-sm-4 center">
        <img src="" class="iphone" alt="YourUnity iPhone app screenshot">
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
  <hr />
  </div>
</div>

</div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript">

$(document).ready(function(){

  $("#org-card").click(function(){
    $(".org-vol").css("display", "none");
    $(".reg-req").css("display", "initial");
  })

  $("#vol-card").click(function(){
    $(".org-vol").css("display", "none");
    $(".vol-card").css("display", "initial");
  })

  $("#req-card").click(function(){
    $(".req-card").css("display", "initial");
    $(".reg-card").css("display", "none");
    $(".reg-req").css("display", "none");
  })

  $("#reg-card").click(function(){
    $(".reg-card").css("display", "initial");
    $(".req-card").css("display", "none");
    $(".reg-req").css("display", "none");
  })

  $("#reg-card").click(function(){
    $(".reg-card").css("display", "initial");
    $(".req-card").css("display", "none");
    $(".reg-req").css("display", "none");
  })


})
</script>

<style>

.col-centered {
  margin: 0 auto;
}

.req-card {
  display: none;
}

.reg-card {
  display: none;
}

.reg-req {
  display: none;
}

.vol-card {
  display: none;
}

.appstoreIcon {
  max-height: 50px;
}

.access-btns {
  text-align: center;
}

.access-btns:hover {
  border: 2px solid #6bbaa7;
  border-radius: 10px;
}

</style>
