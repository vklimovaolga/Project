<?php 
  class Base {
    public $db;

    function __construct() {
      $this -> db = new PDO("mysql:host=localhost;dbname=bdproject;charset=utf8mb4", "root", "");
    }
  }
?>