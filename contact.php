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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
        <div class="contact-title">Contactez-nous</div>
        <div class="contact-subtitle">
          Vous avez une question, une réservation ou souhaitez simplement<br>
          nous dire bonjour ? Nous serions ravis de vous entendre !
        </div>
      </div>
      
      <form class="contact-form" id="contactForm">
        <div class="contact-form-row">
          <div>
            <label for="name">Votre nom <span class="required">*</span></label>
            <input type="text" id="name" name="name" placeholder="Entrez votre nom" required>
          </div>
          <div>
            <label for="email">Adresse email <span class="required">*</span></label>
            <input type="email" id="email" name="email" placeholder="votre.email@example.com" required>
          </div>
        </div>
        
        <div>
          <label for="phone">Numéro de téléphone (optionnel)</label>
          <input type="tel" id="phone" name="phone" placeholder="+237 6XX XXX XXX">
        </div>
        
        <div>
          <label for="message">Votre message <span class="required">*</span></label>
          <textarea id="message" name="message" placeholder="Décrivez votre demande, réservation ou question..." required></textarea>
        </div>
        
        <button type="submit" class="btn primary">
          <i class="fas fa-paper-plane me-2"></i>Envoyer le message
        </button>
      </form> 
      </div>

      <div class="social-links-contact">
        <a href="mailto:jolinetebu@gmail.com" class="social-link-btn email" title="Email">
          <i class="fas fa-envelope fa-lg"></i>
        </a>
        <a href="https://wa.me/237657662216" target="_blank" class="social-link-btn whatsapp" title="WhatsApp">
          <i class="fab fa-whatsapp fa-lg"></i>
        </a>
        <a href="#" onclick="openFacebookPopup(); return false;" class="social-link-btn facebook" title="Facebook">
          <i class="fab fa-facebook-f fa-lg"></i>
        </a>
      </div>
    </div>

    <!-- Popup Facebook flottant -->
    <div class="facebook-float-popup" id="facebookFloatPopup">
      <button class="close-float-popup" onclick="closeFacebookFloat()">&times;</button>
      <div class="float-popup-content">
        <i class="fab fa-facebook fa-3x"></i>
        <h4>Rejoignez notre communauté !</h4>
        <p>Découvrez nos nouveautés, événements et l'ambiance Sawa sur Facebook</p>
        <a href="https://www.facebook.com/delices.sawa" target="_blank" class="btn-facebook">
          <i class="fab fa-facebook-f me-2"></i>Suivez-nous
        </a>
      </div>
    </div>

    <!-- Popup réseaux sociaux modal -->
    <div class="social-popup" id="socialPopup">
      <div class="social-popup-content">
        <span class="close-popup" onclick="closeSocialPopup()">&times;</span>
        <div class="popup-icon">
          <i class="fab fa-facebook fa-4x"></i>
        </div>
        <h3>Rejoignez la famille Sawa !</h3>
        <p>Suivez-nous sur Facebook pour ne rien manquer :</p>
        <ul class="popup-benefits">
          <li><i class="fas fa-check-circle"></i> Nos plats du jour et promotions exclusives</li>
          <li><i class="fas fa-check-circle"></i> Les événements culturels Sawa</li>
          <li><i class="fas fa-check-circle"></i> L'ambiance de notre restaurant-bar</li>
          <li><i class="fas fa-check-circle"></i> Des recettes et secrets culinaires</li>
        </ul>
        <a href="https://www.facebook.com/delices.sawa" target="_blank" class="btn-facebook-large">
          <i class="fab fa-facebook-f me-2"></i>Découvrir notre page Facebook
        </a>
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
        <p>Email: <a href="mailto:jolinetebu@gmail.com">jolinetebu@gmail.com</a></p>
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