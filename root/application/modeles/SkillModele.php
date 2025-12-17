<?php

class SkillModel {
    public static function getSkills() {
        return [
            [
                "name" => "C#",
                "progress" => 90,
                "logos" => ["dotnet.svg", "aspnet.svg", "restapi.svg"]
            ],
            [
                "name" => "Database",
                "progress" => 75,
                "logos" => ["mysql.svg", "sqlserver.svg", "mongodb.svg"]
            ],
            [
                "name" => "Python",
                "progress" => 60,
                "logos" => ["django.svg", "flask.svg"]
            ],
            [
                "name" => "JavaScript",
                "progress" => 30,
                "logos" => ["react.svg", "angular.svg", "ajax.svg", "jquery.svg"]
            ],
            [
                "name" => "PHP",
                "progress" => 80,
                "logos" => ["symfony.svg", "restapi.svg"]
            ],
            [
                "name" => "HTML/CSS",
                "progress" => 70,
                "logos" => ["bootstrap.svg"]
            ],
            [
                "name" => "Git/GitHub",
                "progress" => 55,
                "logos" => ["git.svg", "github.svg"]
            ],
            [
                "name" => "Java",
                "progress" => 50,
                "logos" => ["spring.svg", "hibernate.svg", "maven.svg"]
            ]
        ];
    }
}
?>
