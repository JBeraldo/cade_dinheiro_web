<?php
$usuario = $_POST['usuario'] ?? '';
$senha = $_POST['senha'] ?? '';
$erro = false;

session_start();

if ($usuario == 'admin' && $senha == '123456') {
    $_SESSION['logado'] = true;
    $_SESSION['usuario'] = 'Administrador';
    $_SESSION['cartao'] = '411111111111111';

    header('Location: ../../index.php');
} else if (!empty($_POST)) {
    $erro = true;
}

if (!empty($_SESSION['logado']) && $_SESSION['logado']) {
    header('Location: ../../index.php');
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
include './widgets/header.php';
?>
    <div class="container" style="margin-top: 50px">
        <div class="row">
            <div class="col-md-12">
                <main>
                    <form method="POST" action="login.php">
                        <?php if ($erro) : ?>
                        <div style="background: #fafae1; padding: 15px; margin-bottom: 24px;">
                            📢 Usuário ou Senha inválidos! Tente novamente.
                        </div>
                        <?php endif; ?>
                        <div class="form-group">
                            <label for="user">Usuário: </label>
                            <input id="user" type="text" class="form-control" name="usuario" />
                        </div>

                        <div class="form-group">
                            <label for="password">Senha: </label>
                            <input id="password" type="password" class="form-control" name="senha" />
                        </div>

                        <div class="row" style="justify-content: center;">
                            <button class="btn btn-primary">Entrar</button>
                        </div>
                    </form>
                </main>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
</body>

</html>