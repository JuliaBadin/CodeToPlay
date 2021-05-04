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
        <div class="content profile-edit">

            <?php
                $checa_user = "SELECT * FROM profile WHERE users_idUser = '{$_SESSION['idUser']}'";
                $verifica = mysqli_query($connection, $checa_user);
                $fetch_usuario = mysqli_fetch_array($verifica);
            ?>

            <form action="dataEdit.php" method="post" enctype="multipart/form-data">
                <img src="../../midia/images/users/<?php echo($fetch_usuario['photo']);?>" alt="profile picture" class="profile_picture">
                <label for="file">Imagem de perfil:</label>
                <input type="file" name="photo"><br>

                <label for="bio">Bio:</label>
                <textarea name="bio" rows="8" cols="80" id="bio"><?php echo($fetch_usuario['bio']);?></textarea>

                <label for="name">Nome:</label>
                <input type="text" name="name" id="name" value="<?php echo($fetch_usuario['name']);?>"><br>

                <label for="nickname">Apelido:</label>
                <input type="text" name="nickname" id="nickname" value="<?php echo($fetch_usuario['nickname']);?>"> <br>

                <label for="birthday">Data de Nascimento:</label>
                <input type="date" name="birthday" id="birthday" value="<?php echo($fetch_usuario['birthday']);?>"> <br>

                <label for="email">E-mail:</label>
                <input type="email" name="email" id="email" value="<?php echo($fetch_usuario['email']);?>"><br>

                <label for="country">País:</label>
                <select name="country" value="<?php echo($fetch_usuario['country']);?>">
                  <?php include("../home/lista-paises.html"); ?>
                </select>

                <input type="hidden" name="idProfile" value="<?php echo($fetch_usuario['idProfile']);?>">

                <input type="hidden" name="acao" value="update">

                <input type="submit" name="submit" value="Salvar" class="edit submit">
                <button class="edit cancel"><a href="profile.html">Voltar</a></button>
                <!-- <input type="button" name="cancel" class="edit cancel" value="cancelar"> -->
            </form>

            <!-- UPDATE PERFIL -->
            <?php
                if($_POST["acao"]=="update"){
                    
                    $consulta = "SELECT * FROM profile WHERE idProfile = ".$_POST["idProfile"].";";
                    $res_consulta = mysqli_query($connection, $consulta);
                    $dados = mysqli_fetch_array($res_consulta); 

                    $consulta_existe = "SELECT user FROM users WHERE user = '{$_POST['email']}'";
                    $existe = mysqli_query($connection, $consulta);
                    $res_existe = mysqli_num_rows($existe);

                    if ($res_existe > 0 && $dados['email'] != $_POST['email']){
                        echo "<script>alert('Este email já está em uso!')</script>";
                    }else{
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
                        }else{
                            // Mantém a imagem anterior se o usuário não selecionou
                            $nome_imagem = $fetch_usuario['photo'];
                        }
    
                        $altera = "UPDATE profile SET
                            name = '".$_POST["name"]."',
                            email = '".$_POST["email"]."',
                            country = '".$_POST["country"]."',
                            photo = '".$nome_imagem."',
                            nickname = '".$_POST["nickname"]."',
                            bio = '".$_POST["bio"]."',
                            birthday = '".$_POST["birthday"]."',
                            photo = '".$nome_imagem."'
                        WHERE idProfile = ".$_POST["idProfile"].";";
    
                        $res_altera = mysqli_query($connection, $altera);
    
                        if($res_altera){
                            //echo "<div class='alert alert-info'>Cliente alterado com <b>sucesso</b> no BD!</div>";
                            echo "<script language='javascript' type='text/javascript'> window.location='profile.php'</script>";
                        } else {
                            echo "<div class='alert alert-warning'><b>Erro</b> ao alterar o Perfil!<br>".$altera."</div>";
                        }
                    }
                }                    
            ?>
        </div>

        <?php  "../padroes/footer.php"; ?>

    </section>

    <script type="text/javascript" src="../../js/profile.js"></script>
</body>

</html>
