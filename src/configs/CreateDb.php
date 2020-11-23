<?php
namespace coolNameForYourGroup\hw3\src\configs;

use coolNameForYourGroup\hw3\src\configs as config;

function createDb(){
  include_once("Config.php");
  $db = mysqli_connect(HOST, USERNAME, PASSWORD);
  // check database connection
  if(!$db) {
    die("Connection failed: " . mysqli_connect_error());
  }
  // create database
  $createdbstatement = "CREATE DATABASE cs174hw3";
  if (mysqli_query($db, $createdbstatement)) {
    // successful database creation
    // create genre table
    $createtablestatement1 = "CREATE TABLE cs174hw3.genres (
      genreid INT(6) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
      name VARCHAR(255) NOT NULL
    )";
    // create reviews tables
    $createtablestatement2 = "CREATE TABLE cs174hw3.reviews (
      reviewid INT(6) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
      title VARCHAR(255) NOT NULL,
      reviewtext TEXT NOT NULL,
      createtime DATETIME NOT NULL
    )";
    $createtablestatement3 = "CREATE TABLE cs174hw3.reviewGenre (
      reviewid INT(6) UNSIGNED NOT NULL PRIMARY KEY,
      genreid INT(6) UNSIGNED NOT NULL
    )";
    if (mysqli_query($db, $createtablestatement1)) {
      // successful table creation
      if (mysqli_query($db, $createtablestatement2)) {
        // successful table creation
        if(mysqli_query($db, $createtablestatement3))
        {
          //successful table creation
        }
        else{
          echo "Could not create table: " . mysqli_error($db);
        }
      }
      else {
        // failed table creation
        echo "Could not create table: " . mysqli_error($db);
      }
    }
    else {
      // failed table creation
      echo "Could not create table: " . mysqli_error($db);
    }
  }
  else {
    // failed database creation
    echo "Could not create database: " . mysqli_error($db);
  }

  mysqli_close($db);
}

createDb();
