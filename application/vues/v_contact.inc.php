<div class="contact-container">
    <div id="contact-messages"></div>

    <form id="contactForm" class="contact-form" method="post">
        <!-- Honeypot anti-spam -->
        <input type="text" name="website" style="display:none">

        <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" name="name" id="name">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email">
        </div>

        <div class="form-group">
            <label for="subject">Sujet</label>
            <input type="text" name="subject" id="subject">
        </div>

        <div class="form-group">
            <label for="message">Message</label>
            <textarea name="message" id="message"></textarea>
        </div>

        <!-- reCAPTCHA -->
        <div class="form-group">
            <div class="g-recaptcha" data-sitekey="TON_SITE_KEY"></div>
        </div>

        <button type="submit" id="submitBtn">
            <span class="btn-text">Envoyer</span>
            <span class="btn-loading" style="display:none;">⏳ Envoi...</span>
        </button>
    </form>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("contactForm");
    const submitBtn = document.getElementById("submitBtn");
    const btnText = submitBtn.querySelector(".btn-text");
    const btnLoading = submitBtn.querySelector(".btn-loading");
    const messagesDiv = document.getElementById("contact-messages");

    form.addEventListener("submit", function (e) {
        e.preventDefault();
        submitBtn.disabled = true;
        btnText.style.display = "none";
        btnLoading.style.display = "inline";
        messagesDiv.innerHTML = "";

        const formData = new FormData(form);

        fetch("", {
            method: "POST",
            headers: {
                "X-Requested-With": "XMLHttpRequest"
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            submitBtn.disabled = false;
            btnText.style.display = "inline";
            btnLoading.style.display = "none";

            if (data.success) {
                messagesDiv.innerHTML = `<div class="contact-success">✅ Merci ! Votre message a été envoyé.</div>`;
                form.reset();
            } else {
                let errorHtml = "";
                if (data.errors) {
                    for (const key in data.errors) {
                        errorHtml += `<div class="contact-error">⚠ ${data.errors[key]}</div>`;
                    }
                }
                messagesDiv.innerHTML = errorHtml;
            }
        })
        .catch(err => {
            submitBtn.disabled = false;
            btnText.style.display = "inline";
            btnLoading.style.display = "none";
            messagesDiv.innerHTML = `<div class="contact-error">⚠ Une erreur est survenue. Veuillez réessayer.</div>`;
            console.error(err);
        });
    });
});
</script>
