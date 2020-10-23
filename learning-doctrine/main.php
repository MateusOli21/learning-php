<?php

use Mateus\Doctrine\entity\Student;
use Mateus\Doctrine\helper\EntityManagerFactory;

require_once __DIR__ . '/vendor/autoload.php';


$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

function getStudentRepository($entityManager){
    return $entityManager->getRepository(Student::class);
}


function createStudent( string $studentName, $entityManager ){
    $newStudent = new Student();
    $newStudent->setName($studentName);

    $entityManager->persist($newStudent);    
    $entityManager->flush();
}

function listStudents($entityManager){
    $studentsRepository = getStudentRepository($entityManager);
    $studentsList = $studentsRepository->findAll();

    return $studentsList;
}

function findStudentByName( string $studentName, $entityManager){
    $studentsRepository = getStudentRepository($entityManager);

    $student = $studentsRepository->findOneBy([
        'name' => $studentName
    ]);

    if(!$student){
        return "Couldn't find the specified student.";
    }

    return $student;
}

function findStudentById(int $studentId, $entityManager){
    $studentsRepository = getStudentRepository($entityManager);
    $student = $studentsRepository->find($studentId);

    if(!$student){
        return "Couldn't find the specified student.";
    }

    return $student;
}

function updateStudentName(int $studentId, string $newStudentName, $entityManager){
    $studentsRepository = getStudentRepository($entityManager);
    $student = $studentsRepository->find($studentId);

    if(!$student){
        return "Couldn't find the specified student.";
    }

    $student->setName($newStudentName);
    
    $entityManager->flush();

    return "Student name updated successfully.";
}

function deleteStudent(int $studentId, $entityManager){
    $student = findStudentById($studentId, $entityManager);

    if(gettype($student) == 'string'){
        return $student;
    }

    $entityManager->remove($student);
    $entityManager->flush();

    return "Student deleted successfully.";
}


createStudent("Joao Silva", $entityManager);

$studentsList = listStudents($entityManager);
foreach ($studentsList as $student) {
    echo($student->getName()) . PHP_EOL;
}

$singleStudent = findStudentByName("Mateus Oliveira", $entityManager);
echo($singleStudent->getName()) . PHP_EOL;

echo(updateStudentName(3, "Antonio Silva", $entityManager)) . PHP_EOL;

echo(deleteStudent(5, $entityManager)) . PHP_EOL;
