<?php

// Para incluir um arquivo externo podemos utilizar o include, require ou require_once
require_once 'functions.php';

$contaUm = [
    'holder' => "Mateus",
    'balance' => 1500
];

$contaDois = [
    'holder' => "João",
    'balance' => 1800
];

$newAccount = createAccount('123.456', 'Mateus Oliveira', 200);
deposit($newAccount, 200);
// withdraw($contaUm, 1400);




