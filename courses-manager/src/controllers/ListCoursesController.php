<?php

namespace Mateus\MVC\controllers;

use Mateus\MVC\entity\Course;
use Mateus\MVC\infra\EntityManagerFactory;
use Mateus\MVC\interfaces\RequisitionControllerInterface;

class ListCoursesController extends OutputHtmlController implements RequisitionControllerInterface{
    private $coursesRepository;

    public function __construct(){
        $entityManagerFactory = new EntityManagerFactory();
        $entityManager = $entityManagerFactory->getEntityManager();

        $this->coursesRepository = $entityManager->getRepository(Course::class);
    }

    public function processRequisition(): void{
        $courses = $this->coursesRepository->findAll();

        $path = 'listCourses.php';
        $data = [
            'courses' => $courses,
            'title' => 'Lista de cursos'
        ];

        $this->renderHtml($path, $data);

    }
}