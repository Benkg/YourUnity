@extends('layouts.master')

@section('page_title')
Settings @endsection

@section('content')

<script type="text/javascript">
document.getElementById("uploadBtn").onchange = function () {
    document.getElementById("uploadFile").value = this.value;
};
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.avatar').mouseenter(function() {
            $('.fileUpload').removeClass('hide');
        });
        $('.fileUpload').mouseleave(function() {
            $('.fileUpload').addClass('hide');
        });

        $('#uploadBtn').change(function() {
            $('#fileUpload').submit();
        });
    });
</script>

@include('layouts.header')

<div class="full-content">
<div class="container-fluid">
    <div class="row">
        <div class="col-12 margin-left-30">
            <div class="settings-card">
            <table class="off">
                <tr>
                    <td class="pr-4 right-border">
                        <div class="avatar"><img src="/images/avatars/{{ $user->avatar }}"></div>

                        <form enctype="multipart/form-data" action="/settings" method="POST" id="fileUpload">
                            <div class="fileUpload hide">
                                <span class="custom-span">+</span>
                                <p class="custom-para">Change Image</p>
                                <input id="uploadBtn" type="file" class="upload" name="avatar"/>
                            </div>
                            <!-- <input type="file" class="upload" name="avatar"> -->
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <br />
                            <!-- <input id="submit" type="submit" class="btn btn-small btn-primary"> -->
                        </form>
                    </td>
                    <td class="pl-4">
                        <table class="settings-info">
                            <tr>
                                <td><h2>{{ $user->name }}'s Profile</h2></td>
                            </tr>
                            <tr>
                                <td>
                                    <h4>Organization: </h4>
                                </td>
                                <td>
                                    {{ Auth::user()->company }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4>Email: </h4>
                                </td>
                                <td>
                                    {{ Auth::user()->email }}
                                </td>
                            </tr>
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
                </tr>
            </table>
            </div>
        </div>
    </div>

</div>
</div>


@endsection
