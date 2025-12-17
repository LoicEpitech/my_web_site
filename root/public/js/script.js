document.addEventListener("DOMContentLoaded", () => {
  // Scroll fluide
  document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener("click", function (e) {
      e.preventDefault();
      const target = document.querySelector(this.getAttribute("href"));
      if (target) target.scrollIntoView({ behavior: "smooth", block: "start" });
    });
  });

  // Progress bars
  const skillsObserver = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        const bar = entry.target.querySelector(".skill-progress");
        bar.style.width = bar.dataset.skill + "%";
        skillsObserver.unobserve(entry.target);
      }
    });
  });
  document
    .querySelectorAll(".skill-item")
    .forEach((el) => skillsObserver.observe(el));

  // Formulaire de contact
  document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector(".contact-form");
    if (!form) return;

    const submitBtn = form.querySelector("#submitBtn");
    const btnText = submitBtn.querySelector(".btn-text");
    const btnLoading = submitBtn.querySelector(".btn-loading");

    // Crée un conteneur pour afficher les messages
    const messageBox = document.createElement("div");
    messageBox.className = "form-message";
    form.prepend(messageBox);

    form.addEventListener("submit", function (e) {
      e.preventDefault();

      // Affiche le bouton loading
      submitBtn.disabled = true;
      btnText.style.display = "none";
      btnLoading.style.display = "inline";
      messageBox.textContent = "";

      const formData = new FormData(form);

      fetch("/application/ajax/contact.ajax.php", {
        method: "POST",
        headers: { "X-Requested-With": "XMLHttpRequest" },
        body: formData,
      })
        .then((response) => response.json())
        .then((data) => {
          if (data.success) {
            messageBox.textContent = "✅ Merci ! Votre message a été envoyé.";
            messageBox.style.color = "green";
            form.reset();
          } else if (data.errors) {
            // Affiche les erreurs renvoyées par ContactModel
            messageBox.innerHTML = Object.values(data.errors)
              .map((err) => `❌ ${err}`)
              .join("<br>");
            messageBox.style.color = "red";
          } else {
            messageBox.textContent =
              "❌ Une erreur est survenue. Réessayez plus tard.";
            messageBox.style.color = "red";
          }
        })
        .catch((err) => {
          console.error(err);
          messageBox.textContent =
            "❌ Une erreur est survenue. Réessayez plus tard.";
          messageBox.style.color = "red";
        })
        .finally(() => {
          submitBtn.disabled = false;
          btnText.style.display = "inline";
          btnLoading.style.display = "none";
        });
    });
  });

  // reCAPTCHA callbacks
  window.recaptchaCallback = () => (submitBtn.disabled = false);
  window.recaptchaExpired = () => (submitBtn.disabled = true);

  // Fade-in sections
  const fadeObserver = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add("fade-in");
        fadeObserver.unobserve(entry.target);
      }
    });
  });
  document
    .querySelectorAll("section")
    .forEach((section) => fadeObserver.observe(section));

  // Service cards animation
  document.querySelectorAll(".service-card").forEach((card) => {
    card.addEventListener("mouseenter", () => {
      card.style.transform = "translateY(-10px) scale(1.02)";
    });
    card.addEventListener("mouseleave", () => {
      card.style.transform = "translateY(0) scale(1)";
    });
  });
});
