<?php

$idP = $_GET['idP'] ?? '';

// Si l'ID existe, on est en mode modification
if ($idP != '') {
  $action = "index.php?action={$cible}&idP={$idP}";
  $recherche = $idP;

  // Récupération des infos du jeu
  include '../backend/jeu/selectJeux.php';
  include '../backend/types/selectTypes.php';
  $types = array_column($types, 'idType'); // Liste des ID de types associés au jeu

  // Pré-remplissage des champs
  $nom = htmlspecialchars($jeux[0]['jeux']);
  $description = htmlspecialchars($jeux[0]['description']);
  $date_creation = dateVersFr($jeux[0]['dateC']);
  $idAuteur = $jeux[0]['idAuteur'];
  $idConsole = $jeux[0]['idConsole'];
  $image = $jeux[0]['image'];
  $imagePath = "../uploads/" . $image;

  $zonePrincipale .= "<h1>Modification de $nom</h1>";
} else {
  // Sinon on est en mode ajout
  $action = "index.php?action={$cible}";
  $zonePrincipale .= "<h1>Ajout d'un jeu</h1>";
}

// Début du formulaire
$zonePrincipale  .= <<<EOT
<form method="POST" action="{$action}" enctype="multipart/form-data">
  <table>
    <tr>
      <td colspan="2"><label>Nom :</label>
        <input type="text" name="nom" value="{$nom}">
        <div class="w3-text-red">{$erreurs["nom"]}</div>
      </td>
    </tr>

    <tr>
      <td colspan="2"><label>Type :</label>
        <select name="types[]" id="types" multiple size="5">
          <option value="">-- Choisir un type --</option>
EOT;

// Liste des types avec pré-sélection si modification
$recherche = '*';
include '../backend/type/selectType.php';
foreach ($type as $t) {
  $coche[$t['idType']] = '';
  foreach ($types as $type1) {
    if ($t['idType'] == $type1) {
      $coche[$t['idType']] = ' selected';
    }
  }
  $zonePrincipale .= "<option value=\"{$t['idType']}\" {$coche[$t['idType']]}>{$t['nomType']}</option>";
}

// Console
$zonePrincipale .= <<<EOT
        </select>
        <div class="w3-text-red">{$erreurs["types"]}</div>
      </td>
    </tr>

    <tr>
      <td colspan="2"><label>Console :</label>
        <select name="console">
          <option value="">-- Sélectionner une console --</option>
EOT;

include '../backend/console/selectConsole.php';
foreach ($consoles as $console1) {
  $coche[$console1['idConsole']] = '';
  if ($console1['idConsole'] == $idConsole) {
    $coche[$idConsole] = ' selected';
  }
  $zonePrincipale .= "<option value=\"{$console1['idConsole']}\" {$coche[$console1['idConsole']]}>{$console1['console']}</option>";
}

// Auteur
$zonePrincipale .= <<<EOT
        </select>
        <div class="w3-text-red">{$erreurs["console"]}</div>
      </td>
    </tr>

    <tr>
      <td colspan="2"><label>Auteur :</label>
        <select name="auteur">
          <option value="">-- Sélectionner un auteur --</option>
EOT;

include '../backend/auteur/selectAuteur.php';
foreach ($auteurs as $auteur1) {
  $coche[$auteur1['idAuteur']] = '';
  if ($auteur1['idAuteur'] == $idAuteur) {
    $coche[$idAuteur] = ' selected';
  }
  $zonePrincipale .= "<option value=\"{$auteur1['idAuteur']}\" {$coche[$auteur1['idAuteur']]}>{$auteur1['auteur']}</option>";
}

// Description, image, date
$zonePrincipale .= <<<EOT
        </select>
        <div class="w3-text-red">{$erreurs["auteur"]}</div>
      </td>
    </tr>

    <tr>
      <td colspan="2"><label>Description :</label>
        <textarea name="description" rows="4" cols="40">{$description}</textarea>
        <div class="w3-text-red">{$erreurs["description"]}</div>
      </td>
    </tr>

    <tr>
      <td colspan="2"><label>Image :</label>
        <input type="file" name="image" accept="image/*">
        <div class="w3-text-red">{$erreurs["image"]}</div>
      </td>
    </tr>

    <tr>
      <td colspan="2"><label>Date de création :</label>
        <input type="text" name="date_creation" placeholder="jj-mm-aaaa" value="{$date_creation}">
        <div class="w3-text-red">{$erreurs["date_creation"]}</div>
      </td>
    </tr>

    <tr>
      <td colspan="2" style="text-align:center;">
        <input type="submit" value="Ajouter">
      </td>
    </tr>
  </table>
</form>
EOT;
?>
