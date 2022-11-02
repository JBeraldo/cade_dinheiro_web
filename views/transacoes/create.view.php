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
include './widgets/header.php';
?>

    <div style="margin-top: 70px" class="container">

        <div class="row">
            <div class="col-md-8">
                <h2>Nova Transação</h2>
            </div>
            <div class="col-md-4">
                <a href="/transacoes" class="btn btn-secondary btn-block">Voltar</a>
            </div>
        </div>

        <?php
if (isset($_GET["success"])) {
    switch ($_GET["success"]) {
        case "true":
            echo ("<div class='alert alert-success' role='alert'>
                        Transação criada com sucesso!
                      </div>");
            break;
        case "false":
            $message = $_GET["message"];
            echo ("<div class='alert alert-danger' role='alert'>
                        $message
                      </div>");
            break;
    }
}
?>

        <div class="row">
            <div class="col-md-12">
                <form action="/transacoes/criar" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="name">Nome*</label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="type">Tipo*</label>
                            <select class="form-control" id="option" name="option" aria-label="Default select example">
                                <option selected value="1">Entrada</option>
                                <option value="0">Saída</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="value">Valor*</label>
                            <input type="text" name="value" id="value" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="date">data*</label>
                            <input type="date" name="date" id="date" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="target" id="target" value="create-transaction" hidden class="form-control visually-hidden" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <br>
                            <button class="btn btn-success btn-block" type="submit">Salvar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
</body>

</html>