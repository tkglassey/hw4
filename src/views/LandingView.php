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
        width:375px;
        height:375px;
        clear:both;
        }
        .grid3x3>div{
        width:120px;
        height:120px;
        float:left;
        line-height:120px;
        text-align:center;
        border: 1px solid transparent;
        }
        .grid3x3>div>img{
        display:inline-block;
        vertical-align:middle;
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
        for($j = 0; $j < 9; $j++) {
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