<?php

namespace App\Controllers;

use App\Models\Transacao;
use App\Services\CarteiraService;
use App\Services\OrcamentoService;
use App\Services\TransacaoService;
use App\Traits\ViewTrait;
use Exception;

class TransacaoController
{

    use ViewTrait;

    public function __construct(TransacaoService $service, CarteiraService $carteira_service, OrcamentoService $orcamento_service)
    {
        $this->service = $service;
        $this->carteira_service = $carteira_service;
        $this->orcamento_service = $orcamento_service;
    }

    public function indexPage()
    {
        $transacoes = $this->service->get();

        $this->view('transacoes.index', ["transacoes" => $transacoes]);
    }
    public function createPage()
    {
        $carteiras = $this->carteira_service->get();
        $orcamentos = $this->orcamento_service->get();
        $this->view('transacoes.create', ["carteiras" => $carteiras, "orcamentos" => $orcamentos]);
    }
    public function updatePage($id)
    {
        $transacao = $this->service->find($id);

        $this->view('transacoes.create', ["transacao" => $transacao]);
    }

    public function updateModel()
    {
        try {
            $cart = new Transacao(
                null,
                input()->post('name'),
                input()->post('option')->getValue(),
                input()->post('value')->getValue(),
                input()->post('date')->getValue(),
                input()->post('carteira_id')->getValue(),
                input()->post('orcamento_id')->getValue(),
            );

            Transacao::validate($cart);

            $this->service->update($cart);

            return $this->indexPage();

        } catch (Exception $e) {
            $carteiras = $this->carteira_service->get();
            $orcamentos = $this->orcamento_service->get();
            $message = $e->getMessage();
            $this->view('transacoes.create', ["success" => false, "message" => $message, "carteiras" => $carteiras, "orcamentos" => $orcamentos]);
        }
    }
    public function createModel()
    {

        try {
            $cart = new Transacao(
                null,
                input()->post('name')->getValue(),
                input()->post('option')->getValue(),
                input()->post('value')->getValue(),
                input()->post('date')->getValue(),
                input()->post('carteira_id')->getValue(),
                input()->post('orcamento_id')->getValue(),
            );

            Transacao::validate($cart);

            $this->service->store($cart);

            $this->view('transacoes.create', ["success" => true]);

        } catch (Exception $e) {
            $carteiras = $this->carteira_service->get();
            $orcamentos = $this->orcamento_service->get();
            $message = $e->getMessage();
            $this->view('transacoes.create', ["success" => false, "message" => $message, "carteiras" => $carteiras, "orcamentos" => $orcamentos]);
        }
    }
    public function deleteModel()
    {
        $this->service->delete(input()->post('id')->getValue());

        return $this->indexPage();
    }
}
