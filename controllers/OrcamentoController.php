<?php

require ('./../models/Orcamento.php');

if (isset($_POST["target"])) {
    switch ($_POST["target"]) {
        case "create-budget":
            try {
                $orc = new Orcamento(
                    $_POST["name"],
                    $_POST["value"],
                    $_POST["option"],
                );

                Orcamento::validate($orc);

                header("location: ./../views/orcamentos/create.php?success=true");

            } catch (Exception $e) {
                $message = $e->getMessage();
                header("location: ./../views/orcamentos/create.php?message=$message&success=false");
            }
            break;
    }
}
