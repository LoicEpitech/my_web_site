document.addEventListener("DOMContentLoaded", () => {
  const buttons = document.querySelectorAll(".lang-btn");
  let currentLang = "en"; // par défaut anglais

  function loadLanguage(lang) {
    fetch(`${LANG_PATH}${lang}.json`)
      .then((res) => {
        if (!res.ok) throw new Error(`Erreur chargement langue: ${res.status}`);
        return res.json();
      })
      .then((data) => {
        // Mise à jour des textes
        document.querySelectorAll("[data-key]").forEach((el) => {
          const key = el.getAttribute("data-key");
          const value = key.split(".").reduce((o, i) => o?.[i], data);

          if (value !== undefined && value !== null) {
            if (typeof value === "object" && !Array.isArray(value)) {
              return;
            }

            if (typeof value === "string" && value.includes("\n")) {
              el.innerHTML = value.replace(/\n/g, "<br>");
            } else {
              el.textContent = value;
            }
          }
        });

        // Mise à jour du lien CV
        updateCVLink(lang);
      })
      .catch((err) => console.error("Erreur traduction:", err));
  }

  function updateCVLink(lang) {
    const cvLink = document.querySelector(".download-btn");
    if (cvLink) {
      const cvUrl = cvLink.getAttribute(`data-cv-${lang}`);
      if (cvUrl) {
        cvLink.setAttribute("href", cvUrl);

        // Mise à jour du nom de fichier pour le téléchargement
        const filename = cvUrl.split("/").pop();
        cvLink.setAttribute("download", filename);
      }
    }
  }

  // Au clic sur un bouton de langue
  buttons.forEach((btn) => {
    btn.addEventListener("click", () => {
      const lang = btn.dataset.lang;
      if (lang && lang !== currentLang) {
        currentLang = lang;
        loadLanguage(lang);
      }
    });
  });

  // Charger au démarrage
  loadLanguage(currentLang);
});
