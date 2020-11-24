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
      <style>
        .grid3x3{
        width:300px;
        height:300px;
        clear:both;
        }
        .grid3x3>div{
        width:100px;
        height:100px;
        float:left;
        line-height:100px;
        text-align:center;
        
        }
        .grid3x3>div>img{
        display:inline-block;
        vertical-align:middle;
        max-width:80%;
        max-height:80%;
        }
      </style>
    </head>
    <body>
      <h1>Community Jigsaw</h1>
      <form name="imageUpload" action="index.php" method="post" enctype="multipart/form-data" onsubmit="return checkSubmit()">
        <label>New Image: </label>
        <input type="file" id='fileToUpload' name="fileToUpload" accept=".jpg,.png,.gif">
        <input type="submit" name="submit" value="upload">
      </form>
      <div id="board" class = "grid3x3">
      <?
        for($j = 0; $j < 8; $j++) {
          ?><div id= "piece<?=$j?>" onclick="selectTile(id)"> 
          <img id="pieceImg<?=$j?>" src="./src/resources/active_image<?=$this->arr[$j]?>.jpg" style="float:left">
          </div> <?
        }
      ?>
      </div>
    </body>
    <?php
  }
  public function set($activeImgArr){
    $this->arr = $activeImgArr;
  }

}