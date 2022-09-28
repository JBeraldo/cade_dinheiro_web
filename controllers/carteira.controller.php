<?php

    $total = $_POST['total'] ?? '';
    $name = $_POST['name'] ?? '';

    if($total == '' || $name == '') {
        header('Location: ../views/carteiras/create.php?erro=true');
    } else {
        try {
            $total = doubleval($total);
        } catch (\Throwable $th) {
            header('Location: ../views/carteiras/create.php?erro=true');
        }
        // Gravar no BD
        echo "carteira salva.\n Dados: Nome: $name, total: $total";
    }