@extends('layouts.master')
@section('page_title')
Dashboard
@endsection

@section('content')

<?php
    $nonPastEvents = getNonPastEvents();
?>
                    <!-- Header (top bar with logo and settings) -->
<div class="container-fluid">
    <div class="row">

                    <!-- Sidebar -->
        @include('layouts.sidebar')

        <!-- Padding for fixed sidebar -->
        <div class="col-3"></div>

                    <!-- Stats Bar and Events List -->
        <div class="col-9 pl-5 pr-5 pt-4 dashboard">
            <div class="row">

                        <!-- Stats Bar -->
                @include('cards.stats')

            </div>
        </div>
    </div>
</div>
@endsection
