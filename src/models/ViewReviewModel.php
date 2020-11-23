<?php

namespace coolNameForYourGroup\hw3\src\models;

require_once("Model.php");

class ViewReviewModel extends model
{
  function getReviewInfo($reviewid)
  {
    $retArray = [];
    $getreviewstatement = "SELECT genreid,title,reviewtext FROM cs174hw3.reviews NATURAL JOIN cs174hw3.reviewgenre
                              WHERE reviewid = \"$reviewid\"";
    $results = mysqli_query($this->db, $getreviewstatement);
    $row = mysqli_fetch_array($results, MYSQLI_ASSOC);
    return $row;
  }

  function getGenreName($genreid)
  {
    $genreid = $this->inputSanitizer($genreid);
    if($genreid != False)
    {
      $getgenrenamestatement = "SELECT name FROM cs174hw3.genres WHERE genreid = $genreid";
      $results = mysqli_query($this->db, $getgenrenamestatement);
      if(mysqli_num_rows($results) > 0){
        while($row = mysqli_fetch_assoc($results)){
          return $row["name"];
        }
      }
      return null;
    }
    else {
      return null;
    }
  }
}
