<?php
// php/functions.php
require_once __DIR__ . '/db.php';

function fetchPlats($mysqli) {
    $sql = "
        SELECT 
            p.id,
            p.nom,
            p.description,
            p.prix,
            p.image,
            c.nom AS category_nom,
            c.slug AS category_slug
        FROM plats p
        LEFT JOIN categories c ON p.category_id = c.id
        ORDER BY c.nom, p.nom
    ";

    $result = $mysqli->query($sql);

    $plats = [];
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $plats[] = $row;
        }
        $result->free();
    }

    return $plats;
}


function fetchCategories($mysqli) {
    $res = $mysqli->query("SELECT id, nom, slug FROM categories ORDER BY id");
    $cats = [];
    if ($res) {
        while ($row = $res->fetch_assoc()) $cats[] = $row;
        $res->free();
    }
    return $cats;
}

function esc($s) {
    return htmlspecialchars($s, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}
