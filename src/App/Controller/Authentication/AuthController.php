<?php

namespace App\Controller\Authentication;
use App\Service\PDO\MysqlController;
use App\Model\User;
use PDOException;

class AuthController
{
    private MysqlController $db;

    public function __construct(){
        $this->db = new MysqlController();
    }
    public function login():bool{
        $email = $_POST["email"];
        $password = $_POST["password"];
        try {
            $userData = $this->db->fetchSingle("SELECT * FROM users WHERE email = :email", ["email" => $email]);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
        var_dump($userData);
        if($userData){
            if (password_verify($password, $userData["password"])){
                $_SESSION['user'] = new User(
                    $userData["id"],
                    $userData["name"],
                    $userData["surname"],
                    $userData["email"],
                    $userData["password"],
                    $userData["role"]);
                return true;
            }
        }
        return false;
    }
}