<?php

class Calculator {
    public function calcAverage(array $arrayNumbers): ?float {
        $isValidArray = $this->checkArrayLen($arrayNumbers);

        if(!$isValidArray){
            return null;
        }
            
            
            $arrayLen = sizeof($arrayNumbers);
            $sum = 0;
            
            for($index = 0; $index < $arrayLen; $index++){
                $sum += $arrayNumbers[$index];
        }

        $average = $sum / $arrayLen;

        return $average;
    }

    private function checkArrayLen($arrayNumbers){
        if (sizeof($arrayNumbers) <= 0){
            return false;
        }

        return true;
    }
}