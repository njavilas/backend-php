<?php

use Slim\Factory\AppFactory;

use App\Repositories\UserRepository;
use App\Repositories\CourseRepository;
use App\Repositories\LessonRepository;

use App\Services\CourseService;
use App\Services\UserService;
use App\Services\LessonService;
use App\Services\AuthService;

use App\Controllers\CourseController;
use App\Controllers\UserController;
use App\Controllers\LessonController;
use App\Controllers\AuthController;


$app = AppFactory::create();
$db = require __DIR__ . '/../src/Config/db.php';

$userRepository = new UserRepository($db);
$courseRepository = new CourseRepository($db);
$lessonRepository = new LessonRepository($db);

$courseService = new CourseService($courseRepository);
$userService = new UserService($userRepository);
$lessonService = new LessonService($lessonRepository);
$authService = new AuthService($userService, "secret");

$courseController = new CourseController($courseService);
$userController = new UserController($userService);
$lessonController = new LessonController($lessonService);
$authController = new AuthController($authService);


$app->get('/course', [$controller, 'index']);
$app->get('/course/{id}', [$controller, 'show']);
$app->post('/course', [$controller, 'create']);
$app->put('/course/{id}', [$controller, 'update']);
$app->delete('/course/{id}', [$controller, 'delete']);

$app->get('/lesson', [$lessonController, 'index']);
$app->get('/lesson/{id}', [$lessonController, 'show']);
$app->post('/lesson', [$lessonController, 'create']);
$app->put('/lesson/{id}', [$lessonController, 'update']);
$app->delete('/lesson/{id}', [$lessonController, 'delete']);

$app->get('/user', [$userController, 'index']);
$app->get('/user/{id}', [$userController, 'show']);
$app->put('/user/{id}', [$userController, 'update']);
$app->delete('/user/{id}', [$userController, 'delete']);

$app->post('/auth/login', [$authController, 'login']);
$app->post('/auth/register', [$authController, 'register']);
$app->post('/auth/logout', [$authController, 'logout']);
$app->get('/auth/profile', [$authController, 'profile']);

$app->run();
