<?php

// Définition de la classe Jeux
class Jeux
{
    // Déclaration des propriétés privées de la classe
    private $id;                // ID du jeu
    private $nom;               // Nom du jeu
    private array $types;       // Types associés au jeu (un tableau)
    private $idAuteur;          // ID de l'auteur du jeu
    private $description;       // Description du jeu
    private $date_creation;     // Date de création du jeu
    private $imagePath;         // Chemin de l'image du jeu
    private $idConsole;         // ID de la console à laquelle appartient le jeu

    // Le constructeur initialise les propriétés de l'objet avec les valeurs passées en argument
    public function __construct($id, $nom, $types, $console, $auteur, $description, $date_creation, $imagePath)
    {
        $this->id = $id;
        $this->nom = htmlspecialchars($nom);                      // Protection contre les injections XSS en échappant les caractères spéciaux dans le nom du jeu
        $this->types = array_unique($types);                       // Suppression des doublons dans le tableau des types
        $this->idAuteur = $auteur;
        $this->description = htmlspecialchars($description);        // Protection contre les injections XSS dans la description
        $this->date_creation = htmlspecialchars($date_creation);    // Protection contre les injections XSS dans la date
        $this->imagePath = htmlspecialchars($imagePath);            // Protection contre les injections XSS dans le chemin de l'image
        $this->idConsole = $console;
    }

    // Getter pour récupérer l'ID du jeu
    public function getId(): int
    {
        return $this->id;
    }

    // Getter pour récupérer le nom du jeu
    public function getNom(): string    
    {
        return $this->nom;
    }

    // Getter pour récupérer les types du jeu
    public function getTypes(): array
    {
        return $this->types;
    }

    // Getter pour récupérer l'ID de l'auteur du jeu
    public function getAuteur(): int
    {
        return $this->idAuteur;
    }

    // Getter pour récupérer la description du jeu
    public function getDescription(): string    
    {
        return $this->description;
    }

    // Getter pour récupérer la date de création du jeu
    public function getDateCreation(): string
    {
        return $this->date_creation;
    }

    // Getter pour récupérer le chemin de l'image du jeu
    public function getImagePath(): string
    {
        return $this->imagePath;
    }

    // Méthode pour sauvegarder les informations du jeu dans la base de données
    public function sauvegarder()
    {
        // Connexion à la base de données
        $connexion = connecter();
        
        // Vérification de la connexion
        if ($connexion == null) {
            return false; // Retourne false si la connexion échoue
        }

        // Récupération des valeurs à insérer dans la base de données
        $idConsole = $this->idConsole;
        $nom = $this->nom;
        $idAuteur = $this->idAuteur;
        $description = $this->description;
        $date_creation = dateVersSQL($this->date_creation);   // Conversion de la date au format SQL
        $imagePath = $this->imagePath;

        // Inclusion du fichier pour insérer les données du jeu dans la base
        include_once('../backend/jeu/insertJeux.php');

        // Récupération de l'ID du dernier jeu inséré (auto-incrémenté)
        $idP = $connexion->lastInsertId();

        // Récupération des types associés au jeu
        $types = $this->types;      
        
        // Inclusion du fichier pour insérer les types associés au jeu dans la base de données
        include_once('../backend/types/insertTypes.php');
    }
}
?>
