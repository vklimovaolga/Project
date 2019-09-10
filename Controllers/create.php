<?php 
  if(!isset($_SESSION["user_id"])){

    header("Location: ".ROOT." access/login");
    exit;
  }

  require("models/profile.php");

  $options = [ "profile", "edit" ];

  require("views/".$url_parts[3].".php");
