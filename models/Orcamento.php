<?php

namespace App\Models;

use Exception;

class Orcamento
{

    public function __construct(
        int $id = null,
        string $name,
        string $value,
        int $option
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->value= $value;
        $this->option= $option;
    }

    /**
     * @throws Exception
     */
    public static function validate(Orcamento $orcamento): void
    {
        if (!isset($orcamento->name)) {
            throw new Exception("Nome é obrigatório");
        } else if (!isset($orcamento->value)) {
            throw new Exception("Valor é obrigatório");
        } elseif (!is_numeric($orcamento->value)) {
            throw new Exception('Valor não é um numero');
        }elseif ($orcamento->value < 0) {
            throw new Exception('Valor é menor que zero');
        } elseif (!isset($orcamento->option)) {
            throw new Exception("Tipo de entrada é obrigatório");
        } elseif ($orcamento->option !== 1 && $orcamento->option !== 0 &&  $orcamento->option !== 2) {
            throw new Exception('Selecione um tipo');
        } 
    }
}