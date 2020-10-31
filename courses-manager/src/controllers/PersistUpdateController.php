<?php

namespace Mateus\MVC\controllers;

use Mateus\MVC\entity\Course;
use Mateus\MVC\infra\EntityManagerFactory;
use Mateus\MVC\interfaces\RequisitionControllerInterface;

class PersistUpdateController implements RequisitionControllerInterface{
    /** @var \Doctrine\ORM\EntityManagerInterface */
    private $entityManager;

    public function __construct(){
        $entityManagerFactory =  new EntityManagerFactory();
        $this->entityManager = $entityManagerFactory->getEntityManager();
    }

    public function processRequisition(): void{
        $id = filter_input( INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if (is_null($id) || $id === false) {
            header('Location: /list-courses');
            return;
        }

        $name = $_POST['name'];
        $description = $_POST['description'];

        $coursesRepo =$this->entityManager->getRepository(Course::class);
        
        /** @var Course */
        $course = $coursesRepo->find($id);

        $course->setName($name);
        $course->setDescription($description);

        $this->entityManager->flush();

        header('Location: /list-courses');
    }
}