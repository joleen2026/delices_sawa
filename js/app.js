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


  // WhatsApp form submit
    function sendWhatsAppMessage(e) {
      e.preventDefault();
      const name = document.getElementById('name').value.trim();
      const email = document.getElementById('email').value.trim();
      const message = document.getElementById('message').value.trim();
      const adminNumber = '237657662216';
      const text = encodeURIComponent(
        `Bonjour Les Délices Sawa,%0A` +
        `Nom: ${name}%0A` +
        `Email: ${email}%0A` +
        `Message: ${message}`
      );
      window.open(`https://wa.me/${adminNumber}?text=${text}`, '_blank');
      return false;
    }
    // Popup réseaux sociaux
    function openSocialPopup() {
      document.getElementById('socialPopup').style.display = 'flex';
    }
    function closeSocialPopup() {
      document.getElementById('socialPopup').style.display = 'none';
    }
    window.onclick = function(event) {
      const popup = document.getElementById('socialPopup');
      if (event.target === popup) closeSocialPopup();
    }



});


