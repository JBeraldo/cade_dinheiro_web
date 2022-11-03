<?php

namespace App\Controllers;

use App\Traits\ViewTrait;

class IndexController {

    use ViewTrait;

    public function indexPage()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $this->view('index.index');
    }
}