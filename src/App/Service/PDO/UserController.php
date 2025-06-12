<?php
namespace App\Service\PDO;
use App\Model\Organization;
use PDO;
use PDOException;
class UserController extends MysqlController
{

    private function emailExists($email):bool{
        $conn = $this->getMysqlConnect();
        $stmt = $conn->prepare("SELECT id FROM users WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result){
            return true;
        } else
            return false;
    }

    public function registerUser():bool{
        $name = $_POST['register_name'];
        $surname = $_POST['register_surname'];
        $email = $_POST['register_email'];
        $password = $_POST['register_password'];
        if ($this->emailExists($email)){
            return false;
        }
        $conn = $this->getMysqlConnect();
        $stmt = $conn->prepare("INSERT INTO users (first_name, surname, email, password) VALUES (:name, :surname, :email, :password)");
        $exec = $stmt->execute([
            "name" => $name,
            "surname" => $surname,
            "email" => $email,
            "password" => password_hash($password, PASSWORD_DEFAULT)
        ]);

        return $exec;
    }

    public function isUserInAnyOrganization($id):bool{
        $orgService = new OrganizationService();
        $conn = $this->getMysqlConnect();
        $stmt = $conn->prepare("SELECT user_id FROM user_organization WHERE user_id = :id");
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return (bool) $stmt->fetch(PDO::FETCH_ASSOC);
    }



}