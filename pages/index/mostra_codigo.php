<style>
    body{
        background: #000;
        color: #fff;
    }
</style>

<?php
    session_start();
    include "../../database/connect_db_php.php";

    $le_sequencia = "SELECT sequencia, valores_seq FROM project WHERE users_idUser = '{$_SESSION['idUser']}'";
    $verifica_sequencia = mysqli_query($connection, $le_sequencia);
    $fetch_sequencia = mysqli_fetch_array($verifica_sequencia);
    $verifica = mysqli_num_rows($verifica_sequencia);

    if($verifica > 0){
        $array_funcoes = (explode("\n",$fetch_sequencia['sequencia'])); //tira \n
        $array_funcoes = array_map('trim', $array_funcoes); //tira espaços
        $array_funcoes = array_filter($array_funcoes); //tira elementos nulo ou vazio

        //funções
        $le_funcoes = "SELECT * FROM functions";
        $verifica_funcoes = mysqli_query($connection, $le_funcoes);
        $fetch_funcoes = mysqli_fetch_array($verifica_funcoes);

        while($fetch_funcoes = mysqli_fetch_array($verifica_funcoes)){
            foreach ($array_funcoes as $i => $value){  
                if($fetch_funcoes['id_function'] == $value){
                    //$array_codigo = $fetch_funcoes['code'] . "<br>";
                    echo htmlentities($fetch_funcoes['code']) . "<br><br>";
                }
            }
        }
    }
?>