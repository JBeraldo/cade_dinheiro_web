<?php

namespace App\Models;

use Exception;

class Transacao
{
    public function __construct(
        private readonly string $name,
        private readonly int $option,
        private readonly string $value,
        private readonly string $date
    )
    {
    }

    /**
     * @throws Exception
     */
    public static function validate(Transacao $transacao): void
    {
        if (empty($transacao->name)) {
            throw new Exception("Nome é obrigatório");
        } elseif (!isset($transacao->option)) {
            throw new Exception("Tipo de entrada é obrigatório");
        } elseif ($transacao->option !== 1 && $transacao->option !== 0) {
            throw new Exception('Selecione um tipo');
        } elseif (!isset($transacao->value)) {
            throw new Exception("Valor é obrigatório");
        } elseif (!is_numeric($transacao->value)) {
            throw new Exception('Valor não é um numero');
        } elseif ($transacao->value < 0) {
            throw new Exception('Valor é menor que zero');
        } elseif (!isset($transacao->date)) {
            throw new Exception("Data é obrigatório");
        }
    }
}