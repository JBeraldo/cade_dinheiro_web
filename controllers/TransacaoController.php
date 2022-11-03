<?php

namespace App\Controllers;

use App\Models\Transacao;
use App\Traits\ViewTrait;
use Exception;

class TransacaoController{

    use ViewTrait;

    public function indexPage()
    {
        $this->view('transacoes.index');
    }
    public function createPage()
    {
        $this->view('transacoes.create');
    }

    public function createModel()
    {

        try {
            $cart = new Transacao(
                input()->post('name')->getValue(),
                input()->post('option',0)->getValue(),
                input()->post('value')->getValue(),
                input()->post('date')->getValue(),
            );

            Transacao::validate($cart);

            redirect('/transacoes/criar?success=true');
            
        } catch (Exception $e) {
            $message = $e->getMessage();
            redirect("/transacoes/criar?message=$message&success=false");
        }
    }
}
