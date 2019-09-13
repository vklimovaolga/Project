<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <title>Perfile </title>
  </head>
  <body>
  <?php
      foreach($data as $profile){
        echo '
          <div>
            <div>'.$data[0]["username"].'</div>
            <p>'.$profile["description"].'</p>
            <p>'.$profile["url"].'</p>
          </div>
          ';
          if(
            isset($_SESSION["user_id"]) && 
            $profile["user_id"] === $_SESSION["user_id"]
          ){
          echo '
              <div>
                <a href="'.ROOT.'create/edit/'.$profile["user_id"].'">Editar</a>
              </div>
            ';
          }

          echo '
            <div>
                <a href="'.ROOT.'">Voltar</a>
            </div>
          ';
        }
    ?>
  </body>
</html>