<?php 
require_once("base.php");

class Profiles extends Base {
  public function create($data){
    $allowed_types = [
      "jpg" => "image/jpeg",
      "png" => "image/png"
    ];
    
      if(
          !empty($data["description"]) &&
          !empty($data["url"]) &&
          mb_strlen($data["description"]) >= 5 &&
          isset($_SESSION["user_id"]) &&
          isset($_FILES["picture"]) &&
          $_FILES["picture"]["size"] > 0 &&
          //  $_FILES["picture"]["size"] <= 2000000 &&
          $_FILES["picture"]["error"] === 0 &&
          in_array($_FILES["picture"]["type"], $allowed_types)
      ){
          $file_extension = array_search($_FILES["picture"]["type"],$allowed_types);
          $filename = date("YmdHis") ."_". mt_rand(100000, 999999).".".$file_extension;

          $query = $this->db->prepare("
          INSERT INTO profiles (description, url, user_id, picture)
          VALUES (?, ?, ?, '".$filename."')
          ");

          $query->execute([
            ucfirst($data["description"]),
            $data["url"],
            $_SESSION["user_id"]
            ]);
            
          move_uploaded_file($_FILES["picture"]["tmp_name"], "uploads/".$filename);
          header("Location: " .ROOT. "create/profile");
              return "ok";
      }
      else{
          return "Preencha os campos";
      }
  }

  public function get($user_id){
    $query= $this->db->prepare("
      SELECT p.description, p.url, p.profile_id, p.user_id, u.username, p.picture
      FROM profiles AS p 
      INNER JOIN users AS u USING(user_id)
      WHERE  p.user_id = ?
    ");

    $query->execute([
      $user_id
    ]);

    $profile = $query->fetchAll( PDO::FETCH_ASSOC );
    return $profile;

  }

  public function getProfile($profile_id){
      $query= $this->db->prepare("
        SELECT p.description, p.url, p.profile_id, p.user_id, u.username, p.picture
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

    public function edit($data){
      $allowed_types = [
        "jpg" => "image/jpeg",
        "png" => "image/png"
      ];
      if(
        !empty($data["description"]) && 
        !empty($data["url"]) &&
        mb_strlen($data["description"]) >= 5 &&
        isset($_SESSION["user_id"]) &&
        isset($_FILES["picture"]) &&
        $_FILES["picture"]["size"] > 0 &&
        //  $_FILES["picture"]["size"] <= 2000000 &&
        $_FILES["picture"]["error"] === 0 &&
        in_array($_FILES["picture"]["type"], $allowed_types)
      ){

        $file_extension = array_search($_FILES["picture"]["type"],$allowed_types);
        $filename = date("YmdHis") ."_". mt_rand(100000, 999999).".".$file_extension;
  
        $query = $this->db->prepare("
          UPDATE profiles
          SET description = ? , url = ? , picture = '".$filename."'
          WHERE user_id = ? 
        ");
  
        $query->execute([
          ucfirst($data["description"]),
          $data["url"],
          $_SESSION["user_id"]
        ]);
        
        move_uploaded_file($_FILES["picture"]["tmp_name"], "uploads/".$filename);

        header("Location: " .ROOT. "create/profile/".$_SESSION["user_id"]."");

      }
      else {
        return "Preencha todos os dados correctamente";
      }
    }


    
}