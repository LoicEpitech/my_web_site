<?php
session_start();
require_once 'configs/chemin.class.php';
require_once Chemin::VUES_PERMENENTES . 'v_header.inc.php';
require_once Chemin::VUES_PERMENENTES . 'v_navbar.inc.php';
require_once Chemin::CONFIGS . 'variables_globales.class.php';

if (!isset($_REQUEST['controller'])) {
    $controllerClass = 'Controleur_Menu';
    require_once(Chemin::CONTROLEURS . $controllerClass . ".class.php");
    $objetControleur = new $controllerClass();
    $objetControleur->afficherHome(); 
} else {
    $controllerClass = 'Controleur_' . $_REQUEST['controller'];
    $controllerFile = $controllerClass . ".class.php"; 
    $action = $_REQUEST['action'] ?? 'index';

    require_once(Chemin::CONTROLEURS . $controllerFile);

    $objetControleur = new $controllerClass();
    if (method_exists($objetControleur, $action)) {
        $objetControleur->$action();
    } else {
        echo "Action non valide : " . htmlspecialchars($action);
    }
}


require_once Chemin::VUES_PERMENENTES . 'v_footer.inc.php';
