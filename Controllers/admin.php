<?php
require_once("models/admins.php");
require_once("models/admin_panel.php");
require_once("models/profile.php");

$options = ["admin_home", "admin_login", "admin_logout", "manage_profiles", "manage_posts"];

$option = $options[0];
if(isset($url_parts[4]) && in_array($url_parts[4], $options)) {
    $option = $url_parts[4];

}

if(!isset($_SESSION["admin_id"]) && $option !== "admin_login") {
    header("Location: ".ROOT."admin/admin_login");
    exit;
}

$model = new Admins();

if(isset($_POST["send"]) ) {

    $status = $model->login($_POST);
    $admin = $model->get($admin_id);
    
    if($status && $admin) {

        header("Location: ".ROOT."admin/admin_home/".$admin[0]["admin_id"]);
    }
        
}


if($option === "admin_home") {

    if(isset($url_parts[5])) {
        
        $admins = $model->getAdmin($url_parts[5]);
        $model = new AdminPanel();
        $users = $model->countUsers();
        $profiles = $model->countProfiles();
        $posts = $model->countPosts();
        $comments = $model->countComments();
    }
}


if($option === "manage_posts") {
    
    $admin = $model->get($option);
    
}

if($option === "manage_profiles") {
    
    $admin = $model->get($option);
    $model = new Profiles();
    $profiles = $model->getP();

    
}
if($option === "manage_posts") {
    
    $admin = $model->get($option);
    $posts = $model->getPosts();
    $model = new AdminPanel();
    $comment = $model->countCommentsId($posts[1]["post_id"]);
    
}
    

if($option === "admin_logout" ) {

    session_destroy();
    
    header("Location: ". ROOT);
    exit;
}

require("views/".$option.".php");
  


?>