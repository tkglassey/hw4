<?php
namespace coolNameForYourGroup\hw3\src\controllers;
require_once("./src/controllers/Adapter.php");

use coolNameForYourGroup\hw3\src\models as models;

class DeleteReview extends Adapter{

  private $model;

  function run()
  {
    if(isset($_GET['arg1']))
    {
      $reviewID = $_GET['arg1'];
      $genreID = $this->model->getGenre($reviewID);
      $this->model->deleteReview($reviewID);
      header("Location: " . "./index.php?c=viewGenre&arg1=$genreID");
    }
    else{
    require_once("./src/views/helpers/redirectIndex.php");
    }
  }

  function __construct(){
    require_once("./src/models/DeleteReviewModel.php");
    $this->model = new models\DeleteReviewModel();
  }

}
