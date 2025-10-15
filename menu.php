<?php
// menu.php
require_once __DIR__ . '/php/functions.php';
$categories = fetchCategories($mysqli);
$plats = fetchPlats($mysqli);
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Menu — Les Délices Sawa</title>
  <link rel="icon" href="assets/images/favicon.ico">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  
<header class="site-header small">
  <div class="container header-inner">
    <a class="logo" href="index.php"><img src="assets/images/logo.jpg" alt="Les Délices Sawa logo"></a>
    <nav class="main-nav">
      <a href="index.php">Accueil</a>
      <a href="propos.php">A Propos</a>
      <a href="menu.php" class="active">Menu</a>
      <a href="contact.php">Contact</a>
    </nav>
    <div class="header-actions">
      <button id="openSearch2" class="icon-btn" aria-label="Rechercher">🔎</button>
    </div>
  </div>
  
  <div id="searchBar2" class="searchbar" style="display:none;">
    <div class="container">
      <input id="globalSearch2" type="search" placeholder="Rechercher un plat ou une description...">
    </div>
  </div>
</header>
 

<main class="container">

  <section class="filters-bar">
    <label for="categoryFilter">Filtrer par catégorie :</label>
    <select id="categoryFilter">
      <option value="all">Toutes les catégories</option>
      <?php foreach ($categories as $c): ?>
        <option value="<?= esc($c['slug']) ?>"><?= esc($c['nom']) ?></option>
      <?php endforeach; ?>
    </select>
    <div class="search-inline">
      <input id="inlineSearch" type="search" placeholder="Recherche...">
    </div>
  </section>

  <section id="productList" class="product-list">
    <?php foreach ($plats as $plat): ?>
      <article class="product-card" data-category="<?= esc($plat['category_slug'] ?? 'autre') ?>">
        <img src="assets/images/<?= esc($plat['image']) ?>" alt="<?= esc($plat['nom']) ?>">
        <h3><?= esc($plat['nom']) ?></h3>
        <p><?= esc($plat['description']) ?></p>
        <div class="product-price"><?= number_format($plat['prix'],0,',',' ') ?> FCFA</div>

        <!-- Simple : quantité + bouton Commander -->
        <div class="order-form">
          <input type="number" id="qty_<?= $plat['id'] ?>" value="1" min="1">
          <button type="button" class="btn small" onclick="openCommandeModal(<?= $plat['id'] ?>, '<?= esc($plat['nom']) ?>')">
            Commander
          </button>
        </div>
      </article>
    <?php endforeach; ?>
  </section>

</main>

<footer class="site-footer">
   <div class="container footer-columns">
          <!-- Colonne Adresse -->
          <div class="footer-column">
            <h3>Adresse</h3>
            <p>Odza, Yaoundé, Cameroun</p>
          </div>

          <!-- Colonne Jours & Horaires -->
          <div class="footer-column">
            <h3>Jours et heures d'ouverture</h3>
            <p>Lundi et Mardi: 10h-20h</p>
            <p>Mercredi - Samedi: 11h-22h</p>
            <p>Dimanche: 11h-20h</p>
          </div>

          <!-- Colonne Contact -->
          <div class="footer-column">
            <h3>Contact</h3>
            <p>Téléphone: +237 657 662 216</p>
            <p>Email: <a href="mailto:contact@delices-sawa.cm">contact@delices-sawa.cm</a></p>
          </div>
        </div>
        <div class="footer-bottom">
          <img src="assets/images/logo.jpg" alt="logo" class="footer-logo">
          <p>&copy; <?= date('Y') ?> Les Délices Sawa — Tous droits réservés</p>
        </div>    
  </footer>

<!-- Fenêtre modale -->
<div id="commandeModal" class="modal">
  <div class="modal-content">
    <span class="close-btn" onclick="closeCommandeModal()">&times;</span>
    <h2>Commander <span id="platName"></span></h2>
    <form method="POST" action="commande.php" class="modal-form">
      <input type="hidden" id="modal_plat_id" name="plat_id">
      <input type="hidden" id="modal_quantite" name="quantite">

      <label for="nom_client">Nom :</label>
      <input type="text" id="nom_client" name="nom_client" required>

      <label for="telephone">Téléphone :</label>
      <input type="text" id="telephone" name="telephone" placeholder="Ex: 652000000" required>

      <label for="adresse">Adresse :</label>
      <textarea id="adresse" name="adresse" placeholder="Votre adresse de livraison"></textarea>

      <button type="submit" class="btn primary">Valider la commande</button>
    </form>
  </div>
</div>
<script src="js/app.js"></script>
</body>
</html>
