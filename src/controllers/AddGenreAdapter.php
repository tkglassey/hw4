<?php

namespace goldenFeathers\hw3\src\controllers;
require_once("./src/controllers/Adapter.php");

use goldenFeathers\hw3\src\views as views;
use goldenFeathers\hw3\src\models as models;

class AddGenreAdapter extends Adapter
{
  function run()
  {
    require_once("./src/views/AddGenreView.php");
    $view = new views\AddGenreView();
    $view->render();
  }
}
