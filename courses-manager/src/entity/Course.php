<?php

namespace Mateus\MVC\entity;

/**
 * @Entity
 * @Table(name="courses")
 */
class Course {

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
     * @Column(type="string")
     */
    private $description;


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

    public function getDescription(): string{
        return $this->description;
    }

    public function setDescription(string $description): self{
        $this->description = $description;

        return $this;
    }
}