<input type="checkbox" id="legendToggle">

<label for="legendToggle" class="toggle">◎</label>

<ul class="legend">
    <a href="/" class="text-white"><li>YourUnity</li></a>

    <a href="/public/orgs" class="text-white"><li>All Organizations</li></a>

    <a href="/public/app" class="text-white"><li>Sign-up</li></a>

    <a href="/public/app" class="text-white"><li>Login</li></a>
</ul>

<style>

/*** GENERAL STYLES ***/
/* Side menu item */
li {
    color: #FFFFFF;
    margin-bottom: 15px;
    font-size: 1.6rem;
    -webkit-font-smoothing: subpixel-antialiased;
    cursor: pointer;
    padding-left: 0.5vw;
}

.cardContainer {
  padding: 0;
  width: 100%;
  height: 100%;
}

.cardContents {
  display: table;
  text-align: center;
  text-decoration: none;

  box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
  background-color: #2d2d2d;
  border-color: black;

  border-radius: 6px;
  margin: 5vh auto;
  padding: 2%;
}

.orgTitle { 
  display: table;
  text-align: center;
  text-decoration: none;

  box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
  background-color: #2d2d2d;
  border-color: black;

  border-radius: 6px;
  margin: 5vh auto;
  padding: 2%;
}

.cardContents > h3{
    margin: 2vh auto;
}

/* Side menu item hover */
li:hover {
  border-left: 2px solid #6bbaa7;
}

/*** DESKTOP STYLES ***/
@media only screen and (min-width : 1224px) {

  #contactContainer {
    display: grid;
    width: 100%;
    grid-template-rows: 100%;
    grid-template-columns: 0vw 30vw 60vw 0vw;
    grid-template-areas:
    ". legend cont .";
    padding-top: 4vh;
    }

    #contactContainer > .legend {
        list-style-type: none;
        grid-area: legend;
        background-color: #3f3f3f;
    }

    #contactContainer > .cont {
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

    .cardContents {
      width: 100%;
    }

}


/*** MOBILE STYLES ***/
@media only screen and (max-width : 1224px) {
    li {
        border-left: 2px solid #6bbaa7;
        padding-left: 2vw !important;
        margin-bottom: 4vh;
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
      background-color: rgba(43,43,43,0.97) !important;

      transition: left 0.3s background-color(.25,.8,.25,1);
      transition: left 0.3s cubic-bezier(.25,.8,.25,1);
    }

    .cardContents {
      width: 95vw;
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
