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
    <!-- Section 1: Hero avec slider d'images -->
    <section class="hero-section" id="hero">
      <div class="hero-slider">
        <div class="hero-slide active" style="background-image: url('assets/images/restaurant1.jpg');"></div>
        <div class="hero-slide" style="background-image: url('assets/images/restaurant2.jpg');"></div>
        <div class="hero-slide" style="background-image: url('assets/images/restaurant3.jpg');"></div>
        <div class="hero-slide" style="background-image: url('assets/images/restaurant4.jpg');"></div>
      </div>
      <div class="hero-overlay"></div>
      <div class="hero-content">
        <h1 class="hero-title">À propos du restaurant-bar Délices Sawa</h1>
        <p class="hero-subtitle">
          Bienvenue dans un espace où la tradition rencontre la modernité, où chaque plat raconte une histoire
          et où l'hospitalité Sawa transforme chaque visite en un moment inoubliable.
        </p>
        <p class="hero-description">
          Découvrez l'authenticité de la culture côtière camerounaise dans une ambiance chaleureuse et festive.
          Nos saveurs uniques et notre engagement envers l'excellence font de chaque repas une célébration.
        </p>
        <div class="scroll-indicator">
          <span>Découvrez notre histoire</span>
          <div class="scroll-arrow">↓</div>
        </div>
      </div>
    </section>

    <!-- Section 2: Notre Histoire -->
    <section class="histoire-section" id="histoire">
      <div class="histoire-content">
        <h2 class="section-title">Notre histoire & la culture Sawa</h2>
        <div class="histoire-text-container">
          <div class="histoire-text">
            <p class="intro-text">
              Les Sawa, peuple emblématique du Littoral camerounais, incarnent l'essence même de l'hospitalité 
              et de la convivialité africaine. Leur riche patrimoine culturel se manifeste à travers une gastronomie 
              raffinée qui célèbre les produits de la mer et les saveurs authentiques.
            </p>
            <p>
              <strong>Les Délices Sawa est né en 2022</strong> d'une passion profonde pour cette culture millénaire 
              et d'un désir de partager ses trésors culinaires avec Yaoundé. Notre fondateur, Jean-Pierre Mballa, 
              originaire de Douala, a grandi bercé par les arômes envoûtants de la cuisine de sa grand-mère.
            </p>
            <p>
              Chaque recette servie dans notre établissement est le fruit d'un héritage familial transmis de 
              génération en génération. Nous perpétuons les techniques ancestrales tout en apportant une touche 
              de modernité qui respecte l'essence de ces plats traditionnels.
            </p>
            <p>
              <strong>Notre mission</strong> : faire vivre l'expérience Sawa authentique à travers une cuisine 
              qui réchauffe le cœur, une ambiance qui invite à la fête, et un service qui reflète la légendaire 
              hospitalité côtière. Chez Les Délices Sawa, vous n'êtes pas qu'un client, vous êtes de la famille.
            </p>
          </div>
          <div class="histoire-stats">
            <div class="stat-item">
              <div class="stat-number">2022</div>
              <div class="stat-label">Année de création</div>
            </div>
            <div class="stat-item">
              <div class="stat-number">50+</div>
              <div class="stat-label">Plats au menu</div>
            </div>
            <div class="stat-item">
              <div class="stat-number">1000+</div>
              <div class="stat-label">Clients satisfaits</div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Section 3: Notre Équipe -->
    <section class="team-section" id="equipe">
      <div class="team-content">
        <h2 class="section-title">Notre équipe</h2>
        <p class="section-subtitle">
          Des passionnés dévoués à vous offrir une expérience culinaire exceptionnelle
        </p>
        <div class="team-grid">
          <div class="team-card">
            <div class="team-photo">
              <img src="assets/images/team1.jpg" alt="Jean-Pierre Mballa">
              <div class="team-overlay">
                <p>"La cuisine, c'est l'amour fait visible"</p>
              </div>
            </div>
            <div class="team-info">
              <h3>Jean-Pierre Mballa</h3>
              <p class="team-role">Fondateur & Chef Cuisinier</p>
              <p class="team-bio">
                Avec plus de 15 ans d'expérience, Jean-Pierre apporte son expertise 
                et sa passion pour la gastronomie Sawa à chaque création culinaire.
              </p>
            </div>
          </div>

          <div class="team-card">
            <div class="team-photo">
              <img src="assets/images/team2.webpgit push -u origin main
