<?php


require_once __DIR__ . '/../../vendor/autoload.php';

use Mateus\Doctrine\entity\Phone;
use Mateus\Doctrine\entity\Student;
use Mateus\Doctrine\helper\EntityManagerFactory;

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();


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
