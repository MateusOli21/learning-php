<?php

namespace Mateus\Doctrine\entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity(repositoryClass="Mateus\Doctrine\repository\CourseRepository")
 */
class Course{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private $id;

    /**
     * @Column(type="string")
     */
    private $name;

    /**
     * @ManyToMany(targetEntity="Student", inversedBy="courses")
     */
    private $students;

    public function __construct(){
        $this->students = new ArrayCollection();
    }

    public function getId(): int{
        return $this->id;
    }

    public function getName(): string{
        return $this->name;
    }

    public function setName($name): self{
        $this->name = $name;

        return $this;
    }

    public function getStudents(){
        return $this->students;
    }

    public function addStudent(Student $student): self{
        if ($this->students->contains($student)) {
            return $this;
        }

        $this->students->add($student);
        $student->addCourse($this);

        return $this;
    }
}