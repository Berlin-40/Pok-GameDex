<?php
// Inclure le fichier de vérification des erreurs
include("../backend/verifie.php");

// Vérifier s'il y a des erreurs dans le tableau $erreurs
$compteur_erreur = count(array_filter($erreurs)); // Compter le nombre d'erreurs
// echo $compteur_erreur; // Décommente si tu veux afficher le nombre d'erreurs
print_r($erreurs); // Afficher le contenu des erreurs

// Si des erreurs existent, on affiche le formulaire d'ajout
if ($compteur_erreur != 0) {
    $cible = 'ajouter'; // Définir la cible comme 'ajouter' si des erreurs existent
    include("../fontend/form.php"); // Inclure le formulaire pour corriger les erreurs
}
else {
    // Sinon, on continue l'enregistrement des données

    include_once '../includes/functions.php'; // Inclure la fonction de connexion à la base de données
    $conexion = connecter(); // Établir la connexion à la base de données

    // Si la connexion échoue, afficher un message d'erreur
    if ($conexion == null) {
        $zonePrincipale .= "Erreur de connexion à la base de données."; // Ajouter le message d'erreur dans la zone principale
    }
    else {
        // Si la connexion est réussie, enregistrer les données
        // Récupérer l'ID auto-incrémenté de la base de données
        $id = $conexion->lastInsertId();

        // Vérifier si une image a été téléchargée
        if (empty($_FILES['image']['name'])) {
            // Si aucune image n'est fournie, utiliser une image par défaut
            $imagePath = "../uploads/nullImg.jpeg"; 
        } else {
            // Si une image est fournie, déplacer l'image téléchargée dans le dossier d'uploads
            $nomImage = basename($_FILES['image']['name']);
            $imagePath = "../uploads/"  . $nomImage;
            move_uploaded_file($_FILES['image']['tmp_name'], $imagePath); // Déplacer l'image
        }

        // Inclure la classe Jeux et créer un objet pour sauvegarder les données
        include_once '../includes/Jeux.php';
        $jeux = new Jeux($id, $nom, $types, $idConsole, $idAuteur, $description, $date_creation, $imagePath);
        $jeux->sauvegarder(); // Sauvegarder les informations du jeu dans la base de données

        // Après l'enregistrement, rediriger vers la page de succès
        header("Location: ../fontend/index.php?action=success&success=ajout"); // Rediriger vers la page de succès
        exit(); // Arrêter l'exécution du script après la redirection
    }
}
?>
