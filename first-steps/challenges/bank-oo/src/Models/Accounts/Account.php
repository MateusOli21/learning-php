<?php

abstract class Account extends Person {
    private $balance;
    private static $numberOfAccounts = 0;

    public function __construct( string $cpfValue, string $nameValue){
        parent::__construct($cpfValue, $nameValue);
        $this->balance = 0;  

        self::$numberOfAccounts++;      
    }

    private static function recoverNumberOfAccounts(): int{
        return self::$numberOfAccounts;
    }
    
    public function depositCash(float $depositValue): void {
        if($depositValue <= 0){
            echo "É necessário um valor positivo para depositar" . PHP_EOL;
            return;
        }

        $this->balance += $depositValue;
    }

    public function withdrawCash(float $withdrawValue): void{
        $tariffValue = $withdrawValue * $this->farePercentage();
        $chargedWithdraw = $withdrawValue + $tariffValue;

        if($chargedWithdraw > $this->balance){
            echo 'O valor que você deseja sacar é maior que o saldo da conta.' . PHP_EOL;
            return;
        }


        $this->balance -= $chargedWithdraw;
    }

    abstract public function farePercentage():float;

    public function checkHolderCpf(): string{
        return $this->cpf;
    }
    
    public function checkHolderName(): string{
        return $this->name;
    }

    public function checkBalance(): float{
        return $this->balance;
    }

    public function __destruct(){
        self::$numberOfAccounts--;
    }

}