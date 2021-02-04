<?php

include("conn.php");

//recebe os dados
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
$genero = filter_input(INPUT_POST, 'genero', FILTER_SANITIZE_STRING);
$data_nascimento = filter_input(INPUT_POST, 'data_nascimento', FILTER_SANITIZE_STRING);

//verifica se os campos não foram preenchidos
if(empty($nome) || empty($cpf) || empty($genero) || empty($data_nascimento)){

	echo 2;
	
}else{

	//insere o funcionario no banco de dados
	$smtp = $conn->prepare("INSERT INTO funcionarios(tb_nome, tb_cpf, tb_genero, tb_data_nascimento) VALUES (:nome, :cpf, :genero, :data_nascimento)");
	$smtp->bindparam(":nome", $nome);
	$smtp->bindparam(":cpf", $cpf);
	$smtp->bindparam(":genero", $genero);
	$smtp->bindparam(":data_nascimento", $data_nascimento);

	if($smtp->execute()){
		echo 1;
	}else{
		echo 0;
	}
}