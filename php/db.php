<?php
// Configuration de la base de données
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'delices_sawa';
$db_port = 3306;

// Connexion MySQLi orientée objet
$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name, $db_port);
if ($mysqli->connect_errno) {
    http_response_code(500);
    die("Erreur de connexion à la base de données : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error);
}

// Utiliser charset utf8mb4
$mysqli->set_charset('utf8mb4');
