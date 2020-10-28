<?php

use Mateus\MVC\entity\Course;
use Mateus\MVC\infra\EntityManagerFactory;

require_once __DIR__ . '/vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

function createCourse($name, $description, $entityManager){
    $course = new Course();
    
    $course->setName($name);
    $course->setDescription($description);
    
    $entityManager->persist($course);
    $entityManager->flush();
}

createCourse("Doctrine tutorial", "Fundamentos do doctrine ORM e migrations.", $entityManager);
createCourse("PHP básico", "Ententada os fundamentos da linguagem PHP.", $entityManager);

