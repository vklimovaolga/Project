<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <title>Efectuar Login</title>
    <link rel="stylesheet" type="text/css" href="/PF/Project/css/home.css">
    <link rel="stylesheet" type="text/css" href="/PF/Project/css/register.css">
  </head>
  <body>
    <?php 
      if(isset($status) && $status === false){
        echo "<p>Preencha todos os campos correctamente</p>";
      }
    ?>
    <h1>Iniciar Sessão</h1>
    <main class="wrapper">
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]);?>" class="form">
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
        <div class="buttonw">
          <button type="submit" name="send">Login</button>
          <a href="<?php echo ROOT;?>" class="backbutton">Voltar</a>
        </div>
      </form>
    </main>
  </body>
</html>