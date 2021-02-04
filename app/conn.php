<?php

include('../config.php');

$host = HOST;
$dbname = DBNAME;
$user = USER;
$pass = PASS;

try{

    $conn = new PDO("mysql:host=$host;dbname=$dbname","$user", "$pass");
    return $conn;

}catch(PDOException $e){
    echo '<p> Erro ao conectar ao banco de dados: '.$e->getMessage().'</p>';
    die();
}
    