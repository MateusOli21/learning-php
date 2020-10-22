<?php

//criando arrays associativos agregando arrays

$nomes = ['Mateus', 'Joao', 'Antonio'];
$idades = [23, 20, 22];

$pessoas = array_combine($nomes, $idades);
// var_dump($pessoas);

echo "A idade de Mateus é $pessoas[Mateus]" . PHP_EOL;




//criando arrays associativos manualmente
$contaUm = [
    'titular' => "Mateus",
    'saldo' => 1500
];

$contaDois = [
    'titular' => "João",
    'saldo' => 1800
];

$contas = [$contaUm, $contaDois];

for($index = 0; $index < count($contas); $index ++){
    echo "Titular da conta " .$contas[$index]['titular'] . PHP_EOL;
}

foreach ($contas as $conta){
    echo $conta['titular'] . PHP_EOL;
}