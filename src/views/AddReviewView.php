<?php

namespace coolNameForYourGroup\hw3\src\views;

require_once("View.php");

class AddReviewView extends View{
  private $currentgenre;
  private $genreid;

  function render(){
    require_once("./src/views/layouts/header.php");
    ?>/<a href="./index.php?c=viewGenre&arg1=<?=$this->genreid?>"><?=$this->currentgenre?></a>
    </h1>
    <h2>Add Review</h2>
    <form action="./index.php">
      <input type="hidden" name="c" value="putReview">
      <input type="hidden" name="arg3" value=<?=$this->genreid?>>
      <label for="title">Title:</label><input type="text" id="title" name="arg1" required>
      <br><label for="review">Review</label><br>
      <textarea id="review" name="arg2" required></textarea>
      <br>
      <input type="submit" value="Save">
    </form>
    </main>
    </body>
  <?php
  }

  function set($currentgenre, $genreid){
    $this->currentgenre = $currentgenre;
    $this->genreid = $genreid;
  }

}
