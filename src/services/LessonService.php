<?php

namespace App\Services;

use App\Repositories\LessonRepository;

class LessonService {
    private LessonRepository $repo;

    public function __construct(LessonRepository $repo) {
        $this->repo = $repo;
    }

    public function create($name, $description, $teacherId) {

        if (empty($name)) {
            throw new \InvalidArgumentException("El título es obligatorio.");
        }

        return $this->repo->create($title, $content, $courseId, $file);
    }

    public function findAll() {
        return $this->repo->findAll();
    }

    public function getById(int $id) {
        return $this->repo->getById($id);
    }

    public function update(int $id, array $data) {
        return $this->repo->update($id, $data);
    }

    public function destroy(int $id) {
        return $this->repo->destroy($id);
    }
}
