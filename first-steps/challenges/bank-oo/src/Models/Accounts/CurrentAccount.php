<?php

require_once 'Account.php';

class CurrentAccount extends Account{
    public function farePercentage():float{
        return 0.05;
    }

    public function transferCash(float $transferValue, Account $destinyAccount): void{
        if($transferValue > $this->balance){
            echo "Você não possui saldo em conta para realizar essa transefência." . PHP_EOL;
            return;
        }

        $this->withdrawCash($transferValue);
        $destinyAccount->depositCash($transferValue);
    }
}