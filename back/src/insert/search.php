<?php
if (isset($_GET['q'])) {
    $query = htmlspecialchars($_GET['q']); // Éviter les failles XSS

    // Connexion bdd
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=la_bouzinerie', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Erreur de connexion à la base de données']);
        exit;
    }

    // Requête SQL
    $stmt = $pdo->prepare("SELECT title FROM quizz WHERE title LIKE :query LIMIT 10");
    $stmt->execute(['query' => '%' . $query . '%']);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($results);
} else {
    echo json_encode(['error' => 'Aucun terme de recherche fourni']);
}

// API pour aller chercher les données dans la bdd
?> 


