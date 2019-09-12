<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <title>PF</title>
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
        <!-- <div>
            <label>
                Imagem
                <input type="file" name="picture" accept="image/*">
            </label>
        </div> -->
        <div>
            <button type="submit" name="send">Criar</button>
        </div>
    </form>
  </body>
</html>