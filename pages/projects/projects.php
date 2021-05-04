<!DOCTYPE html>
<html lang="pt-br">

<?php session_start();
    include "../padroes/header.php"; ?>

<body>
    <link rel="stylesheet" type="text/css" href="../../css/projects.css">
    <?php
        include "../../database/connect_db_php.php";
        include '../login/redirect.php';
    ?>

    <section class="centro">
        <div class="myProjects">
            <h1>Meus Projetos </h1>
            <div class="wrapper">
                <div class="item">
                </div>
                <div class="item">
                </div>
                <div class="item">
                </div>
                <div class="item">
                </div>
                <div class="item">
                </div>
                <div class="item">
                </div>
                <div class="item">
                </div>
                <div class="item">
                </div>
            </div>
        </div>
    </section>

    <?php  "../padroes/footer.php"; ?>
    <script type="text/javascript" src="../../js/projects.js"></script>
</body>

</html>