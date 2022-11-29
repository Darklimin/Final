<?php

require_once __DIR__ . "/../../core/Connections.php";
require_once __DIR__ . "/../auth/Authenticate.php";

class User extends Connections
{

    public string $table = 'users';

    public function getAll(): Array
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

    public function getByCredentials($id): array|bool
    {
       $sql = "SELECT * FROM {$this->table} WHERE email = ?";
       $stmt = $this->connection->prepare($sql);
       $stmt->execute([$id]);
       $result = $stmt->fetch(PDO::FETCH_ASSOC);
       
       return $result;
    }

    public function create(array $data): int
    {
        $pass = $data['password'];
        $newPass = password_hash($pass, PASSWORD_DEFAULT);
        $data['password'] = $newPass;

        $sql = "INSERT INTO {$this->table} (
            first_name,
            last_name,
            email,
            password,
            description,
            photo
            ) 
        VALUES (
            :first_name,
            :last_name,
            :email,
            :password,
            :description,
            :photo
            )";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute($data);
        $id = $this->connection->lastInsertId();

        return $id;
}

    public function uploadPhoto(array $data)
    {
        $data['photo'] = '';
        $uploadDir = __DIR__ . "/../../storage/photos";

        if (($data['files']['photo'] ?? '')) {
            $data['photo'] = (new UploadFiles($data['files']['photo'], $uploadDir))->upload();
        }

        return $data;
    }

    public function update(array $data)
    {
        $sql = "UPDATE 
                    {$this->table}
                SET 
                    first_name = :first_name,
                    last_name = :last_name,
                    description = :description
                WHERE id = :id";

        $stmt = $this->connection->prepare($sql);
        $stmt->execute($data);
        $_SESSION['user_name'] = $data['first_name'] . " " . $data['last_name'];

    }

    public function delete(int $id)
    {
        $sql = "DELETE FROM 
                    {$this->table}
                WHERE id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$id]);
        $auth = ((new Authenticate())->logout());
    }
}