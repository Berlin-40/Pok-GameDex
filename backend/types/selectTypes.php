<?php
// Inclure les fonctions nécessaires
include_once '../includes/functions.php';

// Connexion à la base de données
$pdo = connecter();

// Vérification de la valeur de la variable de recherche
if ($recherche == '*') {
    // Si la recherche est vide ou égale à '*' (afficher tout), on sélectionne toutes les entrées de la table Types
    $stmt = $pdo->query("SELECT * FROM Types");
} else {
    // Si une recherche spécifique est effectuée, on cherche par idP (id du jeu par exemple)
    // Préparer la requête avec un paramètre pour éviter les injections SQL
    $stmt = $pdo->prepare("SELECT * FROM Types WHERE idP = :r");
    // Exécuter la requête en passant la valeur de recherche
    $stmt->execute([
        ':r' => $recherche
    ]);
}

// Récupération des résultats sous forme de tableau associatif
$types = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
