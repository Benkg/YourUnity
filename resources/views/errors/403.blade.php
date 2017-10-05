@extends('layouts.master')
@section('page_title')
All Events
@endsection

@include('layouts.header')

@section('content')

<!-- Main Content -->
<div class="full-content">
<div class="container-fluid">
        <div class="row">

            <div class="col-6 card middle center">
                <h1 class="uhoh">!</h1>
                <h2>Whoops! Looks like you don't have permission to view this page!</h2>
            </div>

        </div>
</div>
</div>

@endsection

<style>
    .uhoh {
        position: relative;
        top: 0;
        left: 0;
        color: #6bbaa7;
        font-weight: 800 !important;
        font-size: 4rem !important;
        margin-bottom: 3vh;
    }

    .middle {
        margin: 10vh auto;
        padding: 5%;
    }
</style>
