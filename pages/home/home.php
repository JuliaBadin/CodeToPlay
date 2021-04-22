<html lang="pt-br">

<head>
    <title>Code to Play</title>
    <meta charset="utf-8">
    <link rel="icon" type="imagem/png" href="https://i.ibb.co/C5cSRjf/game-console.png" />
    <link rel="stylesheet" type="text/css" href="../../css/home.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Mono:wght@700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Mono:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script type="text/javascript " src="../../js/home.js"></script>
</head>

<body>

    <?php
        session_start();
        include "../../database/connect_db_php.php";
    ?>

    <video autoplay='' muted='' class='blocks'>
        <source src='../../midia/videos/inicio tetris full.mp4' type='video/mp4'>
    </video>

    
    <?php
        /*if($_SESSION['video'] != true){
            $_SESSION['video'] = true;
            echo "<video autoplay='' muted='' class='blocks'>
                <source src='../../midia/videos/inicio tetris full.mp4' type='video/mp4'>
                </video>";
        }*/
    ?>
    

    <div class="content">
        <div class="content ">
            <div class="top ">
                <button class="login" onclick="loginModal();"> Entrar </button>
                <button class="register" onclick="registroModal();"> Registrar-se </button>
            </div>

            <!-- LOGIN -->
            <div id="fundo-modal-login" class="hide">
                <div class="modal">
                    <div id="content">
                        <!-- <div class="top"> -->
                        <h2>Entrar</h2>
                        <p class="exit" onclick="loginModal();">X</p>
                        <!-- </div> -->
                        <form action="../login/verifica.php" method="post">

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
                            <button class="button" onclick="loginModal();"><a href="home.php" id="registrar-login">Registrar-se</a></button>
                            <input type="submit" name="entrar" value="Entrar" id="submit">

                        </form>
                    </div>
                </div>
            </div>

            <!-- REGISTRO -->
            <div id="fundo-modal-registro" class="hide">
                <div class="modal" id="modal-registro">

                    <div id="content">
                        <h2>Registrar-se</h2>
                        <p class="exit" onclick="registroModal();">X</p>

                        <form action="home.php" method="post" enctype="multipart/form-data">

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
                                <label>Foto</label>
                                <input type="file" name="photo">
                            </div>

                            <div class="input-form">
                                <label for="country">País de origem</label>
                                <select id="select" name="country" required="required">
                                    <?php include("lista-paises.html"); ?>
                                </select>
                            </div>

                            <h6>Já tem uma conta?</h6>
                            <button class="button" onclick="loginModal();"><a href="home.php" id="registrar-login">Entrar</a></button>
                            <input type="submit" name="registrar" value="Registrar-se" id="submit">

                        </form>



                    </div>
                </div>
            </div>

            <!-- CADASTRO/LOGIN -->
            <?php
                if ($_POST["acao"] == "cadastrar"){
                    $consulta = "SELECT user FROM users WHERE user = '{$_POST['email']}'";
                    $existe = mysqli_query($connection, $consulta);
                    $res_existe = mysqli_num_rows($existe);
                    if ($res_existe > 0){
                        echo "<script>alert('Este usuário já existe')</script>";
                    }else{
                        $insert = "INSERT INTO users(idUser, user, password) VALUES('', '" . $_POST["email"] . "', md5('" . $_POST["password"] . "'))";
                        $res_inserir = mysqli_query($connection, $insert);

                        // Fazendo o upload da imagem
                        if($_FILES["photo"]["name"] != ""){
                            $arquivo = $_FILES["photo"];

                            // Pega extensão do arquivo
                            $ext = explode(".", $arquivo["name"]);

                            // Gera um nome único para a imagem
                            $novo_nome = md5(uniqid(time())).".".$ext[1];

                            // Caminho de onde a imagem ficará
                            $imagem_dir = "../../midia/images/users/" . $novo_nome;

                            // Faz o upload da imagem
                            move_uploaded_file($arquivo["tmp_name"], $imagem_dir);

                            $nome_imagem = $novo_nome;
                        } else{
                            // Define uma imagem padrão se o usuário não selecionou
                            $nome_imagem = "user_padrao.png";
                        }

                        $idUser = "SELECT MAX(idUser) AS ID FROM users";
                        $resID = mysqli_query($connection, $idUser);
                        $dadosID = mysqli_fetch_array($resID);

                        $insert2 = "INSERT INTO profile(idProfile, name, nickname, email, country, birthday, users_idUser, photo)
                                    VALUES ('',
                                            '" . $_POST["name"] . "',
                                            '" . $_POST["nickname"] . "',
                                            '" . $_POST["email"] . "',
                                            '" . $_POST["country"] . "',
                                            '" . $_POST["birthday"] . "',
                                            '" . $dadosID["ID"] . "',
                                            '$nome_imagem'
                                    )";
                        $res_inserir2 = mysqli_query($connection, $insert2);

                        if ($res_inserir && $res_inserir2){
                            //echo "<div class='alert alert-info'>Cliente cadastrado com <b>sucesso</b> no BD!</div>";
                        }else{
                            echo "<script>alert('Erro ao cadastrar usuário!')</script>";
                        }
                    }
                }

                if ($_POST["acao"] == "login"){
                    include '../login/verifica.php';
                }
            ?>

            <div class="title ">
                <h1 class="text "> CODE TO PLAY</h1>
            </div>
            <div class="subtitle ">
                <h5>Divirta-se programando</h5>
            </div>
        </div>


        <div class="footer ">
            <div class="about ">
                <h2> Sobre o Projeto... </h2>
                <p>O projeto Code to Play tem como objetivo principal incentivar e promover a aprendizagem da programação de computadores, bem como do uso de suas estruturas lógicas, tal abordagem justifica-se pela importância que tem o conhecimento tecnológico,
                    com foco na infância e juventude, onde começa a se desenhar o caminho que será seguido pelos jovens e pelas crianças. Apresentá-los ao mundo da programação e como são implementadas feitas as tecnologias usadas em seu cotidiano, mostra
                    que há um vasto leque de opções a serem seguidas. Onde qualquer um pode desenvolver suas próprias ideias e apresentá-las ao mundo como soluções de diversos tipos de problemas. E assim, fazer a diferença.
                </p>
            </div>
            <div class="video ">
            </div>
        </div>
</body>
</html>