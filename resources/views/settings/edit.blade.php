@extends('layouts.master')
@section('page_title')
Settings
@endsection

@section('content')

@include('layouts.header')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="edit-card">
                <h2 class="mb-4">{{ Auth::user()->company }}</h2>
                <form class="" method = "POST" action = "/settings/edit">
                    {{ csrf_field() }}
                    <h4 class="mb-3">Event Coordinator: </h4>
                    <input class="form-control col-8 mb-3" type ='text' name ='name' id='name' value ="{{ Auth::user()->name }}"/>
                    <h4 class="mb-3">Email: </h4>
                    <input class="form-control col-8 mb-3" type ='text' name ='email' id='email' value ="{{ Auth::user()->email }}"/>
                    <input class="btn btn-primary" type = 'submit' value = "Update" />
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
