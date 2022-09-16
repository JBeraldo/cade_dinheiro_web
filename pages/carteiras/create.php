    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Projeto Teste</title>
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

        <div style="margin-top: 70px" class="container">

            <div class="row">
                <div class="col-md-8">
                    <h2>Nova Carteira</h2>
                </div>
                <div class="col-md-4">
                    <a href="pages/carteiras/index/index.php" class="btn btn-secondary btn-block">Voltar</a>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <form action="" method="POST">
                        <div class="row">
                            <div class="col-md-12">
                                <label>Nome*</label>
                                <input type="text" name="name" class="form-control" required>
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