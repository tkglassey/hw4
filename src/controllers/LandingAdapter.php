<?php

namespace goldenFeathers\hw4\src\controllers;
require_once("./src/controllers/Adapter.php");

use goldenFeathers\hw4\src\views as views;
use goldenFeathers\hw4\src\models as models;

class LandingAdapter extends Adapter
{
    private $view;
    private $model;

  function run(){
    $this->view->set();
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
