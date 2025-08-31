<?php
// Inclure les fonctions nécessaires
include_once '../includes/functions.php';

// Connexion à la base de données
$pdo = connecter();

// Préparer la requête SQL pour supprimer des entrées dans la table Types
// La requête va supprimer les lignes où l'idP correspond à la valeur de $recherche
$stmt = $pdo->prepare("DELETE FROM Types WHERE idP = :r");

// Exécuter la requête avec la valeur de $recherche passée en paramètre
$stmt->execute([
    ':r' => $recherche, // Utilisation de :r pour lier la variable $recherche à la requête SQL
]);
//fermer la connexion
$pdo = null;
?>
