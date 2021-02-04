<?php 

include('config.php');

if(empty(BASE_URL)){
    $config_msg_url = "<p>Abra o arquivo <b>config.php</b> informe a URL base do sistema.</p>";
}

if(empty(DBNAME) || empty(HOST) || empty(USER) ){
    $config_msg_db = "<p>Abra o arquivo <b>config.php</b> e verifique se os dados para acesso ao banco de dados foram preenchidos corretamente.</p>";
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cadastro de Funcionários</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/bootstrap/bootstrap.min.css">

    <!-- sweetalert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.14.0/dist/sweetalert2.min.css">

</head>

<body class="bg-light">
    <header>
        <nav class="navbar navbar-light bg-info">
            <div class="container">
                <span class="navbar-brand mb-0 h1 text-white"> <i class="fas fa-user-plus" aria-hidden="true"></i>
                    Cadastro de Funcionários</span>
            </div>
        </nav>
    </header>

    <main role="main">
        <div class="py-5">
            <div class="container">
                <?php
                    if(isset($config_msg_url)){
                    
                        echo "<div class='alert alert-info alert-dismissible fade show' role='alert'>
                        <strong>Configuração:</strong> $config_msg_url
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                        </button>
                        </div>";
                    }

                    if(isset($config_msg_db)){
                    
                        echo "<div class='alert alert-info alert-dismissible fade show' role='alert'>
                        <strong>Configuração:</strong> $config_msg_db
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                        </button>
                        </div>";
                    }
                ?>
                <div class="card" id="conteudo">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            <i class="fas fa-users"></i> Funcionários Cadastrados
                        </div>
                        <div class="">
                            <button type="button" class="btn btn-success" data-toggle="modal"
                                data-target="#addFuncModal"><i class=" fas fa-plus"></i>
                                Cadastrar Funcionário</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div id="table-data">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </main>

    <!--START MODAL FUNCIONÁRIO-->
    <div id="addFuncModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addFuncModalLabel"><i class="fas fa-user-plus"></i> Adicionar
                        Funcionário</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form method="post" id="addForm">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Nome</label>
                                <input type="text" class="form-control " id="nome" name="nome"
                                    placeholder="Nome completo" required>
                                <div class="invalid-feedback">
                                    Por favor, digite seu nome.
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">CPF</label>
                                <input type="text" class="form-control" id="cpf" name="cpf" aria-describedby="cpfHelp"
                                    placeholder="" required>
                                <div class="invalid-feedback">
                                    Por favor, digite o CPF.
                                </div>
                                <small id="cpfHelp" class="form-text text-muted">Digite apenas números.</small>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Data de Nascimento</label>
                                <input name="data_nascimento" type="text" class="form-control" id="data"
                                    aria-describedby="cpfHelp" placeholder=" 00/00/0000" required>
                                <small id="dataHelp" class="form-text text-muted">Digite apenas números.</small>
                                <div class="invalid-feedback">
                                    Por favor, digite a data de nascimento.
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="">Genêro</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="genero" id="sexo1"
                                        value="Masculino" required checked>
                                    <label class="form-check-label" for="sexo1">
                                        Masculino
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="genero" id="sexo2"
                                        value="Feminino" required>
                                    <label class="form-check-label" for="sexo2">
                                        Feminino
                                    </label>
                                </div>
                            </div>
                        </div>

                        <input type="submit" class="btn btn-success btn-block mt-3" id="save-button" value="Cadastrar">
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!--END MODAL FUNCIONARIO-->

</body>


<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="assets/js/jquery-3.5.1.min.js"></script>

<!--Bootstrap JS -->
<script src="<?= BASE_URL ?>assets/js/bootstrap/bootstrap.min.js"></script>

<!--sweetalert-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.14.0/dist/sweetalert2.all.min.js"></script>

<!--sweetalert-->
<script src="https://kit.fontawesome.com/2975e02981.js" crossorigin="anonymous"></script>

<!--jquery mask-->
<script src="assets/js/jquery-mask/jquery.mask.min.js"></script>


<script>
$(document).ready(function() {

    //carrega  e exibe os funcionarios cadastrados
    function loadTable() {
        $.ajax({
            url: "<?=BASE_URL?>app/load.php",
            type: "POST",

            success: function(data) {
                $("#table-data").html(data);
            }
        })
    }
    loadTable();

    //insere um novo funcionario
    $("#save-button").on("click", function(e) {

        e.preventDefault();

        $('#addForm [required]').each(function(i, o) {
            if (!$(o).val().length) {
                $(o).addClass('is-invalid');
            } else {
                $(o).removeClass('is-invalid');
            }
        });

        let data = $('#addForm').serialize();

        swal.showLoading();
        $("#save-button").prop('disabled', true);
        $("#save-button").val("Aguarde...");

        $.ajax({

            url: "<?=BASE_URL?>app/insert.php",
            type: "POST",
            data: data,
            success: function(response) {

                swal.close();
                $("#save-button").prop('disabled', false);
                $("#save-button").val("Cadastrar");

                if (response == 1) {
                    Swal.fire(
                        'Tudo certo!',
                        'Cadastro realizado com sucesso!',
                        'success'
                    )
                    loadTable();

                    $("#addForm").trigger("reset");
                    $('#addFuncModal').modal('hide');

                } else if (response == 2) {
                    Swal.fire(
                        'Oops',
                        'Verifique se você preencheu todos os dados corretamente.',
                        'warning'
                    )
                } else {
                    Swal.fire(
                        'Oops',
                        'Não foi possivel efetuar o cadastro, se o erro persistir entre em contato com o administrador.',
                        'error'
                    )
                }
            }
        });


    })

    //deleta p funcionario
    $(document).on("click", "#btn-delete", function() {

        var funcId = $(this).data("id");
        var funcNome = $(this).data("nome");
        var element = this;

        Swal.fire({

            title: 'Deseja realmente excluir o funcionário ' + funcNome + '?',
            showDenyButton: true,
            confirmButtonText: `Excluir`,
            denyButtonText: `Cancelar`,

        }).then((result) => {

            if (result.isConfirmed) {

                $.ajax({

                    url: "<?=BASE_URL?>app/delete.php",
                    type: "POST",
                    data: {
                        id: funcId
                    },

                    success: function(response) {
                        if (response == 1) {

                            Swal.fire('Excluido com sucesso!', '', 'success')
                            $(element).closest("tr").fadeOut();
                            loadTable();
                        } else {
                            Swal.fire(
                                'Oops',
                                'Houve um erro ao excluir o funcionário',
                                'error'
                            )
                        }
                    }
                })
            }
        })

    });
});


//adiciona mascara ao campo CPF e ao campo data de nascimento
$(document).ready(function() {
    $('#data').mask('00/00/0000');
    $('#cpf').mask('000.000.000-00', {
        reverse: true
    });
});
</script>

</html>