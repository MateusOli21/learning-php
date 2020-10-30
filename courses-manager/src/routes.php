<?php
use Mateus\MVC\controllers\{
    CreateCourseController, 
    DeleteCourseController, 
    ListCoursesController, 
    PersistCourseController,
    PersistUpdateController,
    UpdateCourseController,
};

$routes = [
    '' => ListCoursesController::class,
    '/create-course' => CreateCourseController::class,
    '/delete-course' => DeleteCourseController::class,
    '/update-course' => UpdateCourseController::class,

    '/persist-course' => PersistCourseController::class,
    '/persist-course-update' => PersistUpdateController::class
];

return $routes;