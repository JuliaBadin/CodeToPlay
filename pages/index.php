<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <script src="../js/index.js"></script>

        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600,700,900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700&display=swap" rel="stylesheet">

        <title>Projeto</title>

    </head>

    <body>

<div class="Wrapper">
        <?php include("login.php"); ?>
        <button onClick=loginModal() class="button" > Entrar</button>

        <?php include("registro.php"); ?>
        <button onClick=registroModal() class="button" > Registrar-se</button>
</div>


    </body>
</html>
