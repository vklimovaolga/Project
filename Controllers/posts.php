<?php 
if(!isset($_SESSION["user_id"])){

    header("Location: ".ROOT." access/login");
    exit;
}

require_once("models/posts.php");

$options = ["create_post", "edit_post"];

if(in_array($url_parts[4], $options)){
    if(isset($_POST["send"])){
        $model = new Post();
        $message = $model->createPost($_POST);

    }

    require("views/".$url_parts[4].".php");
}

