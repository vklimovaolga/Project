<?php 
  if(!isset($_SESSION["user_id"])){

    header("Location: ".ROOT." access/login");
    exit;
  }

  require("models/profile.php");

  $options = [ "profile", "edit", "create" ];

  if(in_array($url_parts[4], $options)){
    
    if(isset($_POST["send"])){
      $model = new Profiles();

      $message = $model->createProfile($_POST);
    }
    
    if($url_parts[4] === "profile"){
      $model = new Profiles();
      $data = $model->getProfile($url_parts[4]);
      
    }
    require("views/".$url_parts[4].".php");

  }

