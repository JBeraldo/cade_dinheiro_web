<header style="margin-bottom: 20px;">
    <nav class="navbar fixed-top navbar-expand-lg navbar-light scrolling-navbar bg-light">
        <a class="navbar-brand" href="#"><strong>Menu</strong></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/carteiras">Carteiras</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/transacoes">Transações</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/orcamentos">Orçamentos</a>
                </li>
            </ul>
        </div>
        <?php
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }
                if (isset($_SESSION["logado"]) && $_SESSION["logado"] == true) {
                    echo '<a href="../login/logout.php" class="btn btn-danger">Sair</a>';
                }
            ?>
    </nav>
</header>