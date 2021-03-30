birthday<?php
session_start();

if(isset($_POST["submit"])){
$_SESSION["email"] = $_POST["email"];
$_SESSION["password"] = $_POST["password"];
$_SESSION["name"] = $_POST["name"];
$_SESSION["nickname"] = $_POST["nickname"];
$_SESSION["birthday"] = $_POST["birthday"];
$_SESSION["Pais"] = $_POST["Pais"];
$_SESSION["photo"] = $_POST["photo"];
$_SESSION["bio"] = $_POST["bio"];
echo $_SESSION["email"];
echo"<br>";
echo $_SESSION["password"];
echo"<br>";
echo $_SESSION["name"];
echo"<br>";
echo $_SESSION["nickname"];
echo"<br>";
echo $_SESSION["birthday"];
echo"<br>";
echo $_SESSION["Pais"];
echo"<br>";
echo $_SESSION["bio"];
echo"<br>";
echo $_SESSION["photo"];
}
?>
