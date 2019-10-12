<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <title>Gerir Perfis</title>
    <link rel="stylesheet" type="text/css" href="/PF/Project/css/home.css">
    <link rel="stylesheet" type="text/css" href="/PF/Project/css/admin.css">
    <script src="/PF/Project/js/admin_scripts.js"></script>
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
                    
                        echo '<a href="'.ROOT.'admin/admin_home/'.$admin[0]["admin_id"].'">Home</a> ';

                        echo '<a href="'.ROOT.'admin/manage_profiles">Gerir Perfis</a> ';

                        echo '<a href="'.ROOT.'admin/manage_posts">Gerir Posts</a> ';
                        
                        echo '<a href="'.ROOT.'admin/admin_logout">Logout</a>';
                    }
                    ?>
                </nav>
            </div>
        </header>
        <main class="wrapper-list">
            <h1>Lista de Perfis</h1>
            <div class="profile-list">
                <table>
                    <tr>
                        <th>Id</th>
                        <th>Usename</th>
                        <th>Descrição</th>
                        <th>Url</th>
                        <th>Imagem</th>
                        <th>Data de criação</th>
                        <th>Gerir</th>
                    </tr>
                    <?php
                        foreach($profiles as $profile) {
                            echo '<tr data-profile_id="'.$profile["profile_id"].'">
                                <td>'.$profile["profile_id"].'</td>
                                <td><a href="'.ROOT.'create/profile/'.$profile["user_id"].'" class="username">'.ucfirst($profile["username"]).'</a></td>
                                <td>'.$profile["description"].'</td>
                                <td>'.$profile["url"].'</td>
                                <td><img src="/PF/Project/uploads/'.$profile["picture"].'" alt="Imagem de perfil"></td>
                                <td>'.strftime("%e %b %Y - %H:%M", strtotime($profile["created_at"])).'</td>
                                <td><button type="button" name="delete" id="aDeleteProfile">Apagar</button></td>
                            </tr>';
                        }
                    ?>
                </table>
            </div>
        </main>
    </div>
  </body>
</html>