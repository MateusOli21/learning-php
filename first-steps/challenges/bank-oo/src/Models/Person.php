<?php

// namespace Raiz\Src\Models\Person;

class Person {
    protected $name;
    protected $cpf;

    public function __construct(string $cpfValue, string $nameValue){
        $this->nameIsValid($nameValue);

        $this->cpf = $cpfValue;
        $this->name = $nameValue;
    }

    public function checkCpf(): string{
        return $this->cpf;
    }

    public function checkName(): string{
        return $this->name;
    }

    protected function nameIsValid($holderNameValue){
        if(strlen($holderNameValue) < 5){
            echo "O nome precisa conter no mínimo cinco caracteres." . PHP_EOL;
            exit();        
        }
    }
}