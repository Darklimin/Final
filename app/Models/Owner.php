<?php

require_once __DIR__ . "/../../core/Connections.php";
require_once __DIR__ . "/../../core/UploadFiles.php";
require_once __DIR__ . "/../../helpers.php";

class Owner extends Connections
{

    public $table = 'owners';

    public function getAll(): array
    {
        return $this->connection->query("SELECT * FROM {$this->table}")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOwn(int $user_id): array
    {
        $sql = "SELECT * FROM {$this->table} WHERE user_id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$user_id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        var_dump($result); die();

        return $result;
    }

    public function get($id): array|bool
    {
        $sql = "SELECT * FROM {$this->table} WHERE id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    public function create(array $data): int
    {
        $sql = "INSERT INTO {$this->table} (
            name,
            image,
            description
            ) 
        VALUES (
            :name,
            :image,
            :description
            )";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute($data);
        $id = $this->connection->lastInsertId();

        return $id;
    }

    public function update(array $data)
    {
        $sql = "UPDATE 
                    {$this->table}
                SET 
                    name = :name,
                    description = :description
                WHERE id = :id";

        $stmt = $this->connection->prepare($sql);
        $stmt->execute($data);
    }
}
