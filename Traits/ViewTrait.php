<?php

namespace App\Traits;

trait ViewTrait
{
    public function view($path, $dados = [])
    {
        $path = $this->preparePath($path);
        foreach ($dados as $key => $value) {
            ${$key} = $value;
        }

        return require("./Views/$path.view.php");
    }
    private function preparePath($path)
    {
        return str_replace('.',"/",$path);
    }
}
