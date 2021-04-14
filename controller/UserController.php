<?php
require_once './model/User.php';
class UserController{
    public function saveUser(){
        $user = new User();

        if(isset($_SESSION['id'])){ $user->setId($_POST['id']); }
        $user->setName($_POST['name']);
        $user->setSurname($_POST['surname']);
        $user->setDtBirth($_POST['dtBirthday']);
        $user->setEmail($_POST['email']);
        $user->setUser($_POST['user']);
        $user->setPassword($_POST['password']);
        $user->setType((int)$_POST['type']);

        if($user->save() == 'uequals'){
            echo '<div class="alert h6 mt-5" role="alert" style="color: #856404;background-color: #fff3cd;border-color: #ffeeba;">
                    User or password wrong.
                  </div>';
        }
    }

    public function listUsers(){
        $users = new User();
        return $users->listAll();
    }

    public function removeUser($id){
        $user = new User();
        $user = $user->remove($id);
    }

    public function signIn(){
        $user = new User();
        $user->setUser($_POST['user']);
        $user->setPassword($_POST['password']);
        return $user->login();
    }

    public function profile($id){
        $users = new User();
        return $users->find($id);
    }
}