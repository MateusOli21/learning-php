<?php

namespace Mateus\MVC\controllers;

use Mateus\MVC\interfaces\RequisitionControllerInterface;

class CreateCourseController extends OutputHtmlController implements RequisitionControllerInterface{
    public function processRequisition(): void{
        $path = 'createCourse.php';
        $data = [
            'title' => 'Criar um novo curso',
            'buttonText' => 'Criar'
        ];

        $this->renderHtml($path, $data);
    }
}

