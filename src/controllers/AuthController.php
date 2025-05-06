<?php

namespace App\Controllers;

use App\Services\AuthService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class AuthController
{
    private AuthService $service;

    public function __construct(AuthService $service)
    {
        $this->service = $service;
    }

    public function login(Request $request, Response $response): Response
    {
        $data = $request->getParsedBody();

        $token = $this->service->login($data['email'], $data['password']);

        if ($token) {
            $response->getBody()->write(json_encode(['token' => $token]));
        } else {
            $response->getBody()->write(json_encode(['error' => 'Invalid credentials']));
            return $response->withStatus(401)->withHeader('Content-Type', 'application/json');
        }

        return $response->withHeader('Content-Type', 'application/json');
    }

    public function register(Request $request, Response $response): Response
    {
        $data = $request->getParsedBody();

        $this->service->register($data['name'], $data['email'], $data['password']);

        $response->getBody()->write(json_encode(['status' => 'User registered']));

        return $response->withHeader('Content-Type', 'application/json');
    }

    public function logout(Request $request, Response $response): Response
    {
        // En sistemas con JWT, esto podría ser una lógica de blacklist o simplemente en frontend
        $response->getBody()->write(json_encode(['status' => 'Logged out']));

        return $response->withHeader('Content-Type', 'application/json');
    }

    public function me(Request $request, Response $response): Response
    {
        $user = $this->service->getAuthenticatedUser($request);

        if ($user) {
            $response->getBody()->write(json_encode($user));
        } else {
            $response->getBody()->write(json_encode(['error' => 'Unauthorized']));
            return $response->withStatus(401)->withHeader('Content-Type', 'application/json');
        }

        return $response->withHeader('Content-Type', 'application/json');
    }
}
