<?php
require_once Chemin::MODELES . 'SkillModele.php';

class SkillController
{
    public function afficherSkills()
    {
        VariablesGlobales::$skills = SkillModel::getSkills();
    }
}
