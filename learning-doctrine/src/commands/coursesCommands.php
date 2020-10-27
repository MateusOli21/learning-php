<?php

use Mateus\Doctrine\entity\Course;
use Mateus\Doctrine\entity\Student;

require_once __DIR__ . '/../../vendor/autoload.php';

function createCourse(string $courseName, $entityManager){
    $course = new Course();
    $course->setName($courseName);

    $entityManager->persist($course);
    $entityManager->flush();
}

function insertStudentInCourse(int $studentId, int $courseId, $entityManager){
    /** @var Course $course*/
    $course = $entityManager->find(Course::class, $courseId);
    
    /** @var Student $student*/
    $student = $entityManager->find(Student::class, $studentId); 

    $course->addStudent($student);

    $entityManager->flush();
}

function listCoursesAndStudents($entityManager){
    $studentsRepo = $entityManager->getRepository(Student::class);

    /** @var Student[] $students */
    $students = $studentsRepo->findAll();

    foreach($students as $student){
        echo "ID: {$student->getId()}" . PHP_EOL;
        echo "Name: {$student->getName()}" . PHP_EOL;

        /** @var Course[] $courses */
        $courses = $student->getCourses();

        foreach($courses as $course){
            echo "\t ID course: {$course->getId()}" . PHP_EOL;
            echo "\t Course: {$course->getName()}" . PHP_EOL;            
        }
        
        echo PHP_EOL;
    }
}

function listCoursesAndStudentsWithDql($entityManager){
    $studentClass = Student::class;
    $dql = "SELECT student, phones FROM $studentClass student JOIN student.phones phones";
    $query = $entityManager->createQuery($dql);

    /** @var Student[] $students */
    $students = $query->getResult();

    foreach($students as $student){
        echo "Name: {$student->getName()}" . PHP_EOL;

        $phones = $student->getPhones();

        foreach($phones as $phone){
            echo "Phone: {$phone->getNumber()}" . PHP_EOL;
        }

        /** @var Course[] $courses  */
        $courses = $student->getCourses();

        foreach($courses as $course){
            echo "\t Course: {$course->getName()}" . PHP_EOL;  
            echo PHP_EOL;   
        }

    }
}

