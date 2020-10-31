<?php

namespace Mateus\MVC\controllers;

use Mateus\MVC\entity\User;
use Mateus\MVC\infra\EntityManagerFactory;
use Mateus\MVC\interfaces\RequisitionControllerInterface;

class ValidateLoginController implements RequisitionControllerInterface {
    /** @var \Doctrine\ORM\EntityManagerInterface */
    private $entityManager;

    public function __construct(){
        $entityManagerFactory =  new EntityManagerFactory();
        $this->entityManager = $entityManagerFactory->getEntityManager();
    }

    public function processRequisition(): void{
        $userRepo = $this->entityManager->getRepository(User::class);

        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        
        if(is_null($email) || $email === false){
            echo "Invalid e-mail.";
            return;
        }

        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

        /** @var User $user */
        $user = $userRepo->findOneBy(['email' => $email]);

        if (is_null($user) || !$user->verifyPassword($password)) {
            echo "Invalid e-mail or password";
            return;
        }

        header('Location: /list-courses');
    }
}