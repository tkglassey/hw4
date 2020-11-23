<?php

namespace goldenFeathers\hw3\src\models;

require_once("Model.php");

class PutReviewModel extends Model
{

  function putReview($genreid, $title, $reviewtext)
  {
    $genreid = $this->inputSanitizer($genreid);
    $title = $this->inputSanitizer($title);
    $reviewtext = $this->inputSanitizer($reviewtext);

    if($genreid != false && $title != false && $reviewtext !=false){
      $putreviewstatement = "INSERT INTO cs174hw3.reviews(title, reviewtext, createtime)
                              VALUES (\"$title\",\"$reviewtext\", CURRENT_TIMESTAMP())";
      $results = mysqli_query($this->db, $putreviewstatement);
      if(mysqli_affected_rows($this->db) > 0){
        $lastid = mysqli_insert_id($this->db);
        $putreviewgenrestatement = "INSERT INTO cs174hw3.reviewgenre(reviewid, genreid) VALUES (\"$lastid\", \"$genreid\")";
        $results = mysqli_query($this->db, $putreviewgenrestatement);
    }
    }
  }

  function __construct()
  {
    parent::__construct();
  }

  function __destruct()
  {
    parent::__destruct();
  }
}
