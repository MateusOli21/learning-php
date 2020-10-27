<?php

namespace Mateus\Doctrine\repository;

use Doctrine\ORM\EntityRepository;
use Mateus\Doctrine\entity\Course;
use Mateus\Doctrine\entity\Student;

class CourseRepository extends EntityRepository{
    public function createCourse(string $courseName){
        $entityManager = $this->getEntityManager();

        $course = new Course();
        $course->setName($courseName);
    
        $entityManager->persist($course);
        $entityManager->flush();
    }

    public function listCourses(){
        $query = $this->createQueryBuilder('courses')->getQuery();

        /** @var Course[] $courses */
        $courses = $query->getResult();

        foreach($courses as $course){
            echo $course->getName() . PHP_EOL;
        }

        echo PHP_EOL;
    }
    
    public function insertStudentInCourse(int $studentId, int $courseId){
        $entityManager = $this->getEntityManager();
        
        /** @var Course $course*/
        $course = $entityManager->find(Course::class, $courseId);
        
        /** @var Student $student*/
        $student = $entityManager->find(Student::class, $studentId); 
        
        $course->addStudent($student);
        
        $entityManager->flush();
    }
}