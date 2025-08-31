<?php
/**
 * Ce script vérifie et nettoie les données du formulaire d'ajout ou de modification d'un jeu.
 * Il contrôle les champs obligatoires, le format de la date, et la validité du fichier image.
 */

include_once '../includes/functions.php';
require("../includes/donnees.php");

// Initialisation des données
$nom = trim($_POST['nom'] ?? '');
$types = $_POST['types'] ?? [];
$idAuteur = $_POST['auteur'] ?? '';
$description = trim($_POST['description'] ?? '');
$date_creation = $_POST['date_creation'] ?? '';
$imagePath = '';
$idConsole = $_POST['console'] ?? null;

// Validation du nom
if (empty($nom)) {
    $erreurs["nom"] = "Le nom est obligatoire.";
} elseif (is_numeric($nom)) {
    $erreurs["nom"] = "Le nom ne doit pas être un nombre.";
} elseif (is_numeric($nom[0])) {
    $erreurs["nom"] = "Le nom ne doit pas commencer par un chiffre.";
}

// Validation de la date
if (empty($date_creation)) {
    $erreurs["date_creation"] = "La date de création est obligatoire.";
} elseif (!controlerDate($date_creation)) {
    $erreurs["date_creation"] = "Format de date invalide (jj/mm/aaaa attendu).";
}

// Validation des champs sélectionnables
if (empty($types)) {
    $erreurs["types"] = "Le type est obligatoire.";
}
if (empty($idConsole)) {
    $erreurs["console"] = "La console est obligatoire.";
}
if (empty($idAuteur)) {
    $erreurs["auteur"] = "L’auteur est obligatoire.";
}
if (empty($description)) {
    $erreurs["description"] = "La description est obligatoire.";
}

// Vérification de l'image (si fournie)
if (!empty($_FILES['image']['name']) && $_FILES['image']['error'] !== 0) {
    $erreurs["image"] = "Erreur lors du téléversement de l’image.";
}
?>
