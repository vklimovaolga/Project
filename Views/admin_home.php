<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <title>Admin Home</title>
    <link rel="stylesheet" type="text/css" href="/PF/Project/css/home.css">
    <link rel="stylesheet" type="text/css" href="/PF/Project/css/admin.css">
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
        <main class="admin-wrapper">
            <div class="left-wrapper">
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
            <div class="right-wrapper">
                <h1>Painel de Controle</h1>
                <ul>
                    <li>Utilizadores: <?php echo $users[0]["total_users"]; ?></li>
                    <li>Perfis: <?php echo $profiles[0]["total_profiles"]; ?></li>
                    <li>Posts: <?php echo $posts[0]["total_posts"]; ?></li>
                    <li>Comentarios: <?php echo $comments[0]["total_comments"]; ?></li>
                </ul>
            </div>
        
        
            
        </main>
       
    </div>
    
  </body>
</html>