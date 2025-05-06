<?php

namespace App\entities;

use App\Repositories\Role;

class UserEntity
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

    public function setName(string $name): void {
        $this->name = $name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(): void {
        
    }

    public function getRole(): Role
    {
        return $this->role;
    }

    public function toArray(): array
    {
        return [
            "name" => $this->name,
            "email" => $this->email,
            "password" => $this->password,
            "role" => $this->role,
        ];
    }

    public function fromArray(array $data)
    {
        return new self(
            $data["name"],
            $data["email"],
            $data["password"],
            Role::from($data["role"]),
        );
    }
}
