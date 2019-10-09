<?php 
require_once("models/profile.php"); 
require_once("models/posts.php"); 

if(isset($_SESSION["user_id"])) {
  $model = new Profiles();
  $data = $model->getProfile($url_parts[3]);
}

$model = new Post();
$posts = $model->postList();
  
require_once("views/home.php");


?>