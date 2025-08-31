<?php

// La requête SQL pour insérer un nouveau jeu dans la base de données
$sql = "INSERT INTO Jeux (jeux, idAuteur, idConsole, description, dateC, image)
        VALUES (:nom, :idAuteur, :idConsole, :description, :dateC, :imagePath)";
        
// Préparer la requête SQL avec la connexion à la base de données
$stmt = $connexion->prepare($sql);

// Lier les paramètres avec les variables PHP
$stmt->bindParam(':nom', $nom);                // Lier le nom du jeu
$stmt->bindParam(':idAuteur', $idAuteur);       // Lier l'identifiant de l'auteur
$stmt->bindParam(':idConsole', $idConsole);     // Lier l'identifiant de la console
$stmt->bindParam(':description', $description); // Lier la description du jeu
$stmt->bindParam(':dateC', $date_creation);     // Lier la date de création (dateC)
$stmt->bindParam(':imagePath', $imagePath);     // Lier le chemin de l'image du jeu

// Exécuter la requête d'insertion
$stmt->execute();

?>
