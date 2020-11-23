<?php

namespace goldenFeathers\hw3\src\controllers;
require_once("./src/controllers/Adapter.php");

use goldenFeathers\hw3\src\views as views;
use goldenFeathers\hw3\src\models as models;

class ViewGenreAdapter extends Adapter
{
  private $view;
  private $model;

  function run(){
    $genreid = $_GET['arg1'];

    $currentgenre = $this->model->getGenreName($genreid);
    $genres = $this->model->getGenres();
    $reviews = $this->model->getGenreReviews($genreid);

    require_once("./src/views/ViewGenreView.php");
    $this->view = new views\ViewGenreView();

    # set variables in view specific genre page for later use
    $this->view->set($currentgenre, $genreid, $genres, $reviews);

    $this->view->render();

  }

  function __construct()
  {
    require_once("./src/models/ViewGenreModel.php");
    $this->model = new models\ViewGenreModel();


  }
}
