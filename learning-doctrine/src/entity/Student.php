<?php

namespace Mateus\Doctrine\entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @Entity(repositoryClass="Mateus\Doctrine\repository\StudentRepository")
 */
class Student{
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
     * @OneToMany(targetEntity="Phone", mappedBy="student", cascade={"remove", "persist"})
     */
    private $phones;

    /**
     * @ManyToMany(targetEntity="Course", mappedBy="students")
     */
    private $courses;

    public function __construct(){
        $this->phones = new ArrayCollection();
        $this->courses = new ArrayCollection();
    }
    
    public function getId(): int{
        return $this->id;
    }

    public function getName(): string{
        return $this->name;
    }
    
    public function setName(string $name): self{
        $this->name = $name;

        return $this;
    }

    public function addPhone(Phone $phone): self{
        $this->phones->add($phone);
        $phone->setStudent($this);
        return $this;
    }

    public function getPhones(): Collection{
        return $this->phones;
    }

    /**
     * @return Course[]
     */
    public function getCourses(): Collection{
        return $this->courses;
    }

    public function addCourse(Course $course): self{
        if ($this->courses->contains($course)) {
            return $this;
        }

        $this->courses->add($course);
        $course->addStudent($this);

        return $this;
    }
}