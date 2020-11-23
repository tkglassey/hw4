<?php

namespace coolNameForYourGroup\hw3\src\controllers;
require_once("./src/controllers/Adapter.php");

use coolNameForYourGroup\hw3\src\views as views;
use coolNameForYourGroup\hw3\src\models as models;

class ViewReviewAdapter extends Adapter{
    private $model;
    private $view;

    function run(){
      $reviewid = $_GET['arg1'];

      $reviewinfo = $this->model->getReviewInfo($reviewid);

      $genreid = $reviewinfo['genreid'];
      $genrename = $this->model->getGenreName($genreid);

      require_once("./src/views/ViewReviewView.php");
      $this->view = new views\ViewReviewView();
      $this->view->set($genrename, $reviewinfo);
      $this->view->render();
    }

    function __construct(){
      require_once("./src/models/ViewReviewModel.php");
      $this->model = new models\ViewReviewModel();
    }
}
