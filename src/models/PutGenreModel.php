<?php

namespace goldenFeathers\hw3\src\models;

require_once("Model.php");

class PutGenreModel extends Model{

  function checkExists($genrename){
    $genrename = $this->inputSanitizer($genrename);
    if($genrename == False)
    {
      return False;
    }
    $checkgenrestatement = "SELECT COUNT(name) from cs174hw3.genres where name = \"$genrename\"";
    $results = mysqli_query($this->db, $checkgenrestatement);
    if(mysqli_fetch_array($results)[0] > 0){
      return True;
    }
    return False;
  }

  function addGenre($genrename){
    $genrename = $this->inputSanitizer($genrename);
    if($genrename != false)
    {
      $addgenrestatement = "INSERT INTO cs174hw3.genres (name) VALUES (\"$genrename\")";
      $results = mysqli_query($this->db, $addgenrestatement);
    }
  }

  function __construct(){
    parent::__construct();
  }

  function __destruct(){
    parent::__destruct();
  }
}
