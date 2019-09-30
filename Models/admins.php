<?php
require_once("base.php");

 class Admins extends Base {
     public function get($admin_id){
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
     public function getAdmin($admin_id){
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

     public function login($data){
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
              echo "erro";
            }
        
        }
     }

     public function register($data){
        if(
            !empty($data["username"]) &&
            mb_strlen($data["username"]) >= 3 &&
            mb_strlen($data["username"]) <= 32 &&
            !empty($data["email"]) &&
            filter_var($data["email"], FILTER_VALIDATE_EMAIL) &&
            !empty($data["password"]) &&
            mb_strlen($data["password"]) >= 6 &&
            mb_strlen($data["password"]) <= 1000 &&
            !empty($data["rep_password"]) &&
            $data["password"] === $data["rep_password"]
      
          ){
            $query = $this->db->prepare("
            INSERT INTO admins (username, email, password)
            VALUES (?, ?, ?)
            ");

            $query->execute([
              $data["username"],
              $data["email"],
              password_hash($data["password"], PASSWORD_DEFAULT)
      
            ]);
            return true;
       
          }
          else {
            return false;
          }


     }
 


    
}