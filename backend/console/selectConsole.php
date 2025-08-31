<?php
// Inclusion de la fonction de connexion à la base de données
include_once '../includes/functions.php';

// Connexion à la base de données
$pdo = connecter();

// Requête SQL en fonction de la valeur de $recherche

// Si $recherche est égal à '*', cela signifie qu'on souhaite afficher toutes les consoles
if ($recherche === '*') {
    // Préparation de la requête pour récupérer toutes les consoles
    $stmt = $pdo->prepare("SELECT * FROM Consoles");
    $stmt->execute();  // Exécution de la requête
} else {
    // Si une valeur spécifique est recherchée, on prépare une requête pour filtrer par idConsole
    // Préparation de la requête pour rechercher une console par son idConsole
    $stmt = $pdo->prepare("SELECT * FROM Consoles WHERE idConsole = :id");
    // Exécution de la requête avec la valeur de :id égale à $recherche
    $stmt->execute([':id' => $recherche]);
}

// Récupération des résultats de la requête sous forme de tableau associatif
$consoles = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
