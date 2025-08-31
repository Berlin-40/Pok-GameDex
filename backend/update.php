
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("../backend/verifie.php");
// S’il y a des erreurs
$compteur_erreur = count(array_filter($erreurs));
if ($compteur_erreur != 0) {
    $idP = $_GET['idP']; // ID auto-incrémenté
    $cible = 'update';
    include("../fontend/form.php");
}
else{
    include_once '../includes/functions.php';
    $conexion = connecter();
    $idP = $_GET['idP']; // ID auto-incrémenté

    if($conexion == null){
        $zonePrincipale = "Erreur de connexion à la base de données.";
    }
    else{
    // Enregistrement des données

    if (empty($_FILES['image']['name'])) {
        $imagePath = "../uploads/nullImg.jpeg"; // Chemin par défaut si aucune image n'est fournie
    } else {
        $nomImage = basename($_FILES['image']['name']);
        $imagePath = "../uploads/"  . $nomImage;
        move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
    }
    $date_creation = dateVersSQL($date_creation);
    include_once '../includes/Jeux.php';
    // Requête SQL selon la recherche
    $stmt = $conexion->prepare("DELETE FROM Types WHERE idP = :id");
    $stmt->execute([':id' => $idP]);

    $recherche = $idP;
        include_once '../backend/types/updateTypes.php';
        include_once '../backend/jeu/updateJeux.php';
    // ✅ Affichage de confirmation
    $conexion = null; // Ferme la connexion
    header("Location: ../fontend/index.php?action=success&success=modification");
    }
    }    
?>