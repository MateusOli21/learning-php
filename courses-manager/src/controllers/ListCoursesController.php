<?php

namespace Mateus\MVC\controllers;

use Mateus\MVC\entity\Course;
use Mateus\MVC\infra\EntityManagerFactory;
use Mateus\MVC\interfaces\RequisitionControllerInterface;

class ListCoursesController implements RequisitionControllerInterface{
    private $coursesRepository;

    public function __construct(){
        $entityManagerFactory = new EntityManagerFactory();
        $entityManager = $entityManagerFactory->getEntityManager();

        $this->coursesRepository = $entityManager->getRepository(Course::class);
    }

    public function processRequisition(): void{
        $courses = $this->coursesRepository->findAll();
        $title = 'Lista de cursos';

        require __DIR__ . '/../views/courses/listCourses.php';
    }
}