<?php

namespace coolNameForYourGroup\hw3\src\controllers;
require_once("./src/controllers/Adapter.php");

use coolNameForYourGroup\hw3\src\views as views;
use coolNameForYourGroup\hw3\src\models as models;

class LandingAdapter extends Adapter
{
    private $view;
    private $model;

  function run(){
    $genres = $this->model->getGenres();
    $reviews = $this->model->getReviews();
    $this->view->set($genres, $reviews);
    $this->view->render();
  }

  function __construct()
  {
    require_once("./src/views/LandingView.php");
    $this->view = new views\LandingView();

    require_once("./src/models/LandingModel.php");
    $this->model = new models\LandingModel();
  }
}
