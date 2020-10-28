<?php

namespace Mateus\MVC\controllers;

use Mateus\MVC\entity\Course;
use Mateus\MVC\infra\EntityManagerFactory;
use Mateus\MVC\interfaces\RequisitionControllerInterface;

class PersistCourseController implements RequisitionControllerInterface{
    private $entityManager;

    public function __construct(){
        $entityManagerFactory = new EntityManagerFactory();
        $this->entityManager = $entityManagerFactory->getEntityManager();
    }
    
    public function processRequisition(): void{
        $name = $_POST['name'];
        $description = $_POST['description'];

        $course = new Course();

        $course->setName($name);
        $course->setDescription($description);
        
        $this->entityManager->persist($course);
        $this->entityManager->flush();

        header('Location: /', true, 302);
    }
}