<?php 
require_once("models/profile.php");
require_once("models/posts.php");

  
$options = [ "profile", "edit", "create" ];

if(in_array($url_parts[4], $options)){
  
  if(isset($_POST["send"])){
    
    $model = new Profiles();
    
    $message = $model->{$url_parts[4]}($_POST);
  }
  
  
  if($url_parts[4] === "profile"){
    if(isset($url_parts[5])){

      $model = new Profiles();
      $data = $model->get($url_parts[5]);

      $model = new Post();
      $posts = $model->getPost($url_parts[5]);
  
    }
  }
  
  if($url_parts[4] === "edit"){
    $model = new Profiles();
    $data = $model->getProfile($url_parts[4]);
    
  }

  require("views/".$url_parts[4].".php");

}

