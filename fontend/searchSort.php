<?php
$corps = '<form method="get" action="index.php" class="search-form">
  <input type="hidden" name="action" value="search">
  <input type="text" name="search" placeholder="Rechercher par nom..." class="search-input">';

$recherche = '*';

// Auteur
$corps .= '<select name="auteur" class="search-select">
    <option value="">-- Choisir un auteur --</option>';
include '../backend/auteur/selectAuteur.php'; // définit $auteurs
foreach ($auteurs as $auteur1) {
  $idAuteur = $auteur1['idAuteur'];
  $corps .= "<option value=\"$idAuteur\">" . htmlspecialchars($auteur1['auteur']) . "</option>";
}
$corps .= '</select>';

// Console
$corps .= '<select name="console" class="search-select">
    <option value="">-- Choisir une console --</option>';
include '../backend/console/selectConsole.php'; // définit $consoles
foreach ($consoles as $console) {
  $idConsole = $console['idConsole'];
  $corps .= "<option value=\"$idConsole\">" . htmlspecialchars($console['console']) . "</option>";
}
$corps .= '</select>';

// Type
$corps .= '<select name="type" class="search-select">
    <option value="">-- Choisir un type --</option>';
include '../backend/type/selectType.php'; // définit $type
foreach ($type as $t) {
  $idType = $t['idType'];
  $corps .= "<option value=\"$idType\">" . htmlspecialchars($t['nomType']) . "</option>";
}
$corps .= '</select>';

// Tri
$corps .= '<select name="sort" class="search-select">
    <option value="name_asc">Nom A-Z</option>
    <option value="name_desc">Nom Z-A</option>
    <option value="date_desc">Plus récent</option>
    <option value="date_asc">Plus ancien</option>
  </select>';

// Bouton
$corps .= '<button type="submit" class="search-button">Rechercher</button>
</form>';

$zonePrincipale .= $corps;
?>
