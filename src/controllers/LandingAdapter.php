<?php

namespace goldenFeathers\hw4\src\controllers;

class LandingAdapter
{
    private $view;
    private $model;

  function run(){
    $target_dir = dirname(__FILE__) . "/../resources/";
    $arr = unserialize(file_get_contents($target_dir . "active_image.txt"));
    $this->view->set($arr);
    $this->view->render();
    ?>
    <script>
    var selected = [];
    function checkSubmit() {
      var file = document.getElementById('fileToUpload').files[0];
      if(file && file.size < 2097152) // 2097152 is 2MB
      {
      } 
      else if (file) {
        alert("File is over 2 MB")
        return false;
      }
      else
      {
        alert("No file submitted")
        return false;
      }
    }

  function selectTile(tileID) {
    var tile = document.getElementById(tileID);
    if(selected.includes(tileID)){
        tile.style.border = "1px solid transparent";
        selected.pop();
    }
    else{
        tile.style.border = "1px solid black";
        selected.push(tileID);
    }
    if (selected.length == 2){
    }
  }
    </script>
    <?
  }

  function __construct($view, $model)
  {
    $this->view =  $view;

    $this->model = $model;
  }
}
