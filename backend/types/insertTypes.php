<?php
// Inclure les fonctions nécessaires
include_once '../includes/functions.php';

// Connexion à la base de données
$pdo = connecter();

// Préparer la requête d'insertion dans la table Types
$stmt = $pdo->prepare("INSERT INTO Types (idP, idType) VALUES (:idP, :idType)");

// Parcourir chaque type dans le tableau $types
foreach ($types as $type) {
    // Assurer que l'idType est un entier et exécuter la requête pour insérer chaque type associé à un jeu (idP)
    $stmt->execute([
        ':idP' => $idP,    // ID du jeu pour lequel on insère le type
        ':idType' => $type // ID du type à insérer
    ]);
    
   
}
// Fermer la connexion
$pdo = null;
?>
