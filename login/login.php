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
        #../html page 1/page-1.php
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
                <form action="login.php" method="post">

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

                            //cadastro
                        /*$login = $_POST['surname'];
                        $password = MD5($_POST['password']);

                        $query_select = "SELECT name FROM users WHERE name = '$login'";
                        $select = mysqli_query($login, $connection);
                        $array = mysqli_fetch_array($select);
                        $logarray = $array['login'];


                            //confere se login foi digitado
                        if($login == "" || $login == null){
                            echo"<script language='javascript' type='text/javascript'>
                            alert('O campo login deve ser preenchido');</script>";
                        }else{
                            //confere se o usuário já existe
                        if($logarray == $login){
                            echo"<script language='javascript' type='text/javascript'>
                            alert('Esse login já existe');</script>";
                            die();*/

                        $insert = "INSERT INTO users(idUser, name, password) VALUES('', '" . $_POST["email"] . "', md5('" . $_POST["password"] . "'))";
                        $res_inserir = mysqli_query($connection, $insert);

                        $idUser = "SELECT MAX(idUser) FROM users";
                        $resID = mysqli_query($connection, $idUser);
                        $dadosID = mysqli_fetch_array($resID);

                        $insert2 = "INSERT INTO profile(idProfile, name, nickname, email, country, birthday, users_idUser)
                                    VALUES ('',
                                            '" . $_POST["name"] . "',
                                            '" . $_POST["nickname"] . "',
                                            '" . $_POST["email"] . "',
                                            '" . $_POST["country"] . "',
                                            '" . $_POST["birthday"] . "',
                                            '$dadosID'
                                    )";
                        $res_inserir2 = mysqli_query($connection, $insert2);

                        if($res_inserir && $res_inserir2){
                            echo "<div class='alert alert-info'>Cliente cadastrado com <b>sucesso</b> no BD!</div>";
                        }else{
                            echo "<script>alert('Erro ao cadastrar usuário!')</script>";
                        }
                    }

                    if($_POST["acao"]=="login"){

                        //modo 1 - visto no site https://www.todoespacoonline.com/w/2014/07/login-simples-com-php/
                        include 'verifica.php';

                        //modo 2 - não funciona, dá erro na criptografia
                        /*$email = $_POST['email'];
                        $entrar = $_POST['entrar'];
                        $password = md5($_POST['password']);

                        if (isset($entrar)) {
                            $login = "SELECT * FROM users WHERE name = '$email' AND password = '$password'";
                            $verifica = mysqli_query($login, $connection);
                            if (mysqli_num_rows($verifica)<1){
                                echo"<script language='javascript' type='text/javascript'>
                                    alert('$password');</script>";
                                die();
                            }else{
                                setcookie("email",$email);
                                //header("Location:../html page 1/page-1.php");
                                echo"<script language='javascript' type='text/javascript'>
                                    alert('Logado');</script>";
                            }
                        }*/
                        
                        //modo 3 - visto em aula, não funciona, dá erro na criptografia

                        /*$email = $_POST['email'];
                        $password = md5($_POST['password']);

                        if (isset( $_POST) && !empty($_POST) ) {
                            $dados = $_POST;
                        } else {
                            $dados = $_SESSION;
                        }

                        //ta dando ruim na criptografia
                        $consulta = "SELECT * FROM users WHERE name = '$email'";
                        $res_consulta = mysqli_query($connection, $consulta);
                        $dados = mysqli_fetch_array($res_consulta);

                        $login = "SELECT * FROM users WHERE name = '$email' AND password = '$password'";
                        $verifica = mysqli_query($connection, $login);
                        $num_resultados = mysqli_num_rows($verifica);

                        if ($num_resultados<1){
                            echo"<script language='javascript' type='text/javascript'>
                            alert('$email $password');</script>";
                        }else{
                            echo"<script language='javascript' type='text/javascript'>
                                alert('Funfou');</script>";
                            $_SESSION["logado"] = "ok";

                            $_SESSION["name"] = $dados["name"];
                            $_SESSION["photo"] = $dados["photo"];
                            $_SESSION["idProfile"] = $dados["idProfile"];
                            
                            print_r($_SESSION);

                            $user = "SELECT * FROM profile WHERE email = '$email'";
                            $verifica = mysqli_query($connection, $user);
                            setcookie("user",$user);
                            header("Location: ../html page 1/page-1.php");
                        }*/
                    }

                    //colocar no inicio de todas as paginas pra verificar se ta logado

                    //include 'redirect.php';

                    //site^  aula v 

                    /*if(isset($_SESSION["logado"])){
                         carrega a página
                        }else{
                            echo"<script language='javascript' type='text/javascript'>
                                    alert('Faça login para continuar');</script>";
                            header("Location: ../login/login.php");
                        }*/

                ?>

            </div>

        </div>
    </div>

    <script type="text/javascript" src="loginScript.js"></script>
  </body>
</html>