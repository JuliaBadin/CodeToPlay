<?php

include "../database/connect_db_php.php";

//testa conexão com o banco
if($connection){
    echo "Succesful connection ";
}
else{
    die ("Connection failed" . mysqli_connect_error());
}

session_start();

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
