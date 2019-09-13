<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <title>PF</title>
  </head>
  <body>
    <div id="wrapper">
        <header>
            <div> 
                <div> 
                    <a href="">
                        <img src="" alt="">
                    </a>
                </div>
            </div>
            <nav>
                <?php
                    if(!isset($_SESSION["user_id"])){
                        echo '
                        <a href="'. ROOT . 'access/register">Criar Nova Conta</a>
                        <a href="'. ROOT .'access/login">Fazer Login</a>
                        ';
                    }
                    else {
                        echo '<a href="'.ROOT.'create/create">Criar Perfil</a> ';
                        echo '<a href="'. ROOT .'access/logout">Logout</a>';
                    }
                ?>
            </nav>
        </header>
        <main>
        </main>
        <footer>
        </footer>
    </div>
    
  </body>
</html>