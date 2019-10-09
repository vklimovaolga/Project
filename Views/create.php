<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <title>Criar Perfil</title>
    <link rel="stylesheet" type="text/css" href="/PF/Project/css/home.css">
    <link rel="stylesheet" type="text/css" href="/PF/Project/css/register.css">
  </head>
  <body> 
    <h1>Criar Perfil</h1>
    <main class="wrapper"> 
        <form method="post" class="form" action="<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]);?>" enctype="multipart/form-data">
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
            <div class="buttonw">
                <button type="submit" name="send">Criar</button>
                <a href="<?php echo ROOT;?>" class="backbutton">Voltar</a>
            </div>
        </form>
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