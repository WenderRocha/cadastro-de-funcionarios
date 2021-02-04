<?php

include("conn.php");

$funcId = $_POST["id"];

$smtp = $conn->prepare("DELETE FROM funcionarios WHERE id = {$funcId}");
if($smtp->execute()){
    echo 1;
}else{
    echo 0;
}