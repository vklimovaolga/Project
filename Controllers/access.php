<?php 
require_once("models/users.php");
require_once("models/profile.php");
  
$options = ["login", "register", "logout"];


if(in_array($url_parts[4], $options)) {
  
  $model = new Users();
    
  if(isset($_POST["send"]) ) {

    
    if($url_parts[4] === "register") {
      
      $status = $model->register($_POST);
      
      if($status){
        header("Location: ".ROOT."access/login");
      }
    }
    else {
      
      $status = $model->login($_POST);
    
      $model1 = new Profiles();
      $data = $model1->getProfile($profile_id);
      
      if($status && $data && isset($_SESSION["user_id"])){
        
        header("Location: ".ROOT."create/profile/".$data[0]["user_id"]);
        
      }
      else{
        header("Location: ".ROOT."create/create");
      }
    }
  }

  if($url_parts[4] === "logout" ) {

    session_destroy();

    header("Location: ". ROOT);
    exit;
  }

  require("views/" . $url_parts[4] . ".php");

}