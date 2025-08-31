<?php
// Inclusion de la fonction de connexion à la base de données
include_once '../includes/functions.php';

// Connexion à la base de données
$pdo = connecter();

// Requête SQL selon la valeur de $recherche

// Si $recherche est égal à '*', cela signifie qu'on souhaite afficher tous les auteurs
if ($recherche === '*') {
    // Préparation de la requête pour récupérer tous les auteurs
    $stmt = $pdo->prepare("SELECT * FROM Auteurs");
    // Exécution de la requête pour récupérer tous les résultats
    $stmt->execute();
} else {
    // Si une valeur spécifique est recherchée, on prépare une requête pour rechercher un auteur par son idAuteur
    // Préparation de la requête pour rechercher un auteur par son idAuteur
    $stmt = $pdo->prepare("SELECT * FROM Auteurs WHERE idAuteur = :id");
    // Exécution de la requête avec la valeur de :id égale à $recherche
    $stmt->execute([':id' => $recherche]);
}

// Récupération des résultats de la requête sous forme de tableau associatif
$auteurs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
