<input type="checkbox" id="legendToggle">

<label for="legendToggle" class="toggle">◎</label>

<ul class="legend">
    <a href="/legal/service" class="text-white"><li>Terms of Service</li></a>

    <a href="/legal/users" class="text-white"><li>Terms of Use</li></a>

    <a href="/legal/cookies" class="text-white"><li>Cookie Policy</li></a>

    <a href="/legal/privacy" class="text-white"><li>Privacy Policy</li></a>

    <a href="/legal/community" class="text-white"><li>Community Guidelines</li></a>

    <a href="/legal/ip" class="text-white"><li>Trademark & Copyright Policy</li></a>
</ul>

<style>

.cont > li {
    margin-left: 1vw;
    margin-top: 2vw;
}

.cont > h1:first-of-type {
    margin-bottom: 3vh;
    text-align: center;
    font-weight: 800 !important;
    font-size: 2.2rem !important;
}

.cont > h1 {
    font-size: 2rem;
    font-weight: 600 !important;
}

.cont > h2 {
    font-weight: 400 !important;
    font-size: 1.7rem;
    margin-left: 5vw;
    color: #eee;
}

.cont > p {
    font-size: 1.1rem !important;
    line-height: 1.8rem;
    margin-left: 8vw;
    font-size: 150%;
    color: #dfdfdf;
}

/* Side menu item */
li {
  color: #FFFFFF;
  margin-bottom: 15px;
  font-size: 1.6rem;
  -webkit-font-smoothing: subpixel-antialiased;
  cursor: pointer;
  padding-left: 0.5vw;
}

/* Side menu item hover */
li:hover {
  border-left: 2px solid #6bbaa7;
}

@media  only screen and (min-width : 1224px) {

  #legalContainer {
    display: grid;
    width: 100%;
    grid-template-rows: 100%;
    grid-template-columns: 0vw 30vw 60vw 5vw;
    grid-template-areas:
    ". legend cont .";
    padding-top: 4vh;
    }

    #legalContainer > .legend {
        list-style-type: none;
        grid-area: legend;
        background-color: #3f3f3f;
        border-right: 1px solid #6bbaa7;
    }

    #legalContainer > .cont {
        grid-area: cont;
        background-color: #3f3f3f;
        padding-left: 3vw;
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

@media  only screen and (max-width : 1224px) {

    .cont > h1:first-of-type {
        margin-top: 3vh !important;
        margin-bottom: 5vh !important;
    }

    .cont > h1 {
        font-size: 2rem;
        margin-bottom: 2vh !important;
        font-weight: 600 !important;
    }

    .cont > h2 {
        font-size: 1.7rem;
        margin-bottom: 2vh !important;
        margin-left: 5vw;
        color: #eee;
    }

    .cont > p {
        line-height: 2rem !important;
        margin-bottom: 4vh !important;
    }

    /* Toggle Button O */
    .toggle {
      text-decoration: none;
      position: fixed;
      top: 0vh;
      bottom: 0px;
      right: 83vw;
      z-index: 2;
      font-size: 15vw;
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
      width: 85vw;
      height: 100%;
      background-color: rgba(43,43,43,0.98) !important;

      transition: left 0.3s background-color(.25,.8,.25,1);
      transition: left 0.3s cubic-bezier(.25,.8,.25,1);
    }

    /* Side menu item */
    li {
      color: #FFFFFF;
      margin-bottom: 4vh;
      font-size: 1.6rem !important;
      -webkit-font-smoothing: subpixel-antialiased;
      cursor: pointer;
      border-left: 2px solid #6bbaa7;
      padding-left: 2vw;
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
      padding-right: 5vw;

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
