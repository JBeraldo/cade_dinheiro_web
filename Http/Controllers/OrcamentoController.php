<?php
 
 namespace App\Http\Controllers;

use App\Models\Orcamento;
use App\Services\OrcamentoService;
use App\Traits\ViewTrait;
use Exception;

class OrcamentoController{

    use ViewTrait;

    public function __construct(OrcamentoService $service)
    {
        $this->service = $service;
    }

    public function indexPage()
    {
        $orcamentos = $this->service->get();

        $this->view('orcamentos.index',["orcamentos" => $orcamentos]);
    }
    public function createPage()
    {
        $this->view('orcamentos.create');
    }
    public function updatePage($id)
    {
        $orcamento= $this->service->find($id);

        $this->view('orcamentos.create',["orcamento"=>$orcamento]);
    }

    public function updateModel()
    {
        try {
            $cart = new Orcamento(
                input()->post('id')->getValue(),
                input()->post('name')->getValue(),
                input()->post('value')->getValue(),
                input()->post('option')->getValue(),
            );

            Orcamento::validate($cart);

            $this->service->update($cart);

            return $this->indexPage();
            
        } catch (Exception $e) {
            $message = $e->getMessage();
            $this->view('orcamentos.create',["success"=> false,"message"=> $message]);
        }
    }
    public function createModel()
    {

        try {
            $cart = new Orcamento(
                null,
                input()->post('name'),
                input()->post('value')->getValue(),
                input()->post('option')->getValue(),
            );

            Orcamento::validate($cart);

            $this->service->store($cart);

           $this->view('orcamentos.create',["success"=> true]);
            
        } catch (Exception $e) {
            $message = $e->getMessage();
            $this->view('orcamentos.create',["success"=> false,"message"=> $message]);
        }
    }
    public function deleteModel()
    {
        $this->service->delete(input()->post('id')->getValue());

        return $this->indexPage();
    }
}

