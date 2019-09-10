<?php 
  require("models/users.php");
  
  $options = ["login", "register", "logout"];


  if(in_array($url_parts[4], $options)) {

    $model = new Users();

    if(isset($_POST["send"])) {

      if($url_parts[4] === "register") {
        
        $status = $model->register($_POST);
        
        if($status){
          header("Location: ".ROOT."access/login");
        }
      }
      else {

        $status = $model->login($_POST);

        if($status){

          header("Location: ". ROOT);

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