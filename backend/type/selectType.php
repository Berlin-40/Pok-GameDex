<?php
// Inclure les fonctions nécessaires
include_once '../includes/functions.php';

// Connexion à la base de données
$pdo = connecter();

// Requête SQL selon la recherche
if ($recherche === '*') {
    // Si la recherche est '*', on récupère toutes les lignes de la table "Type"
    $stmt = $pdo->prepare("SELECT * FROM Type");
    $stmt->execute(); // Exécuter la requête
} else {
    // Sinon, on effectue une recherche spécifique avec l'idType passé dans $recherche
    // Préparer la requête pour chercher un type spécifique
    $stmt = $pdo->prepare("SELECT * FROM Type WHERE idType = :r");
    $stmt->execute([
        ':r' => $recherche, // Passer la valeur de $recherche dans la requête SQL
    ]);
}

// Récupérer les résultats sous forme de tableau associatif
$type = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
