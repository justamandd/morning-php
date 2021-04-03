<?php
require_once './model/User.php';
class UserController{
    public function save(){
        $user = new User();

        $user->setId($_POST['id']);
        $user->setName($_POST['name']);
        $user->setSurname($_POST['surname']);
        $user->setDtBirth($_POST['dtBirthday']);
        $user->setEmail($_POST['email']);
        $user->setUser($_POST['user']);
        $user->setPassword($_POST['password']);
        $user->setType((int)$_POST['type']);

        $user->save();
    }
}