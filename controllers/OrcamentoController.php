<?php

namespace App\Controllers;

use App\Models\Orcamento;
use App\Traits\ViewTrait;
use Exception;

class OrcamentoController{

    use ViewTrait;

    public function indexPage()
    {
        $this->view('orcamentos.index');
    }
    public function createPage()
    {
        $this->view('orcamentos.create');
    }

    public function createModel()
    {

        try {
            $cart = new Orcamento(
                input()->post('name')->getValue(),
                input()->post('value')->getValue(),
                input()->post('option')->getValue(),
            );

            Orcamento::validate($cart);

            redirect('/orcamentos/criar?success=true');
            
        } catch (Exception $e) {
            $message = $e->getMessage();
            redirect("/orcamentos/criar?message=$message&success=false");
        }
    }
}
