<?php
// Active l'affichage des erreurs pour faciliter le débogage
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Inclusion du fichier contenant les fonctions, notamment la fonction de connexion à la base de données
include_once '../includes/functions.php';

// Connexion à la base de données via PDO (fonction définie dans functions.php)
$pdo = connecter();

// Préparation de la requête SQL de mise à jour des informations d'un jeu vidéo
$stmt = $pdo->prepare("
    UPDATE Jeux 
    SET jeux = :nom,              -- Mise à jour du nom du jeu
        idAuteur = :idAuteur,     -- Mise à jour de l'auteur
        idConsole = :idConsole,   -- Mise à jour de la console
        description = :description, -- Mise à jour de la description
        dateC = :date_creation,   -- Mise à jour de la date de création
        image = :imagePath        -- Mise à jour du chemin de l'image
    WHERE idP = :idP              -- Cible le jeu à modifier via son identifiant
");

// Exécution de la requête avec les données (assure-toi que toutes ces variables sont bien définies avant !)
$stmt->execute([
    ':nom' => $nom,
    ':idAuteur' => $idAuteur,
    ':idConsole' => $idConsole,
    ':description' => $description,
    ':date_creation' => $date_creation,
    ':imagePath' => $imagePath,
    ':idP' => $idP,
]);

// Libération des ressources
$stmt = null;
$pdo = null;
?>
