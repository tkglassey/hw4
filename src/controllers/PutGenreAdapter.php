<?php

namespace coolNameForYourGroup\hw3\src\controllers;
require_once("./src/controllers/Adapter.php");

use coolNameForYourGroup\hw3\src\views as views;
use coolNameForYourGroup\hw3\src\models as models;

class PutGenre extends Adapter{

  private $model;

  function run()
  {
    $newGenre = $_GET['arg1'];
    if($this->model->checkExists($newGenre))#check if already exists if no then add
    {
      require_once("./src/views/helpers/redirectIndex.php");
    }
    else{
      $this->model->addGenre($newGenre);
      require_once("./src/views/helpers/redirectIndex.php");
    }
  }

  function __construct(){
    require_once("./src/models/PutGenreModel.php");
    $this->model = new models\PutGenreModel();
  }

}
