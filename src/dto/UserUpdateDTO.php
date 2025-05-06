<?php

namespace App\DTO;

use App\Repositories\Role;

class UserUpdateDTO
{
    private int $id;
    private string $name;
    private Role $role;

    public function __construct(int $id, string $name, Role $role)
    {
        $this->id = $id;
        $this->name = $name;
        $this->role = $role;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getRole(): Role
    {
        return $this->role;
    }
}
