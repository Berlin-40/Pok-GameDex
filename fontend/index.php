<?php

$zonePrincipale = ""; // Contenu principal de la page

// Récupération de l'action demandée (par défaut : 'home')
$action = $_GET['action'] ?? 'home';

// Inclusions communes
include '../includes/donnees.php';      // Variables ou constantes communes
include '../includes/header.php';       // Header HTML
include '../fontend/dashboard.php';     // Menu de navigation

// Routage des actions
switch ($action) {

    case 'afficher':
        include '../backend/afficher.php'; // Afficher tous les jeux
        break;

    case 'modifier':
        include 'modifier.php';           // Formulaire de modification
        break;

    case 'update':
        include '../backend/update.php';  // Traitement de la mise à jour
        break;

    case 'saisir':
        $idP = $_POST['idP'] ?? '';
        $cible = $_GET['cible'] ?? 'ajouter';
        require '../fontend/form.php';    // Formulaire (ajout ou modif)
        break;

    case 'ajouter':
        if (
            !isset($_POST['console']) &&
            !isset($_POST["nom"]) &&
            !isset($_POST["types"]) &&
            !isset($_POST["auteur"]) &&
            !isset($_POST["description"]) &&
            !isset($_POST["date_creation"])
        ) {
            // Si aucune donnée n'est envoyée, redirige vers le formulaire
            header('Location: index.php?action=saisir&cible=ajouter');
            exit;
        } else {
            include '../backend/ajouter.php'; // Traitement ajout
        }
        break;

    case 'supprimer':
        include '../fontend/supprimer.php'; // Confirmation de suppression
        break;

    case 'delete':
        include '../backend/delete.php';    // Suppression en base
        break;

    case 'afficherUnjeux':
        include '../backend/afficherUnjeux.php'; // Afficher un jeu en détail
        break;

    case 'success':
        include '../fontend/success.php';   // Message de succès
        break;

    case 'about':
        include '../fontend/about.php';     // À propos
        break;

    case 'search':
        include '../backend/searchSort.php'; // Recherche ou tri
        break;

    case 'home':
    default:
        include 'home.php'; // Page d'accueil
        break;
}

// Affichage du contenu principal généré
echo $zonePrincipale;

// Inclusion du pied de page
include '../includes/footer.php';
?>
