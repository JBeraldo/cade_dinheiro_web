<?php

namespace App\Controllers;

use App\Traits\ViewTrait;

class IndexController {

    use ViewTrait;

    public function indexPage()
    {
        $this->view('index.index');
    }
}