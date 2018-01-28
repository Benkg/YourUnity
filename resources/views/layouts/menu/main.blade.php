<button class="toggle">◎</button>

<ul class="legend" id="list">
    <a href="/settings" class="text-white"><li>Profile</li></a>
    <a href="/" class="text-white"><li>Dashboard</li></a>
    <a href="/contact" class="text-white"><li>Contact Us</li></a>
    <a href="/legal/service" class="text-white"><li>Legal Terms</li></a>
</ul>

<!-- JS Toggle Menu -->
<script>
  $(document).ready(function() {
    $('.toggle').click(function() {
        $('.legend').toggle("display");
    })
  });

  $current = window.location.pathname;
    if($current.includes('dashboard')) {
      document.getElementById("list").children[1].style.display = "none";
    }
</script>

<style>
/*** GENERAL STYLES ***/
/* Side menu item */
li {
  width: 100%;
  color: #FFFFFF;
  margin-bottom: 15px;
  margin-left: 5%;
  font-size: 1.8rem;
  -webkit-font-smoothing: subpixel-antialiased;
  cursor: pointer;
}

/* Side menu item hover */
li:hover {
  border-left: 2px solid #6bbaa7;
  padding-left: 1rem;
}

/* Toggle Button */
.toggle {
  text-decoration: none;
  position: fixed;
  top: -1vh;
  left: 0px;
  font-size: 3.3rem;
  padding-left: 0px;
  color: #6bbaa7;
  z-index:2;
  transition: left 0.3s cubic-bezier(.25,.8,.25,1);
  background-color:transparent;
  border:none;
}

/* Side menu */
.legend {
  display:none;
  position:absolute;
  list-style-type: none;
  z-index: 1;
  height: 100%;
  width: 25vw;
  overflow: hidden;
  left: 0;
  top:0;
  background-color: rgba(46,46,46,1);
  box-shadow: 3px 0 6px rgba(0,0,0,0.16), 3px 0 6px rgba(0,0,0,0.23);
  transition: left 0.25s cubic-bezier(.25,.8,.25,1);
  padding-top:10px;
}
</style>
