<?php
// deleteJeux.php

// Inclusion de la fonction de connexion à la base de données
include_once '../includes/functions.php';

// Connexion à la base de données
$pdo = connecter();

// Requête SQL pour supprimer un jeu de la table 'Jeux' selon l'idP

// Préparation de la requête DELETE
$stmt = $pdo->prepare("DELETE FROM Jeux WHERE idP = :r");

// Exécution de la requête en passant l'idP en paramètre
$stmt->execute([
    ':r' => $recherche, // L'idP à supprimer (provenant de la variable $recherche)
]);

// Suppression des types associés au jeu supprimé
include_once '../types/deleteTypes.php';

?>
