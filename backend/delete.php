<?php
/**
 * Script de suppression d'un jeu et de ses types associés.
 * Ferme correctement la connexion et supprime l'image si elle existe.
 */

include_once '../includes/functions.php';
$conexion = connecter();

if ($conexion === null) {
    $zonePrincipale = "Erreur de connexion à la base de données.";
} else {
    $recherche = $_POST['idP'];

    // Facultatif : récupérer le nom de l'image pour la supprimer physiquement
    $stmt = $conexion->prepare("SELECT image FROM Jeux WHERE idP = :idP");
    $stmt->execute([':idP' => $recherche]);
    $imageData = $stmt->fetch();

    if ($imageData && $imageData['image'] !== 'nullImg.jpeg') {
        $imagePath = "../uploads/" . $imageData['image'];
        if (file_exists($imagePath)) {
            unlink($imagePath); // Supprime l'image du serveur
        }
    }

    // Suppression des types liés
    include_once '../backend/types/deleteTypes.php';

    // Suppression du jeu
    include_once '../backend/jeu/deleteJeux.php';

    // Fermeture de la connexion
    $conexion = null;

    // Redirection
    header("Location: ../fontend/index.php?action=success&success=suppression");
    exit;
}
?>
