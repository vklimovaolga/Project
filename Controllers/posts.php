<?php 

if(!isset($_SESSION["user_id"])){
    
    header("Location: ".ROOT." access/login");
    exit;
}

require_once("models/posts.php");
require_once("models/profile.php");

$options = ["create_post", "edit_post", "view_post", "delete_post"];

if(in_array($url_parts[4], $options)){
    
    if($url_parts[4] === "create_post" && isset($_POST["send"])){
        
        $model = new Post();
        $message = $model->createPost($_POST);
        
    }
    if($url_parts[4] === "view_post"){
        $model = new Post();
        if(isset($url_parts[5])){
            $data = $model->getPost($url_parts[5]);
        }
    }

    // $model = new Post();
    // $data = $model->getPost($url_parts[5]);  

    if($url_parts[4] === "edit_post" && isset($_POST["send"])){
        $model = new Post();
       
        $message = $model->editPost($_POST);
    }

    if($url_parts[4] === "delete_post" && isset($_SESSION["user_id"])) {
        header("Content-Type: application/json");
        $model = new Post();
        if(isset($url_parts[5])){
            $response = $model->deletePost($url_parts[5]);
            die($response);

        }
    }


    require("views/".$url_parts[4].".php");
}

