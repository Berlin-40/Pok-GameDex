<?php
$zonePrincipale .= "<h1 > Liste des jeux Jeux</h1>";

$zonePrincipale .='<div class="content-container">';

foreach ($jeux as $row) {
    // Récupération des informations liées à l'auteur et à la console
    $recherche = $row['idAuteur'];
    include '../backend/auteur/selectAuteur.php';
    $auteurNom = $auteurs[0]['auteur'];

    $recherche = $row['idConsole'];
    include '../backend/console/selectConsole.php';
    $consoleNom = $consoles[0]['console'];

    // Début de la carte du jeu

    $zonePrincipale .='<div class="column">';

    $zonePrincipale .='  <div class="game-card">';
    $zonePrincipale .= "<div class='game-card-header'>";
    $zonePrincipale .= "<img src='" . htmlspecialchars($row['image']) . "' alt='Image de " . htmlspecialchars($row['jeux']) . "' class='game-card-img' />";
    $zonePrincipale .= "<div class='game-card-title'><h2><a href='../fontend/index.php?action=afficherUnjeux&idP=" . $row['idP'] . "'>" . htmlspecialchars($row['jeux']) . "</a></h2></div>";
    $zonePrincipale .= '</div>'; // .game-card-header
    $zonePrincipale .= "<div class='game-card-body'>";
    $zonePrincipale .= "<p><strong>Console:</strong> " . htmlspecialchars($consoleNom) . "</p>";
    $zonePrincipale .= "<p><strong>Auteur:</strong> " . htmlspecialchars($auteurNom) . "</p>";
    $zonePrincipale .= "<p><strong>Type:</strong> ";
    $recherche = $row['idP'];
    include '../backend/types/selectTypes.php';
    foreach ($types as $id) {
        $recherche = $id['idType'];
        include '../backend/type/selectType.php';
        $zonePrincipale .= htmlspecialchars($type[0]['nomType']) . " ";
    }
    $zonePrincipale .= "</p>";
    $zonePrincipale .= "<p><strong>Date:</strong> " . htmlspecialchars(dateVersFr($row['dateC'])). "</p>";
    $zonePrincipale .= "</div>"; // .game-card-body
    $zonePrincipale .= "</div>"; // .game-card
    $zonePrincipale .= "</div>"; // .column
}
$zonePrincipale .= '</div>'; // .content-container
?>
