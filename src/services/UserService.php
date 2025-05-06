<?php

namespace App\Services;

use App\DTO\UserCreateDTO;
use App\DTO\UserUpdateDTO;
use App\entities\UserEntity;
use App\Repositories\UserRepository;

class UserService
{
    private UserRepository $repo;

    public function __construct(UserRepository $repo)
    {
        $this->repo = $repo;
    }

    public function create(UserCreateDTO $userCreateDTO)
    {

        $entity = new UserEntity(
            $userCreateDTO->getName(),
            $userCreateDTO->getEmail(),
            $userCreateDTO->getPassword(),
            $userCreateDTO->getRole(),
        );

        return $this->repo->create($entity);
    }

    public function findAll()
    {
        return $this->repo->findAll();
    }

    public function getById(int $id)
    {
        return $this->repo->getById($id);
    }

    public function findByEmail(string $email)
    {
        return $this->repo->findByEmail($email);
    }

    public function update(int $id, UserUpdateDTO $userUpdateDTO)
    {

        $entity = new UserEntity(
            $userUpdateDTO->getName(),
            $userUpdateDTO->getEmail(),
            $userUpdateDTO->getPassword(),
            $userUpdateDTO->getRole(),
        );

        return $this->repo->update($id, $data);
    }

    public function destroy(int $id)
    {
        return $this->repo->destroy($id);
    }
}
