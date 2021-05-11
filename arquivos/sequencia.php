<?php
    $namephp = $_GET['retornaID'];
    $arquivo = fopen('sequencia.txt', 'a+');
    
    if ($arquivo) {
        fwrite($arquivo, $namephp);
    }
    fclose($arquivo);
    echo "<script language='javascript' type='text/javascript'> window.location='../pages/index/index.php'</script>";
?>;