<?php

namespace goldenFeathers\hw3\src\controllers;
require_once("./src/controllers/Adapter.php");

use goldenFeathers\hw3\src\views as views;
use goldenFeathers\hw3\src\models as models;

class AddReviewAdapter extends Adapter
{
  function run()
  {
    require_once("./src/views/AddReviewView.php");
    $view = new views\AddReviewView();
    $genreid = $_GET['arg1'];
    $currentgenre = $_GET['arg2'];
    $view->set($currentgenre, $genreid);
    $view->render();
  }

}
