@extends('layouts.master')
@section('page_title')
Settings
@endsection

@section('content')
                    <!-- Script for updating value of... Where is id = uploadFile ?  -->

@include('layouts.header')

<div class="full-content">
<div class="container-fluid">
    <div class="row">
        <div class="col-12 margin-left-30">
            <div class="settings-card">

                        <!-- Card With Profile Picutre and Account Information -->
                <table class="off">
                    <tr>
                        <form enctype="multipart/form-data" action="/settings" method="POST" id="fileUpload">
                            {{ csrf_field() }}

                                <!-- Profile Picture -->
                            <td class="pr-4 right-border">
                                <div class="avatar"><img src="/images/avatars/{{ $user->avatar }}"></div>


                                

                            </td>

                                <!-- Account Information -->
                            <td class="pl-4">
                                <table class="settings-info">

                                    <!-- Name of Owner/Event Coordinator -->
                                    <tr>
                                        <td>
                                            <h2>{{ Auth::user()->company }}</h2>
                                        </td>
                                        <td>
                                            <button type="submit" class="btn btn-primary float-right">Submit</button>
                                        </td>
                                    </tr>

                                    <!-- Name of Organization -->
                                    <tr>
                                        <td>
                                            <h4>Event Coordinator: </h4>
                                        </td>
                                        <td>
                                            <input class="form-control" type="text" value="{{ Auth::user()->name }}">
                                        </td>
                                    </tr>

                                    <!-- Account Email -->
                                    <tr>
                                        <td>
                                            <h4>Email: </h4>
                                        </td>
                                        <td>
                                            <input class="form-control" type="text" value="{{ Auth::user()->email }}">
                                        </td>
                                    </tr>

                                    <!-- Member Since: -->
                                    <tr>
                                        <td>
                                            <h4>Member since: </h4>
                                        </td>
                                        <td>
                                            <?php
                                                $date = Auth::user()->created_at;
                                                $date = date("F j, Y");
                                                echo $date;
                                            ?>
                                        </td>
                                    </tr>

                                </table>
                            </td>
                        </form>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
</div>


@endsection
