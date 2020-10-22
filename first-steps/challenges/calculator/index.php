<?php

require_once 'Calculator.php';

$calculator = new Calculator();

$numbers = [2,4,6,8];
$teste = [];

$arrayAverage = $calculator->calcAverage($numbers);

echo $arrayAverage . PHP_EOL;

