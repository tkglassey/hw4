<?php

namespace goldenFeathers\hw3\src\controllers;
require_once("./src/controllers/Adapter.php");

use goldenFeathers\hw3\src\views as views;
use goldenFeathers\hw3\src\models as models;

class PutReview extends Adapter{

  function run(){
    $title = $_GET['arg1'];
    $text = $_GET['arg2'];
    $genreid = $_GET['arg3'];

    $this->model->putReview($genreid, $title, $text);
    header("Location: " . "./index.php?c=viewGenre&arg1=$genreid");

  }

  function __construct(){
    require_once("./src/models/PutReviewModel.php");
    $this->model = new models\PutReviewModel();
  }

}
