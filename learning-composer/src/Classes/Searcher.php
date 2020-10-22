<?php

namespace Alura\BuscadorDeCursos\Classes;

class Searcher {
    private $name;
    
    public function __construct(string $nameValue){
        $this->name = $nameValue;
    }

    public function returnName(){
        return $this->name;
    }
}