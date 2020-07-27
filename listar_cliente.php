<?php

	require_once('db.class.php');

	$objDB = new db();
	$link = $objDB->conecta_mysql();

	$sql = " SELECT id, nome, email, cpf, telefone FROM clientes";


	$resultado_id = mysqli_query($link, $sql);
	
	if($resultado_id){
		while ($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
			
			echo '<div><table border="1" width="32%" style="margin-top:10px; margin-bottom: 10px">';
				echo '<tbody data-id="'.$registro['id'].'"><tr>';
				echo '<td class="form-control" data-target="nome">Nome: '.$registro['nome'].'</td>';
				echo '</tr><tr>';
				echo '<td class="form-control" data-target="email">E-mail: '.$registro['email'].'</td>';
				echo '</tr><tr>';
				echo '<td class="form-control" data-target="cpf">CPF: '.$registro['cpf'].'</td>';
				echo '</tr><tr>';
				echo '<td class="form-control" data-target="telefone">Telefone: '.$registro['telefone'].'</td>';
				echo '</tr>';
				echo '<tr class="text-center"><td><button type="button" class="btn btn-primary btn_alterar" data-role="update" data-id="'.$registro['id'].'">Alterar Cliente</button></td></tr>';
				echo '<tr class="text-center"><td><a href="exibir.php" class="btn btn-danger btn_remover" data-id="'.$registro['id'].'">Remover Cliente</a></td></tr>';
			echo '</div>';	

		}
	}
	else{
		echo "Erro na consulta de tweets do banco de dados!";
	}
?>