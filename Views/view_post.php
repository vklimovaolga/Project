<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <title>Editar Perfil </title>
    <link rel="stylesheet" type="text/css" href="/PF/Project/css/home.css">
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
                    foreach ($data as $post) {
                        if(
                          isset($_SESSION["user_id"]) &&
                          $post["user_id"] === $_SESSION["user_id"]
                        ){
                          echo '<a href="'.ROOT.'posts/edit_post/'.$post["post_id"].'">Editar Post</a>';
                        }
                      }
                    echo '<a href="'. ROOT .'create/profile">Perfil</a>';
                        
                    echo '<a href="'. ROOT .'access/logout">Logout</a>';
                }
            ?>
            </nav>
        </div>
    </header>
    <main>
        <h1><?php echo $data[0]["title"];?></h1>
        <img src="/PF/Project/post_uploads/<?php echo $data[0]["image"];?>" alt="img">
        <h2><?php echo $data[0]["username"];?></h2>
        <img src="/PF/Project/uploads/<?php echo $data[0]["picture"];?>" alt="img">
        <p><?php echo $data[0]["description"];?></p>


        <input type="hidden" name="post_id" value="<?php echo $data[0]["post_id"];?>">
    </main>
  </body>
</html>