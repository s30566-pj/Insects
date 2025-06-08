<?php

namespace App\Controller\Authentication;
use App\Service\PDO\MysqlController;
use App\Model\User;
class AuthController
{
    private $db;

    public function __construct(){
        $this->db = new MysqlController();
    }
    public function login():bool{
        $email = $_POST["email"];
        $password = md5($_POST["password"]);
        $userData = $this->db->fetchSingle("SELECT * FROM users WHERE email = :email AND password = :password");
        if($userData){
            if ($userData["email"] === $email && $userData["password"] === $password){
                $_SESSION['user'] = new User($userData["id"], $userData["name"], $userData["surname"], $userData["email"], $userData["password"], $userData["role"]);
                return true;
            }
        }
        return false;
    }
}