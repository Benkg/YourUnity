<input type="checkbox" id="legendToggle">

<label for="legendToggle" class="toggle">◎</label>

<ul class="legend">
    <a href="/legal/service" class="text-white"><li>Terms of Service</li></a>
    <hr class="mt-12"/>
    <a href="/legal/users" class="text-white"><li>Terms of Use</li></a>
    <hr class="mt-12"/>
    <a href="/legal/cookies" class="text-white"><li>Cookie Policy</li></a>
    <hr class="mt-12"/>
    <a href="/legal/privacy" class="text-white"><li>Privacy Policy</li></a>
    <hr class="mt-12"/>
    <a href="/legal/community" class="text-white"><li>Community Guidelines</li></a>
    <hr class="mt-12"/>
    <a href="/legal/ip" class="text-white"><li>Trademark & Copyright Policy</li></a>
</ul>

<style>

.cont > li {
    margin-left: 2vw;
    margin-top: 2vw;
}

.cont > h2 {
    margin-left: 5vw;
}

.cont > p {
    margin-left: 8vw;
    font-size: 150%;
}

/* Side menu item */
li {
  color: #FFFFFF;
  margin-bottom: 15px;
  font-size: 30px;
  -webkit-font-smoothing: subpixel-antialiased;
  cursor: pointer;
}

/* Side menu item hover */
li:hover {
  color: #6bbaa7;
}

@media only screen and (min-width : 1224px) {

  #legalContainer {
    display: grid;
    width: 100%;
    grid-template-rows: 100%;
    grid-template-columns: 5vw 30vw 60vw 5vw;
    grid-template-areas:
    ". legend cont .";
    }

    #legalContainer > .legend {
        list-style-type: none;
        grid-area: legend;
        background-color: #3f3f3f;
    }

    #legalContainer > .cont {
        grid-area: cont;
        background-color: #3f3f3f;
    }

    #legendToggle {
      display: none;
      z-index: -1;
    }

    .toggle {
      display: none;
      z-index: -1;
    }

    .legend > hr {
      display: none;
      z-index: -1;
    }

}

@media only screen and (max-width : 1224px) {
    /* Toggle Button O */
    .toggle {
      text-decoration: none;
      position: fixed;
      top: -1vh;
      bottom: 0px;
      right: 80vw;
      z-index: 2;
      font-size: 20vw;
      color: #6bbaa7;

      transition: right 0.3s cubic-bezier(.25,.8,.25,1);
    }

    /* Side menu */
    .legend {
      list-style-type: none;
      position: fixed;
      top: 0px;
      left: -100%;
      bottom: 0px;
      z-index: 1;

      padding: 10% 0 0 10%;
      width: 80vw;
      height: 100%;
      background-color: #2d2d2d;

      transition: left 0.3s background-color(.25,.8,.25,1);
      transition: left 0.3s cubic-bezier(.25,.8,.25,1);
    }

    /* Side menu item */
    li {
      color: #FFFFFF;
      margin-bottom: 15px;
      font-size: 30px;
      -webkit-font-smoothing: subpixel-antialiased;
      cursor: pointer;
    }

    /* Side menu item hover */
    li:hover {
      color: #6bbaa7;
    }

    /* Main Content */
    .cont {
      position: relative;
      z-index: 0;
      background-color: #3f3f3f;

      transition: background-color 0.3s cubic-bezier(.25,.8,.25,1);
    }

    /* Hide Checkbox */
    #legendToggle{
        display: none;
        z-index: -1;
    }

    /* When toggled, transition in the legend and add a shadow */
    #legendToggle:checked ~ .legend {
        left: 0;
        background-color: #3f3f3f;
        box-shadow: 3px 0 6px rgba(0,0,0,0.16), 3px 0 6px rgba(0,0,0,0.23);
    }

    /* When toggled, transition the toggle over */
    #legendToggle:checked ~ .toggle {
        right: 0vw;
    }

    #legendToggle:checked ~ .cont {
        background-color: #2d2d2d !important;
    }

    .cont > h1:first-of-type {
      margin: 0 0 auto 4vw;
    }

    .cont > h1 {
      margin: 4vw 0 auto 4vw;
    }

    .cont > h2 {
          margin: 2vw 2vw auto 8vw;
    }

    .cont > p {
          margin: 0vw 2vw auto 16vw;
        font-size: 100%;
    }

    .legend > hr {
      margin-bottom: -5vw;
      margin-bottom: 5vw;
      position: relative;
      left: -10vw;
    }
}

</style>
