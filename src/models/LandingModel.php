<?php

namespace goldenFeathers\hw3\src\models;

require_once("Model.php");

class LandingModel extends Model{

  function getGenres(){
    $retArray = [];
    $getgenrestatement = "SELECT name, genreid from cs174hw3.genres ORDER BY name ASC";
    $results = mysqli_query($this->db, $getgenrestatement);
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

  function getGenreCountByID($genreID){
    $getCountStatment = "SELECT COUNT(reviewid) from cs174hw3.reviewGenre WHERE genreid = $genreID";
    $results = mysqli_query($this->db, $getCountStatment);
    return mysqli_fetch_array($results)[0];
  }

  function getGenreCountByName($genreName){
    $getCountStatment = "SELECT COUNT(reviewid) from cs174hw3.reviewGenre WHERE genreid = (SELECT genreid FROM cs174hw3.genres WHERE name=\"$genreName\")";
    $results = mysqli_query($this->db, $getCountStatment);
    return mysqli_fetch_array($results)[0];
  }

  function getReviews(){
    $num_reviews = 3;
    $retArray = [];
    $getreviewstatement = "SELECT reviewid, title,DATE(createtime) as time from cs174hw3.reviews ORDER BY createtime DESC LIMIT $num_reviews";
    $results = mysqli_query($this->db, $getreviewstatement);
    // find results of query
    $num_rows = mysqli_num_rows($results);
    for($i = 0; $i <= $num_rows-1; $i++){  # fixed iterating loop (not 100% sure if it was broken before that but it wasn't working for me)
      $row = mysqli_fetch_array($results, MYSQLI_ASSOC); #changed this to MYSQLI_ASSOC so that the result array would populate in the way we want it to look
      array_push($retArray, $row);
    }
    return $retArray;
  }

  function __construct(){
    parent::__construct();
  }

  function __destruct(){
    parent::__destruct();
  }
}
