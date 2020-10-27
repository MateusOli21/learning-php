<?php

namespace Mateus\Doctrine\repository;

use Doctrine\ORM\EntityRepository;
use Mateus\Doctrine\entity\Phone;
use Mateus\Doctrine\entity\Student;

class StudentRepository extends EntityRepository{
    public function createStudent( string $studentName, ...$phoneNumbers ){
        $entityManager = $this->getEntityManager();
        
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

    function findStudentById(int $studentId){
        $entityManager = $this->getEntityManager();

        $studentsRepository = getStudentRepository($entityManager);
        $student = $studentsRepository->find($studentId);
    
        if(!$student){
            return "Couldn't find the specified student.";
        }
    
        return $student;
    }

    public function listStudents(){
        $query = $this->createQueryBuilder('student')
        ->join('student.phones', 'phones')
        ->addSelect('phones')
        ->getQuery();

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

    public function deleteStudent(int $studentId) {
        $entityManager = $this->getEntityManager();

        $student = $this->findStudentById($studentId);

        if (gettype($student) == "string") {
            return $student;
        }
    
        $entityManager->remove($student);
        $entityManager->flush();
    
        return "Student deleted successfully.";
    }

    public function getTotalOfStudents(){
        $studentClass = Student::class;
        $entityManager = $this->getEntityManager();
        
        $dql = "SELECT COUNT(student) FROM $studentClass student";
        $query = $entityManager->createQuery($dql);
        $totalStudents = $query->getSingleScalarResult();
        
        return $totalStudents;
    }
}