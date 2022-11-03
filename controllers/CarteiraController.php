<?php
 
 namespace App\Controllers;

use App\Helpers\Logger;
use App\Models\Carteira;
use App\Services\CarteiraService;
use App\Traits\ViewTrait;
use Exception;

class CarteiraController{

    use ViewTrait;

    private $service;

    public function __construct(CarteiraService $service)
    {
        $this->service = $service;
    }

    public function indexPage()
    {
        $carteiras = $this->service->get();

        $this->view('carteiras.index',["carteiras" => $carteiras]);
    }
    public function createPage()
    {
        $this->view('carteiras.create');
    }
    public function updatePage($id)
    {
        $carteira = $this->service->find($id);

        $this->view('carteiras.create',["carteira"=>$carteira]);
    }

    public function updateModel()
    {
        try {
            $cart = new Carteira(
                input()->post('id')->getValue(),
                input()->post('name')->getValue(),
                input()->post('value')->getValue(),
            );

            Carteira::validate($cart);

            $this->service->update($cart);

            return $this->indexPage();
            
        } catch (Exception $e) {
            $message = $e->getMessage();
            $this->view('carteiras.create',["success"=> false,"message"=> $message]);
        }
    }
    public function createModel()
    {

        try {
            $cart = new Carteira(
                null,
                input()->post('name'),
                input()->post('value'),
            );

            Carteira::validate($cart);

            $this->service->store($cart);

           $this->view('carteiras.create',["success"=> true]);
            
        } catch (Exception $e) {
            $message = $e->getMessage();
            $this->view('carteiras.create',["success"=> false,"message"=> $message]);
        }
    }
    public function deleteModel()
    {
        $this->service->delete(input()->post('id')->getValue());

        return $this->indexPage();
    }
}