" alt="Clarisse Ngando">
              <div class="team-overlay">
                <p>"L'accueil est notre signature"</p>
              </div>
            </div>
            <div class="team-info">
              <h3>Clarisse Ngando</h3>
              <p class="team-role">Responsable Service</p>
              <p class="team-bio">
                Clarisse orchestre avec grâce l'expérience client, veillant à ce que 
                chaque visite soit mémorable et chaleureuse.
              </p>
            </div>
          </div>

          <div class="team-card">
            <div class="team-photo">
              <img src="assets/images/team3.jpg" alt="David Songo">
              <div class="team-overlay">
                <p>"Chaque cocktail raconte une histoire"</p>
              </div>
            </div>
            <div class="team-info">
              <h3>David Songo</h3>
              <p class="team-role">Mixologue & Ambiance</p>
              <p class="team-bio">
                Expert en cocktails et DJ talentueux, David crée l'atmosphère 
                festive qui fait la renommée de notre établissement.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Section 4: Nos Valeurs -->
    <section class="valeurs-section" id="valeurs">
      <div class="valeurs-content">
        <h2 class="section-title">Nos valeurs</h2>
        <p class="section-subtitle">
          Les principes qui guident chacune de nos actions et définissent notre identité
        </p>
        <div class="valeurs-grid">
          <div class="valeur-card">
            <div class="valeur-icon">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                <path d="M12 2L2 7v10c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V7l-10-5z"/>
              </svg>
            </div>
            <h3>Authenticité</h3>
            <p>
              Nous restons fidèles aux recettes traditionnelles Sawa, transmises de génération 
              en génération. Chaque plat est préparé avec des techniques ancestrales et des 
              ingrédients soigneusement sélectionnés pour garantir une expérience gustative 
              authentique qui honore notre héritage culturel.
            </p>
          </div>

          <div class="valeur-card">
            <div class="valeur-icon">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/>
              </svg>
            </div>
            <h3>Convivialité</h3>
            <p>
              L'hospitalité Sawa est légendaire, et nous en faisons notre marque de fabrique. 
              Notre équipe accueille chaque client comme un membre de la famille, créant une 
              atmosphère chaleureuse où règnent le partage, la joie et les moments précieux 
              qui transforment un simple repas en souvenir inoubliable.
            </p>
          </div>

          <div class="valeur-card">
            <div class="valeur-icon">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
              </svg>
            </div>
            <h3>Qualité</h3>
            <p>
              L'excellence n'est pas négociable. Nous sélectionnons rigoureusement des produits 
              frais et locaux, privilégiant les circuits courts et les producteurs de confiance. 
              Chaque ingrédient est choisi pour sa qualité supérieure, et chaque plat est préparé 
              avec une attention méticuleuse aux détails.
            </p>
          </div>

          <div class="valeur-card">
            <div class="valeur-icon">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                <path d="M9 11H7v2h2v-2zm4 0h-2v2h2v-2zm4 0h-2v2h2v-2zm2-7h-1V2h-2v2H8V2H6v2H5c-1.11 0-1.99.9-1.99 2L3 20c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V9h14v11z"/>
              </svg>
            </div>
            <h3>Innovation</h3>
            <p>
              Tout en respectant nos racines, nous embrassons l'innovation. Notre menu évolue 
              avec les saisons, nos cocktails surprennent par leur créativité, et nos événements 
              culturels célèbrent la richesse de la tradition Sawa dans un cadre moderne et 
              dynamique qui attire une clientèle diversifiée.
            </p>
          </div>
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