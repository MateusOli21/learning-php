<?php

require_once 'Account.php';

class DepositAccount extends Account{
    public function farePercentage():float{
        return 0.03;
    }
}