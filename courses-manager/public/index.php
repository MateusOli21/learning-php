<?php

use Mateus\MVC\entity\Course;
use Mateus\MVC\infra\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager(); 

$coursesRepository = $entityManager->getRepository(Course::class);

/** @var Course[] $courses */
$courses = $coursesRepository->findAll();

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Courses register</title>
</head>
<body>
    <div class="container">
        <div class="jumbotron">
            <h1>Lista de cursos</h1>
        </div>
        <a href="newCourseForm.php" class="btn btn-primary mb-2">Adicionar curso</a>
    </div>

    <ul class="list-group">
    <?php
        foreach($courses as $course): ?>
        <li class="list-group-item">
            <?= $course->getName(); ?>
        </li>

        <?php endforeach; ?>
    </ul>
    
</body>
</html>

