<?php

namespace goldenFeathers\hw3\src\views;

require_once("View.php");

class ViewGenreView extends View{
  private $currentgenre;
  private $genreid;
  private $genres;
  private $reviews;

  private function formatGenreItem($genre, $genreID, $count)
  {
      return "\t<li><a href=\"./index.php?c=viewGenre&arg1=$genreID\">$genre</a></li>";
  }

  private function formatReviewItem($reviewTitle, $reviewID, $reviewDate)
  {
    return "\t<li><a href=\"./index.php?c=viewReview&arg1=$reviewID\">$reviewTitle</a> [<a aria-label=\"Delete Review\" href=\"./index.php?c=deleteReview&arg1=$reviewID\">-</a>]<br>$reviewDate";
  }


  function render(){
    # copied the genre and review retrieval method from landing page... might need a common helper?
    $name = "name";
    $genreID = "genreID";
    $genreCount = "genreCount";

    $title = "title";
    $date = "time";
    $reviewID = "reviewid";

    require_once("./src/views/layouts/header.php");
    ?>/<a href="./index.php?c=viewGenre&arg1=<?=$this->genreid?>"><?=$this->currentgenre?></a>
    </h1>
    <?php
    require_once("./src/views/elements/tableMaker.php");
    for($i = 0; $i < count($this->genres); $i++){
      echo $this->formatGenreItem($this->genres[$i][$name], $this->genres[$i][$genreID], $this->genres[$i][$genreCount]);
    }
    echo "</ul><td><ul>";
    echo "<li><a href=\"./index.php?c=addReview&arg1=$this->genreid&arg2=$this->currentgenre\">[New Review]</a></li>";
    for($i = 0; $i < count($this->reviews); $i++){
      echo $this->formatReviewItem($this->reviews[$i][$title], $this->reviews[$i][$reviewID], $this->reviews[$i][$date]);
      ?></li>
      <?php
    }
    echo "</ul></td></table></main>";
  }

  function set($currentgenre, $genreid, $genres, $reviews)
  {
    $this->currentgenre = $currentgenre;
    $this->genres = $genres;
    $this->reviews = $reviews;
    $this->genreid = $genreid;
  }
}
