<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <title>Editar Perfil </title>
    <link rel="stylesheet" type="text/css" href="/PF/Project/css/home.css">
    <link rel="stylesheet" type="text/css" href="/PF/Project/css/post.css">
    <script src="/PF/Project/js/scripts.js"></script>
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
            ?>
            <button type="button" name="delete" id="deleteB" value="<?php echo $data[0]["post_id"];?>">Apagar Post</button>
            <?php
                    echo '<a href="'. ROOT .'create/profile">Perfil</a>';
                        
                    echo '<a href="'. ROOT .'access/logout">Logout</a>';
                }
            ?>
            </nav>
        </div>
    </header>
    <main class="post-wrapper">
      <div class="post-wleft">
        <h1><?php echo $data[0]["title"];?></h1>
        <img src="/PF/Project/post_uploads/<?php echo $data[0]["image"];?>" alt="img">
      </div>
      <div class="post-wright">
        <div class="post-wsright">
          <img src="/PF/Project/uploads/<?php echo $data[0]["picture"];?>" alt="img">
          <h2><?php echo $data[0]["username"];?></h2>
        </div>
        <p class="description"><?php echo $data[0]["description"];?></p>
        <div>
          <form method="POST" action="<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]);?>">
              <div>
                <label>
                  Comentario
                  <input type="text" name="message" required>
                </label>
              </div>
              <div>
                <input type="hidden" name="post_id" value="<?php echo $data[0]["post_id"];?>">
                <button type="submit" name="send">Publicar</button>
              </div>
          </form>
          <?php 
            // if(!empty($message)){
            //   echo "<p>" .$message. "</p>";
            // }

            foreach ($comments as $comment) {
              echo ' 
                <div>
                  <div>'.$comment["username"].'</div>
                  <div>'.strftime("%e %b %Y - %H:%M", strtotime($comment["post_date"])).'</div>
                  <p>'.$comment["message"].'</p>
                </div>
              ';                          
            } 
          ?>
          <!-- <img src="/PF/Project/uploads/<?php echo $data[0]["picture"];?>" alt="img">
          <h2><?php echo $data[0]["username"];?></h2> -->
        </div>
      </div>
      <input type="hidden" name="post_id" value="<?php echo $data[0]["post_id"];?>">
    </main>
  </body>
</html>

