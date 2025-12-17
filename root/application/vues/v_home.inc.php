<?php


?>

<!-- Home -->
<section id="home" class="hero">
  <div class="container">
    <div class="hero-content">
      <div class="hero-text">
        <h3 id="hero-subtitle" data-key="hero.subtitle">Full Stack Developer</h3>
        <h1 id="hero-title" data-key="hero.title">Loïc Noro</h1>
        <p id="hero-desc" data-key="hero.description">
          Welcome to my portfolio! Discover my projects and my journey. Enjoy your visit!
        </p>
        <div class="social-links">
          <a href="https://www.instagram.com/loic_n17"><i class="fab fa-instagram"></i></a>
          <a href="https://www.linkedin.com/in/loïc-noro-37290933a"><i class="fab fa-linkedin-in"></i></a>
          <a href="https://github.com/LoicEpitech"><i class="fab fa-github"></i></a>
        </div>
      </div>
      <div class="hero-image">
        <img
          src="<?= Chemin::IMAGES . 'photoLoic.png' ?>"
          alt="Profile"
          class="profile-img" />
      </div>
    </div>
  </div>
</section>

<!-- Service -->
<section id="services" class="services">
  <div class="container">
    <h2 class="section-title" data-key="services.title">What I Do</h2>
    <div class="services-grid">

      <div class="service-card">
        <div class="service-icon"><i class="fas fa-laptop-code"></i></div>
        <h3 data-key="services.items.0.title">Full-Stack Development</h3>
        <p data-key="services.items.0.desc">Designing and developing complete web applications, from database to user interface.</p>
      </div>

      <div class="service-card">
        <div class="service-icon"><i class="fas fa-database"></i></div>
        <h3 data-key="services.items.1.title">Database Management</h3>
        <p data-key="services.items.1.desc">Designing, optimizing, and maintaining databases with SQL Server and MySQL.</p>
      </div>

      <div class="service-card">
        <div class="service-icon"><i class="fas fa-code"></i></div>
        <h3 data-key="services.items.2.title">Object-Oriented Programming</h3>
        <p data-key="services.items.2.desc">Building robust applications using Java, C#, and PHP with OOP best practices.</p>
      </div>

      <div class="service-card">
        <div class="service-icon"><i class="fas fa-mobile-alt"></i></div>
        <h3 data-key="services.items.3.title">Responsive Web Design</h3>
        <p data-key="services.items.3.desc">Creating adaptive and user-friendly interfaces that work seamlessly on all devices.</p>
      </div>

      <div class="service-card">
        <div class="service-icon"><i class="fas fa-project-diagram"></i></div>
        <h3 data-key="services.items.4.title">Software Engineering</h3>
        <p data-key="services.items.4.desc">Applying agile methods, UML modeling, and project management to deliver quality software.</p>
      </div>

      <div class="service-card">
        <div class="service-icon"><i class="fas fa-shield-alt"></i></div>
        <h3 data-key="services.items.5.title">Cybersecurity Basics</h3>
        <p data-key="services.items.5.desc">Implementing secure coding practices and protecting applications against common threats.</p>
      </div>

    </div>
  </div>
</section>

