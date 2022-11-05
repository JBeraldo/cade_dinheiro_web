<?php

namespace App\Controllers;

use PDO;

define('MYSQL_HOST', 'localhost');
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', 'root');
define('MYSQL_DB_NAME', 'cade_meu_dinheiro');

class DatabaseController
{

    public function __construct(
    ) {
        $this->pdo = null;
    }

    public function connect(): PDO
    {
        if ($this->pdo == null) {
            $this->pdo = new \PDO('mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DB_NAME, MYSQL_USER, MYSQL_PASSWORD);
        }
        return $this->pdo;
    }

    public function up(): void
    {
        try {
            $this->connect();
            $this->pdo->beginTransaction();

            $query = file_get_contents("Database/schema.sql");

            $this->pdo->exec($query);

        } catch (\Throwable$e) {
            throw $e;
        }
    }
}
