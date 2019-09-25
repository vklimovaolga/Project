<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <title>Editar Post</title>
    <link rel="stylesheet" type="text/css" href="/PF/Project/css/home.css">
  </head>
  <body>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]);?>" enctype="multipart/form-data">
        <div>
            <label>
                Título
                <input type="text" name="title" value="<?php echo $data[0]["title"];?> " required>
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
            <input type="hidden" name="post_id" value="<?php echo $data[0]["post_id"];?>">
            <button type="submit" name="send">Editar</button>
        </div>
    </form>
  </body>
</html>



