<?php

$numbersArray = [2,4,6,8,10];

// O list é uma funcionalidade para pegar valores de uma array e associa-los em uma variável
// Essas são a duas formas mais comuns de usar o list.
list($numberIndexZero, , $numberIndexTwo) = $numbersArray;

[,$numberIndexOne, , ,$numberIndexFour ] = $numbersArray;

echo "O número de index 0 é $numberIndexZero" . PHP_EOL;
echo "O número de index 1 é $numberIndexOne " . PHP_EOL;
echo "O número de index 2 é $numberIndexTwo" . PHP_EOL;
echo "O número de index 4 é $numberIndexFour" . PHP_EOL;

// o unset serve para remover um  valor de um array.
unset($numbersArray[2]);


// echo  $numbersArray . PHP_EOL;
