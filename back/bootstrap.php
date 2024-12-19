<?php
require_once "vendor/autoload.php";

use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

// Fonction pour détecter l'OS
function detectOS(): string
{
    return (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') ? 'windows' : 'mac';
}

// Détection de l'environnement à partir de APP_ENV ou fallback sur "dev"
$env = getenv('APP_ENV') ?: 'dev';

// Détection automatique du système d'exploitation
$os = detectOS();

// Définir si nous sommes en mode développement
$isDevMode = $env === 'dev';

// Chemin des entités
$paths = [__DIR__ . "/src/classes"];

// Configuration de Doctrine ORM
$config = ORMSetup::createAttributeMetadataConfiguration(
    paths: $paths,
    isDevMode: $isDevMode
);

// Configuration des bases de données en fonction de l'OS et de l'environnement
if ($env === 'dev') {
    if ($os === 'mac') {
        $connectionParams = [
            'driver'   => 'pdo_mysql',
            'user'     => 'root',
            'password' => 'root',
            'dbname'   => 'la_bouzinerie',
            'host'     => '127.0.0.1',
            'port'     => 8889, // Port par défaut pour MAMP sur Mac
        ];
    } else {
        // Configuration pour Windows (WAMP/XAMPP)
        $connectionParams = [
            'driver'   => 'pdo_mysql',
            'user'     => 'root',
            'password' => '',
            'dbname'   => 'la_bouzinerie',
            'host'     => '127.0.0.1',
            'port'     => 3306, // Port standard MySQL sur WAMP/XAMPP
        ];
    }
} else {
    // Configuration pour l'environnement de production
    $connectionParams = [
        'driver'   => 'pdo_mysql',
        'user'     => 'admin',
        'password' => 'secure_password',
        'dbname'   => 'la_bouzinerie',
        'host'     => '192.168.1.100', // Exemple d'IP pour un serveur distant
        'port'     => 3306,
    ];
}

// Connexion à la base de données
try {
    $connection = DriverManager::getConnection($connectionParams, $config);
    $entityManager = new EntityManager($connection, $config);
    // echo "✅ Configuration pour l'environnement : " . strtoupper($env) . " sur " . strtoupper($os) . " prête.";
} catch (\Exception $e) {
    // echo "❌ Erreur de connexion : " . $e->getMessage();
    exit(1);
}