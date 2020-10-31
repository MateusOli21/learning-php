<?php

namespace Mateus\MVC\controllers;

use Mateus\MVC\interfaces\RequisitionControllerInterface;

class SignUpController extends OutputHtmlController implements RequisitionControllerInterface{
    public function processRequisition(): void {
        $path = '/signUp.php';

        $data = [
            'title' => 'Crie a sua conta',
            'buttonText' => 'Criar conta'
        ];


        $this->renderHtml($path,$data);
    }
}