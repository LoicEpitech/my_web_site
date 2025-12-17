<?php
require_once chemin::MODELES . 'ContactModel.php';

class Controleur_Contact {
    private $contactModel;
    private $data;

    public function __construct() {
        $this->contactModel = new ContactModel();
        $this->data = [
            'errors' => [],
            'success' => false,
            'form_data' => []
        ];
    }

    public function index() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->handleFormSubmission();
        }

        // Retourne toujours du JSON pour les requêtes AJAX
        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
            strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
            header('Content-Type: application/json');
            echo json_encode($this->data);
            exit;
        }    
    }



    /**
     * Traite la soumission du formulaire
     */
    private function handleFormSubmission() {
        $formData = $this->contactModel->sanitizeData($_POST);
        $this->data['form_data'] = $formData;
        $errors = $this->contactModel->validateData($formData);

        // Honeypot : si rempli → spam
        if (!empty($formData['website'])) {
            $errors['general'] = "Spam détecté !";
        }

        // Vérification reCAPTCHA
        if (empty($errors)) {
            $recaptcha_secret = "6Lc2e90rAAAAAHKXzrAUzF6QpFM_CjRI_nkofzsv";
            $recaptcha_response = $_POST['g-recaptcha-response'] ?? '';
            $response = file_get_contents(
                "https://www.google.com/recaptcha/api/siteverify?secret={$recaptcha_secret}&response={$recaptcha_response}"
            );
            $responseKeys = json_decode($response, true);

            if (intval($responseKeys["success"]) !== 1) {
                $errors['general'] = "Échec de la vérification reCAPTCHA.";
            }
        }

        if (empty($errors)) {
            if ($this->contactModel->sendEmail($formData)) {
                $this->data['success'] = true;
                $this->data['form_data'] = []; // Vider le formulaire
                $this->contactModel->logMessage($formData);
            } else {
                $this->data['errors']['general'] = "Erreur lors de l'envoi du message. Veuillez réessayer.";
            }
        } else {
            $this->data['errors'] = $errors;
        }
    }
}

