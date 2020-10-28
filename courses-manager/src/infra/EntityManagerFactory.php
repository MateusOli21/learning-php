<?php

namespace Mateus\MVC\infra;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;

class EntityManagerFactory{
    public function getEntityManager(): EntityManagerInterface{
        $paths = [__DIR__ . '/../entity'];
        $isDevMode = true;

        $config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);

        $connection = [
            'driver' => 'pdo_sqlite',
            'path' => __DIR__ . '/../..' . '/database/db.sqlite'
        ];

        return EntityManager::create($connection, $config);
    }
}