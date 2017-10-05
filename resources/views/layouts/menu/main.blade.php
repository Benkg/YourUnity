<input type="checkbox" id="legendToggle">

<label for="legendToggle" class="toggle">◎</label>

<ul class="legend">
    <a href="/settings" class="text-white"><li>Profile</li></a>
    <a href="/" class="text-white"><li>Dashboard</li></a>
    <a href="/contact" class="text-white"><li>Contact Us</li></a>
    <a href="/legal/service" class="text-white"><li>Legal Terms</li></a>
    <a href="/attachments/manager" class="text-white"><li>Attachment Manager</li></a>
</ul>

<style>

/*** GENERAL STYLES ***/

/* Main Content */
.cont {
  position: relative;
  z-index: 0;
  background-color: #2e2e2e !important;

  transition: background-color 0.3s cubic-bezier(.25,.8,.25,1);
}

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

/* Toggle Button O */
.toggle {
  text-decoration: none;
  position: fixed;
  top: -1vh;
  bottom: 0px;
  left: 0;
  z-index: 4;
  font-size: 3.3rem;
  color: #6bbaa7;
  transition: left 0.3s cubic-bezier(.25,.8,.25,1);
}

.toggle:hover {
    cursor: pointer;
}

/* Side menu */
.legend {
  list-style-type: none;
  position: fixed;
  top: 0px;
  left: -100%;
  bottom: 0px;
  z-index: 3;

  padding: 7% 0 0 0;
  width: 25vw;
  height: 100%;
  background-color: #2e2e2e;

  transition: left 0.25s background-color(.25,.8,.25,1);
  transition: left 0.25s cubic-bezier(.25,.8,.25,1);
}

.legend > hr {
  margin-bottom: -5vw;
  margin-bottom: 5vw;
  position: relative;
}

/* Hide Checkbox */
#legendToggle{
    display: none;
    z-index: -1;
}

/* When toggled, transition in the legend and add a shadow */
#legendToggle:checked ~ .legend {
    left: 0;
    background-color: rgba(46,46,46,0.97);
    box-shadow: 3px 0 6px rgba(0,0,0,0.16), 3px 0 6px rgba(0,0,0,0.23);
}

/* When toggled, transition the toggle over */
#legendToggle:checked ~ .toggle {
    left: 19vw;
}

#legendToggle:checked ~ .cont {
    background-color: #2d2d2d !important;
}

</style>
