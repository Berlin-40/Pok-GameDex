<?php
function connecter(): ?PDO
{
    require_once('config.php');


    // Options de connexion
    $options = [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ];

    // Connexion à la base de données
    try {
        $dsn = DB_HOST . DB_NAME;
        //echo $dsn;
        $connection = new PDO($dsn, DB_USER, DB_PASS, $options);
        return $connection;
    } catch (PDOException $e) {
        echo "Connexion à MySQL impossible : ", $e->getMessage();
        //exit(); // Arrêter l'exécution du script en cas d'échec de connexion
        return null;
    }
}

function buildUrl($page,$action) {
    $res = '?action='.$action.'&page=' . $page;

    if (isset($_GET['search']) && !empty($_GET['search'])) {
        $res .= '&search=' . urlencode($_GET['search']);
    }
    if (isset($_GET['auteur']) && !empty($_GET['auteur'])) {
        $res .= '&auteur=' . urlencode($_GET['auteur']);
    }
    if (isset($_GET['console']) && !empty($_GET['console'])) {
        $res .= '&console=' . urlencode($_GET['console']);
    }
    if (isset($_GET['type']) && !empty($_GET['type'])) {
        $res .= '&type=' . urlencode($_GET['type']);
    }
    if (isset($_GET['sort']) && !empty($_GET['sort'])) {
        $res .= '&sort=' . urlencode($_GET['sort']);
    }

    return $res;
}

function dateVersSQL($date) {
    // Vérifie si le format est correct (avec /)
    if (preg_match("/^(\d{2})\/(\d{2})\/(\d{4})$/", $date, $matches)) {
        $jour = $matches[1];
        $mois = $matches[2];
        $annee = $matches[3];
        return "$annee-$mois-$jour";
    }
    return false; // Format invalide

}

function dateVersFr($date) {
    if (preg_match("/^(\d{4})-(\d{2})-(\d{2})$/", $date, $matches)) {
        return "$matches[3]/$matches[2]/$matches[1]";
    }
    return false; // Format invalide
}
function controlerDate(string $valeur): bool {
    if (preg_match("/^(\d{1,2})[\/|\-|\.](\d{1,2})[\/|\-|\.](\d\d)(\d\d)?$/", $valeur, $regs)) {
        $jour = ($regs[1] < 10) ? "0" . $regs[1] : $regs[1];
        $mois = ($regs[2] < 10) ? "0" . $regs[2] : $regs[2];
        if ($regs[4]) {
            $an = $regs[3] . $regs[4];
        } else {
            return false;
        }
        return checkdate((int)$mois, (int)$jour, (int)$an);
    } else {
        return false;
    }
}
?>