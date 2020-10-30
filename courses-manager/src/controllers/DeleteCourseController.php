<?php

namespace Mateus\MVC\controllers;

use Mateus\MVC\entity\Course;
use Mateus\MVC\infra\EntityManagerFactory;
use Mateus\MVC\interfaces\RequisitionControllerInterface;



class DeleteCourseController implements RequisitionControllerInterface {
    /** @var \Doctrine\ORM\EntityManagerInterface */
    private $entityManager;

    public function __construct(){
        $entityManagerFactory =  new EntityManagerFactory();
        $this->entityManager = $entityManagerFactory->getEntityManager();
    }

    public function processRequisition(): void{
        $id = filter_input( INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if (is_null($id) || $id === false) {
            header('Location: /', true);
            return;
        }

        
        $course = $this->entityManager->getReference(Course::class, $id);
        $this->entityManager->remove($course);
        $this->entityManager->flush();

        header('Location: /');
    }
}