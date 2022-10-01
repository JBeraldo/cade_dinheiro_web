<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Projeto Teste</title>
    <!-- CSS only -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    <!-- JavaScript Bundle with Popper -->
    <style>
        .btn-block {
            display: block;
        }
    </style>
</head>

<body>
    <?php
include '../../widgets/header.php';
?>


    <div style="margin-top: 70px" class="container">

        <div class="row">
            <div class="col-md-8">
                <h2>Lista de Transações</h2>
            </div>
            <div class="col-md-4">
                <a href="create.php" class="btn btn-primary btn-block">Nova</a>
            </div>

        </div>

        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <th class="text-center">ID</th>
                        <th class="text-center">Nome</th>
                        <th class="text-center">Tipo</th>
                        <th class="text-center">Valor</th>
                        <th class="text-center">Criado em</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center" colspan="5">Nenhum registro encontrado</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

</body>

</html>