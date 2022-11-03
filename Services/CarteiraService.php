<?php

namespace App\Services;

use App\Controllers\DatabaseController;
use App\Helpers\Logger;
use App\Models\Carteira;
use PDO;

class CarteiraService
{
    public function __construct(DatabaseController $db)
    {
        $this->table = 'carteiras';
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
    /**
     * @throws Exception
     */
    public function update(Carteira $model)
    {
        try {
            $this->db->beginTransaction();

            Logger::log($model->id);

            $query = $this->db->prepare("UPDATE carteiras SET `name` = :name,`value` = :value WHERE `id` = :id;");

            $query->bindParam(':name', $model->name, PDO::PARAM_STR);
            $query->bindParam(':value', $model->value, PDO::PARAM_INT);
            $query->bindParam(':id', $model->id, PDO::PARAM_INT);

            $query->execute();

            $this->db->commit();
        } catch (\Throwable $e) {
            throw $e;
            $this->db->rollBack();
        }
    }
    public function get()
    {
        try {
            $this->db->beginTransaction();

            $query = $this->db->prepare("SELECT * FROM carteiras ;");

            $query->execute();

            $result = $query->fetchAll();

            $result = array_map(function ($carteira) {
                return new Carteira($carteira["id"], $carteira["name"], $carteira["value"]);
            }, $result);

            $this->db->commit();
        } catch (\Throwable $e) {
            $this->db->rollBack();
            throw $e;
        }
        return $result;
    }
    public function delete($id)
    {
        try {
            $this->db->beginTransaction();

            $query = $this->db->prepare("DELETE FROM carteiras WHERE `id` = :id;");

            $query->bindParam(':id', $id);

            $query->execute();

            $this->db->commit();
        } catch (\Throwable $e) {
            $this->db->rollBack();
            throw $e;
        }
    }
    public function find($id)
    {
        try {
            $this->db->beginTransaction();

            $query = $this->db->prepare("SELECT * FROM carteiras WHERE `id` = :id;");

            $query->bindParam(':id', $id, PDO::PARAM_INT);

            $query->execute();

            $result = $query->fetch();

            $result = new Carteira($result["id"], $result["name"], $result["value"]);

            $this->db->commit();
        } catch (\Throwable $e) {
            $this->db->rollBack();
            throw $e;
        }
        return $result;
    }
}
