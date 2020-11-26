<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '\system\DatabaseConfig.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '\model\User.php';

class UserService {
    
    protected $db;

    public function __construct() {
        $this->db = new DatabaseConfig();
    }

    public function findById($id) {
        $query = "SELECT * FROM user WHERE id='$id'";
        $statement = $this->db->DB_CONNECTION->prepare($query);
        $statement->execute();

        if($statement) {
            return $statement->fetchAll(\PDO::FETCH_ASSOC);
        }
    }

    public function login(User $user) {
        $data = array($user->getUsername(),$user->getPassword());
        $query = "SELECT * FROM user WHERE username=? AND password=?";
        $statement = $this->db->DB_CONNECTION->prepare($query);
        $statement->execute($data);
        if($statement->fetchColumn(\PDO::FETCH_ASSOC)>0){
            return true;
        }else{
            return false;
        }
    }

}