<?php

namespace Mateus\MVC\controllers;

use Mateus\MVC\interfaces\RequisitionControllerInterface;

class LoginController extends OutputHtmlController implements RequisitionControllerInterface{
    public function processRequisition(): void{
        $path = '/login.php';

        $data = [
            'title' => 'Login',
            'primaryButtonText' => 'Faça login',
            'secondaryButtonText' => 'Crie a sua conta'
        ];

        $this->renderHtml($path, $data);        
    }

}