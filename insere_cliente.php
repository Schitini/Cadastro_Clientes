<?php

	require_once('db.class.php');

	$objDB = new db();
	$link = $objDB->conecta_mysql();

	
	$nome = $_POST ['nome'];
	$email = $_POST ['email'];
	$cpf = $_POST ['cpf'];
	$telefone = $_POST ['telefone'];

	$nome_existe = false;
	$email_existe = false;
	$cpf_existe = false;


	$sql = " select * from clientes where nome = '$nome' ";
	if($resultado_id = mysqli_query($link, $sql)){

		$dados_usuario = mysqli_fetch_array($resultado_id);

		if(isset($dados_usuario['nome'])){
			$nome_existe = true;
		}
	}
	else{
		echo "Erro ao tentar localizar o registro de nome";
	}

	if($nome_existe){
		$retorno_get = '';

		if($nome_existe){
			$retorno_get.= "erro_nome=1&";
		}

		header('location: cadastro.php?'.$retorno_get);
		die();
	}


	$sql = " select * from clientes where email = '$email' ";
	if($resultado_id = mysqli_query($link, $sql)){

		$dados_usuario = mysqli_fetch_array($resultado_id);

		if(isset($dados_usuario['email'])){
			$email_existe = true;
		}
	}
	else{
		echo "Erro ao tentar localizar o registro de email";
	}

	if($email_existe){

		$retorno_get = '';

		if($email_existe){
			$retorno_get.= "erro_email=1&";
		}

		header('location: cadastro.php?'.$retorno_get);
		die();
	}


	$sql = " select * from clientes where cpf = '$cpf' ";
	if($resultado_id = mysqli_query($link, $sql)){

		$dados_usuario = mysqli_fetch_array($resultado_id);

		if(isset($dados_usuario['cpf'])){
			$cpf_existe = true;
		}
	}
	else{
		echo "Erro ao tentar localizar o registro de cpf";
	}

	if($cpf_existe){

		$retorno_get = '';

		if($cpf_existe){
			$retorno_get.= "erro_cpf=1&";
		}

		header('location: cadastro.php?'.$retorno_get);
		die();
	}


	$sql = "INSERT INTO clientes (id, nome, email, cpf, telefone)
	VALUES (' ','$nome', '$email', '$cpf', '$telefone')";

	if(mysqli_query($link, $sql)){
		header('location: cadastro.php');
	}
	else{
		echo "Erro ao registrar o usuário!";
	}
?>