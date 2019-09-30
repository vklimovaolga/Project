<?php
require_once("models/admins.php");
if(isset($url_parts[4])){
    $model = new Admins();
    $admins = $model->getAdmin($url_parts[4]);

}
require_once("views/admin.php");

$options = ["admin_login", "admin_register", "admin_logout", "admin_home"];

if(in_array($url_parts[4], $options)) {
    
    $model = new Admins();
    
    if(isset($_POST["send"]) ) {
        
        
        if($url_parts[4] === "admin_register") {
            
            $status = $model->register($_POST);
            
            if($status){
                header("Location: ".ROOT."admin/admin_login");
            }
        }
        else{
            $status = $model->login($_POST);
            $admin = $model->get($admin_id);
            
            if($status && $admin){
        
                header("Location: ".ROOT."admin/admin_home/".$admin[0]["admin_id"]);
            }
            
        }
        
    }
    if($url_parts[4] === "admin_home"){

        if(isset($url_parts[5])){

            $admins = $model->getAdmin($url_parts[5]);
        }

    }

    if($url_parts[4] === "admin_logout" ) {

        session_destroy();
  
        header("Location: ". ROOT);
        exit;
      }
    require("views/" . $url_parts[4] . ".php");
}


   


   
    






?>