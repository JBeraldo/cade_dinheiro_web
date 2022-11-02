<?php

namespace App\Models;

use Exception;

class Carteira
{

    public function __construct(
        string $name,
        string $value
    )
    {
        $this->name = $name;
        $this->value = $value;
    }

    /**
     * @throws Exception
     */
    public static function validate(Carteira $carteira): void
    {
        if (!isset($carteira->name)) {
            throw new Exception("Nome é obrigatório");
        } else if (!isset($carteira->value)) {
            throw new Exception("Valor é obrigatório");
        } elseif (!is_numeric($carteira->value)) {
            throw new Exception('Valor não é um numero');
        }
    }
}