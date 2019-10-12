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
                    if(isset($_SESSION["admin_id"])) {
                        echo '<a href="'.ROOT.'admin/admin_home/'.$admin[0]["admin_id"].'">Home</a> ';

                    }
                    if(!isset($_SESSION["user_id"]) && !isset($_SESSION["admin_id"])) {

                        echo '
                            <a href="'.ROOT.'access/register">Criar Conta</a>
                            <a href="'.ROOT.'access/login">Login</a>
                        ';
                    }
                    else {
                        if(!isset($data[0]["profile_id"]) && !isset($_SESSION["admin_id"])) {

                            echo '<a href="'.ROOT.'create/create">Criar Perfil</a>';

                        }else {

                            if(!isset($_SESSION["admin_id"])) {

                                echo '<a href="'.ROOT.'create/profile/'.$data[0]["user_id"].'">Perfil</a>';
                            }
                        }
                        
                        echo '<a href="'.ROOT.'access/logout">Logout</a>';
                    }
                    ?>
                </nav>
            </div>
        </header>
        <main class="home-wrapper">
            <nav class="nav-pic">
                <ul>
                    <!-- <li><a href="">Populares</a></li>
                    <li><a href="">Mais recentes</a></li> -->
                </ul>
            </nav>
            <div class="pic">
                <ul>
                    <?php
                        foreach($posts as $post) {
                            echo '
                                <li><a href="'.ROOT.'posts/view_post/'.$post["post_id"].'"><img src="/PF/Project/post_uploads/'.$post["image"].'" alt="'.$post["title"].'"></a></li>
                            ';
                        }
                    ?>
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