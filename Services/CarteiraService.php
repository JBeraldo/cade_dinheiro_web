<?php

namespace App\Services;

use App\Controllers\DatabaseController;
use App\Models\Carteira;
use PDO;

class CarteiraService
{
    private $db;

    public function __construct(DatabaseController $db)
    {
        $this->db = $db->connect();
    }

    /**
     * @throws Exception
     */
    public function store(Carteira $model)
    {
        try {
            $this->db->beginTransaction();

            $query = $this->db->prepare("INSERT INTO carteiras (name,value)
            VALUES (:name,:value);");

            $query->bindParam(':name', $model->name, PDO::PARAM_STR);
            $query->bindParam(':value', $model->value, PDO::PARAM_INT);

            $query->execute();

            $this->db->commit();
        } catch (\Throwable $e) {
            $this->db->rollBack();
            throw $e;
        }
    }
}
