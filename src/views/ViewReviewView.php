<?php

namespace goldenFeathers\hw3\src\views;

require_once("View.php");

class ViewReviewView extends View{
  private $review;
  private $text;
  private $genreid;
  private $genrename;

  function render(){
    require_once("./src/views/layouts/header.php");
    ?>/<a href="./index.php?c=viewGenre&arg1=<?php echo $this->review['genreid'];?>"><?=$this->genrename?></a>
    </h1>
      <h2>Review: <?php echo $this->review['title']?></h2>
      <div>
        <?php echo $this->review['reviewtext']?>
      </div>
    </main>
    <?php
  }

  function set($genrename, $review){
    $this->review = $review;
    $this->genrename = $genrename;
  }
}
