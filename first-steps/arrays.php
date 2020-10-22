<?php

$numeros = [5, 12, 16, 21, 25, 30];


$segundaPosicao = $numeros[1];

// ordenação de array
sort($numeros);

// remover valor do array
unset($numeros[1]);


// diferença entre arrays
$arrayUm = ['Mateus', 'Pedro', 'Joao', 'Antonio'];
$arrayDois = ['Mateus', 'Pedro'];
$diferençaArrays = array_diff($arrayUm, $arrayDois);
var_dump($diferençaArrays);


//iterando sobre o array
$index = 0;
$tamanhoArray = count($numeros);

while($index < $tamanhoArray){
    // echo "$numeros[$index]" . PHP_EOL;
    $index += 1;
}

// usando explode e implode
/*
o explode funciona como o split do js, passando um array e um delimitador.
o delimitador é onde a função vai separar a string. 
a função retorna um array com as string criadas.
*/

$stringNomes = "Mateus, João, Pedro";
$arrayNomes = explode(', ',$stringNomes);

// var_dump($arrayNomes);

/*
o implode faz exatamente o contrario do explode
juntando as strings de um array em uma única string.
funciona da mesma forma que o join do javascript
*/

$returnString = implode(',', $arrayNomes);
// echo $returnString . PHP_EOL;



