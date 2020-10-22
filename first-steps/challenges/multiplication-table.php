<?php

$contador = 1;
$multiplicador = 3;

for($contador; $contador <=10; $contador ++){
    $resultado = $contador * $multiplicador;

    echo "$multiplicador X $contador = $resultado" .PHP_EOL;
}