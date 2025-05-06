<?php

namespace App\Repositories;

use App\entities\UserEntity;
use Medoo\Medoo;

class UserRepository {
    private Medoo $db;

    public function __construct(Medoo $db) {
        $this->db = $db;
    }

    public function create(UserEntity $entity): void {
        $this->db->insert('user', $entity->toArray());
    }

    public function findAll(): array {
        return $this->db->select('user', '*');
    }

    public function getById(int $id): ?array {

        $data = $this->db->get('user', '*', ['id' => $id]);

        return $data ?: null;
    }

    public function findByEmail(string $email): ?array {

        $data = $this->db->get('user', '*', ['email' => $email]);

        return $data ?: null;
    }   

    public function update(int $id, array $data): void {
        $this->db->update('user', $data, ['id' => $id]);
    }

    public function destroy(int $id): void {
        $this->db->delete('user', ['id' => $id]);
    }
}
