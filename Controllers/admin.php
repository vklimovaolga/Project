<?php
require_once("models/admins.php");
require_once("models/admin_panel.php");

// if(isset($url_parts[3])) 
// {
//     $model = new Admins();
//     $admins = $model->getAdmin($url_parts[3]);

// }

// require_once("views/admin.php");

$options = ["admin_login", "admin_register", "admin_logout", "admin_home"];

if(in_array($url_parts[4], $options)) {
    
    $model = new Admins();

    if(isset($_POST["send"]) ) {
        
        
        if($url_parts[4] === "admin_register") {
            
            $status = $model->register($_POST);
            
            if($status) {
                header("Location: ".ROOT."admin/admin_login");
            }
        }
        else {
            $status = $model->login($_POST);
            $admin = $model->get($admin_id);
            
            if($status && $admin) {
        
                header("Location: ".ROOT."admin/admin_home/".$admin[0]["admin_id"]);
            }
            
        }
    
    }

    if($url_parts[4] === "admin_home" && isset($_SESSION["admin_id"])) {

        if(isset($url_parts[5])) {
            
            $admins = $model->getAdmin($url_parts[5]);
            $model = new AdminPanel();
            $users = $model->countUsers();
            $profiles = $model->countProfiles();
            $posts = $model->countPosts();
        }
       
 
    }
    // else {
    //     header("HTTP/1.1 400 Bad Resquest");
    //     echo "400 Bad Resquest";
    // }

    if($url_parts[4] === "admin_logout" ) {

        session_destroy();
        
        header("Location: ". ROOT);
        exit;
    }

    require("views/".$url_parts[4].".php");
}


?>