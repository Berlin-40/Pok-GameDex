<?php
// Récupérer le paramètre "success" depuis l'URL
$success = $_GET['success'] ?? '';
$zonePrincipale = '';

// Vérification et message personnalisé en fonction de l'action
switch ($success) {
    case 'ajout':
        $zonePrincipale = '<div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Succès !</h4>
            <p>Le jeu a été ajouté avec succès à la base de données. Merci de contribuer à la communauté !</p>
            <hr>
            <p class="mb-0"><a href="../fontend/index.php?action=home" class="btn btn-primary">Retour à l\'accueil</a></p>
        </div>';
        break;

    case 'modification':
        $zonePrincipale = '<div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Succès !</h4>
            <p>Les modifications ont été appliquées avec succès. Le jeu est maintenant à jour.</p>
            <hr>
            <p class="mb-0"><a href="../fontend/index.php?action=home" class="btn btn-primary">Retour à l\'accueil</a></p>
        </div>';
        break;

    case 'suppression':
        $zonePrincipale = '<div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Succès !</h4>
            <p>Le jeu a été supprimé avec succès. Nous espérons que vous reviendrez nous proposer de nouveaux jeux.</p>
            <hr>
            <p class="mb-0"><a href="../fontend/index.php?action=home" class="btn btn-primary">Retour à l\'accueil</a></p>
        </div>';
        break;

    default:
        // Message générique si aucune action n'est spécifiée
        $zonePrincipale = '<div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Succès !</h4>
            <p>L\'action a été effectuée avec succès.</p>
            <hr>
            <p class="mb-0"><a href="../fontend/index.php?action=home" class="btn btn-primary">Retour à l\'accueil</a></p>
        </div>';
        break;
}

?>
