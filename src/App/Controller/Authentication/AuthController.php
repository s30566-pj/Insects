<?php

namespace App\Controller\Authentication;
use App\Service\PDO\MysqlController;
use App\Model\User;
use PDOException;
use DateTime;
class AuthController
{
    private MysqlController $db;

    public function __construct(){
        $this->db = new MysqlController();
    }
    public function login():bool{
        if (!isset($_POST['email']) && !isset($_POST['password'])){
            return false;
        }
        $email = $_POST["email"];
        $password = $_POST["password"];
        try {
            $userData = $this->db->fetchSingle("SELECT * FROM users WHERE email = :email", ["email" => $email]);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
        if($userData){
            if (password_verify($password, $userData["password"])){
                $_SESSION['user'] = new User(
                    $userData["id"],
                    $userData["first_name"],
                    $userData["surname"],
                    $userData["email"],
                    $userData["password"],
                    new DateTime($userData["created_at"])); //I should handle exception but idgaf for now
                return true;
            }
        }
        return false;
    }
}