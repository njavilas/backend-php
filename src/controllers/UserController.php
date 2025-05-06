<?php

namespace App\Controllers;

use App\Services\UserService;
use App\DTO\UserCreateDTO;
use App\DTO\UserUpdateDTO;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class UserController
{
    private UserService $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request, Response $response): Response
    {
        $users = $this->service->findAll();

        $response->getBody()->write(json_encode($users));
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function show(Request $request, Response $response, $args): Response
    {
        $id = (int) $args['id'];
        $user = $this->service->getById($id);

        $response->getBody()->write(json_encode($user));
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function update(Request $request, Response $response, $args): Response
    {
        $id = (int) $args['id'];
        $data = $request->getParsedBody();

        $dto = new UserUpdateDTO(
            $data['name'],
            $data['email'],
            $data['password'],
            $data['role']
        );

        $this->service->update($id, $dto);

        $response->getBody()->write(json_encode(['status' => 'User updated']));
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function delete(Request $request, Response $response, $args): Response
    {
        $id = (int) $args['id'];
        $this->service->destroy($id);

        $response->getBody()->write(json_encode(['status' => 'User deleted']));
        return $response->withHeader('Content-Type', 'application/json');
    }
}
