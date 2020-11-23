<?php

namespace goldenFeathers\hw3\src\models;

require_once("Model.php");

class DeleteGenreModel extends Model{
  function deleteGenre($genreID){
    $genreID = $this->inputSanitizer($genreID);
    if($genreID != False)
    {
      $addgenrestatement = "DELETE FROM cs174hw3.genres WHERE genreid = $genreID";
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
