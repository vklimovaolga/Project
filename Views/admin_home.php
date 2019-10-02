<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <title>Admin Home</title>
    <link rel="stylesheet" type="text/css" href="/PF/Project/css/home.css">
  </head>
  <body>
    <div id="wrapper">
        <header>
            <div class="menu"> 
                <div class="logo-wrapper"> 
                    <a href="<?php echo ROOT;?>">
                        <img src="/PF/Project/img/logo1.png" alt="logo">
                    </a>
                </div>
                <nav>
                    <?php
                    if(!isset($_SESSION["admin_id"])) {
                        echo '
                        <a href="'. ROOT .'admin/admin_register">Criar Conta</a>
                        <a href="'. ROOT .'admin/admin_login">Login</a>
                        ';
                    }
                    else {
                        echo '<a href="'.ROOT.'admin/manage_profiles">Gerir Perfis</a> ';

                        echo '<a href="'.ROOT.'admin/manage_posts">Gerir Posts</a> ';
                        
                        echo '<a href="'.ROOT.'admin/admin_logout">Logout</a>';
                    }
                    ?>
                </nav>
            </div>
        </header>
        <main>
            <div>
                <ul>
                <?php 
                    foreach($admins as $admin) {
                        echo '
                        <li>'.$admin["username"].'</li>
                            <li>Email: '.$admin["email"].'</li>
                            <li>Data de registo: '.$admin["registration_date"].'</li>
                            ';
                        }
                ?>
                </ul>
            </div>
            <div>
                <ul>
                    <li>Total de Utilizadores: <?php  echo $users[0]["total_users"]; ?></li>
                    <li>Total de Perfis: <?php   echo $profiles[0]["total_profiles"]; ?></li>
                    <li>Total de Posts: <?php   echo $posts[0]["total_posts"]; ?></li>
                    <li>Total de Comentarios: <?php  ?></li>
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