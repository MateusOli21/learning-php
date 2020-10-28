<?php

use Mateus\MVC\controllers\CreateCourseController;
use Mateus\MVC\controllers\ListCoursesController;
use Mateus\MVC\controllers\PersistCourseController;

$routes = [
    '' => ListCoursesController::class,
    '/create-course' => CreateCourseController::class,
    '/save-course' => PersistCourseController::class
];

return $routes;