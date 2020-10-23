<?php

// replace with file to your own project bootstrap
require_once __DIR__ . '/vendor/autoload.php';

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Mateus\Doctrine\helper\EntityManagerFactory;

// replace with mechanism to retrieve EntityManager in your app
$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

return ConsoleRunner::createHelperSet($entityManager);