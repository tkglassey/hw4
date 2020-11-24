<?php

namespace goldenFeathers\hw4\src\controllers;

class LandingAdapter
{
    private $view;
    private $model;

  function run(){
    $this->view->set();
    $this->view->render();
    ?>
    <script>
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
    </script>
    <?
  }

  function __construct($view, $model)
  {
    $this->view = new $view();

    $this->model = new $model();
  }
}
