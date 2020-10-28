<?php

namespace Mateus\MVC\controllers;

use Mateus\MVC\interfaces\RequisitionControllerInterface;

class CreateCourseController implements RequisitionControllerInterface{
    public function processRequisition(): void{
        $title = 'Criar um curso';

        require __DIR__ . '/../views/courses/createCourse.php';
    }
}

