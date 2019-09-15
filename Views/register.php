<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <title>Criar Conta</title>
    <link rel="stylesheet" type="text/css" href="/PF/Project/css/register.css">
    <!-- <link rel="stylesheet" type="text/css" href="/PF/Project/css/home.css"> -->

  </head>
  <body>
    <?php 
      if(isset($status) && $status === false){
        echo "<p>Preencha todos os campos correctamente, password tem que ter no minimo 5 caracteres</p>";
      }
    ?>
    <h1>Criar Conta Nova</h1>
    <div class="wrapper">
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]);?>" class="form">
        <div>
          <label>
              Email
              <input type="email" name="email" required>
          </label>
        </div>
        <div>
          <label>
              Username
              <input type="text" name="username" required>
          </label>
        </div>
        <div>
          <label>
              Password
              <input type="password" name="password" required>
          </label>
        </div>
        <div>
          <label>
              Repetir Password
              <input type="password" name="rep_password" required>
          </label>
        </div>
        <div class="buttonw">
            <button type="submit" name="send">Registar</button>
      
            <button type="button" name="button">Voltar</button>
        </div>
      </form>

    </div>
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