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
      var x = document.forms["imageUpload"]["fileToUpload"].value;
      alert(x);
      return false;
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
