<?php
// Inclure les fonctions nécessaires et la gestion du tri/recherche
include '../includes/functions.php';
include '../fontend/searchSort.php';

// Nombre de jeux par page
$parPage = 6; 

// Récupérer la page actuelle
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int) $_GET['page'] : 1;

// Calcul de l'offset pour la pagination
$offset = ($page - 1) * $parPage;

// Récupérer les jeux (avec recherche et tri si nécessaire)
$recherche = '*'; // Par défaut on récupère tous les jeux
include 'jeu/selectJeux.php';


// Connexion à la base de données
$pdo = connecter();

// Pagination : Récupérer le nombre total de jeux
$totalReq = $pdo->query("SELECT COUNT(*) FROM Jeux");
$total = $totalReq->fetchColumn();
$pages = ceil($total / $parPage);

// Affichage des jeux (cartes)
include '../fontend/jeuxCard.php';

// Affichage de la pagination
$action = 'afficher';
include '../includes/pagination.php';
?>
