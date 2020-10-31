<?php

namespace Mateus\MVC\controllers;

use Mateus\MVC\interfaces\RequisitionControllerInterface;

class LogoutController implements RequisitionControllerInterface {
    public function processRequisition(): void {
        session_destroy();
        header('Location: /');
    }
}