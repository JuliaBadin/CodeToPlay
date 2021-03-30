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
            <form action="getdata.php" method="post">

            <form action="../html page 1/page-1.html" method="post">

                <div class="input-form">
                    <label for="email">Email</label>
                    <input name="email" type="email" placeholder="exemplo@projeto.com">
                </div>

                <div class="input-form">
                    <label for="password">Senha</label>
                    <input name="password" type="password" placeholder="********">
                </div>

                <h6>Novo por aqui?</h6>
                <button class="button" onclick="loginModal();"><a href="#" id="registrar-login">Registrar-se</a></button>
                <input type="submit" name="Entrar" value="Entrar" id="submit">

            </form>
        </div>

    </div>
</div>

<div id="fundo-modal-registro" class="hide">
    <div class="modal" id="modal-registro">

        <div id="content">
            <h2>Registrar-se</h2>
            <p class="exit" onclick="registroModal();">X</p>
            <form action="getdata.php" method="post">
            <form action="login.php" method="post">

                <div class="input-form">
                    <label for="name">Seu nome completo</label>
                    <input name="name" type="text" placeholder="Fulano da Silva">
                </div>

                <div class="input-form">
                    <label for="email">Email</label>
                    <input name="email" type="email" placeholder="exemplo@projeto.com">
                </div>

                <div class="input-form">
                    <label for="nickname">Nome de usuário</label>
                    <input name="nickname" type="text" placeholder="Seu_Nome">
                </div>

                <div class="input-form">
                    <label for="password">Senha</label>
                    <input name="password" type="password" placeholder="********">
                </div>

                <div class="input-form">
                    <label for="data_nascimento">Data de nascimento</label>
                    <input name="data_nascimento" type="date" placeholder=" ">
                </div>

                <div class="input-form">
                    <label for="nacionalidade">País de origem</label>
                    <select  id="select" name=Pais>
                         <?php include("lista-paises.html"); ?>
                    </select>
                </div>

                <h6>Já tem uma conta?</h6>
                <button class="button" onclick="loginModal();"><a href="#" id="registrar-login">Entrar</a></button>
                <input type="submit" name="registrar" value="Registrar-se" id="submit">

            </form>
        </div>

    </div>
</div>

    <script type="text/javascript" src="loginScript.js"></script>
  </body>
</html>