<!-- Bio -->
<section id="biography" class="biography">
  <div class="container">
    <div class="biography-content">
      <div class="biography-image">
        <img src="<?= Chemin::IMAGES . 'photo-bio.jpg' ?>" alt="Biography" />
      </div>
      <div class="biography-text">
        <h2 data-key="biography.title">My Biography</h2>
        <p data-key="biography.desc">
          I am Loïc Noro, a passionate computer science student currently enrolled at Epitech in the Pre-MSc program.
          After completing a BTS SIO (option SLAM), I decided to strengthen my skills in software development,
          web technologies, and project management. I enjoy working on both the front-end and back-end sides of applications,
          with a strong interest in OOP, databases, and software engineering.
          I also had the opportunity to complete a two-month Erasmus internship in Malta, which helped me improve
          my adaptability, teamwork, and professional experience in an international environment.
        </p>
        <div class="bio-data">
          <div class="bio-item">
            <strong data-key="biography.info.name">Name:</strong>
            <span data-key="biography.values.name">Loïc Noro</span>
          </div>
          <div class="bio-item">
            <strong data-key="biography.info.email">Email:</strong>
            <span data-key="biography.values.email">loic.noro@epitech.eu</span>
          </div>
          <div class="bio-item">
            <strong data-key="biography.info.birthdate">Birthdate:</strong>
            <span data-key="biography.values.birthdate">December 17, 2004</span>
          </div>
          <div class="bio-item">
            <strong data-key="biography.info.phone">Phone:</strong>
            <span data-key="biography.values.phone">+33 6 20 40 16 70</span>
          </div>
          <div class="bio-item">
            <strong data-key="biography.info.education">Education:</strong>
            <span data-key="biography.values.education">BTS SIO (SLAM) graduate – Pre-MSc student at Epitech</span>
          </div>
          <div class="bio-item">
            <strong data-key="biography.info.focus">Current Focus:</strong>
            <span data-key="biography.values.focus">Software Development & Web Engineering</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Skills -->
<?php $IMAGES_SKILLS = "public/images/skills/"; ?>
<section id="skills" class="skills">
  <div class="container">
    <h2 class="section-title" data-key="skills.title">My Skills</h2>
    <div class="skills-grid">
      <?php
      $columns = array_chunk(VariablesGlobales::$skills, ceil(count(VariablesGlobales::$skills) / 2));
      foreach ($columns as $column): ?>
        <div class="skill-column">
          <?php foreach ($column as $skill): ?>
            <div class="skill-item">
              <h4><?= $skill['name'] ?> |</h4>
              <div class="skill-icons">
                <?php foreach ($skill['logos'] as $logo): ?>
                  <img src="<?= $IMAGES_SKILLS . $logo ?>" alt="<?= $skill['name'] ?>">
                <?php endforeach; ?>
              </div>
              <div class="skill-bar">
                <div class="skill-progress" data-skill="<?= $skill['progress'] ?>"></div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Portfolio -->
