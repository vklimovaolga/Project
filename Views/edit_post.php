<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <title>Editar Post</title>
    <link rel="stylesheet" type="text/css" href="/PF/Project/css/home.css">
    <link rel="stylesheet" type="text/css" href="/PF/Project/css/register.css">
  </head>
  <body>
    <h1>Editar Post</h1>
    <main class="wrapper">
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]);?>" enctype="multipart/form-data" class="form">
            <div>
                <label>
                    Título
                    <input type="text" name="title" value="<?php echo $data[0]["title"];?>">
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
                    <input type="text" name="description" value="<?php echo $data[0]["description"];?>">
                </label>
            </div>
            <div class="buttonw">
                <input type="hidden" name="post_id" value="<?php echo $data[0]["post_id"];?>">
                <button type="submit" name="send">Editar</button>
                <a href="<?php echo ROOT;?>" class="backbutton">Voltar</a>
            </div>
        </form>
    </main> 
  </body>
</html>



