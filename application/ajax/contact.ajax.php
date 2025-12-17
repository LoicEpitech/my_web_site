<?php
// Charge votre contrôleur (ajustez le chemin selon votre structure)
require_once __DIR__ . '/../controller/Controleur_Contact.php';
require_once __DIR__ . '/../model/ContactModel.php';

// Vérifie que c'est bien une requête AJAX
if (empty($_SERVER['HTTP_X_REQUESTED_WITH']) || 
    strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) !== 'xmlhttprequest') {
    http_response_code(403);
    exit('Accès interdit');
}

// Instancie et exécute le contrôleur
$controller = new Controleur_Contact();
$controller->index();