<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <title>Perfil</title>
    <link rel="stylesheet" type="text/css" href="/PF/Project/css/home.css">
    <link rel="stylesheet" type="text/css" href="/PF/Project/css/profile.css">
  </head>
  <body>
    <header>
      <div class="menu"> 
        <div class="logo-wrapper"> 
            <a href="<?php echo ROOT;?>">
                <img src="/PF/Project/img/logo1.png" alt="logo">
            </a>
        </div>
        <nav>
            <?php
            if(!isset($_SESSION["user_id"])) {
                echo '
                <a href="'. ROOT .'access/register">Criar Conta</a>
                <a href="'. ROOT .'access/login">Login</a>
                ';
            }
            else {
                foreach ($data as $profile) {
                  if(
                    isset($_SESSION["user_id"]) && 
                    $profile["user_id"] === $_SESSION["user_id"]
                  ){
                    echo '<a href="'.ROOT.'create/edit/'.$profile["user_id"].'">Editar Perfil</a>';
                  }
                }
                
                echo '<a href="'. ROOT .'access/logout">Logout</a>';
            }
            ?>
        </nav>
      </div>
    </header>
    <main>
      <div class="wrapper-profile">
        <?php
            foreach($data as $profile){
              echo '
                <div class="profile-container">
                  <div class="profile-picture">
                    <img src="/PF/Project/uploads/'.$profile["picture"].'" alt="imagem de perfil">
                  </div>
                  <h1>'.$data[0]["username"].'</h1>
                  <p>'.$profile["description"].'</p>
                  <p>'.$profile["url"].'</p>
                </div>
              ';

              // echo '
              //   <div>
              //       <a href="'.ROOT.'">Voltar</a>
              //   </div>
              // ';
              }
          ?>
      </div>
      <nav class="nav-data">
        <ul>
          <li><a href="">Portfolio</a></li>
          <li><a href="">Likes</a></li>
          <li><a href="">Following</a></li>
          <li><a href="">Followers</a></li>
        </ul>
      </nav>
      <div class="pic">
        <ul>   
            <li><a href=""><img src="/PF/Project/uploads/1.png" alt="img"></a></li>
            <li><a href=""><img src="/PF/Project/uploads/1.png" alt="img"></a></li>
            <li><a href=""><img src="/PF/Project/uploads/1.png" alt="img"></a></li>
            <li><a href=""><img src="/PF/Project/uploads/1.png" alt="img"></a></li>
            <li><a href=""><img src="/PF/Project/uploads/1.png" alt="img"></a></li>
            <li><a href=""><img src="/PF/Project/uploads/1.png" alt="img"></a></li>
            <li><a href=""><img src="/PF/Project/uploads/1.png" alt="img"></a></li>
        </ul>
      </div>
    </main>
  </body>
</html>