<?php

namespace coolNameForYourGroup\hw3\src\models;

require_once("Model.php");

class DeleteReviewModel extends Model{
  function deleteReview($reviewID){
    $reviewID = $this->inputSanitizer($reviewID);
    if($reviewID != False)
    {
      $addgenrestatement = "DELETE FROM cs174hw3.reviews WHERE reviewid = $reviewID";
      $results = mysqli_query($this->db, $addgenrestatement);
      $deleteReviewGenreStatement = "DELETE FROM cs174hw3.reviewgenre WHERE reviewid = $reviewID";
      $results = mysqli_query($this->db, $deleteReviewGenreStatement);
    }
  }

  function getGenre($reviewID)
  {
      $reviewID = $this->inputSanitizer($reviewID);
      if($reviewID != False)
      {
        $addgenrestatement = "SELECT genreid FROM cs174hw3.reviewgenre WHERE reviewid = $reviewID";
        $results = mysqli_query($this->db, $addgenrestatement);
        return mysqli_fetch_array($results)[0];
      }

  }

  function __construct(){
    parent::__construct();
  }

  function __destruct(){
    parent::__destruct();
  }
}
