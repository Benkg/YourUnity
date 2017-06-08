@extends('layouts.master')

@section('page_title')
YourUnity
@endsection

@section('content')
	<div class="container-fluid no-padding">

		<div class="black-background-transp absolute">
	        <div class="row-fluid center">
	            <img src="{{ url('/images/logo_white.png') }}" class="logo-main" alt="YourUnity">
	        </div>
		</div>

        <div class="row justify-content-center splash-image">
            <div class="col-4 text-right">
                <button onclick="location.href='/login';" type="button" class="btn btn-primary btn-lg">Sign In</button>
            </div>
            <div class="col-4 text-left">
                <button onclick="location.href='/register';" type="button" class="blue-outline btn btn-outline-secondary btn-lg">Register</button>
            </div>
        </div>

    </div>

    <style>
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
