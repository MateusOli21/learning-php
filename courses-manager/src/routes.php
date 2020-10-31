<?php
use Mateus\MVC\controllers\{
    CreateCourseController, 
    DeleteCourseController, 
    ListCoursesController,
    LoginController,
    PersistCourseController,
    PersistUpdateController,
    SignUpController,
    UpdateCourseController,
    ValidateCreateAccountController,
    ValidateLoginController,
};

$routes = [
    '' => LoginController::class,
    '/sign-up' => SignUpController::class,
    '/list-courses' => ListCoursesController::class,
    '/create-course' => CreateCourseController::class,
    '/delete-course' => DeleteCourseController::class,
    '/update-course' => UpdateCourseController::class,

    '/persist-course' => PersistCourseController::class,
    '/persist-course-update' => PersistUpdateController::class,
    '/validate-login' => ValidateLoginController::class, 
    '/validate-create-account' => ValidateCreateAccountController::class,
];

return $routes;