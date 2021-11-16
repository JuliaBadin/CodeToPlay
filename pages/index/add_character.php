<?php
    session_start();
    include "../../database/connect_db_php.php";

    $idtoadd = $_POST['idcharacter'];
    $nametoadd = $_POST['namecharacter'];

    $insert = "INSERT INTO project_has_characters(project_idProject, characters_idCharacter, characters_NameCharacter)
    VALUES('".$_SESSION['idProject']."','". $idtoadd ."','". $nametoadd . "')";
    
    $res_inserir = mysqli_query($connection, $insert);
    if ($res_inserir){
        //echo "<script>alert('Funfou!')</script>";
    }else{
        //echo "<script>alert('Erro ao selecionar personagem!')</script>"; sempre dá erro mesmo que funcione, não sei pq
    }

    //echo "<script language='javascript' type='text/javascript'> window.location='index.php'</script>";
?>