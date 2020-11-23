<?php

namespace coolNameForYourGroup\hw3\src\models;


use coolNameForYourGroup\hw3\src\configs as config;
class Model
{
  protected $db;

  function inputSanitizer($input)
  {
    return filter_var($input, FILTER_SANITIZE_STRING);
  }

  function inputSanitizerInt($input)
  {
    filter_var($input, FILTER_SANITIZE_INT);
    return $input;
  }

  function __construct()
  {
    // create database connection
    include_once("./src/configs/Config.php");
    $this->db = mysqli_connect(HOST, USERNAME, PASSWORD);
    // check database connection
    if(!$this->db)
    {
      die("Connection failed: " . mysqli_connect_error());
    }
  }

  function __destruct()
  {
    if($this->db)
    {
      mysqli_close($this->db);
    }
  }
}
