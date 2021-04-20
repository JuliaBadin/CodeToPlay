<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>Code to Play</title>
    <link rel="icon" type="imagem/png" href="https://i.ibb.co/C5cSRjf/game-console.png"/>
    <link rel="stylesheet" type="text/css" href="loginStyle.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Mono:wght@700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Mono:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  </head>

  <body>

    <?php
        session_start();
        include "../database/connect_db_php.php";
        $connection = mysqli_connect($host, $user, $pass, $db);
    ?>

    <div class="buttons">
    <button class="login" onclick="loginModal();"> Entrar </button>
    <button class="register" onclick="registroModal();"> Registrar-se </button>
    </div>

    <div id="fundo-modal-login" class="hide">
        <div class="modal">

            <div id="content">
            <!-- <div class="top"> -->
                <h2>Entrar</h2>
                <p class="exit" onclick="loginModal();">X</p>
            <!-- </div> -->
                <form action="verifica.php" method="post">

                    <input type="hidden" name="acao" value="login">

                    <div class="input-form">
                        <label for="text">Email</label>
                        <input name="email" type="email" placeholder="exemplo@projeto.com" required="required">
                    </div>

                    <div class="input-form">
                        <label for="password">Senha</label>
                        <input name="password" type="password" placeholder="********" required="required">
                    </div>

                    <h6>Novo por aqui?</h6>
                    <button class="button" onclick="loginModal();"><a href="#" id="registrar-login">Registrar-se</a></button>
                    <input type="submit" name="entrar" value="Entrar" id="submit">

                </form>
            </div>

        </div>
    </div>

    <div id="fundo-modal-registro" class="hide">
        <div class="modal" id="modal-registro">

            <div id="content">
                <h2>Registrar-se</h2>
                <p class="exit" onclick="registroModal();">X</p>

                <form action="login.php" method="post" enctype="multipart/form-data">

                    <input type="hidden" name="acao" value="cadastrar">

                    <div class="input-form">
                        <label for="name">Seu nome completo</label>
                        <input name="name" type="text" placeholder="Fulano da Silva" required="required">
                    </div>

                    <div class="input-form">
                        <label for="email">Email</label>
                        <input name="email" type="email" placeholder="exemplo@projeto.com" required="required">
                    </div>

                    <div class="input-form">
                        <label for="nickname">Nome de usuário</label>
                        <input name="nickname" type="text" placeholder="Seu_Nome" required="required">
                    </div>

                    <div class="input-form">
                        <label for="password">Senha</label>
                        <input name="password" type="password" placeholder="********" required="required">
                    </div>

                    <div class="input-form">
                        <label for="birthday">Data de nascimento</label>
                        <input name="birthday" type="date" placeholder=" " required="required">
                    </div>

                    <div class="input-form">
                        <label for="country">País de origem</label>
                        <select  id="select" name="country" required="required">
                            <?php include("lista-paises.html"); ?>
                        </select>
                    </div>

                    <h6>Já tem uma conta?</h6>
                    <button class="button" onclick="loginModal();"><a href="#" id="registrar-login">Entrar</a></button>
                    <input type="submit" name="registrar" value="Registrar-se" id="submit">

                </form>

                <?php
                    if($_POST["acao"]=="cadastrar"){
                        $consulta = "SELECT user FROM users WHERE user = '{$_POST['email']}'";
                        $existe = mysqli_query($connection, $consulta);
                        $res_existe = mysqli_num_rows($existe);
                        if ($res_existe>0){
                            echo "<script>alert('Este usuário já existe')</script>";
                        }else{
                            $insert = "INSERT INTO users(idUser, user, password) VALUES('', '" . $_POST["email"] . "', md5('" . $_POST["password"] . "'))";
                            $res_inserir = mysqli_query($connection, $insert);

                            $idUser = "SELECT MAX(idUser) AS ID FROM users";
                            $resID = mysqli_query($connection, $idUser);
                            $dadosID = mysqli_fetch_array($resID);

                            $insert2 = "INSERT INTO profile(idProfile, name, nickname, email, country, birthday, users_idUser)
                                        VALUES ('',
                                                '" . $_POST["name"] . "',
                                                '" . $_POST["nickname"] . "',
                                                '" . $_POST["email"] . "',
                                                '" . $_POST["country"] . "',
                                                '" . $_POST["birthday"] . "',
                                                '" . $dadosID["ID"] . "'
                                        )";
                            $res_inserir2 = mysqli_query($connection, $insert2);

                            if($res_inserir && $res_inserir2){
                                echo "<div class='alert alert-info'>Cliente cadastrado com <b>sucesso</b> no BD!</div>";
                            }else{
                                echo "<script>alert('Erro ao cadastrar usuário!')</script>";
                            }
                        }
                    }

                    if($_POST["acao"]=="login"){
                        include 'verifica.php';
                    }
                ?>

            </div>
        </div>
    </div>

    <script type="text/javascript" src="loginScript.js"></script>
  </body>
</html>