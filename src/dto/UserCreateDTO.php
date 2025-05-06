<?php

namespace App\DTO;

use App\Repositories\Role;

class UserCreateDTO
{
    private string $name;
    private string $email;
    private string $password;
    private Role $role;

    public function __construct(string $name, string $email, string $password, Role $role)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getRole(): Role
    {
        return $this->role;
    }

    public function getPassword(): string {
        
        return $this->password;
    }
}
