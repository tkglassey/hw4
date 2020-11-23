<?php
namespace goldenFeathers\hw4;
use goldenFeathers\hw4\src\controllers as control;

# echo getcwd();
if(!empty($_GET['c'])){
  $controller = $_GET['c'];
}
else{
  $controller = "LandingView"; #if no controller is set then default to landing view
}

if($controller == "LandingView"){
  require_once("./src/controllers/LandingAdapter.php");
  $controller = new control\LandingAdapter();
}
else{
  require_once("./src/controllers/LandingAdapter.php");
  $controller = new control\LandingAdapter();
}


$controller->run();
