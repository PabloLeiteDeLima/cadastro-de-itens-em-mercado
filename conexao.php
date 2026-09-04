<?php

// CLASSE PARA CONEXÃO...
$host = "localhost";
$porta = '3307';
$user = "root";
$pass = "";
$dbname = "mecado";

try{

    $conn = new PDO("mysql:host=$host;port=$porta;dbname=$dbname", $user, $pass);
    //echo "Conexão efetuada com sucesso.";  // Testando a conexão.

}catch(PDOException $e){

    echo "Erro na conexão!<br>Código". $e->getCode() . "<br>Mensagem: " . $e->getMessage();

}

?>