<?php

namespace Mateus\MVC\controllers;

use Mateus\MVC\entity\User;
use Mateus\MVC\infra\EntityManagerFactory;
use Mateus\MVC\interfaces\RequisitionControllerInterface;

class ValidateCreateAccountController implements RequisitionControllerInterface {
    /** @var \Doctrine\ORM\EntityManagerInterface */
    private $entityManager;

    public function __construct(){
        $entityManagerFactory =  new EntityManagerFactory();
        $this->entityManager = $entityManagerFactory->getEntityManager();
    }
    
    public function processRequisition(): void {
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        $passwordHashed = password_hash($password, PASSWORD_ARGON2ID);        

        $user = new User();

        $user->setEmail($email);
        $user->setPassword($passwordHashed);

        $this->entityManager->persist($user);
        $this->entityManager->flush();

        header('Location: /');        
    }   
} 