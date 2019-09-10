<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <title>PF</title>
  </head>
  <body>  
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]);?>" enctype="multipart/form-data">
        <div>
            <label>
                Descrição
                <input type="text" name="username" required>
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
            <button type="submit" name="send">Crear</button>
        </div>
    </form>
  </body>
</html>