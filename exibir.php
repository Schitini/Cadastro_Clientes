<?php
	require_once('db.class.php');

	$objDB = new db();
	$link = $objDB->conecta_mysql(); 
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Tabela de Clientes</title>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <!-- bootstrap - link cdn -->
    <script src="./bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <link href="style.css" rel="stylesheet">
    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
    

    <script type="text/javascript">
    $(document).ready(function() {

        $.ajax({
            url: 'listar_cliente.php',
            success: function(data) {
                $('#clientes').html(data);

                $('.btn_alterar').click('a[data-role=update]', function() {
                    var id = $(this).data('id');
                    var nome = $('#' + id).children('td[data-target=nome]').text();
                    var email = $('#' + id).children('td[data-target=email]').text();
                    var cpf = $('#' + id).children('td[data-target=cpf]').text();
                    var telefone = $('#' + id).children('td[data-target=telefone]').text();

                    $('#nome').val(nome);
                    $('#email').val(email);
                    $('#cpf').val(cpf);
                    $('#telefone').val(telefone);
                    $('#userId').val(id);
                    $('#myModal').modal('toggle');
                });

                $('#save').click(function() {
                    var id = $('#userId').val();
                    var nome = $('#nome').val();
                    var email = $('#email').val();
                    var cpf = $('#cpf').val();
                    var telefone = $('#telefone').val();

                    $.ajax({
                        url: 'altera_cliente.php',
                        method: 'post',
                        data: {
                            nome: nome,
                            email: email,
                            cpf: cpf,
                            telefone: telefone,
                            id: id
                        },
                        success: function(response) {
                            
                            alert('Cliente Alterado com Sucesso!');
                            mostraLista();
                        }
                    });
                });

                $('.btn_remover').click(function() {
                    var id = $(this).data('id');

                    $.ajax({
                        url: 'remove_cliente.php',
                        method: 'post',
                        data: {
                            id_remover_cliente: id
                        },
                        success: function(data) {
                            alert('Cliente removido com sucesso!');
                            
                        }
                    });
                });
            }
        });


        function mostraLista() {
            $.ajax({
                url: 'listar_cliente.php',
                success: function(data) {
                    $('#clientes').html(data);
                }
            });
        }
    });
    </script>

</head>

<body>

    <div class="container">
    <div class="col-md-12">
        <a href="cadastro.php">Home</a>
    </div>
        <div class="col-md-12">
            <div id="clientes" class="list-group">

            </div>
        </div>
    </div>


    <!-- Trigger/Open The Modal -->


    <!-- The Modal -->
    <div id="myModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <a href="exibir.php"><span class="close">&times;</span></a>
            <h2>Alterar Cadastro</h2>

            <div class="modal-body">
                <div class="form-group">
                    <p>Nome: </p>
                    <input type="text" id="nome" class="form-control">
                </div>
                <div class="form-group">
                    <p>E-mail: </p>
                    <input type="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <p>CPF: </p>
                    <input type="text" id="cpf" class="form-control">
                </div>
                <div class="form-group">
                    <p>Telefone: </p>
                    <input type="text" id="telefone" class="form-control">
                </div>
                <input type="hidden" id="userId" class="form-control">
            </div>
            <div class="modal-footer" style="display:flex; justify-content:center;">
                <a href="exibir.php" id="save" class="btn btn-primary pull-right">Alterar</a>
                <a href="exibir.php" class="btn btn-default">Fechar</a>
            </div>
        </div>
    </div>

    <script>
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on the button, open the modal

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>

</html>