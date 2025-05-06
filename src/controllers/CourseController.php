<?php

namespace App\Controllers;

use App\Services\CourseService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class CourseController
{

    private CourseService $service;

    public function __construct(CourseService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request, Response $response): Response
    {
        $instance = $this->service->findAll();

        $response->getBody()->write(json_encode($instance));

        return $response->withHeader('Content-Type', 'application/json');
    }

    public function show(Request $request, Response $response, $args): Response
    {
        $id = (int) $args["id"];

        $instance = $this->service->getById($id);

        $response->getBody()->write(json_encode($instance));

        return $response->withHeader('Content-Type', 'application/json');
    }

    public function create(Request $request, Response $response): Response
    {
        $data = $request->getParsedBody();

        $this->service->create($data['titulo'], $data['descripcion'], $data['profesor_id']);

        $response->getBody()->write(json_encode(['status' => 'Course created']));

        return $response->withHeader('Content-Type', 'application/json');
    }

    public function update(Request $request, Response $response, $args): Response
    {   
        $id = (int) $args["id"];

        $data = $request->getParsedBody();

        $this->service->update($id, $data);

        $response->getBody()->write(json_encode(['status' => 'Course updated']));

        return $response->withHeader('Content-Type', 'application/json');
    }

    public function delete(Request $request, Response $response, $args): Response
    {
        $id = (int) $args["id"];

        $this->service->destroy($id);

        $response->getBody()->write(json_encode(['status' => 'Course deleted']));

        return $response->withHeader('Content-Type', 'application/json');
    }
}
