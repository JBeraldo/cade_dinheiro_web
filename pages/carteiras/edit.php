    <div style="margin-top: 70px" class="container">
        <div class="row">
            <div class="col-md-8">
                <h2>Editar Carteira</h2>
            </div>
            <div class="col-md-4">
                <a href="pages/carteiras/index/index.php" class="btn btn-secondary btn-block">Voltar</a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <form action="" method="POST">
                    <input type="hidden" name="_method" value="PUT">
                    <div class="row">
                        <div class="col-md-12">
                            <label>Nome*</label>
                            <input type="text" name="name" value="" class="form-control" required>
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