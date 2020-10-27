<?php


use Mateus\Doctrine\helper\EntityManagerFactory;

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/src/commands/studentsCommands.php';
require_once __DIR__ . '/src/commands/coursesCommands.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$singleStudent = findStudentByName("Mateus Oliveira", $entityManager);

listStudents($entityManager);
echo(getTotalOfStudents($entityManager)) . PHP_EOL;

listCoursesAndStudents($entityManager);
listCoursesAndStudentsWithDql($entityManager);

// createStudent('Pedro Silva', $entityManager, '11947586932');
// echo(updateStudentName(3, "Antonio Silva", $entityManager)) . PHP_EOL;
// echo(deleteStudent(5, $entityManager)) . PHP_EOL;

// $doctrineCourse = createCourse("doctrine fundamentals", $entityManager);
// $composerCourse = createCourse("composer fundamentals", $entityManager);
// insertStudentInCourse(1, 1, $entityManager);
