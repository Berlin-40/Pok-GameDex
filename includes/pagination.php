<?php
$zonePagination = '<div class="pagination">';
if ($page > 1) {
    $zonePagination .= '<a href="' . buildUrl($page - 1,$action) . '">← Précédente</a> ';
}
for ($i = 1; $i <= $pages; $i++) {
    $bold = $i === $page ? ' style="font-weight:bold;"' : '';
    $zonePagination .= '<a href="' . buildUrl($i,$action) . '"' . $bold . '>' . $i . '</a> ';
}
if ($page < $pages) {
    $zonePagination .= '<a href="' . buildUrl($page + 1,$action) . '">Suivante →</a>';
}
$zonePagination .= '</div>';

// Ajoute à ta zone principale
$zonePrincipale .= $zonePagination;
?>