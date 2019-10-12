<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <title>Gerir Posts</title>
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
            <h1>Lista de Posts</h1>
            <div class="profile-list">
                <table>
                    <tr>
                        <th>Id</th>
                        <th>Usename</th>
                        <th>Título</th>
                        <th>Imagem</th>
                        <th>Descrição</th>
                        <th>Data de criação</th>
                        <th>Comentários</th>
                        <th>Gerir Comentarios</th>
                        <th>Gerir</th>
                    </tr>
                    <?php
                        foreach($posts as $post) {
                            echo '
                                <tr data-post_id="'.$post["post_id"].'">
                                    <td>'.$post["post_id"].'</td>
                                    <td><a href="'.ROOT.'create/profile/'.$post["user_id"].'" class="username">'.ucfirst($post["username"]).'</a></td>
                                    <td>'.$post["title"].'</td>
                                    <td><img src="/PF/Project/post_uploads/'.$post["image"].'" alt="Imagem do post"></td>
                                    <td>'.$post["description"].'</td>
                                    <td>'.strftime("%e %b %Y - %H:%M", strtotime($post["created_at"])).'</td>
                                    <td>'.$post["total"].'</td>
                                    <td><a href="'.ROOT.'admin/manage_comments/'.$post["post_id"].'" class="manageComments">Gerir</a></td>
                                    <td><button type="button" name="delete" id="aDeletePost">Apagar</button></td>
                                </tr>
                            ';
                        }
                    ?>
                </table>
            </div>
        </main>
    </div>
  </body>
</html>