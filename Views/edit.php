<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <title>Editar Perfil </title>
    <link rel="stylesheet" type="text/css" href="/PF/Project/css/home.css">
    <link rel="stylesheet" type="text/css" href="/PF/Project/css/edit.css">
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
              echo '<a href="'. ROOT .'create/profile">Perfil</a>';

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
    <main class="edit-wrapper">
      <?php 
        if(!empty($message)){
          echo "<p>" .$message. "</p>";
        }
      ?>
      <h1><?php echo $data[0]["username"];?> Perfil</h1>
      <form method="POST" action="<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]);?>" enctype="multipart/form-data" class="edit-form">
        <div>
          <label>
            Descrição
            <input type="text" name="description" value="<?php echo $data[0]["description"];?>" required>
          </label>
        </div>
        <div>
          <label>
            Url
            <input type="text" name="url" value="<?php echo $data[0]["url"];?> " required>
          </label>
        </div>
        <div>
          <label>
              Imagem
              <input type="file" name="picture" required>
          </label>
        </div>
        <div>
          <input type="hidden" name="profile_id" value="<?php echo $data[0]["profile_id"];?>">
          <button type="submit" name="send">Salvar</button>
          <a href="<?php echo ROOT;?>">Voltar</a>
        </div>
      </form>
      <!-- <nav> 
        <a href="<?php echo ROOT."create/profile";?>">Voltar</a>
      </nav> -->
    </main>
    <footer>
        <div class="footer">
            <ul>
                <li>©2019 <a href="https://www.flag.pt/">Flag</a></li>
                <li><a href="">Sobre</a></li>
                <li><a href="">Declaração de Privacidade</a></li>
                <li><a href="">Termos de Serviço</a></li>
            </ul>
        </div>
    </footer>
  </body>
</html>