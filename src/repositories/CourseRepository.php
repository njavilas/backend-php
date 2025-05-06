<?php

namespace App\Repositories;

use Medoo\Medoo;

class CourseRepository {
    private Medoo $db;

    public function __construct(Medoo $db) {
        $this->db = $db;
    }

    public function create(string $name, string $description, int $teacherId): void {
        $this->db->insert('course', [
            'name' => $name,
            'description' => $description,
            'teacher_id' => $teacherId
        ]);
    }

    public function findAll(): array {
        return $this->db->select('course', '*');
    }

    public function getById(int $id): ?array {

        $data = $this->db->get('course', '*', ['id' => $id]);

        return $data ?: null;
    }

    public function update(int $id, array $data): void {
        $this->db->update('course', $data, ['id' => $id]);
    }

    public function destroy(int $id): void {
        $this->db->delete('course', ['id' => $id]);
    }
}
