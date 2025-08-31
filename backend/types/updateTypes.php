
<?php
include_once '../includes/functions.php';
$pdo = connecter();
 
// On suppose que $idP et $types sont déjà définis et valides
    // Préparer la requête une seule fois

    $stmt = $pdo->prepare("INSERT INTO Types (idP, idType) VALUES (:idP, :idType)");
    
    // Exécution de l'insertion pour chaque type
    foreach ($types as $type) {
    $stmt->execute([
        ':idP' => $idP,
        ':idType' => $type
    ]);
}
//fermer la connexion
$pdo = null;
?>
