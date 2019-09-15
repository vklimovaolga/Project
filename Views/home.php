<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="css/home.css">
  </head>
  <body>
    <div id="wrapper">
        <header>
            <div class="menu"> 
                <div class="logo-wrapper"> 
                    <a href="<?php echo ROOT;?>">
                        <img src="img/logo1.png" alt="logo">
                    </a>
                </div>
                <nav>
                    <?php
                    if(!isset($_SESSION["user_id"])){
                        echo '
                        <a href="'. ROOT . 'access/register">Criar Conta</a>
                        <a href="'. ROOT .'access/login">Login</a>
                        ';
                    }
                    else {
                        echo '<a href="'.ROOT.'create/create">Criar Perfil</a> ';
                        echo '<a href="'. ROOT .'access/logout">Logout</a>';
                    }
                    ?>
                </nav>
            </div>
        </header>
        <main>
            <nav class="nav-pic">
                <ul>
                    <li><a href="">Populares</a></li>
                    <li><a href="">Mais recentes</a></li>
                    <li><a href="">Seguidos</a></li>
                </ul>
            </nav>
            <div class="pic">
                <ul>   
                   <li><a href=""><img src="uploads/1.png" alt="img"></a></li>
                   <li><a href=""><img src="uploads/2.png" alt="img"></a></li>
                   <li><a href=""><img src="uploads/1.png" alt="img"></a></li>
                   <li><a href=""><img src="uploads/2.png" alt="img"></a></li>
                   <li><a href=""><img src="uploads/2.png" alt="img"></a></li>
                   <li><a href=""><img src="uploads/2.png" alt="img"></a></li>
                   <li><a href=""><img src="uploads/2.png" alt="img"></a></li>
                   <li><a href=""><img src="uploads/2.png" alt="img"></a></li>
                   <li><a href=""><img src="uploads/2.png" alt="img"></a></li>
                   <li><a href=""><img src="uploads/2.png" alt="img"></a></li>
                   <li><a href=""><img src="uploads/2.png" alt="img"></a></li>
                   <li><a href=""><img src="uploads/2.png" alt="img"></a></li>
                   <li><a href=""><img src="uploads/2.png" alt="img"></a></li>
                   <li><a href=""><img src="uploads/2.png" alt="img"></a></li>
                </ul>
            </div>
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
    </div>
    
  </body>
</html>