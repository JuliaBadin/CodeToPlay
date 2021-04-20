<?php
    if ($_SESSION['logado'] != true ) {
        echo "<script language='javascript' type='text/javascript'> alert('Faça login para continuar');
        window.location='../home/home.php'</script>";
    }
?>