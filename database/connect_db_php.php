<?php

//cria conexão com o banco
$host = "localhost:3306";
$user = "root";
$pass = "";
$db = "CodeToPlay";


/*testa conexão com o banco
if($connection){
    echo "Succesful connection ";
}
else{
    die ("Connection failed" . mysqli_connect_error());
}*/

$connection = mysqli_connect($host, $user, $pass, $db);

       /*  $insert = "INSERT INTO sounds(idSound, name, link)
                        VALUES('', 'Zombie 3', '../midia/souds/zombie_3.mp3')";

            $res_inserir = mysqli_query($connection, $insert);
            if($res_inserir){
                echo 'Dados inseridos com sucesso!';
            } else {
                echo 'Dados não inseridos';
            } */

            $consulta = "SELECT * FROM sounds";
            $res_consulta = mysqli_query($connection, $consulta);
            
            while ($dados = mysqli_fetch_array($res_consulta)){
                echo "<p>ID: ".$dados["idSound"] .  "<br>Nome: " . $dados["name"] .  "</p><br>link: <audio> <source src = '" . $dados["link"] . "'></audio><br><br>";
            }
/*
characters
fazer png: 5 6 18 41 58 59 61 62 63
cortar: 33 a 39

   scenarios
cortar: 41

 /*
?>