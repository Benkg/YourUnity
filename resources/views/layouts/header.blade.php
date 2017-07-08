                    <!-- Top Bar With YourUnity Logo and Settings -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <header>
                <div class="container-fluid">

                    <div class="row bottom-border pt-3 pb-3">
                        <div class="col-12 text-center">
                            <a href="/dashboard"><img src="{{ url('/images/White.svg') }}" class="logo" alt="YourUnity"></a>
                        </div>
                    </div>

                    <!-- FEEDBACK LINK -->
                    <a href="/feedback" class="link feedback"><span class="lnr lnr-pencil"></span></a>

                </div>
            </header>
        </div>
    </div>
</div>

                    <!-- Styles For Settings Button  -->
<style>
    .lnr-cog {
        color: #fff;
        font-size: 2rem;
        margin-right: 1rem;
    }

    .lnr-cog:hover {
        color: #6bbaa7;
        cursor: pointer;
    }
</style>

<!-- Flash Current URL to next http request -->
<?php
    $currentUrl = $_SERVER['REQUEST_URI'];
    session()->flash('url', $currentUrl);
?>
