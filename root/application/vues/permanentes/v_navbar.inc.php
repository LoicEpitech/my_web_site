<!-- Navigation -->
<header class="header">
  <div class="header-container">
    <div class="container">
      <nav class="nav-container">
      <div class="logo"><a href="index.php">Portfolio</a></div>

      <input type="checkbox" id="menu-toggle">
      
      <label for="menu-toggle" class="line_button">
          <svg viewBox="0 0 32 32">
              <path class="line line-top-bottom" d="M27 10 13 10C10.8 10 9 8.2 9 6 9 3.5 10.8 2 13 2 15.2 2 17 3.8 17 6L17 26C17 28.2 18.8 30 21 30 23.2 30 25 28.2 25 26 25 23.8 23.2 22 21 22L7 22"></path>
              <path class="line" d="M7 16 27 16"></path>
          </svg>
      </label>

      <ul class="nav-links">
        <li><a href="index.php#services" data-key="nav.services">What I Do</a></li>
        <li><a href="index.php#biography" data-key="nav.biography">Biography</a></li>
        <li><a href="index.php#skills" data-key="nav.skills">Skills</a></li>
        <li><a href="index.php#portfolio" data-key="nav.projects">Projects</a></li>
        <li><a href="index.php?controller=CV&action=show" data-key="nav.cv">CV</a></li>
        <li><a href="index.php#contact" data-key="nav.contact">Contact</a></li>
      </ul>

      <div class="lang-switch" id="langSwitch" role="navigation" aria-label="Sélecteur de langue">
        <button class="lang-btn" data-lang="fr" aria-pressed="false" title="Français">
          <img src="<?= Chemin::FLAG ?>fr.svg" alt="Français" class="flag">
          <span class="lang-label">FR</span>
        </button>

        <button class="lang-btn" data-lang="en" aria-pressed="false" title="English">
          <img src="<?= Chemin::FLAG ?>en.svg" alt="English" class="flag">
          <span class="lang-label">EN</span>
        </button>

        <button class="lang-btn" data-lang="es" aria-pressed="false" title="Español">
          <img src="<?= Chemin::FLAG ?>es.svg" alt="Español" class="flag">
          <span class="lang-label">ES</span>
        </button>
      </div>

    </nav>
  </div>
</header>