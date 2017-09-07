@extends('layouts.master')
@section('page_title')
Create Event
@endsection

@section('content')
@include('layouts.header')

<!-- Event Title, Errors Banner, and Create Event Form -->
<div class="container">

    <!-- Errors Banner -->
    <div class="row">
        <div class="col-8">
            @if(count($errors))
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>

    <!-- Duplicate Form -->
    <form method="POST" action="/upload" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="card card-inverse text-center " style="margin: 2vh auto; width: 50vw; background-color: #333; border-color: #333;">
            <div class="card-block">
                <h1 class="card-title">Document Manager</h1>
                <hr />

                <input type="file" multiple="" />
                <input type="submit" name="submit" />
            </div>
        </div>

    </form>

</div>
@endsection

                    <!-- Custom Styles -->
<style>

body {
  background: #3f3f3f !important;
  font-weight: 200;
}

label {
    color: #fff;
}

.col-centered {
    margin: 0 auto;
}

.white {
    color: #fff;
}

.black-background {
    background: #2e2e2e; /* Old Browsers */
background: -webkit-linear-gradient(top,#2e2e2e,#3f3f3f); /*Safari 5.1-6*/
background: -o-linear-gradient(top,#2e2e2e,#3f3f3f); /*Opera 11.1-12*/
background: -moz-linear-gradient(top,#2e2e2e,#3f3f3f); /*Fx 3.6-15*/
background: linear-gradient(to bottom, #2e2e2e, #3f3f3f); /*Standard*/
}

.logo {
  width: 10em;
}

.event {
    background: #2e2e2e;
    border: 0px;
    opacity: 0.7;
    color: #fff;
    width: 100%;
    border-radius: 5px;
}

.btn-primary {
    background-color: #6bbaa7 !important;
    border: 1px solid #6bbaa7 !important;
}

button:hover {
    cursor: pointer;
}
</style>
