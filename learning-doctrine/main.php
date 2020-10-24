<?php

use Mateus\Doctrine\entity\Phone;

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/src/commands/studentsCommands.php';


$singleStudent = findStudentByName("Mateus Oliveira", $entityManager);
echo $singleStudent->getName() . PHP_EOL;

$studentsList = listStudents($entityManager);
foreach ($studentsList as $student) {
    $phoneNumbers = $student->getPhones()->map(function(Phone $phoneNumber){
        return $phoneNumber->getNumber();
    });

    echo "Name: {$student->getName()}" . PHP_EOL;
    echo "Phones: {$phoneNumbers[0]}" . PHP_EOL;
    echo PHP_EOL;
}

// createStudent('Pedro Silva', $entityManager, '11947586932');
// echo(updateStudentName(3, "Antonio Silva", $entityManager)) . PHP_EOL;
// echo(deleteStudent(5, $entityManager)) . PHP_EOL;
