<?php
require_once("base.php");

 class Admins extends Base {
     public function get($admin_id) {
        $query = $this->db->prepare("
        SELECT admin_id, username, email, registration_date
        FROM admins
        WHERE admin_id = ?
      ");
  
        $query->execute([
            $_SESSION["admin_id"]
        ]);
        $admin = $query->fetchAll( PDO::FETCH_ASSOC );
        return $admin;
     }

     public function getAdmin($admin_id) {
        $query = $this->db->prepare("
        SELECT admin_id, username, email, registration_date
        FROM admins
        WHERE admin_id = ?
      ");
  
        $query->execute([
            $admin_id
        ]);
        $admin = $query->fetchAll( PDO::FETCH_ASSOC );
        return $admin;
     }

     public function login($data) {
        if(
            !empty($data["username"]) &&
            !empty($data["password"])
            
          ){
            $query = $this->db->prepare("
              SELECT admin_id, password, username
              FROM admins
              WHERE username = ?
            ");
    
            $query->execute([
              $data["username"]
            ]);
    
            $admin = $query->fetchAll( PDO::FETCH_ASSOC );
    
            if(
              !empty($admin) &&
              password_verify($data["password"], $admin[0]["password"] )
            ){
              $_SESSION["admin_id"] = $admin[0]["admin_id"];
              return true;
            }
            else {
              return false;
            }
        
        }
     }

     public function getPosts(){
      $query = $this->db->prepare("
          SELECT p.post_id, p.title, p.image, p.description, p.created_at, u.user_id, u.username, pf.picture, count(p.post_id) as total
          FROM posts AS p
          INNER JOIN users AS u USING(user_id)
          INNER JOIN profiles AS pf USING(user_id)
          INNER JOIN comments AS c USING(user_id)
          WHERE p.post_id = c.post_id
          GROUP BY p.post_id
      ");

      $query->execute();

      $posts = $query->fetchAll( PDO::FETCH_ASSOC );
      return $posts;

  }



    
}