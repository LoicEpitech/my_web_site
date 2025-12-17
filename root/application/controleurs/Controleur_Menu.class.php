<?php
class Controleur_Menu {


    public function __construct() {
        $controleurskill = 'SkillController';
        require_once(Chemin::CONTROLEURS . 'Controleur_Skill.class.php');
        $controleurskill = new $controleurskill();
        $controleurskill->afficherSkills();

        require_once chemin::CONTROLEURS . 'Controleur_Contact.class.php';
        $controller = new Controleur_Contact();
        $controller->index();
    }

    public function afficherHome() {
        require_once Chemin::VUES . 'v_home.inc.php';
    }

    

}
