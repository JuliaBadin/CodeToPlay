<!DOCTYPE html>
<html lang="pt-br">

<?php session_start();
    include "../padroes/header.php"; ?>

<body>
    <link rel="stylesheet" type="text/css" href="../../css/profile.css">
    <?php
        include "../../database/connect_db_php.php";
        include '../login/redirect.php';
    ?>

    <section class="centro">
        <div class="content main">
            <div class="info">
                <?php
                    $checa_user = "SELECT * FROM profile WHERE users_idUser = '{$_SESSION['idUser']}'";
                    $verifica = mysqli_query($connection, $checa_user);
                    $fetch_usuario = mysqli_fetch_array($verifica);
                ?>
                <h1>Informações Pessoais</h1>
                <h2>Nome do Usuário: <?php echo($fetch_usuario['name']);?></h2>
                <h2>Apelido: <?php echo($fetch_usuario['nickname']);?></h2>
                <h2>Data de Nascimento: <?php echo($fetch_usuario['birthday']);?></h2>
                <h2>E-mail: <?php echo($fetch_usuario['email']);?></h2>
                <h2>País: <?php echo($fetch_usuario['country']);?></h2>
            </div>

            <!-- colocar class profile se quiser fundo preto -->
            <div class="profile">
                <div class="picture_content">
                    <img src="../../midia/images/users/<?php echo($fetch_usuario['photo']);?>" alt="profile picture" class="profile_picture">
                </div>
                <div class="username">
                    <h1><?php echo($fetch_usuario['name']);?></h1>
                </div>
                <div class="bio">
                    <h2><?php echo($fetch_usuario['bio']);?>
                    </h2>
                </div>
            </div>
        </div>
        <!--content-->

        <button class="edit"><a href="dataEdit.php">Editar Perfil</a></button>

        <?php  "../padroes/footer.php"; ?>

    </section>
    <!--fim do centro (conteudo)!-->

    <script type="text/javascript" src="../../js/profile.js"></script>
</body>

</html>