<?php

require_once 'Person.php';

class Employee extends Person {
    private $role;

    public function __construct(string $cpfValue, string $nameValue, string $roleValue){
        parent::__construct($cpfValue, $nameValue);
        $this->role = $roleValue;
    }

    public function checkRole():string{
        return $this->role;
    }
    
    public function checkEmployeeName(): string {
        return $this->name;
    }

    public function checkEmployeeCpf(): string {
        return $this->cpf;
    }
}