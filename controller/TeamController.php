<?php
require_once './model/Team.php';

print_r($_SESSION);


class TeamController{

    public function saveTeam(){
        try {
            $team = new Team();

            $team->setId($_POST['id']);
            $team->setName($_POST['name']);
            $team->setDescription($_POST['description']);
            $team->setIdUser($_SESSION['id']);
    
            $team->save();


            // adicionar retorno
        } catch (PDOException $e) {
            echo $e;
        }
    }
    public function listTeamsUser(){
        try {
            $team = new Team();
            $team->setIdUser($_SESSION['id']);

            return $team->listTeams(); 
        } catch (PDOException $e) {
            echo $e;
        }
    }

}