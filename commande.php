<?php
// commande.php
require_once __DIR__ . '/php/db.php';

// Endpoint simple pour commande à partir d'un formulaire minimal (commande rapide)
// ATTENTION: en prod ajouter validations CSRF / rate-limit

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('Method Not Allowed');
}

$plat_id = isset($_POST['plat_id']) ? (int)$_POST['plat_id'] : 0;
$quantite = isset($_POST['quantite']) ? max(1, (int)$_POST['quantite']) : 1;

// infos client minimal : si tu veux collecte plus, adapte ton formulaire
$nom_client = trim($_POST['nom_client'] ?? 'Client');
$telephone = trim($_POST['telephone'] ?? '');
$adresse = trim($_POST['adresse'] ?? '');

// Récupérer les infos du plat
$stmt = $mysqli->prepare("SELECT id, nom, prix FROM plats WHERE id = ?");
$stmt->bind_param("i", $plat_id);
$stmt->execute();
$res = $stmt->get_result();
$plat = $res->fetch_assoc();
$stmt->close();

if (!$plat) {
    http_response_code(400);
    exit('Plat introuvable');
}

// Calculs
$prix_unitaire = (float)$plat['prix'];
$prix_total = $prix_unitaire * $quantite;

// Enregistrer commande
$stmt = $mysqli->prepare("INSERT INTO commandes (nom_client, telephone, adresse, total) VALUES (?, ?, ?, ?)");
$stmt->bind_param("sssd", $nom_client, $telephone, $adresse, $prix_total);
$stmt->execute();
$commande_id = $stmt->insert_id;
$stmt->close();

// Enregistrer ligne commande
$stmt = $mysqli->prepare("INSERT INTO commande_items (commande_id, plat_id, quantite, prix_unitaire) VALUES (?, ?, ?, ?)");
$stmt->bind_param("iiid", $commande_id, $plat_id, $quantite, $prix_unitaire);
$stmt->execute();
$stmt->close();

// Construire message WhatsApp (encoder les sauts de ligne)
function wa_encode($s) {
    return urlencode($s);
}

$numero_resto = '237657662216'; // <-- METTRE NUMÉRO du resto, ex: 2376xxxxxxxx (sans +)
$msg  = "🟣 *Nouvelle commande - Les Délices Sawa*%0A";
$msg .= "Commande n°: $commande_id%0A";
$msg .= "Client: " . ($nom_client ?: '—') . "%0A";
if ($telephone) $msg .= "Tel: $telephone%0A";
if ($adresse) $msg .= "Adresse: $adresse%0A";
$msg .= "------------------%0A";
$msg .= $plat['nom'] . " x" . $quantite . " = " . number_format($prix_total,0,',',' ') . " FCFA%0A";
$msg .= "------------------%0A";
$msg .= "Total: " . number_format($prix_total,0,',',' ') . " FCFA%0A";
$msg .= "%0AMerci !";

$wa_url = "https://wa.me/{$numero_resto}?text={$msg}";

// Redirection vers WhatsApp
header("Location: $wa_url");
exit;
