<?php

namespace goldenFeathers\hw4\src\views;

class LandingView{
  private $arr;
  private $img;
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
      <h1>Community Jigsaw</h1>
      <form name="imageUpload" action="index.php" method="post" enctype="multipart/form-data" onsubmit="return checkSubmit()">
        <label>New Image: </label>
        <input type="file" id='fileToUpload' name="fileToUpload" accept=".jpg,.png,.gif">
        <input type="submit" name="submit" value="upload">
      </form>
      <div id="board">
      <?
        for($j = 0; $j < 8; $j++) {
          $x = $this->arr[$j]%3;
          $y = floor($this->arr[$j]/3)
          ?><div id=<?"piece".$j ?> > 
          <?$im2 = imagecrop($this->img, ['x' => $x*120, 'y' => $y*120, 'width' => 120, 'height' => 120]);
          imagepng($im2);?>
          </div> <?
        }
      ?>
      </div>
    </body>
    <?php
  }
  public function set($activeImgArr, $activeImg){
    $this->arr = $activeImgArr;
    $this->img = $activeImg;
  }

}