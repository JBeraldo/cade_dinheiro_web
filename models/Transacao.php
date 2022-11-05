<?php

namespace App\Models;

use Exception;

class Transacao
{
    public function __construct(
        int $id = null,
        string $name,
        int $option,
        string $value,
        string $date,
        int $carteira_id = null,
        int $orcamento_id = null
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->option = $option;
        $this->value = $value;
        $this->date = $date;
        $this->carteira_id = $carteira_id;
        $this->orcamento_id = $orcamento_id;

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
        } elseif (!isset($transacao->carteira_id) && !isset($transacao->orcamento_id)) {
            throw new Exception("Carteria ou Orçamento é obrigatório");
        }
    }
}