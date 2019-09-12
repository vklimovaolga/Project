<?php 
require("base.php");

class Profiles extends Base {
    public function createProfile($data){
        if(
            // !empty($data["description"]) &&
            // !empty($data["url"]) &&
            // mb_strlen($data["description"]) >= 5 &&
            isset($_SESSION["user_id"])

        ){
            $query = $this->db->prepare("
                INSERT INTO profiles (description, url, user_id)
                VALUES (?, ?, ?)
            ");
            $query->execute([
                $data["description"],
                $data["url"],
                $_SESSION["user_id"]
            ]);

            // header("Location: " .ROOT. "create/".);
                return "ok";
        }
        else{
            return "Preencha os campos";
        }
    }

    public function getProfile($profile_id){
        $query= $this->db->prepare("
          SELECT p.description, p.url, p.profile_id, p.user_id, u.username
          FROM profiles AS p 
          INNER JOIN users AS u USING(user_id)
          WHERE p.user_id = ?  OR p.profile_id = ?
        ");
        $query->execute([
            $_SESSION["user_id"],
            $profile_id
          ]);

        $profile = $query->fetchAll( PDO::FETCH_ASSOC );
        return $profile;
      }


    
}