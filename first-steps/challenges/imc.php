<?php

$peso = 120;
$altura = 1.77;

$imc = $peso / $altura ** 2;

echo "O seu IMC é $imc e você está ";

if($imc <= 18.5){
    echo "abaixo do peso.";    
} elseif($imc > 18.5 && $imc <= 24.9){
    echo "com peso normal.";
}elseif($imc > 24.9 && $imc <= 29.9){
    echo "com sobre peso";
}elseif($imc > 29.9 && $imc <= 34.9){
    echo "com obesidade grau 1.";
}elseif($imc > 34.9 && $imc <= 39.9){
    echo "com obesidade grau 2.";
}else{
    echo "com obesidade grau 3.";
}

