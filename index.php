<?php
namespace goldenFeathers\hw4;
require_once("./vendor/autoload.php");
use goldenFeathers\hw4\src\controllers as control;
use goldenFeathers\hw4\src\views as view;
use goldenFeathers\hw4\src\models as model;

# echo getcwd();
if(!empty($_GET['c'])){
  $controller = $_GET['c'];
}
else{
  $controller = "LandingView"; #if no controller is set then default to landing view
}

if($controller == "LandingView"){
  $view = new view\LandingView();
  $model = new model\LandingModel();
  $controller = new control\LandingAdapter($view, $model);
}
else{
  $controller = new control\LandingAdapter();
}


$controller->run();
