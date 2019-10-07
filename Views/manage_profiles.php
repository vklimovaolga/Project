<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <title>Gerir Perfis</title>
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
                            echo '<tr>
                                <td>'.$profile["profile_id"].'</td>
                                <td>'.$profile["username"].'</td>
                                <td>'.$profile["description"].'</td>
                                <td>'.$profile["url"].'</td>
                                <td><img src="/PF/Project/uploads/'.$profile["picture"].'" alt="Imagem de perfil"></td>
                                <td>'.$profile["created_at"].'</td>
                                <td><a href="" >Apagar</a></td>
                            </tr>';

                        }
                    ?>
                    
                </table>
                    
            </div>
        
        
            
        </main>
        <!-- <footer>
            <div class="footer">
                <ul>
                    <li>©2019 <a href="https://www.flag.pt/">Flag</a></li>
                    <li><a href="">Sobre</a></li>
                    <li><a href="">Declaração de Privacidade</a></li>
                    <li><a href="">Termos de Serviço</a></li>
                </ul>
            </div>
        </footer> -->
    </div>
    
  </body>
</html>