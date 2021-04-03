<?php
require_once 'Db.php';
require_once './connection.php';

class User extends Db{
    
    private $id;
    private $name;
    private $surname;
    private $dtBirth;
    private $email;
    private $user;
    private $password;
    private $type;
    
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    public function getSurname()
    {
        return $this->surname;
    }
    public function setSurname($surname)
    {
        $this->surname = $surname;
    }
    public function getDtBirth()
    {
        return $this->dtBirth;
    }
    public function setDtBirth($dtBirth)
    {
        $this->dtBirth = $dtBirth;
    }
    public function getEmail()
    {
        return $this->email;
    } 
    public function setEmail($email)
    {
        $this->email = $email;
    } 
    public function getUser()
    {
        return $this->user;
    }
    public function setUser($user)
    {
        $this->user = $user;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }
    public function getType()
    {
        return $this->type;
    }
    public function setType($type)
    {
        $this->type = $type;
    }

    public function save(){
        $result = false;
        $connection = new Connection();

        if($conn = $connection->getConnection()){
            if($this->id > 0){
                $query = 'UPDATE user SET name = :name, surname = :surname, dtBirthday = :dtBirthday, email = :email, user = :user, password = :password, type = :type where id = :id';
                $stmt = $conn->prepare($query);
                try {
                    if($stmt->execute(array(':name'=>$this->name, ':surname'=>$this->surname, ':dtBirthday'=>$this->dtBirth, ':email'=>$this->email, ':user'=>$this->user, ':password'=>$this->password, ':type'=>$this->type, ':id'=>$this->id))){
                        $result = $stmt->rowCount();
                    }
                } catch (PDOException $e) {
                    
                }
            }else{
                try {
                    $query = 'INSERT INTO user (id, name, surname, dtBirthday, email, user, password, type) values (null, :name, :surname, :dtBirth, :email, :user, :password, :type)';
                    $stmt = $conn->prepare($query);
                    if($stmt->execute(array(':name'=>$this->name, ':surname'=>$this->surname, ':dtBirth'=>$this->dtBirth, ':email'=>$this->email, ':user'=>$this->user, ':password'=>$this->password, ':type'=>$this->type))){
                        $result = $stmt->rowCount();
                    }
                } catch (PDOException $e) {
                    echo 'ERRO: '.$e->getMessage();
                }
            }
        }
        return $result;
    }
    public function remove($id){
        $result = false;
        $connection = new Connection();
        $conn = $connection->getConnection();
        $query = "CALL deleteUser(:id)";
        $stmt = $conn->prepare($query);
        if($stmt->execute(array(':id'=>$id))){
            $result = true;
        }
        return $result;
    }

    public function find($id){
        $connection = new Connection();
        $conn = $connection->getConnection();
        $query = "CALL findUser(:id)";
        $stmt = $conn->prepare($query);
        if($stmt->execute(array(':id'=>$id))){
            if($stmt->rowCount() > 0){
                $result = $stmt->fetchObject(Usuario::class);
            }else{
                $result = false;
            }
        }
        return $result;
    }
    
    public function count(){
        $connection = new Connection();
        $conn = $connection->getConnection();
        $query = "CALL countUser()";
        $stmt = $conn->prepare($query);
        $count = $stmt->exec();
        if(isset($count) && !empty($count)){
            return $count;
        }
        return false;
    }

    public function login(){
        $connection = new Connection();
        $conn = $connection->getConnection();
        $query = 'CALL login(:username,:password)';
        $stmt = $conn->prepare($query);
        if($stmt->execute(array(':username'=>$this->user, ':password'=>$this->password))){
            if($stmt->rowCount() > 0){
                $result = $stmt->fetchObject(Usuario::class);
            }else{
                $result = false;
            }
            return $result;
        }
    }
}