<?php

	require_once('db.class.php');

	$objDB = new db();
	$link = $objDB->conecta_mysql();

	if(isset($_POST['email'])){
		$nome = $_POST ['nome'];
		$email = $_POST ['email'];
		$cpf = $_POST ['cpf'];
		$telefone = $_POST ['telefone'];
		$id = $_POST ['id'];

		$sql = " UPDATE clientes SET nome = '$nome', email = '$email', cpf = '$cpf', telefone = '$telefone' where id = '$id'";

		mysqli_query($link, $sql);
	}
?>