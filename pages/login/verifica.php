<?php
    session_start();

    include "../../database/connect_db_php.php";

    if($connection){
        //echo "Succesful connection";
    }else{
        die ("Falha na conexão " . mysqli_connect_error());
    }

    // Variável que verifica se o usuário está logado
    if (!isset($_SESSION['logado'])){
        $_SESSION['logado'] = false;
    }

    // Une $_SESSION e $POST para verificação
    if (isset($_POST) && ! empty($_POST)) {
        $dados['email'] = $_POST["email"];
        $dados['password'] = $_POST["password"];
    }else{
        $dados = $_SESSION;
    }

    if(isset ($dados) && ! empty ($dados)){
        // Faz a consulta do nome de usuário na base de dados
        $checa_user = "SELECT * FROM users WHERE user = '{$dados['email']}'";
        $verifica = mysqli_query($connection, $checa_user);

        // Busca os dados da linha encontrada
        $fetch_usuario = mysqli_fetch_array($verifica);
        
        // Verifica se a consulta foi realizada com sucesso
        if (!$verifica){
            //printf("Error: %s\n", mysqli_error($connection));
            echo "<script>alert('Erro de verificação')</script>";
        }
        
        // Verifica se a senha do usuário está correta
        if (md5($dados['password']) == $fetch_usuario['password']){
            $_SESSION['logado'] = true;
            $_SESSION['user'] = $fetch_usuario['user'];
            $_SESSION['idUser'] = $fetch_usuario['idUser'];

            //echo"<script language='javascript' type='text/javascript'> alert('Logado com Sucesso');</script>";
            header('location: ../index/index.php');

        }else{
            // Continua deslogado
            $_SESSION['logado'] = false;
            $senha = $dados['password'];

            echo "<script language='javascript' type='text/javascript'> alert('Usuário e/ou senha incorretos');
                    window.location='../home/home.php'</script>";
        }
    }else{
        echo"<script language='javascript' type='text/javascript'> alert('Erro');</script>";
    }
?>