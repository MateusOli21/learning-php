<?php

use Mateus\Doctrine\entity\Course;
use Mateus\Doctrine\entity\Student;
use Mateus\Doctrine\helper\EntityManagerFactory;
use Mateus\Doctrine\repository\CourseRepository;
use Mateus\Doctrine\repository\StudentRepository;

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/src/commands/studentsCommands.php';
require_once __DIR__ . '/src/commands/coursesCommands.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();


// Using commands
// listStudents($entityManager);

// Using repository

/** @var StudentRepository $studentsRepository */
$studentsRepository = $entityManager->getRepository(Student::class);

$totalStudents = $studentsRepository->getTotalOfStudents();

$studentsRepository->listStudents();


/** @var CourseRepository $courseRepository  */
$courseRepository = $entityManager->getRepository(Course::class);

$courseRepository->listCourses();
