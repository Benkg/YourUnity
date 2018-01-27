                    <!-- Top Bar With YourUnity Logo and Settings -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <header>
                <div class="container-fluid">

                    <div class="row bottom-border pt-3 pb-3">
                        <div class="col-12 text-center">
                            <a href="/dashboard"><img src="<?php echo e(url('/images/YU_001_White.svg')); ?>" class="logo" alt="YourUnity"></a>
                        </div>
                    </div>

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

    @media  only screen and (max-width : 1224px) {
        .feedback{
          display: none;
          z-index: -1;
        }
    }

</style>

<!-- Flash Current URL to next http request -->
<?php
    $currentUrl = $_SERVER['REQUEST_URI'];
    session()->flash('url', $currentUrl);
?>
