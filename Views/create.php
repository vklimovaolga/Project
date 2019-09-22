<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <title>Criar Perfil</title>
    <link rel="stylesheet" type="text/css" href="/PF/Project/css/home.css">
  </head>
  <body>  
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]);?>" enctype="multipart/form-data">
    <?php 
      if(!empty($message)){
        echo "<p>" .$message. "</p>";
      }
    ?>
        <div>
            <label>
                Descrição
                <input type="text" name="description" required>
            </label>
        </div>
        <div>
            <label>
                Url
                <input type="text" name="url" required>
            </label>
        </div>
        <div>
            <label>
                Imagem
                <input type="file" name="picture">
            </label>
        </div>
        <div>
            <button type="submit" name="send">Criar</button>
        </div>
        <nav>
            <?php
                if(!isset($_SESSION["user_id"])){
                    echo '
                    <a href="'. ROOT . 'access/register">Criar Nova Conta</a>
                    <a href="'. ROOT .'access/login">Fazer Login</a>
                    ';
                }
                else {
                    echo '<a href="'.ROOT.'">Voltar</a> ';
                    echo '<a href="'. ROOT .'access/logout">Logout</a>';
                }
            ?>
        </nav>
    </form>
  </body>
</html>