<?php

// Abaixo temos a forma tradicional de escrever uma condição.
$idade = 20;
$idadeJoao = 16;

if ($idadeJoao <= $idade){
    echo "João é mais novo.";
}else {
    echo "João é mais velho.";
}

// aqui utilizamos operadores ternários para realizar a mesma condição acima.
$comparaIdade = $idadeJoao <= $idade ? "João é mais novo." : "João é mais velho.";
echo $comparaIdade;
