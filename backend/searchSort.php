<?php
include_once '../includes/functions.php';
include '../fontend/searchSort.php';

$pdo = connecter();
$parPage = 6; // Nombre de jeux par page
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int) $_GET['page'] : 1;
$offset = ($page - 1) * $parPage;

// Récupération du nombre total de jeux
$totalReq = $pdo->query("SELECT COUNT(*) FROM Jeux");
$total = $totalReq->fetchColumn();
$pages = ceil($total / $parPage);

// Construction de la requête principale
$sql = "SELECT *  
        FROM Jeux  
        JOIN Auteurs ON Jeux.idAuteur = Auteurs.idAuteur 
        JOIN Consoles ON Jeux.idConsole = Consoles.idConsole  
        JOIN Types ON Jeux.idP = Types.idP  
        WHERE 1=1";
$params = [];

// Récupération des filtres depuis l'URL
$search = $_GET['search'] ?? '';
$auteur = $_GET['auteur'] ?? '';
$console = $_GET['console'] ?? '';
$idType = $_GET['type'] ?? '';
$sort = $_GET['sort'] ?? '';

// Application des filtres
if (!empty($search)) {
    $sql .= " AND Jeux.jeux LIKE :search";
    $params[':search'] = '%' . $search . '%';
}
if (!empty($idType)) {
    $sql .= " AND idType = :idType";
    $params[':idType'] = $idType;
}
if (!empty($auteur)) {
    $sql .= " AND Auteurs.idAuteur = :auteur";
    $params[':auteur'] = $auteur;
}
if (!empty($console)) {
    $sql .= " AND idConsole = :console";
    $params[':console'] = $console;
}

// Application du tri
switch ($sort) {
    case 'name_asc':
        $sql .= " ORDER BY Jeux.jeux ASC";
        break;
    case 'name_desc':
        $sql .= " ORDER BY Jeux.jeux DESC";
        break;
    case 'date_asc':
        $sql .= " ORDER BY dateC ASC";
        break;
    case 'date_desc':
        $sql .= " ORDER BY dateC DESC";
        break;
}

// Pagination
$sql .= " LIMIT :parPage OFFSET :offset";
$params[':parPage'] = $parPage;
$params[':offset'] = $offset;

// Préparation et exécution
$stmt = $pdo->prepare($sql);
foreach ($params as $key => &$value) {
    $type = is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR;
    $stmt->bindParam($key, $value, $type);
}
$stmt->execute();
$jeux = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Génération de la fonction URL avec filtres conservés
// Affichage des jeux
$zonePrincipale .= '';
if (count($jeux) === 0) {
    $zonePrincipale .= "<h1>Aucun résultat trouvé.</h1>";
} else {
    include '../fontend/jeuxCard.php';
}

// Pagination HTML
$action= 'search';
include '../includes/pagination.php';
?>
