<?php

$contador = 0;

for($contador; $contador <= 100; $contador ++){
    if($contador % 2 == 0){
        // echo "$contador é par.";
        continue;
    }

    echo "$contador é ímpar." . PHP_EOL;
}