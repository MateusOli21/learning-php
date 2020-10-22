<?php

function showMessage($message){
    echo $message . PHP_EOL;
}

function createAccount(string $cpf, string $holderName, float $initialBalance){
    if($initialBalance < 0){
        showMessage('Você não pode iniciar uma conta com valor negativo');
        return;
    }

    $cpf = [
        'holder' => $holderName,
        'balance' => $initialBalance
    ];

    return $cpf;
}

function withdraw($account, $takeawayValue){
    if ($takeawayValue > $account['balance']) {
        showMessage("Você não pode sacar este valor");
    } else {
        $account['balance'] -= $takeawayValue;
        showMessage("Você retirou R$$takeawayValue e agora possui R$ $account[balance].");
    }
}

function deposit($account, $depositValue){
    if($depositValue <= 0){
        showMessage('Depósitos precisam ser com valores maiores que zero.');
    }else{
        $account['balance'] += $depositValue;
        
        showMessage("Deposito realizado com sucesso. Você possui agora {$account['balance']}.");
    }
}

//podemos tipar uma função da seguinte maneira
function dep( array $conta, float $valorDeposito) : float {
    if($valorDeposito <= 0){
        echo 'teste';
    } else{
        $newBalance = $conta['balance'] += $valorDeposito;

        return $newBalance;
    }
}