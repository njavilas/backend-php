<?php

namespace App\Repositories;

use Medoo\Medoo;

class LessonRepository {
    private Medoo $db;

    public function __construct(Medoo $db) {
        $this->db = $db;
    }

    public function create(string $title, string $content, int $courseId, string $file): void {
        $this->db->insert('lesson', [
            'title' => $title,
            'content' => $content,
            'file' => $file,
            'course_id' => $courseId
        ]);
    }

    public function findAll(): array {
        return $this->db->select('lesson', '*');
    }

    public function getById(int $id): ?array {

        $data = $this->db->get('lesson', '*', ['id' => $id]);

        return $data ?: null;
    }

    public function update(int $id, array $data): void {
        $this->db->update('lesson', $data, ['id' => $id]);
    }

    public function destroy(int $id): void {
        $this->db->delete('lesson', ['id' => $id]);
    }
}
