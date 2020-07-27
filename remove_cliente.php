<?php

	require_once('db.class.php');

	$objDB = new db();
	$link = $objDB->conecta_mysql();

	$id_remover_cliente = $_POST['id_remover_cliente'];

	if($id_remover_cliente == ''){
		die();
	}

	$sql = " DELETE FROM clientes where id = $id_remover_cliente";

	mysqli_query($link, $sql);

?>