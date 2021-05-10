<?php
    
    //$namephp = "<script>document.write(namejs)</script>";
    $namephp = 4;
    //$arquivo = fopen('sequencia.js', 'a+');
    if ($arquivo) {
        fwrite($arquivo, $namephp . "\n");
    }
    fclose($arquivo);
?>;