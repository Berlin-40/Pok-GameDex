<?php

$idP = $_GET['idP'] ?? ''; // Récupération sécurisée de l'ID du jeu

$zonePrincipale = '
<form action="index.php?action=delete" method="post">
  <div class="confirmation-container">
    <h3 class="confirmation-title">Confirmation de suppression</h3>
    
    <p class="confirmation-message">
      Ce jeu pourrait encore intéresser d\'autres joueurs. Sa suppression est <strong>définitive</strong> et <strong>irréversible</strong>.
      <br>Si vous souhaitez corriger des erreurs, préférez le modifier.
      <br><strong>⚠️ Êtes-vous sûr de vouloir continuer ?</strong>
    </p>

    <input type="hidden" name="idP" value="' . htmlspecialchars($idP) . '"/>

    <div class="confirmation-buttons">
      <input type="submit" value="Supprimer" class="btn btn-danger">
      <a href="index.php?action=afficherUnjeux&idP=' . urlencode($idP) . '" class="btn btn-secondary">Annuler</a>
    </div>
  </div>
</form>';
?>
