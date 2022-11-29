<?php

require_once __DIR__ . "/../../core/Connections.php";
require_once __DIR__ . "/../../core/UploadFiles.php";
require_once __DIR__ . "/../../helpers.php";
require_once __DIR__ . "/../../Message.php";

class Image extends Connections
{
    public $table = 'images';

    public function getAll(): array
    {
        return $this->connection->query("SELECT * FROM {$this->table}")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get($id): array|bool
    {
        $sql = "SELECT * FROM {$this->table} WHERE id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    public function getOwned($id): array
    {
        $sql = "SELECT * FROM {$this->table} WHERE user_id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function create(array $data): int
    {
        $sql = "INSERT INTO {$this->table} (
            name,
            image,
            description,
            user_id
            ) 
        VALUES (
            :name,
            :image,
            :description,
            :user_id
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

    public function like(array $data)
    {

        $image = $this->get($data['id']);
        if ($image['user_id'] !== $_SESSION['user_id']) {
            $image['likes'] = $image['likes'] + 1;
            $newData = ['likes' => $image['likes'], 'id' => $image['id']];
            $sql = "UPDATE
                    {$this->table}
                SET
                    likes = :likes
                WHERE id = :id";

            $stmt = $this->connection->prepare($sql);
            $stmt->execute($newData);
        } else {
            $_SESSION['errors'] = ["You can't vote for your images"];
        }
    }

    public function delete(int $id)
    {
        $sql = "DELETE FROM 
                    {$this->table}
                WHERE id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$id]);
    }

    public function uploadImage(array $data)
    {
        $data['image'] = '';
        $uploadDir = __DIR__ . "/../../storage/images";

        if (($data['files']['image'] ?? '')) {
            $data['image'] = (new UploadFiles($data['files']['image'], $uploadDir))->upload();
        }

        return $data;
    }
}
