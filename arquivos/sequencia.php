<?php
    session_start();
    include "../database/connect_db_php.php";

    $namephp = $_GET['retornaID'];
    $valores = $_GET['retornaValores'];

    $consulta = "SELECT * FROM project WHERE users_idUser = '{$_SESSION['idUser']}'";
    $verifica = mysqli_query($connection, $consulta);
    $fetch_usuario = mysqli_fetch_array($verifica);
    $res_verifica = mysqli_num_rows($verifica);

    if ($res_verifica > 0){
        $newseq = $fetch_usuario['sequencia'] . $namephp;
        $newval = $fetch_usuario['valores_seq'] . $valores;

        $insert = "UPDATE project SET sequencia = '".$newseq."', valores_seq = '".$newval."'
        WHERE users_idUser = '".$_SESSION["idUser"]."'";
        $res_inserir = mysqli_query($connection, $insert);

        if ($res_inserir){
            //echo "<script>alert('Funfou att!')</script>";
        }else{
            echo "<script>alert('Erro ao salvar!')</script>";
        }
    }else{
        $insert = "INSERT INTO project(sequencia, valores_seq, users_idUser) VALUES('".$namephp."','".$valores."','".$_SESSION['idUser']."')";
        $res_inserir = mysqli_query($connection, $insert);
        
        if ($res_inserir){
            //echo "<script>alert('Funfou!')</script>";
        }else{
            echo "<script>alert('Erro ao salvar!')</script>";
        }
    }
    
    $_SESSION['idProject'] = $fetch_usuario['idProject'];
    echo "<script language='javascript' type='text/javascript'> window.location='../pages/index/index.php'</script>";
?>