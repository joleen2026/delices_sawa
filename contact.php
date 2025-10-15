<?php
// contact.php
require_once __DIR__ . '/php/functions.php';
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Contact — Les Délices Sawa</title>
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
        <a href="contact.php" class="active">Contact</a>
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
    <div class="contact-main">
    <div class="contact-header">
      <div class="contact-title">Envoie-moi un message!</div>
      <div class="contact-subtitle">
        Vous avez une question, une proposition ou souhaitez simplement<br>
        nous dire bonjour ? N'hésitez pas.
      </div>
    </div>
      <form class="contact-form" id="contactForm" onsubmit="return sendWhatsAppMessage(event)">
    <div class="contact-form-row">
      <div>
        <label for="name">Votre nom</label>
        <input type="text" id="name" name="name" placeholder="Entrez votre nom" required>
      </div>
      <div>
        <label for="email">Adresse email</label>
        <input type="email" id="email" name="email" placeholder="Entrez votre adresse email" required>
      </div>
    </div>
    <div>
      <label for="message">Votre message</label>
      <textarea id="message" name="message" placeholder="Bonjour, avez-vous un souci ?" required></textarea>
    </div>
    <button type="submit" class="btn primary">Soumettre</button>
  </form>
      <div class="contact-links">
        <a class="contact-link" href="https://wa.me/237657662216?text=Bonjour%20Les%20Délices%20Sawa%2C%20j'aimerais%20avoir%20plus%20d'informations%20!" target="_blank">
          <img src="assets/images/whatsapp.png" alt="WhatsApp"> WhatsApp
        </a>
        <a class="contact-link" href="mailto:contact@delices-sawa.cm" target="_blank">
          <img src="assets/images/gmail.png" alt="Gmail"> Gmail
        </a>
      </div>
      <button class="social-popup-btn" onclick="openSocialPopup()">Suivez-nous sur Facebook & Instagram</button>
    </div>

    <!-- Popup réseaux sociaux -->
    <div class="social-popup" id="socialPopup">
      <div class="social-popup-content">
        <span class="close-popup" onclick="closeSocialPopup()">&times;</span>
        <h3>Rejoignez la communauté Sawa !</h3>
        <p>Suivez-nous sur Facebook et Instagram pour découvrir nos événements, nos plats et l’ambiance unique des Délices Sawa.<br>
        <strong>Vivez la culture, partagez la passion !</strong></p>
        <div class="social-icons">
          <a href="https://facebook.com/lesdelicessawa" target="_blank">
            <img src="assets/images/facebook.png" alt="Facebook">
          </a>
          <a href="https://instagram.com/lesdelicessawa" target="_blank">
            <img src="assets/images/instagram.png" alt="Instagram">
          </a>
        </div>
      </div>
    </div>
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