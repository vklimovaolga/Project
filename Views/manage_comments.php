<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <title>Gerir Comentarios</title>
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
            <h1>Comentarios</h1>
            <div class="profile-list">
                <table>
                    <tr>
                        <th>Id</th>
                        <th>Usename</th>
                        <th>Mensagem</th>
                        <th>Data</th>
                        <th>Gerir</th>
                    </tr>
                    <?php
                        foreach($comments as $comment) {
                            echo '
                                <tr data-comment_id="'.$comment["comment_id"].'">
                                    <td>'.$comment["comment_id"].'</td>
                                    <td><a href="'.ROOT.'create/profile/'.$comment["user_id"].'" class="username">'.ucfirst($comment["username"]).'</a></td>
                                    <td>'.$comment["message"].'</td>
                                    <td>'.strftime("%e %b %Y - %H:%M", strtotime($comment["post_date"])).'</td>
                                    <td><button type="button" name="delete" id="aDeleteComment">Apagar</button></td>
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