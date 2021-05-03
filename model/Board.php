<?php
require_once 'Db.php';
require_once './connection.php';

class Board extends Db{
    private $id;
    private $name;
    private $description;
    private $fk_teamId;
    private $b_order;

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
    public function setDescription($desc)
    {
        $this->description = $desc;
    }
    public function getB_order()
    {
        return $this->b_order;
    }
    public function setB_order($b_order)
    {
        $this->b_order = $b_order;
    }
    public function getFk_teamId()
    {
        return $this->fk_teamId;
    }
    public function setFk_teamId($fk_teamId)
    {
        $this->fk_teamId = $fk_teamId;
    }

    public function save(){
        $connection = new Connection();
        $conn = $connection->getConnection();
        if($this->id > 0){
            try {
                $query = 'UPDATE board SET name = :name, description = :desc WHERE id = :id';
                $stmt = $conn->prepare($query);
                if($stmt->execute(array(':id'=>$this->id, ':name'=>$this->name, ':desc'=>$this->description)))
                {
                    $result = $stmt->rowCount();
                }
            } catch (PDOException $e) {
                echo 'ERRO: '.$e->getMessage();
            }
            if($result > 0){
                return true;
            }else{
                return false;
            }
        }else{
            try {
                $query = 'INSERT INTO board VALUES (NULL, :name, :desc, :fk)';
                $stmt = $conn->prepare($query);
                if($stmt->execute(array(':name'=>$this->name, ':desc'=>$this->description, ':fk'=>$this->fk_teamId)))
                {
                    $result = $stmt->rowCount();
                }
                if($result > 0){
                    return true;
                }else{
                    return false;
                }
            } catch (PDOException $e) {
                echo 'ERRO: '.$e->getMessage();
            }
        }
    }

    public function remove($id){
        $connection = new Connection();
        $conn = $connection->getConnection();
        try 
        {
            $query = 'DELETE FROM board WHERE id = :id';
            $stmt = $conn->prepare($query);
            if($stmt->execute(array(':id'=>$this->id)))
            {
                $result = $stmt->rowCount();
            }
        } catch (PDOException $e) 
        {
            echo 'ERRO: '.$e->getMessage();
        }
        return $result;
    }

    public function listBoardsByTeams(){
        $connection = new Connection();
        $conn = $connection->getConnection();
        try {
            $query = "SELECT * FROM board WHERE fk_teamId = :fk";
            $stmt = $conn->prepare($query);
            $result = array();
            if($stmt->execute(array(':fk'=>$this->fk_teamId))){
                while ($rs = $stmt->fetchObject(Board::class)) {
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
    public function find($id){
        $connection = new Connection();
        $conn = $connection->getConnection();
        try {
            $query = "SELECT * FROM board WHERE id = :id";
            $stmt = $conn->prepare($query);
            if($stmt->execute(array(':id'=>$this->id))){
                if($stmt->rowCount() > 0){
                    $result = $stmt->fetchObject(Board::class);
                }else{
                    $result = false;
                }
            }
            return $result;
        } catch (PDOException $e) {
            echo 'ERRO: '.$e->getMessage();
        }
    }
}