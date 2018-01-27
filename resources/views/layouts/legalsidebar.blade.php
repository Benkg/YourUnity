

<?php
    $nonPastEvents = getNonPastEvents();
?>
        <!-- SideBar -->
        <!-- Profile Picture, Name, Logout, Event Table, New Event Button -->
        <div class="col-3 pt-3 sidebar container">


            <!-- Menu -->
            @include('layouts.menu.main')

            <!-- Logo -->
            <div class="center mb-3"><a href="/dashboard"><img src="{{ url('/images/YU_001_White.svg') }}" class="logo img-fluid" alt="YourUnity"></a></div>

            
            <div class="list-group-item"><a href="/legal/service" class="text-white">Terms of Service</a></div>

            <div class="list-group-item"><a href="/legal/users" class="text-white">Terms of Use</a></div>

            <div class="list-group-item"><a href="/legal/cookies" class="text-white">Cookie Policy</a></div>

            <div class="list-group-item"><a href="/legal/privacy" class="text-white">Privacy Policy</a></div>

           <div class="list-group-item"> <a href="/legal/community" class="text-white">Community Guidelines</a></div>

            <div class="list-group-item"><a href="/legal/ip" class="text-white">Trademark & Copyright Policy</a></div>

        </div>

<!-- Custom Styles -->
<style type="text/css">
.responsive-button { 
overflow: hidden;
white-space: nowrap;

}

#eventName {
  padding-left: 0.5rem;
  margin-left: 0.5rem;
  border-left: 2px solid #6bbaa7;
}

.hide {
    display: none;
}

h3 {
    color: #fff;
    font-weight: 200;
}

.active {
    background: #6bbaa7 !important;
    border: #6bbaa7 !important;
    opacity: 1;
    z-index: 2;
}

.btn {
    background: #6bbaa7 !important;
    border: #6bbaa7 !important;
    color: #fff !important;
}

.line-stop {
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis
}

.list-group-item {
    background: rgba(46, 46, 46, 0.4);
    color: #e3e3e3 !important;
    font-weight: 200;
    line-height:3em;
}

.list-group-item:hover {
    background: #6bbaa7 !important;
}

.truncate {
    display:inline;
  overflow: hidden;
  text-overflow: ellipsis;
}

</style>

                    <!-- Script for Active Hover on Event Table -->
<script>

    /* When hovering, give that class an active look */
    $(".list-group").hover(function(){

        $('.list-group-item').hover(function() {
            $( ".list-group-item" ).each(function() {
                $(".list-group-item").removeClass("active");
            });
            $(this).addClass("active");
        });
    });

    /* When All Events link is clicked, don't highlight it */
    $(".all_events").removeClass("active");


</script>
