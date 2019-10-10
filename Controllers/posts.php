<?php 
require_once("models/posts.php");
require_once("models/profile.php");
require_once("models/comments.php");

$options = ["create_post", "edit_post", "view_post", "delete_post", "edit_comment", "delete_comment"];

if(in_array($url_parts[4], $options)) {
    
    if($url_parts[4] === "create_post" && isset($_POST["send"])){
        
        $model = new Post();
        $data = $model->createPost($_POST);

        
    }
    if($url_parts[4] === "view_post") {
        $model = new Post();
        if(isset($url_parts[5])) {
            $data = $model->getPostId($url_parts[5]);
            if(isset($_SESSION["user_id"])){
                $model1 = new Profiles();
                $datas = $model1->getProfile($url_parts[5]);

            }
            if(isset($_POST["send"])){
                $model = new Comment();
                $message = $model->createComment($_POST);
            }
            
            $model = new Comment();
            $comments = $model->getComments($url_parts[5]);
        }
    }

    if($url_parts[4] === "edit_comment" && isset($_SESSION["user_id"])) {
        $modal = new Comment();
        $response = $modal->editComment($url_parts[5],$url_parts[6]);
        die($response);

    }
    if($url_parts[4] === "delete_comment" && isset($_SESSION["user_id"])) {
        $modal = new Comment();
        $response = $modal->deleteComment($url_parts[5]);
        die($response);
        

    }
    
    if($url_parts[4] === "edit_post") {
        $model = new Post();
        $data = $model->getPostId($url_parts[5]); 

        if(isset($_POST["send"])) {
            $message = $model->editPost($_POST);
        }

    }

    if($url_parts[4] === "delete_post" && isset($_SESSION["user_id"])) {

        header("Content-Type: application/json");
        $model = new Post();

        if(isset($url_parts[5])) {
            $response = $model->deletePost($url_parts[5]);
            die($response);
        }
 
    }


    require("views/".$url_parts[4].".php");
}

