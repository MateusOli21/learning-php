<?php

// criando uma laço for padrão
$contador = 1;
for($contador; $contador <=15; $contador ++){
    echo "$contador" . PHP_EOL;
}

//Criando o mesmo laço, mas utilizando a estrutura while.
while($contador <= 15){
    echo "$contador" . PHP_EOL;
}

/*
Abaixo utilzo o break e continue, que servem como uma forma de pular uma interação 
ou quebrar a mesma em uma condição especifíca.
 */
for($contador; $contador <=12; $contador ++){
    if($contador == 6){
        continue;
    }else if($contador == 10){
        break;
    }

    echo "$contador" . PHP_EOL;
}

//Criando um laço com foreach
$numeros = [3,7,13,15];

foreach($numeros as $numero){
    echo $numero . PHP_EOL;
}