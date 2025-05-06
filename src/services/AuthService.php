<?php

namespace App\Services;

use App\DTO\UserCreateDTO;
use App\Repositories\Role;
use App\Services\UserService;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class AuthService
{
    private UserService $userService;
    private string $jwtSecret;

    public function __construct(UserService $userService, string $jwtSecret)
    {
        $this->userService = $userService;
        $this->jwtSecret = $jwtSecret;
    }

    public function login(string $email, string $password): ?string
    {
        $user = $this->userService->findByEmail($email);

        if (!$user || !password_verify($password, $user['password'])) {
            return null;
        }

        $payload = [
            'sub' => $user['id'],
            'email' => $user['email'],
            'iat' => time(),
            'exp' => time() + 3600
        ];

        return JWT::encode($payload, $this->jwtSecret, 'HS256');
    }

    public function register(string $name, string $email, string $password): void
    {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $userCreateDTO = new UserCreateDTO($name, $email, $hashedPassword, Role::student);

        $this->userService->create($userCreateDTO);
    }

    public function getAuthenticatedUser($request): ?array
    {
        $authHeader = $request->getHeaderLine('Authorization');

        if (!$authHeader || !str_starts_with($authHeader, 'Bearer ')) {
            return null;
        }

        $token = substr($authHeader, 7);

        try {

            $decoded = JWT::decode($token, new Key($this->jwtSecret, 'HS256'));

            return $this->userService->getById($decoded->sub);
            
        } catch (\Exception $e) {
            return null;
        }
    }
}
