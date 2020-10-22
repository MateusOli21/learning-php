<?php

require_once './src/Models/Employee.php';
require_once './src/Models/Accounts/CurrentAccount.php';
require_once './src/Models/Accounts/DepositAccount.php';

$employeeMateus = new Employee('123.456', 'Mateus Oliveira', 'Desenvoledor');
// echo $employeeMateus->checkEmployeeName() . PHP_EOL;
// echo $employeeMateus->checkEmployeeCpf() . PHP_EOL;
// echo $employeeMateus->checkRole() . PHP_EOL;
// var_dump($employeeMateus);

$currentAccountMateus = new CurrentAccount('123.789', 'Mateus Abreu');
$currentAccountMateus->depositCash(250);
$currentAccountMateus->withdrawCash(25);
$currentAccountMateus->checkBalance(). PHP_EOL;
// echo $currentAccountMateus->checkHolderName() . PHP_EOL;
// echo $currentAccountMateus->checkHolderCpf(). PHP_EOL;
// var_dump($currentAccountMateus);

$DepositAccountMateus = new DepositAccount('123.789', 'Mateus Abreu');
$DepositAccountMateus->depositCash(250);
$DepositAccountMateus->withdrawCash(25);
// echo $DepositAccountMateus->checkBalance(). PHP_EOL;
// echo $DepositAccountMateus->checkHolderName() . PHP_EOL;
// echo $DepositAccountMateus->checkHolderCpf(). PHP_EOL;





// var_dump($accountMateus);