<section id="portfolio" class="portfolio">
  <div class="container">
    <h2 class="section-title" data-key="portfolio.title">Projects</h2>
    <div class="portfolio-grid">

      <div class="portfolio-item">
        <a target="bank_" href="https://github.com/LoicEpitech" class="portfolio-link">
          <div class="portfolio-inner">
            <img src="<?= Chemin::IMAGES_PROJ . 'projet1.png' ?>" alt="Project 1" />
            <div class="portfolio-overlay">
              <h4 data-key="portfolio.projects.0.title">E-commerce Website</h4>
            </div>
            <div class="portfolio-description">
              <h4 data-key="portfolio.projects.0.desc">Development of a test website for selling IT products and services, connected to a database.</h4>
            </div>
          </div>
        </a>
      </div>

      <div class="portfolio-item">
        <a target="bank_"" href="https://ecolejamondeyra.fr" class="portfolio-link">
          <div class="portfolio-inner">
            <img src="<?= Chemin::IMAGES_PROJ . 'projet2.png' ?>" alt="Project 2" />
            <div class="portfolio-overlay">
              <h4 data-key="portfolio.projects.1.title">Jamondeyra School Website</h4>
            </div>
            <div class="portfolio-description">
              <h4 data-key="portfolio.projects.1.desc">Development of an online website for the Jamondeyra school.</h4>
            </div>
          </div>
        </a>
      </div>

      <div class="portfolio-item">
        <a target="bank_" href="https://github.com/LoicEpitech" class="portfolio-link">
          <div class="portfolio-inner">
            <img src="<?= Chemin::IMAGES_PROJ . 'projet3.png' ?>" alt="Project 3" />
            <div class="portfolio-overlay">
              <h4 data-key="portfolio.projects.2.title">C# Deezer Application</h4>
            </div>
            <div class="portfolio-description">
              <h4 data-key="portfolio.projects.2.desc">Creation of a desktop application in C# using the Deezer API.</h4>
            </div>
          </div>
        </a>
      </div>

      <div class="portfolio-item">
        <a target="bank_" href="https://github.com/LoicEpitech" class="portfolio-link">
          <div class="portfolio-inner">
            <img src="<?= Chemin::IMAGES_PROJ . 'projet4.png' ?>" alt="Project 4" />
            <div class="portfolio-overlay">
              <h4 data-key="portfolio.projects.3.title">Hangman Game in Python</h4>
            </div>
            <div class="portfolio-description">
              <h4 data-key="portfolio.projects.3.desc">Development of a graphical hangman game in Python.</h4>
            </div>
          </div>
        </a>
      </div>

      <div class="portfolio-item">
        <a target="bank_" href="https://www.handsonsystems.com" class="portfolio-link">
          <div class="portfolio-inner">
            <img src="<?= Chemin::IMAGES_PROJ . 'projet5.png' ?>" alt="Project 5" />
            <div class="portfolio-overlay">
              <h4 data-key="portfolio.projects.4.title">HandsOn System Showcase Website</h4>
            </div>
            <div class="portfolio-description">
              <h4 data-key="portfolio.projects.4.desc">Two-month Erasmus project: showcase website for HandsOn System.</h4>
            </div>
          </div>
        </a>
      </div>

      <div class="portfolio-item">
        <a target="bank_" href="https://github.com/LoicEpitech" class="portfolio-link">
          <div class="portfolio-inner">
            <img src="<?= Chemin::IMAGES_PROJ . 'projet6.png' ?>" alt="Project 6" />
            <div class="portfolio-overlay">
              <h4 data-key="portfolio.projects.5.title">C# Administration Website</h4>
            </div>
            <div class="portfolio-description">
              <h4 data-key="portfolio.projects.5.desc">Development of an administration website connected to a C# database.</h4>
            </div>
          </div>
        </a>
      </div>

    </div>
  </div>
</section>

  <!-- Contact -->
  <section id="contact" class="contact">
    <div class="container">
      <h2 class="section-title" data-key="contact.title">Contact Me</h2>
      <form class="contact-form" id="contactForm" method="POST">
        <div class="form-group">
          <label for="name" data-key="contact.form.name">Name</label>
          <input type="text" id="name" name="name" required />
        </div>
        <div class="form-group">
          <label for="email" data-key="contact.form.email">Email</label>
          <input type="email" id="email" name="email" required />
        </div>
        <div class="form-group">
          <label for="subject" data-key="contact.form.subject">Subject</label>
          <input type="text" id="subject" name="subject" required />
        </div>
        <div class="form-group">
          <label for="message" data-key="contact.form.message">Message</label>
          <textarea id="message" name="message" required></textarea>
        </div>
        <!-- Honeypot (invisible pour les humains) -->
        <div style="display:none;">
          <label>Leave this field empty</label>
          <input type="text" name="website" />
        </div>

      <!-- reCAPTCHA + bouton -->
      <div class="form-group" style="display:flex; align-items:center; justify-content:space-between; margin-bottom: 15px;">
        <div class="g-recaptcha"
          data-sitekey="6Lc2e90rAAAAAKt-YzvD3RyvJx_yLZuAiLhCVRo0"
          data-callback="recaptchaCallback"
          data-expired-callback="recaptchaExpired">
        </div>
          <button type="submit" class="btn btn-primary" id="submitBtn" disabled style="margin-left:10px; height: 58px;">
            <span class="btn-text" data-key="contact.form.button">Send Message</span>
            <span class="btn-loading" style="display: none;">Sending...</span>
          </button>
      </div>
    </form>
    <div id="formMessage" style="margin-top:10px;"></div>
  </div>
</section>

<!-- Script reCAPTCHA -->

<script src="https://www.google.com/recaptcha/api.js" async defer></script>
