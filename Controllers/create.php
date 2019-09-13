<?php 
  if(!isset($_SESSION["user_id"])){

    header("Location: ".ROOT." access/login");
    exit;
  }

  require_once("models/profile.php");
  require_once("models/h.php");

  $options = [ "profile", "edit", "create" ];

  if(in_array($url_parts[4], $options)){
    
    if(isset($_POST["send"])){
      $model = new Profiles();

      $message = $model->{$url_parts[4]}($_POST);
    }
    
    if($url_parts[4] === "profile"){
      $model = new Profiles();
      $data = $model->getProfile($url_parts[4]);
      
    }
    if($url_parts[4] === "edit"){
      $model = new Profiles();
      $data = $model->getProfile($url_parts[4]);
      
    }
    require("views/".$url_parts[4].".php");



echo "<pre>";
print_r($_FILES);

  $allowed_types = [
    "jpg" => "image/jpeg",
    "png" => "image/png"
  ];

  if(isset($_POST["send"])){

    if(
      isset($_FILES["picture"]) &&
      $_FILES["picture"]["size"] > 0 &&
      // $_FILES["picture"]["size"] <= 2000000 &&
      $_FILES["picture"]["error"] === 0 &&
      in_array($_FILES["picture"]["type"], $allowed_types)
      
    ){

      $file_extension = array_search($_FILES["picture"]["type"],$allowed_types);
      $filename = date("YmdHis") ."_". mt_rand(100000, 999999).".".$file_extension;

      move_uploaded_file($_FILES["picture"]["tmp_name"], "uploads/".$filename);

      $data1 = array(
          'image' =>$filename
      );

      $model = new File();
      $data1 = $model->file_details($data);

       echo "OK";


    }
    else {
      echo "Error";
    }

  
}

  }

