<?php
// Initialisation de la zone principale du jeu
$zonePrincipale = "<div class='game-detail-container'>";

// Récupération de l'ID du jeu depuis l'URL
$recherche = $_GET['idP'];
include_once 'jeu/selectJeux.php'; // Récupération des détails du jeu

// Détails du jeu
$zonePrincipale .= "<div class='game-card-detail'>";
$zonePrincipale .= "<img src='../uploads/" . htmlspecialchars($jeux[0]['image']) . "' alt='Image de " . htmlspecialchars($jeux[0]['jeux']) . "' class='game-image-detail' />";
$zonePrincipale .= "<h3 class='game-title-detail'>" . htmlspecialchars($jeux[0]['jeux']) . "</h3>";

// Auteur du jeu
$recherche = $jeux[0]['idAuteur'];
include_once 'auteur/selectAuteur.php'; // Récupération de l'auteur
$auteur = $auteurs[0]['auteur'];
$zonePrincipale .= "<p><strong>Auteur :</strong> " . htmlspecialchars($auteur) . "</p>";

// Console du jeu
$recherche = $jeux[0]['idConsole'];
include_once 'console/selectConsole.php'; // Récupération de la console
$zonePrincipale .= "<p><strong>Console :</strong> " . htmlspecialchars($consoles[0]['console']) . "</p>";

// Types du jeu
$zonePrincipale .= "<p><strong>Type :</strong> ";
$recherche = $jeux[0]['idP'];
include_once 'types/selectTypes.php'; // Récupération des types du jeu
foreach ($types as $id) {
    $recherche = $id['idType'];
    include 'type/selectType.php'; // Récupération de chaque type
    $zonePrincipale .= htmlspecialchars($type[0]['nomType']) . " ";
}
$zonePrincipale .= "</p>";

// Date de création du jeu
$zonePrincipale .= "<p><strong>Date de création :</strong> " . htmlspecialchars(dateVersFr($jeux[0]['dateC'])) . "</p>";

// Description du jeu avec retour à la ligne pour les paragraphes
$zonePrincipale .= "<p class='game-description'>" . nl2br(htmlspecialchars($jeux[0]['description'])) . "</p>";
$zonePrincipale .= "</div>";

// Actions : Modifier ou Supprimer
$zonePrincipale .= "<div class='game-actions'>";
$zonePrincipale .= "<a href='index.php?action=modifier&idP=" . $jeux[0]['idP'] . "' class='btn edit'>Modifier</a>";
$zonePrincipale .= "<a href='index.php?action=supprimer&idP=" . $jeux[0]['idP'] . "' class='btn delete'>Supprimer</a>";
$zonePrincipale .= "</div>";

// Fin du conteneur principal
$zonePrincipale .= "</div>";
?>
