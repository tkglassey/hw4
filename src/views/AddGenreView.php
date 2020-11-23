<?php

namespace goldenFeathers\hw3\src\views;

require_once("View.php");

class AddGenreView extends View{


  function render(){
    require_once("./src/views/layouts/header.php");
    ?></h1>
      <div class="headingtwo"><label for="genre">Add Genre</label></div>
      <form action="./index.php">
        <input type="hidden" name="c" value="putGenre">
        <input type="hidden" name="m" value="putGenre">
        <input type="text" id="genre" name="arg1" required>
        <input type="submit" value="Add">
      </form>
      </main>
    </body>
    <?php
  }

}
