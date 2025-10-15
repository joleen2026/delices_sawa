<?php
// index.php
require_once __DIR__ . '/php/functions.php';
$categories = fetchCategories($mysqli);
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Les Délices Sawa</title>
  <link rel="icon" href="assets/images/favicon.ico">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <header class="site-header">
    <div class="container header-inner">
      <a class="logo" href="index.php"><img src="assets/images/logo.jpg" alt="Les Délices Sawa logo"></a>
      <nav class="main-nav">
        <a href="index.php">Accueil</a>
        <a href="propos.php">A Propos</a>
        <a href="menu.php">Menu</a>
        <a href="contact.php">Contact</a>
      </nav>
      <div class="header-actions">
        <button id="openSearch" class="icon-btn" aria-label="Rechercher">🔎</button>
      </div>
    </div>

    <div id="searchBar" class="searchbar" style="display:none;">
      <div class="container">
        <input id="globalSearch" type="search" placeholder="Rechercher un plat ou une description...">
      </div>
    </div>
  </header>

  <main>
    <section class="hero">
      <div class="container hero-inner">
        <div class="hero-text">
          <h1>Les Délices Sawa</h1>
          <p>
          Découvrez <strong>Les Délices Sawa</strong>, un restaurant-bar où la saveur, les plats authentiques et les boissons raffinées se rencontrent.  
          Dans un cadre chaleureux, savourez nos spécialités phares — Ndolé royal, poisson braisé, plantains mûrs — et partagez un cocktail ou une boisson locale avec vos proches.  
          Commandez facilement en ligne et profitez d’un service de livraison rapide directement chez vous.  
          Participez à nos soirées culturelles et vivez l’ambiance unique de la musique et de la gastronomie sawa.  
          Que ce soit en famille, entre amis ou au bureau, nous vous apportons le goût du Wouri et un moment convivial où que vous soyez.  
          Aux Délices Sawa, chaque plat et chaque boisson racontent une histoire, et chaque instant devient un souvenir inoubliable.
          </p>
          <a class="btn primary" href="menu.php">Voir le menu</a>
        </div>
        <div class="hero-image">
          <img src="assets/images/main.jpg" alt="Les Délices Sawa">
        </div>
      </div>
    </section>

<!-- ===== Section Highlights ===== -->
<section class="highlights">
  <div class="highlight-slide active" style="background-image: url('assets/images/commande3.webp');">
    <div class="overlay"></div>
    <div class="content">
      <h3>Menu Digital & Commande Facile</h3>
      <p>
        Filtrez par catégorie et parcourez plusieurs photos de nos plats avant de commander via WhatsApp ou livraison rapide.
      </p>
      <button class="btn small" onclick="openMenu()">Voir plus</button>
    </div>
  </div>

  <div class="highlight-slide" style="background-image: url('assets/images/ndole.webp');">
    <div class="overlay"></div>
    <div class="content">
      <h3>Produits d’Exception & Fraîcheur Quotidienne</h3>
      <p>
        Nos plats et poissons proviennent d’arrivages quotidiens. Découvrez plusieurs photos pour juger de la fraîcheur avant de commander.
      </p>
    </div>
  </div>

  <div class="highlight-slide" style="background-image: url('assets/images/sawa.webp');">
    <div class="overlay"></div>
    <div class="content">
      <h3>Culture Sawa</h3>
      <p>
        La culture Sawa est un mélange unique de traditions, musique et gastronomie, profondément enracinée dans le Littoral. 
        Nos plats reflètent cette richesse : le Ndolé royal, le poisson braisé, les plantains mûrs et les sauces parfumées racontent l’histoire 
        des saveurs locales transmises de génération en génération. 
        À travers nos recettes authentiques modernisées, chaque repas devient un voyage gustatif et un moment de partage. 
        Découvrez l’ambiance typique du Littoral, entre musique, convivialité et célébration de la culture Sawa.
      </p>
      <a href="propos.php" class="btn small">À propos</a>
    </div>
  </div>

  <!-- Contrôles -->
  <button class="nav-btn prev">&#10094;</button>
  <button class="nav-btn next">&#10095;</button>
</section>


<section id="menu-preview" class="container menu-preview">
    <h2>Plats phares</h2>
    <div class="preview-grid">
      <?php
      // Ici on filtre directement les plats de la catégorie "Plats traditionnels"
      $stmt = $mysqli->prepare("
          SELECT p.*
          FROM plats p
          JOIN categories c ON p.category_id = c.id
          WHERE c.nom = 'Plats traditionnels'
          LIMIT 4
      ");
      $stmt->execute();
      $plats = $stmt->get_result();

      foreach ($plats as $plat): ?>
          <div class="card">
            <div class="card-thumb">
              <img src="assets/images/<?= esc($plat['image']) ?>" alt="<?= esc($plat['nom']) ?>">
            </div>
            <h4><?= esc($plat['nom']) ?></h4>
            <p class="muted"><?= esc(mb_strimwidth($plat['description'],0,110,'...')) ?></p>
            <div class="product-price"><?= number_format($plat['prix'],0,',',' ') ?> FCFA</div>
          </div>
      <?php endforeach; ?>
    </div>
    <a href="menu.php" class="btn small">Voir tout le menu</a>
  </section>


    <section id="contact" class="container contact-section">
      <h2>Contact & Localisation</h2>
      <p>Email: <a href="mailto:contact@delices-sawa.cm">contact@delices-sawa.cm</a> — Tel: +237 6XX XXX XXX</p>
      <div class="map-embed">
        <!-- Remplacer la src par ton iframe Google Maps -->
        <iframe src="https://www.google.com/maps/embed?..." style="border:0" allowfullscreen="" loading="lazy"></iframe>
      </div>
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

  <script src="js/app.js"></script>
</body>
</html>
