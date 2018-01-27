@extends('layouts.master')
@section('page_title')
Settings
@endsection

@section('content')
                    <!-- Script for updating value of... Where is id = uploadFile ??  -->
<script type="text/javascript">
document.getElementById("uploadBtn").onchange = function () {
    document.getElementById("uploadFile").value = this.value;
};
</script>

                    <!-- Script for Profile Picture Form -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#uploadBtn').change(function() {
            $('#fileUpload').submit();
        });
    });
</script>

@include('layouts.header')

<div class="full-content">
<div class="container-fluid">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <div class="card mt-4" style="margin-bottom: 15vh;">
                <div class="card-header card-inverse" style="background-color: #6bbaa7; color: #fff !important;">                       
                    <h2>{{ Auth::user()->company }}</h2>
                    <a href="/settings/edit" class="card-link  top-right white">Edit</a>
                </div>

                <div class="card-block">
                    <div class="row p-4">
                    <table class="table-full">
                        <tr>

                                <!-- Profile Picture -->
                            <td class="pr-4">
                                <div class="avatar"><img src="/images/avatars/{{ $user->avatar }}"></div>

                                    <!-- Change Profile Picture Form -->
                                <form enctype="multipart/form-data" action="/settings" method="POST" id="fileUpload">
                                    <div class="fileUpload">
                                        <p class="custom-para">Change Image</p>
                                        <input id="uploadBtn" type="file" class="upload" name="avatar"/>
                                    </div>
                                    <!-- <input type="file" class="upload" name="avatar"> -->
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <br />
                                    <!-- <input id="submit" type="submit" class="btn btn-small btn-primary"> -->
                                </form>
                            </td>

                                <!-- Account Information -->
                            <td class="">
                                <table class="settings-info">

                                    <!-- Name of Organization -->
                                    <tr>
                                        <td>
                                            <h4>Event Coordinator: </h4>
                                        </td>
                                        <td>
                                            {{ $user->name }}
                                        </td>
                                    </tr>

                                    <!-- Account Email -->
                                    <tr>
                                        <td>
                                            <h4>Email: </h4>
                                        </td>
                                        <td>
                                            {{ Auth::user()->email }}
                                        </td>
                                    </tr>

                                    <!-- Member Since: -->
                                    <tr>
                                        <td>
                                            <h4>Member since: </h4>
                                        </td>
                                        <td>
                                            <?php
                                                $print_date = Auth::user()->created_at;
                                                $print_date = DateTime::createFromFormat('Y-m-d H:i:s', $print_date);
                                                echo($print_date->format('F j, Y'));
                                            ?>
                                        </td>
                                    </tr>

                                </table>
                                <!-- Logout button -->
                                <div class="bottom-right">
                                        <a class="btn btn-primary btn white" role="button" aria-disabled="true" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>                
        </div>
    </div>
</div>
</div>


@endsection
