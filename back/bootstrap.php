<?php
require_once "vendor/autoload.php";

use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

// Create a simple "default" Doctrine ORM configuration for Attributes
$config = ORMSetup::createAttributeMetadataConfiguration(
    paths: array(__DIR__."/src/classes"),
    isDevMode: true,
);

// configuring the database connection
$connection = DriverManager::getConnection(
[
    'driver'    => 'pdo_mysql',
    'user'      => 'root',
    'password'  => '',
    'dbname'    => 'la_bouzinerie',
    'port'      => 3306
  ],
  $config
);

// obtaining the entity manager
$entityManager = new EntityManager($connection, $config);
