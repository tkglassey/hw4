<?php

namespace goldenFeathers\hw4\src\views;

class LandingView{
  private $genres;
  private $reviews;
  private $genreCounts;

  private function formatGenreItem($genre, $genreID, $count)
  {
    if($count == 0){
    return "\t<li><a href=\"./index.php?c=viewGenre&arg1=$genreID\">$genre</a> [<a href=\"./index.php?c=deleteGenre&arg1=$genreID\">-</a>]</li>"; #edit the href in the a tag later when we know how we're doing the delete thing
    }
    else{
      return "<li><a href=\"./index.php?c=viewGenre&arg1=$genreID\">$genre</a></li>";
    }
    # I COMMENTED THE IF LOOP OUT BECAUSE IT WAS NOT REDIRECTING TO THE CORRECT GENRE-SPECIFIC PAGE OTHERWISE
  }

  private function formatReviewItem($reviewTitle, $reviewID, $reviewDate)
  {
    return "<li><a href=\"./index.php?c=viewReview&arg1=$reviewID\">$reviewTitle</a><br>$reviewDate</li>";
  }

  public function render(){
    $name = "name";
    $genreID = "genreID";
    $genreCount = "genreCount";

    $title = "title";
    # changed to match database attributes
    $date = "time";
    $reviewID = "reviewid";

    require_once("./src/views/layouts/header.php");
    #print closing a tag and closing header1 tag. if we were in the Genre Page then we'd print the genre name then close the a tag
    ?></h1><?php
  }

  function set()
  {
    
  }

}
