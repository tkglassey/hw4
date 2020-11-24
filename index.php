<?php
namespace goldenFeathers\hw4;
require_once("./vendor/autoload.php");
use goldenFeathers\hw4\src\controllers as control;
use goldenFeathers\hw4\src\views as view;
use goldenFeathers\hw4\src\models as model;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

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

// Check if file was posted and
// check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $log = new Logger('logger');
  $log->pushHandler(new StreamHandler('./src/resources/jigsaw.log', Logger::INFO));
  $target_dir = "src/resources/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  list($width, $height, $type, $attr) = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($width !== false) {
    $log->info("Uploaded File is an image - " . $imageFileType . ".");
    $uploadOk = 1;

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 2097152) {
      $log->info("File upload failed, your file is too large.");
      $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "gif" ) {
      $log->info("File upload failed, only JPG, JPEG, PNG & GIF files are allowed.");
      $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
    // if everything is ok, try to upload file
    } else {
      if($imageFileType == "jpg") {
          $org = imagecreatefromjpeg($_FILES["fileToUpload"]["tmp_name"]);
      }
      else if($imageFileType == "png") {
          $org = imagecreatefrompng($_FILES["fileToUpload"]["tmp_name"]);
      }
      else {
          $org = imagecreatefromgif($_FILES["fileToUpload"]["tmp_name"]);
      }
      $im = @imagecreatetruecolor(360, 360);
      imagecopyresampled($im, $org, 0, 0, 0, 0, 360, 360, $width, $height);
      imagedestroy($org);
      imagejpeg($im, $_FILES["fileToUpload"]["tmp_name"]);
      imagedestroy($im);
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir . "active_image.jpg")) {
        $log->info("The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.");
        
      } else {
        $log->info("There was an error uploading the file.");
      }
    }
  } else {
    echo $log->info("Uploaded file is not an image.");
    $uploadOk = 0;
  }
}

$controller->run();
