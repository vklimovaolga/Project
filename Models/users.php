<?php
require_once("base.php");

 class Users extends Base {

    public function get(){
        $query = $this->db->prepare("
          SELECT user_id, username, email, registration_date
          FROM users
        ");
    
        $query->execute();
        $user = $query->fetchAll( PDO::FETCH_ASSOC );
        return $user;
      }
   
  public function login($data) {
      if(
        !empty($data["username"]) &&
        !empty($data["password"])
        
      ){
        $query = $this->db->prepare("
          SELECT user_id, password
          FROM users
          WHERE username = ?
        ");

        $query->execute([
          $data["username"]
        ]);

        $user = $query->fetchAll( PDO::FETCH_ASSOC );

        if(
          !empty($user) &&
          password_verify($data["password"], $user[0]["password"] )
        ){
          $_SESSION["user_id"] = $user[0]["user_id"];
          return true;
        }
        else {
          return false;
          echo "erro";
        }
    
    }


  }
  public function register($data) {
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
      INSERT INTO users (username, email, password)
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