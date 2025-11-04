// js/app.js
document.addEventListener('DOMContentLoaded', () => {

  // toggle search (header)
  const openSearch = document.getElementById('openSearch');
  const searchBar = document.getElementById('searchBar');
  if (openSearch && searchBar) {
    openSearch.addEventListener('click', () => {
      searchBar.style.display = (searchBar.style.display === 'none' || !searchBar.style.display) ? 'block' : 'none';
      document.getElementById('globalSearch')?.focus();
    });
  }

  // Menu page inline search & filter (if present)
  const categoryFilter = document.getElementById('categoryFilter');
  const inlineSearch = document.getElementById('inlineSearch');
  const productList = document.getElementById('productList');

  function doFilter() {
    if (!productList) return;
    const catsel = (categoryFilter?.value || 'all').toLowerCase();
    const q = (inlineSearch?.value || '').trim().toLowerCase();

    const cards = productList.querySelectorAll('.product-card');
    cards.forEach(card => {
      const cat = (card.dataset.category || '').toLowerCase();
      const title = (card.querySelector('h3')?.textContent || '').toLowerCase();
      const desc = (card.querySelector('p')?.textContent || '').toLowerCase();

      const matchCat = (catsel === 'all') || (cat === catsel);
      const matchQ = q === '' || title.includes(q) || desc.includes(q);
      card.style.display = (matchCat && matchQ) ? 'block' : 'none';
    });
  }

  if (categoryFilter) categoryFilter.addEventListener('change', doFilter);
  if (inlineSearch) inlineSearch.addEventListener('input', doFilter);

  // If a global header search exists, sync it with inline search
  const globalSearch = document.getElementById('globalSearch');
  if (globalSearch && inlineSearch) {
    globalSearch.addEventListener('input', (e) => {
      inlineSearch.value = e.target.value;
      doFilter();
    });
  }

  // small UX: auto-hide searchbar on escape
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
      if (searchBar) searchBar.style.display = 'none';
    }
  });

   /* ---------------------------
     Sliders Highlights
  ---------------------------- */
  let currentSlide = 0;
  const slides = document.querySelectorAll('.highlight-slide');
  const prevBtn = document.querySelector('.nav-btn.prev');
  const nextBtn = document.querySelector('.nav-btn.next');
  const highlights = document.querySelector('.highlights');

  if (slides.length > 0) {
    // Afficher un slide précis
    function showSlide(index) {
      slides.forEach((slide, i) => {
        slide.classList.toggle('active', i === index);
      });
    }

    // Changer de slide
    function changeSlide(step) {
      currentSlide = (currentSlide + step + slides.length) % slides.length;
      showSlide(currentSlide);
    }

    // Boutons navigation
    if (prevBtn) prevBtn.addEventListener('click', () => changeSlide(-1));
    if (nextBtn) nextBtn.addEventListener('click', () => changeSlide(1));

    // Premier slide actif
    showSlide(currentSlide);

    // Auto-défilement toutes les 6 secondes
    let autoSlide = setInterval(() => changeSlide(1), 6000);

    // Pause au survol
    highlights.addEventListener('mouseenter', () => clearInterval(autoSlide));
    highlights.addEventListener('mouseleave', () => {
      autoSlide = setInterval(() => changeSlide(1), 6000);
    });
  }

  // Bouton "Voir le menu"
  window.openMenu = function () {
    window.location.href = "menu.php";
  };



  /* ---------------------------
     Gestion de la modale commande
  ---------------------------- */

  // Ouvrir la modale
  window.openCommandeModal = function (platId, platName) {
    const qty = document.getElementById("qty_" + platId)?.value || 1;
    document.getElementById("modal_plat_id").value = platId;
    document.getElementById("modal_quantite").value = qty;
    document.getElementById("platName").innerText = platName;
    document.getElementById("commandeModal").style.display = "flex";
  };

  // Fermer la modale
  window.closeCommandeModal = function () {
    document.getElementById("commandeModal").style.display = "none";
  };

  // Fermer si clic à l’extérieur
  window.onclick = function (event) {
    const modal = document.getElementById("commandeModal");
    if (event.target === modal) {
      window.closeCommandeModal();
    }
  };



  /* ============================================
     GESTION DU FORMULAIRE DE CONTACT (Gmail)
  ============================================ */
  const contactForm = document.getElementById('contactForm');
  
  if (contactForm) {
    contactForm.addEventListener('submit', function(e) {
      e.preventDefault();
      
      // Récupération des données du formulaire
      const name = document.getElementById('name').value.trim();
      const email = document.getElementById('email').value.trim();
      const phone = document.getElementById('phone').value.trim();
      const message = document.getElementById('message').value.trim();
      
      // Validation simple
      if (!name || !email || !message) {
        showNotification('Veuillez remplir tous les champs obligatoires.', 'error');
        return;
      }
      
      // Email de destination
      const destinationEmail = 'jolinetebu@gmail.com';
      
      // Construction du sujet et du corps de l'email
      const subject = encodeURIComponent(`[Contact Délices Sawa] Message de ${name}`);
      
      let body = `Bonjour,%0D%0A%0D%0A`;
      body += `Vous avez reçu un nouveau message via le formulaire de contact du site Les Délices Sawa.%0D%0A%0D%0A`;
      body += `━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━%0D%0A`;
      body += `📋 INFORMATIONS DU CONTACT%0D%0A`;
      body += `━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━%0D%0A%0D%0A`;
      body += `👤 Nom : ${name}%0D%0A`;
      body += `📧 Email : ${email}%0D%0A`;
      
      if (phone) {
        body += `📱 Téléphone : ${phone}%0D%0A`;
      }
      
      body += `%0D%0A━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━%0D%0A`;
      body += `💬 MESSAGE%0D%0A`;
      body += `━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━%0D%0A%0D%0A`;
      body += encodeURIComponent(message);
      body += `%0D%0A%0D%0A━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━%0D%0A`;
      body += `%0D%0ACe message a été envoyé depuis le formulaire de contact de votre site web.%0D%0A`;
      body += `Date : ${new Date().toLocaleString('fr-FR')}`;
      
      // Construction du lien mailto
      const mailtoLink = `mailto:${destinationEmail}?subject=${subject}&body=${body}`;
      
      // Ouverture du client email
      window.location.href = mailtoLink;
      
      // Notification de succès
      showNotification('Votre client email va s\'ouvrir. Cliquez sur "Envoyer" pour finaliser l\'envoi.', 'success');
      
      // Réinitialisation du formulaire après un délai
      setTimeout(() => {
        contactForm.reset();
      }, 1500);
    });
  }

  /* ============================================
     POPUP FACEBOOK FLOTTANT (Coin droit)
  ============================================ */
  const facebookFloatPopup = document.getElementById('facebookFloatPopup');
  
  // Afficher le popup après 5 secondes
  setTimeout(() => {
    if (facebookFloatPopup) {
      facebookFloatPopup.style.display = 'block';
    }
  }, 5000);
  
  // Fermer le popup flottant
  window.closeFacebookFloat = function() {
    if (facebookFloatPopup) {
      facebookFloatPopup.style.animation = 'slideOutRight 0.3s ease';
      setTimeout(() => {
        facebookFloatPopup.style.display = 'none';
        // Sauvegarder dans le sessionStorage pour ne pas réafficher
        sessionStorage.setItem('facebookPopupClosed', 'true');
      }, 300);
    }
  };
  
  // Ne pas afficher si déjà fermé pendant la session
  if (sessionStorage.getItem('facebookPopupClosed') === 'true') {
    if (facebookFloatPopup) {
      facebookFloatPopup.style.display = 'none';
    }
  }

  /* ============================================
     POPUP MODAL FACEBOOK
  ============================================ */
  const socialPopup = document.getElementById('socialPopup');
  
  window.openFacebookPopup = function() {
    if (socialPopup) {
      socialPopup.classList.add('show');
      socialPopup.style.display = 'flex';
      document.body.style.overflow = 'hidden'; // Empêcher le scroll
    }
  };
  
  window.closeSocialPopup = function() {
    if (socialPopup) {
      socialPopup.classList.remove('show');
      setTimeout(() => {
        socialPopup.style.display = 'none';
        document.body.style.overflow = ''; // Restaurer le scroll
      }, 300);
    }
  };
  
  // Fermer en cliquant à l'extérieur
  if (socialPopup) {
    socialPopup.addEventListener('click', function(e) {
      if (e.target === socialPopup) {
        closeSocialPopup();
      }
    });
  }
  
  // Fermer avec la touche Échap
  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
      closeSocialPopup();
      closeFacebookFloat();
    }
  });

  /* ============================================
     SYSTÈME DE NOTIFICATIONS
  ============================================ */
  function showNotification(message, type = 'info') {
    // Créer l'élément de notification
    const notification = document.createElement('div');
    notification.className = `notification notification-${type}`;
    notification.innerHTML = `
      <div class="notification-content">
        <i class="fas ${type === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle'}"></i>
        <span>${message}</span>
      </div>
    `;
    
    // Ajouter les styles inline
    notification.style.cssText = `
      position: fixed;
      top: 100px;
      right: 30px;
      background: ${type === 'success' ? '#27ae60' : '#e74c3c'};
      color: white;
      padding: 16px 24px;
      border-radius: 10px;
      box-shadow: 0 6px 20px rgba(0,0,0,0.2);
      z-index: 9999;
      animation: slideInRight 0.3s ease;
      max-width: 400px;
      font-weight: 500;
    `;
    
    document.body.appendChild(notification);
    
    // Supprimer après 5 secondes
    setTimeout(() => {
      notification.style.animation = 'slideOutRight 0.3s ease';
      setTimeout(() => {
        notification.remove();
      }, 300);
    }, 5000);
  }

  /* ============================================
     VALIDATION EN TEMPS RÉEL
  ============================================ */
  const emailInput = document.getElementById('email');
  
  if (emailInput) {
    emailInput.addEventListener('blur', function() {
      const emailValue = this.value.trim();
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      
      if (emailValue && !emailRegex.test(emailValue)) {
        this.style.borderColor = '#e74c3c';
        showNotification('Veuillez entrer une adresse email valide.', 'error');
      } else {
        this.style.borderColor = '#e6eef3';
      }
    });
  }

  /* ============================================
     ANIMATIONS CSS SUPPLÉMENTAIRES
  ============================================ */
  const style = document.createElement('style');
  style.textContent = `
    @keyframes slideOutRight {
      from {
        transform: translateX(0);
        opacity: 1;
      }
      to {
        transform: translateX(400px);
        opacity: 0;
      }
    }
    
    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }
    
    .notification-content {
      display: flex;
      align-items: center;
      gap: 12px;
    }
    
    .notification-content i {
      font-size: 1.3rem;
    }
  `;
  document.head.appendChild(style);

  /* ============================================
     COMPTEUR DE CARACTÈRES POUR LE MESSAGE
  ============================================ */
  const messageTextarea = document.getElementById('message');
  
  if (messageTextarea) {
    const maxLength = 500;
    const counter = document.createElement('div');
    counter.style.cssText = `
      text-align: right;
      color: #888;
      font-size: 0.9rem;
      margin-top: 4px;
    `;
    counter.textContent = `0 / ${maxLength} caractères`;
    messageTextarea.parentNode.appendChild(counter);
    
    messageTextarea.addEventListener('input', function() {
      const length = this.value.length;
      counter.textContent = `${length} / ${maxLength} caractères`;
      counter.style.color = length > maxLength ? '#e74c3c' : '#888';
    });
  }

});

console.log('%c✉️ Contact Délices Sawa - Système de contact chargé', 'color: #0aa3bd; font-size: 14px; font-weight: bold;');




