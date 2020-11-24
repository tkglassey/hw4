<?php

namespace goldenFeathers\hw4\src\views;

class LandingView{

  public function render(){
    ?>
    <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Community Jigsaw</title>
    <link rel="stylesheet" href="./src/styles/stylesheet.css">
  </head>
  <body>
    <main>
    <h1>Community Jigsaw</h1>
    <form action="index.php" method="post" enctype="multipart/form-data">
      <label>New Image: </label>
      <input type="file" id='fileToUpload' name="fileToUpload" accept=".jpg,.png,.gif">
      <input type="submit" name="a" value="upload" onsubmit="return checkSubmit()">
    </form>
    <?php
  }

  function set()
  {
    
  }

}
