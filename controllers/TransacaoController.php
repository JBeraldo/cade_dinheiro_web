<?php

require ('./../models/Transacao.php');

if (isset($_POST["target"])) {
    switch ($_POST["target"]) {
        case "create-transaction":
            try {
                $trans = new Transacao(
                    $_POST["name"],
                    $_POST["option"],
                    $_POST["value"],
                    $_POST["date"],
                );

                Transacao::validate($trans);

                header("location: ./../views/transacoes/create.php?success=true");

            } catch (Exception $e) {
                $message = $e->getMessage();
                header("location: ./../views/transacoes/create.php?message=$message&success=false");
            }
            break;
    }
}
