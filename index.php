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
  $view = new view\LandingView();
  $model = new model\LandingModel();
  $controller = new control\LandingAdapter($view, $model);
}

$target_dir = "src/resources/";
$target_file = $target_dir . "active_image.jpg";
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}

$controller->run();
