<?php
session_start();

include "../database/connect_db_php.php";
$connection = mysqli_connect($host, $user, $pass, $db);

//cadastro
$login = $_POST['name'];
$password = MD5($_POST['password']);

$query_select = "SELECT name FROM users WHERE login = '$login'";
$select = mysqli_query($query_select, $connection);
$array = mysqli_fetch_array($select);
$logarray = $array['login'];

        //confere se login foi digitado
    if($login == "" || $login == null){
        echo"<script language='javascript' type='text/javascript'>
        alert('O campo login deve ser preenchido');</script>";
    }else{
        //confere se o usuário já existe
      if($logarray == $login){
        echo"<script language='javascript' type='text/javascript'>
        alert('Esse login já existe');</script>";
        die();
      }else{
        //se não existe, cria usuário no banco
        $insert = ["INSERT INTO users(idUser, name, password) VALUES('', ' $login', '$password')",
                        "INSERT INTO profile(idProfile, name, surname, email, country, birthday, bio, users_idUser)
                        VALUES ('',
                                '" . $_POST['name'] . "',
                                '" . $_POST['password'] . "',
                                '" . $_POST['surname'] . "',
                                '" . $_POST['email'] . "',
                                '" . $_POST['country'] . "',
                                '" . $_POST['birthday'] . "',
                                '" . $_POST['bio'] . "',
                                #nao sei como faz isso em php ainda
                                ' users.idUser '
                                )"];

        $insert = mysqli_query($insert, $connection);

        //confere se foi inserido
        if($insert){
          echo"<script language='javascript' type='text/javascript'>
                alert('Usuário cadastrado com sucesso!')</script>";
        }else{
          echo"<script language='javascript' type='text/javascript'>
                alert('Ocorreu um erro no cadastro, tente novamente!');</script>";
        }
      }
    };


//login
$username = $_POST['name'];
$entrar = $_POST['entrar'];
$password = md5($_POST['password']);

  if (isset($entrar)) {
    $verifica = mysqli_query("SELECT * FROM users WHERE name = '$username' AND password = '$password'", $connection);
      if (mysqli_num_rows($verifica)<=0){
        echo"<script language='javascript' type='text/javascript'>
            alert('Login e/ou senha incorretos');</script>";
        die();
      }else{
        setcookie("username",$username);
        header("Location:../html page 1/page-1.php");
      }
}

//verifica o usuário está logado
$login_cookie = $_COOKIE['username'];
    if(isset($login_cookie)){
      echo"Bem-Vindo, $login_cookie <br>";
    }else{
      die();
      echo "script language='javascript' type='text/javascript'>
            alert('Faça login para utilizar o site!');</script>";
    };




    




    if(isset($_POST["Entrar"])){
        $_SESSION["email"] = $_POST["email"];
        $_SESSION["password"] = $_POST["password"];
        echo $_SESSION["email"];
        echo "<br>";
        echo $_SESSION["password"];
    }
    elseif(isset($_POST["registrar"])){
        $_SESSION["email"] = $_POST["email"];
        $_SESSION["password"] = $_POST["password"];
        $_SESSION["name"] = $_POST["name"];
        $_SESSION["nickname"] = $_POST["nickname"];
        $_SESSION["data_nascimento"] = $_POST["data_nascimento"];
        $_SESSION["Pais"] = $_POST["Pais"];
        echo $_SESSION["email"];
        echo"<br>";
        echo $_SESSION["password"];
        echo"<br>";
        echo $_SESSION["name"];
        echo"<br>";
        echo $_SESSION["nickname"];
        echo"<br>";
        echo $_SESSION["data_nascimento"];
        echo"<br>";
        echo $_SESSION["Pais"];
    }
?>
