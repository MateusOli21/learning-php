<?php

namespace Mateus\Doctrine\entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 *@Entity
 */
class Phone {
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private $id;

    /**
     * @Column(type="string")
     */
    private $number;

    /**
     * @ManyToOne(targetEntity="Student")
     */
    private $student;


    public function getId() : int{
        return $this->id;
    }

    public function getNumber() : string{
        return $this->number;
    }

    public function setNumber(string $number): self{
        $this->number = $number;

        return $this;
    }

    public function getStudent(): Student{
        return $this->student;
    }

    public function setStudent(Student $student): self{
        $this->student = $student;

        return $this;
    }
}