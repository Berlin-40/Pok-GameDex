<?php

$idP = $_GET['idP'] ?? ''; // Récupération sécurisée de l'ID du jeu

// Zone principale du formulaire avec la méthode GET et l'idP dans un champ caché
$zonePrincipale  = '
<form action="index.php" method="get">
  
  <!-- Champ caché pour transmettre l\'idP et cible -->
    <input type="hidden" name="action" value=saisir>
  <input type="hidden" name="idP" value="' . htmlspecialchars($idP) . '">
  <input type="hidden" name="cible" value="update">

  <p>⚠️ Voulez-vous vraiment modifier ce jeu ?</p>

  <p>
    <input type="submit" value="Oui, modifier" class="btn btn-danger">
    <a href="index.php?action=afficherUnjeux&idP=' . urlencode($idP) . '" class="btn btn-secondary">Non, annuler</a>
  </p>
</form>';

?>
