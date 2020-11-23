<?php
namespace goldenFeathers\hw3\src\controllers;
require_once("./src/controllers/Adapter.php");

use goldenFeathers\hw3\src\models as models;

class DeleteGenre extends Adapter{

  private $model;

  function run()
  {
    if(isset($_GET['arg1']))
    {
      $genreID = $_GET['arg1'];
      #sanitize input here
      $this->model->deleteGenre($genreID);
    }
    require_once("./src/views/helpers/redirectIndex.php");
  }

  function __construct(){
    require_once("./src/models/DeleteGenreModel.php");
    $this->model = new models\DeleteGenreModel();
  }

}
