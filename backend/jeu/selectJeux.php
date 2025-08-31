<?php
include_once '../includes/functions.php';
$pdo = connecter();

// Nombre de résultats à limiter

// Requête SQL selon la recherche
if ($recherche === '*') {
    $stmt = $pdo->prepare("SELECT * FROM Jeux LIMIT :parPage OFFSET :offset");
    $stmt->bindParam(':parPage', $parPage, PDO::PARAM_INT);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
} else {
    // Rechercher par idP ou nom (par exemple), avec limite
    $stmt = $pdo->prepare("SELECT * FROM Jeux WHERE idP = :r");
    $stmt->bindParam(':r', $recherche, PDO::PARAM_INT);
    $stmt->execute();
}

$pdo = null; // Ferme la connexion
$jeux = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
