<?php
require_once("base.php");

 class Comment extends Base {
    public function getComments($comment_id) {
        $query = $this->db->prepare("
            SELECT c.user_id, c.comment_id, c.post_id, c.message, c.post_date, c.parent_id, u.username
            FROM comments AS c
            INNER JOIN users AS u USING(user_id)
            WHERE c.comment_id = ?  OR c.parent_id = ? 
        ");

        $query->execute([
            $comment_id,
            $comment_id
          ]);
  
        $comments = $query->fetchAll( PDO::FETCH_ASSOC );
        return $comments;

    }

    public function createComment($data) {
        if(
            !empty($data["message"]) &&
            mb_strlen($data["message"]) > 3 &&
            isset($_SESSION["user_id"]) 
        ){
            $query = $this->db->prepare("
                INSERT INTO comments (message, post_id, user_id)
                VALUES (?, ? , ?)
            ");
            $query->execute([
                $data["message"],
                $data["post_id"],
                $_SESSION["user_id"]
            ]);

        return "ok";

        }
        else {
            return "Preencha o comentario";
        }
    }
}