<?php

	require_once('db.class.php');	

	$objDB = new db();
	$link = $objDB->conecta_mysql();

	$erro_nome = isset($_GET['erro_nome']) ? $_GET['erro_nome'] : 0;
	$erro_email = isset($_GET['erro_email']) ? $_GET['erro_email'] : 0;
	$erro_cpf = isset($_GET['erro_cpf']) ? $_GET['erro_cpf'] : 0;
	
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Cadastro</title>

    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <link href="index_style.css" rel="stylesheet">
    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <script type="text/javascript">
    

    $(document).ready(function(){
        $('#btn_cadastrar').click(function(){
        var campo_vazio = false;

          if ($('#campo_nome').val() == ''){
            $('#campo_nome').css({'border-color':' #A94442'});
            alert('O campo nome é obrigatório!');
            campo_vazio = true;
          }
          else{
            $('#campo_nome').css({'border-color':' #CCC'});
          }
          if($('#campo_email').val() == ''){
            $('#campo_email').css({'border-color':' #A94442'});
            alert('O campo email é obrigatório!');
            campo_vazio = true;
          }
          else{
            $('#campo_email').css({'border-color':' #CCC'});
          }
          if($('#campo_cpf').val() == ''){
            $('#campo_cpf').css({'border-color':' #A94442'});
            alert('O campo cpf é obrigatório!');
            campo_vazio = true;
          }
          else{
            $('#campo_cpf').css({'border-color':' #CCC'});
          }

          if (campo_vazio) return false;
        });
    })

    </script>


</head>

<body>

    <div class="container">
        <div class="col-md-12">
            <form id="cadastro" method="post" action="insere_cliente.php">
                <div>
                    <div class="teste">
                        <input type="text" class="form-control" id="campo_nome" name="nome" placeholder="Nome Completo: " />
                        <span class="cor"> *</span>

                        <?php
                          if($erro_nome){
                            echo '<font style="color:#FF0000">Nome já cadastrado!</font>';
                          }
                        ?>
                    </div>

                    <div class="teste">
                        <input type="email" class="form-control" id="campo_email" name="email" placeholder="E-mail: " />
                        <span class="cor"> *</span>
                        <?php
                          if($erro_email){
                            echo '<font style="color:#FF0000">E-mail já cadastrado!</font>';
                          }
					              ?>
                    </div>

                    <div class="teste">
                        <input type="text" class="form-control" id="campo_cpf" name="cpf" placeholder="CPF: " />
                        <span class="cor"> *</span>
                        <?php
                          if($erro_cpf){
                            echo '<font style="color:#FF0000">CPF já cadastrado!</font>';
                          }
					              ?>
                    </div>

                    <div class="teste1">
                        <input type="text" class="form-control" name="telefone" placeholder="Telefone: ">
                    </div>

                    <div>
                        <p class="cor">* Dados Obrigatórios</p>
                    </div>

                    <div>
                        <button type="submit" id="btn_cadastrar" class="btn btn-primary teste2">Cadastrar Cliente</button>
                        <a href="exibir.php" class="btn btn-default teste2">Listar Clientes</a>
                    </div>      
            </form>   
        </div>        
    </div>
</body>

</html>