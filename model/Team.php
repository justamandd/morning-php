<?php
require_once 'Db.php';
require_once './connection.php';

class Team extends Db{

    private $id;
    private $name;
    private $description;

    private $idUser;

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
    public function getDescription()
    {
        return $this->description;
    }
    public function setDescription($description)
    {
        $this->description = $description;
    }
    public function getIdUser()
    {
        return $this->idUser;
    }
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }

    public function save(){
        $connection = new Connection();
        $conn = $connection->getConnection();
        if($this->id > 0){
            try {
                $query = 'UPDATE team SET NAME = :name, description = :desc WHERE id = :teamId';
                $stmt = $conn->prepare($query);
                if($stmt->execute(array(':teamId'=>$this->id,':name'=>$this->name, ':desc'=>$this->description)))
                {
                    $result = $stmt->rowCount();
                }
            } catch (PDOException $e) {
                echo 'ERRO: '.$e->getMessage();
            }
        }else{
            try {
                $query = 'INSERT INTO team VALUES (NULL, :name, :desc, :idU)';
                $stmt = $conn->prepare($query);
                if($stmt->execute(array(':name'=>$this->name, ':desc'=>$this->description, ':idU'=>$this->idUser)))
                {
                    $result = $stmt->rowCount();
                }
            } catch (PDOException $e) {
                echo 'ERRO: '.$e->getMessage();
            }
        }
        return $result;
    }

    public function remove($id){
        $connection = new Connection();
        $conn = $connection->getConnection();
        try 
        {
            $query = 'DELETE FROM team WHERE id = :id';
            $stmt = $conn->prepare($query);
            if($stmt->execute(array(':id'=>$id)))
            {
                $result = $stmt->rowCount();
            }
        } catch (PDOException $e) 
        {
            echo 'ERRO: '.$e->getMessage();
        }
        return $result > 0 ? true : false;
    }
    public function find($id){
        $connection = new Connection();
        $conn = $connection->getConnection();
        try {
            $query = "SELECT * FROM team WHERE id = :id";
            $stmt = $conn->prepare($query);
            if($stmt->execute(array(':id'=>$id))){
                if($stmt->rowCount() > 0){
                    $result = $stmt->fetchObject(Team::class);
                }else{
                    $result = false;
                }
            }
            return $result;
        } catch (PDOException $e) {
            echo 'ERRO: '.$e->getMessage();
        }
    }

    public function listTeams(){
        $connection = new Connection();
        $conn = $connection->getConnection();
        try {
            $query = "SELECT * FROM team WHERE fk_userId = :idUser";
            $stmt = $conn->prepare($query);
            $result = array();
            if($stmt->execute(array(':idUser'=>$this->idUser))){
                while ($rs = $stmt->fetchObject(Team::class)) {
                    $result[] = $rs;
                }
            }else{
                $result = false;
            }
        } catch (PDOException $e) {
            echo 'ERRO: '.$e->getMessage();
        }
        return $result;
    }
}