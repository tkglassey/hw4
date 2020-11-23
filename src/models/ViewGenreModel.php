<?php

namespace goldenFeathers\hw3\src\models;

require_once("Model.php");

class ViewGenreModel extends Model
{
  function getGenres(){
    $retArray = [];
    $getgenrestatement = "SELECT name, genreid from cs174hw3.genres ORDER BY name ASC";
    $results = mysqli_query($this->db, $getgenrestatement);
    // find results of query
    $num_rows = mysqli_num_rows($results);
    for($i = 1; $i <= $num_rows; $i++){
      $tuple = [];
      $row = mysqli_fetch_array($results);
      $tuple["name"] = $row[0];
      $tuple["genreCount"] = $this->getGenreCountByID($row[1]);
      $tuple["genreID"] = $row[1];
      array_push($retArray, $tuple);
    }
    return $retArray;
  }

  # copied from landingpagemodel
  function getGenreCountByID($genreID){
      $getCountStatment = "SELECT COUNT(reviewid) from cs174hw3.reviewGenre WHERE genreid = $genreID";
      $results = mysqli_query($this->db, $getCountStatment);
      return mysqli_fetch_array($results)[0];
  }

  #get reviews categorized under the given genre
  function getGenreReviews($genreid){
    $num_reviews = 3;
    $retArray = [];
    $getspecificgenrestatement = "SELECT reviewid,title,reviewtext,DATE(createtime) as time from cs174hw3.reviews WHERE reviewid in
        (SELECT reviewid from cs174hw3.reviewGenre WHERE genreid = $genreid) ORDER BY createtime DESC LIMIT $num_reviews";
    # need to add order by for earliest/latest review
    $results = mysqli_query($this->db, $getspecificgenrestatement);
    $num_rows = mysqli_num_rows($results);
    for($i = 1; $i <= $num_rows; $i++){
      $row = mysqli_fetch_array($results);
      array_push($retArray, $row);
    }
    return $retArray;
  }

  # gets genre name string based on genreid
  function getGenreName($genreid){
    $getgenrenamestatement = "SELECT name FROM cs174hw3.genres WHERE genreid = $genreid";
    $results = mysqli_query($this->db, $getgenrenamestatement);
    if(mysqli_num_rows($results) > 0){
      while($row = mysqli_fetch_assoc($results)){
        return $row["name"];
      }
    }
    return null;
  }

  function __construct(){
    parent::__construct();
  }

  function __destruct(){
    parent::__destruct();
  }
}
