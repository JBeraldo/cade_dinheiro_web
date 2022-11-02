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
        $this->view('carteiras.index');
    }
    public function createPage()
    {
        $this->view('carteiras.create');
    }

    public function createModel()
    {

        try {
            $cart = new Carteira(
                input()->post('name'),
                input()->post('value'),
            );

            Logger::log($cart->name);

            Carteira::validate($cart);

            $this->service->store($cart);

            redirect('/carteiras/criar?success=true');
            
        } catch (Exception $e) {
            $message = $e->getMessage();
            Logger::log($message);
            redirect("/carteiras/criar?message=$message&success=false");
        }
    }
}
