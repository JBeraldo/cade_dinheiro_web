<?php
session_start();

if (empty($_SESSION["logado"]) || $_SESSION["logado"] == false) {
    header('Location: views/login/login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Projeto Web</title>
    <!-- CSS only -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    <!-- JavaScript Bundle with Popper -->
    <style>
    .btn-block {
        display: block;
    }
    </style>
</head>

<body>
    <?php
include 'widgets/header.php';
?>
    <div class="container" style="margin-top: 50px">
        <div class="row">
            <div class="col-md-12">
                <!-- Jumbotron -->
                <div class="p-5 text-center bg-light">
                    <h1 class="mb-3">Projeto PHP</h1>
                    <h4 class="mb-3">Listagem e CRUD de carteiras, orçamentos e transações</h4>
                    <a class="btn btn-primary" href="views/carteiras/index.php" role="button">Carteiras</a>
                </div>
                <!-- Jumbotron -->
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
</body>

</html>