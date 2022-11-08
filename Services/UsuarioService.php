<?php

namespace App\Services;

use App\Http\Controllers\DatabaseController;
use App\Helpers\Logger;
use App\Models\Carteira;
use App\Models\Usuario;
use PDO;

class UsuarioService
{
    public function __construct(DatabaseController $db)
    {
        $this->table = 'usuarios';
        $this->db = $db->connect();
    }

    /**
     * @throws Exception
     */
    public function store(Usuario $model): void
    {
        try {
            $this->db->beginTransaction();

            $query = $this->db->prepare("INSERT INTO usuarios (name,value)
            VALUES (:name,:password);");

            $query->bindParam(':name', $model->name, PDO::PARAM_STR);
            $query->bindParam(':password', $model->password, PDO::PARAM_INT);

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
    public function update(Usuario $model): void
    {
        try {
            $this->db->beginTransaction();


            $query = $this->db->prepare("UPDATE usuarios SET `name` = :name,`password` = :password WHERE `id` = :id;");

            $query->bindParam(':name', $model->name, PDO::PARAM_STR);
            $query->bindParam(':value', $model->password, PDO::PARAM_INT);
            $query->bindParam(':id', $model->id, PDO::PARAM_INT);

            $query->execute();

            $this->db->commit();
        } catch (\Throwable $e) {
            throw $e;
            $this->db->rollBack();
        }
    }

    public function get(): Array
    {
        try {
            $this->db->beginTransaction();

            $query = $this->db->prepare("SELECT * FROM usuarios ;");

            $query->execute();

            $result = $query->fetchAll();

            $result = array_map(function ($usuario) {
                return new Usuario($usuario["id"], $usuario["name"], $usuario["password"]);
            }, $result);

            $this->db->commit();
        } catch (\Throwable $e) {
            $this->db->rollBack();
            throw $e;
        }
        return $result;
    }

    public function delete($id): void
    {
        try {
            $this->db->beginTransaction();

            $query = $this->db->prepare("DELETE FROM usuarios WHERE `id` = :id;");

            $query->bindParam(':id', $id);

            $query->execute();

            $this->db->commit();
        } catch (\Throwable $e) {
            $this->db->rollBack();
            throw $e;
        }
    }
    public function find($id): Usuario
    {
        try {
            $this->db->beginTransaction();

            $query = $this->db->prepare("SELECT * FROM usuarios WHERE `id` = :id;");

            $query->bindParam(':id', $id, PDO::PARAM_INT);

            $query->execute();

            $result = $query->fetch();

            $result = new Usuario($result["id"], $result["name"], $result["password"]);

            $this->db->commit();
        } catch (\Throwable $e) {
            $this->db->rollBack();
            throw $e;
        }
        return $result;
    }

    public function login(Usuario $model){
        try {
            $this->db->beginTransaction();

            $password = password_hash($model->password, PASSWORD_DEFAULT);

            $query = $this->db->prepare("SELECT * FROM usuarios WHERE `name` = :name");

            $query->bindParam(':name', $model->name, PDO::PARAM_STR);

            $query->execute();

            $result = $query->fetchAll();

            $logged = false;

            foreach($result as $result){
                if(password_verify($model->password,$result["password"])){
                    $logged = true;
                    break;
                }
            }

            $this->db->commit();
        } catch (\Throwable $e) {
            $this->db->rollBack();
            throw $e;
        }
        return $logged;
    }
}
