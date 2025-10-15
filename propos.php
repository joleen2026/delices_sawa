<?php
require_once __DIR__ . '/php/functions.php';
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>À propos — Les Délices Sawa</title>
  <link rel="icon" href="assets/images/favicon.ico">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/propos.css">
</head>
<body>
  <header class="site-header">
    <div class="container header-inner">
      <a class="logo" href="index.php"><img src="assets/images/logo.jpg" alt="Les Délices Sawa logo"></a>
      <nav class="main-nav">
        <a href="index.php">Accueil</a>
        <a href="propos.php" class="active">À Propos</a>
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
    <section class="about-hero">
      <div class="about-hero-text">
        <h1>À propos de Les Délices Sawa</h1>
        <p>
          Plongez au cœur de la culture Sawa et découvrez l’histoire, les valeurs et l’équipe qui font de notre restaurant un lieu unique à Yaoundé.
        </p>
      </div>
      <div class="about-hero-img">
        <img src="assets/images/entreprise.jpg" alt="Photo de l'entreprise Les Délices Sawa">
      </div>
    </section>

    <section class="about-histoire">
      <h2>Notre histoire & la culture Sawa</h2>
      <div class="about-histoire-content">
        <div class="about-histoire-text">
          <p>
            Les Sawa, peuple du Littoral camerounais, sont reconnus pour leur hospitalité, leur musique festive et leur gastronomie raffinée.  
            Depuis des générations, la cuisine Sawa célèbre le partage, la convivialité et l’amour des produits frais.  
            Les Délices Sawa est né de cette passion : fondé en 2022 à Yaoundé, notre restaurant perpétue les recettes traditionnelles tout en les modernisant pour offrir une expérience authentique et chaleureuse.
          </p>
        </div>
        <div class="about-histoire-photos">
          <img src="assets/images/sawa1.jpg" alt="Culture Sawa">
          <img src="assets/images/sawa2.jpg" alt="Fête Sawa">
        </div>
      </div>
    </section>

    <section class="about-team">
      <h2>Notre équipe</h2>
      <div class="team-grid">
        <div class="team-member">
          <img src="assets/images/team1.jpg" alt="Membre 1">
          <h4>Jean-Pierre M.</h4>
          <p>Fondateur & Chef cuisinier</p>
        </div>
        <div class="team-member">
          <img src="assets/images/team2.jpg" alt="Membre 2">
          <h4>Clarisse N.</h4>
          <p>Responsable service</p>
        </div>
        <div class="team-member">
          <img src="assets/images/team3.jpg" alt="Membre 3">
          <h4>David S.</h4>
          <p>Mixologue & Ambiance</p>
        </div>
      </div>
    </section>

    <section class="about-valeurs">
      <h2>Nos valeurs</h2>
      <div class="valeurs-list">
        <div class="valeur">
          <h4>Authenticité</h4>
          <p>Des recettes fidèles à la tradition Sawa, préparées avec passion.</p>
        </div>
        <div class="valeur">
          <h4>Convivialité</h4>
          <p>Un accueil chaleureux et une ambiance festive pour tous nos clients.</p>
        </div>
        <div class="valeur">
          <h4>Qualité</h4>
          <p>Des produits frais, locaux et une exigence de goût à chaque plat.</p>
        </div>
        <div class="valeur">
          <h4>Innovation</h4>
          <p>Une cuisine qui évolue, des événements et des cocktails originaux.</p>
        </div>
      </div>
    </section>
  </main>

  <footer class="site-footer">
    <div class="container footer-columns">
      <div class="footer-column">
        <h3>Adresse</h3>
        <p>Odza, Yaoundé, Cameroun</p>
      </div>
      <div class="footer-column">
        <h3>Jours et heures d'ouverture</h3>
        <p>Lundi et Mardi: 10h-20h</p>
        <p>Mercredi - Samedi: 11h-22h</p>
        <p>Dimanche: 11h-20h</p>
      </div>
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