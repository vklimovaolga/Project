<?php
require_once("base.php");

 class Post extends Base {
    public function getPosts(){
        $query = $this->db->prepare("
            SELECT p.post_id, p.title, p.image, p.description, p.created_at, p.user_id, u.username
            FROM posts AS p
            INNER JOIN users AS u USING(user_id)
            WHERE p.user_id = ? OR p.post_id = ?
        ");

        $query->execute([
            $_SESSION["user_id"],
            $post_id
          ]);
  
        $post = $query->fetchAll( PDO::FETCH_ASSOC );
        return $post;

    }

    public function createPost($data){
        $allowed_types = [
            "jpg" => "image/jpeg",
            "png" => "image/png"
        ];

        if(
            !empty($data["title"]) &&
            isset($_SESSION["user_id"]) &&
            isset($_FILES["image"]) &&
            $_FILES["image"]["size"] > 0 &&
            $_FILES["image"]["error"] === 0 &&
            in_array($_FILES["image"]["type"], $allowed_types)
            
        ){
            $file_extension = array_search($_FILES["image"]["type"],$allowed_types);
            $filename = date("YmdHis") ."_". mt_rand(100000, 999999).".".$file_extension;

            $query = $this->db->prepare("
                INSERT INTO posts (title, image, description)
                VALUES (?, '".$filename."', ?)
            ");

            $query->execute([
                $data["title"],
                $data["description"]
            ]);

            move_uploaded_file($_FILES["image"]["tmp_name"], "post_uploads/".$filename);
            header("Location: " .ROOT. "create/profile");

            return "ok";

        }
        else{
            return "Preencha os campos";
        }
    }
 }

 






?>