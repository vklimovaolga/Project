<?php 
require_once("models/profile.php"); 
require_once("models/posts.php"); 
require_once("models/admins.php"); 

if(isset($_SESSION["admin_id"])){
  $model = new Admins();
  $admin = $model->get($url_parts[3]);

}

if(isset($_SESSION["user_id"])) {
  $model = new Profiles();
  $data = $model->getProfile($url_parts[3]);
}

$model = new Post();
$posts = $model->postList();
  
require_once("views/home.php");


?>