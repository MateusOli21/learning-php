<?php

namespace Mateus\MVC\entity;

/**
 * @Entity
 * @Table(name="users")
 */
class User {
    
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private $id;

    /**
     * @Column(type="string")
     */
    private $email;
    
    /**
     * @Column(type="string")
     */
    private $password;

    public function getId(): int{
        return $this->id;
    }

    public function getEmail(): string{
        return $this->email;
    }

    public function setEmail($email): self{
        $this->email = $email;

        return $this;
    }

    public function getPassword(): string{
        return $this->password;
    }

    public function setPassword($password): self{
        $this->password = $password;

        return $this;
    }

    public function verifyPassword(string $basePassword): bool{
        return password_verify($basePassword, $this->password);
    }
}