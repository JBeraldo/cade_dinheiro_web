<?php

require ('./../models/Carteira.php');

if (isset($_POST["target"])) {
    switch ($_POST["target"]) {
        case "create-wallet":
            try {
                $cart = new Carteira(
                    $_POST["name"],
                    $_POST["value"],
                );

                Carteira::validate($cart);

                header("location: ./../views/carteiras/create.php?success=true");

            } catch (Exception $e) {
                $message = $e->getMessage();
                header("location: ./../views/carteiras/create.php?message=$message&success=false");
            }
            break;
    }
}
