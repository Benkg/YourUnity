@extends('layouts.master')
@section('page_title')
Test
@endsection

@section('content')
<div id="contactContainer">
    @include('layouts.menu.public')
    <div class="cont">
        <div class="orgTitle">
            <h1 class="mt-2"> {{$org->company}} </h1>
        </div>

        <div class="cardContents">
            <p class="card-text">Sign-In Sheet</p>
            <hr />

            <!-- Feedback Form -->
            <form method="POST" action="" class="col-12 col-centered">
                {{ csrf_field() }}
                <input type="text" class="form-control" name="fName" placeholder="First Name">
                <input type="text" class="form-control" name="lName" placeholder="Last Name">
                <input type="email" class="form-control" name="email" placeholder="Email">
                <button type="submit" class="mt-3 btn btn-primary text-white float-right">Sign-In</button>
            <form>

        </div>
    </div>
</div>

@endsection

<style>
.buttons {
    background-color: transparent !important;
    color: #6bbaa7 !important;
    border: 2px solid #6bbaa7 !important; /* Green */
}

</style>

<!--
<div class="container-fluid">
    <div class="row">

        <h1 class="org">{{ $org->company }}</h1>
        <div class="eventCard"></div>
        <div class="signInForm"></div>

    </div>
</div>
-->
