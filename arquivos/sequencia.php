<?php
    session_start();
    include "../database/connect_db_php.php";

    $namephp = $_GET['retornaID'];
    /*$arquivo = fopen('sequencia.txt', 'a+');

    if ($arquivo) {
        fwrite($arquivo, $namephp);
    }
    fclose($arquivo);*/

    $consulta = "SELECT users_idUser FROM project WHERE users_idUser = '{$_SESSION['idUser']}'";
                    $existe = mysqli_query($connection, $consulta);
                    $res_existe = mysqli_num_rows($existe);
                    
                    if ($res_existe > 0){
                        $checa_sequencia = "SELECT sequencia FROM project WHERE users_idUser = '{$_SESSION['idUser']}'";
                        $verifica = mysqli_query($connection, $checa_sequencia);
                        $fetch_usuario = mysqli_fetch_array($verifica);
                        
                        $newseq = $fetch_usuario['sequencia'] . $namephp;
                        echo $newseq;

                        $insert = "UPDATE project SET sequencia = '".$newseq."'
                        WHERE users_idUser = '".$_SESSION["idUser"]."'";

                        $res_inserir = mysqli_query($connection, $insert);
                        if ($res_inserir){
                            //echo "<script>alert('Funfou att!')</script>";
                        }else{
                            echo "<script>alert('Erro ao salvar!')</script>";
                        }
                    }else{
                        $insert = "INSERT INTO project(sequencia, users_idUser) VALUES('".$namephp."','".$_SESSION['idUser']."')";
                        $res_inserir = mysqli_query($connection, $insert);
                        if ($res_inserir){
                            //echo "<script>alert('Funfou!')</script>";
                        }else{
                            echo "<script>alert('Erro ao salvar!')</script>";
                        }
                    }
?>