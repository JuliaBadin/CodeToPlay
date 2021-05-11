<?php
    session_start();
    include "../../database/connect_db_php.php";

    $idtoadd = $_POST['idscenario'];

    $insert = "INSERT INTO project_has_scenarios(project_idProject, scenarios_idScenario)
    VALUES('".$_SESSION['idProject']."','". $idtoadd ."')";
    
    $res_inserir = mysqli_query($connection, $insert);
    if ($res_inserir){
        //echo "<script>alert('Funfou!')</script>";
    }else{
        //echo "<script>alert('Erro ao selecionar plano de fundo!')</script>"; sempre dá erro mesmo que funcione, não sei pq
    }

    //echo "<script language='javascript' type='text/javascript'> window.location='index.php'</script>";
?>