<?php


require_once __DIR__ . '/../../vendor/autoload.php';

use Mateus\Doctrine\entity\Phone;
use Mateus\Doctrine\entity\Student;


function getStudentRepository($entityManager){
    return $entityManager->getRepository(Student::class);
}


function createStudent( string $studentName, $entityManager, ...$phoneNumbers ){
    $newStudent = new Student();
    $newStudent->setName($studentName);

    if($phoneNumbers){
        foreach ($phoneNumbers as $phoneNumber) {
            $phone = new Phone();
            $phone->setNumber($phoneNumber);

            $newStudent->addPhone($phone);            
        }
    }

    $entityManager->persist($newStudent);    
    $entityManager->flush();
}

function listStudents($entityManager){
    $dql = "SELECT student FROM Mateus\\Doctrine\\entity\\Student student";
    $query = $entityManager->createQuery($dql);
    $studentsList = $query->getResult(); 

    foreach ($studentsList as $student) {
    $phoneNumbers = $student->getPhones()->map(function(Phone $phoneNumber){
        return $phoneNumber->getNumber();
    });

    echo "Name: {$student->getName()}" . PHP_EOL;
    echo "Phones: {$phoneNumbers[0]}" . PHP_EOL;
    echo PHP_EOL;
    }   
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

function getTotalOfStudents($entityManager){
    $studentClass = Student::class;
    $dql = "SELECT COUNT(student) FROM $studentClass student";
    $query = $entityManager->createQuery($dql);
    $totalSudents = $query->getSingleScalarResult();

    return $totalSudents;
}

