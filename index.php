<?php
namespace goldenFeathers\hw3;
use goldenFeathers\hw3\src\controllers as control;

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
else if($controller == "addGenre"){
  require_once("./src/controllers/AddGenreAdapter.php");
  $controller = new control\AddGenreAdapter();
}
else if($controller == "deleteGenre"){
  require_once("./src/controllers/DeleteGenreAdapter.php");
  $controller = new control\DeleteGenre();
}
else if ($controller == "putGenre"){
  require_once("./src/controllers/PutGenreAdapter.php");
  $controller = new control\PutGenre();
}
else if ($controller == "viewGenre"){
  require_once("./src/controllers/ViewGenreAdapter.php");
  $controller = new control\ViewGenreAdapter();
}
else if ($controller == "addReview"){
  require_once("./src/controllers/AddReviewAdapter.php");
  $controller = new control\AddReviewAdapter();
}
else if ($controller == "putReview"){
  require_once("./src/controllers/PutReviewAdapter.php");
  $controller = new control\PutReview();
}
else if($controller == "viewReview"){
  require_once("./src/controllers/ViewReviewAdapter.php");
  $controller = new control\ViewReviewAdapter();
}
else if($controller == "deleteReview"){
  require_once("./src/controllers/DeleteReviewAdapter.php");
  $controller = new control\DeleteReview();
}
else{
  require_once("./src/controllers/LandingAdapter.php");
  $controller = new control\LandingAdapter();
}


$controller->run();
