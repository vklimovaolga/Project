<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <title>Criar Post</title>
    <link rel="stylesheet" type="text/css" href="/PF/Project/css/home.css">
  </head>
  <body>
  <?php 
        if(!empty($message)){
          echo "<p>" .$message. "</p>";
        }
      ?>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]);?>" enctype="multipart/form-data">
        <div>
            <label>
                Título
                <input type="text" name="title" required>
            </label>
        </div>
        <div>
            <label>
                Imagem
                <input type="file" name="image" required>
            </label>
        </div>
        <div>
            <label>
                Descrição
                <input type="text" name="description">
            </label>
        </div>
        <div>
            <button type="submit" name="send">Publicar</button>
        </div>
    </form>
  </body>
</html>

