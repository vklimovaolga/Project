<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <title>Perfil</title>
    <link rel="stylesheet" type="text/css" href="/PF/Project/css/home.css">
    <link rel="stylesheet" type="text/css" href="/PF/Project/css/profile.css">
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script> -->
<!-- jQuery Modal -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" /> -->
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
                    echo '<a href="'.ROOT .'posts/create_post">Criar Post</a>'; 
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
          if(
            isset($_SESSION["user_id"]) && 
            $profile["user_id"] === $_SESSION["user_id"]
            ){
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
            }
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
          <?php
          // if(
          //   isset($_SESSION["user_id"]) && 
          //   $profile["user_id"] === $_SESSION["user_id"]
          //   ){
              foreach($posts as $post){
                echo '
                  <li><a href="'.ROOT.'posts/view_post/'.$post["post_id"].'"><img src="/PF/Project/post_uploads/'.$post["image"].'" alt="img"></a></li>
                ';
              }
            // }
          ?>
          <input type="hidden" name="post_id" value="<?php echo $data[0]["post_id"];?>">
        </ul>
      </div>
    </main>
  </body>
</html>