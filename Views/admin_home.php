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
                            <li>'.ucfirst($admin["username"]).'</li>
                            <li>Email: '.$admin["email"].'</li>
                            <li>Data de registo: '.strftime("%e %b %Y - %H:%M", strtotime($admin["registration_date"])).'</li>
                            ';
                        }
                ?>
                </ul>
            </div>
            <div class="right-wrapper">
                <h1>Painel de Controle</h1>
                <ul>
                    <li><a class="manageLink" href="<?php echo ROOT.'admin/manage_profiles';?>">Utilizadores: <?php echo $users[0]["total_users"]; ?></a></li>
                    <li><a class="manageLink" href="<?php echo ROOT.'admin/manage_profiles';?>">Perfis: <?php echo $profiles[0]["total_profiles"]; ?></a></li>
                    <li><a class="manageLink" href="<?php echo ROOT.'admin/manage_posts';?>">Posts: <?php echo $posts[0]["total_posts"]; ?></a></li>
                    <li><a class="manageLink" href="<?php echo ROOT.'admin/manage_posts';?>">Comentarios: <?php echo $comments[0]["total_comments"]; ?></a></li>
                </ul>
            </div>
        </main>
    </div>
  </body>
</html>