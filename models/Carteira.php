<?php

class Carteira
{

    public function __construct(
        private readonly string $name,
        private readonly string $value
    )
    {
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