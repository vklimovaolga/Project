<?php 
require_once("models/profile.php");

  // if(!isset($_SESSION["user_id"])){

  //   header("Location: ".ROOT."access/login");
  //   exit;
  // }
  
  
  $options = [ "profile", "edit", "create" ];

  if(in_array($url_parts[4], $options)){
    
    if(isset($_POST["send"])){
      
      $model = new Profiles();
      
      $message = $model->{$url_parts[4]}($_POST);
    }
    
    
    if($url_parts[4] === "profile"){
      
      $model = new Profiles();
      $data = $model->get($url_parts[4]);
      
      require_once("models/posts.php");
      if(isset($_SESSION["user_id"])){
        
        $model = new Profiles();
        $data = $model->getProfile($url_parts[4]);

        $model = new Post();
        $posts = $model->getPosts($url_parts[4]);
      }
      
    }
    
    if($url_parts[4] === "edit"){
      $model = new Profiles();
      $data = $model->getProfile($url_parts[4]);
      
    }

    require("views/".$url_parts[4].".php");

}

