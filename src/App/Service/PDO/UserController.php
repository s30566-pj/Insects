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

        return (bool) $result;
    }

    public function isUserInRequestedOrganization($user_id, $organization_id): bool{
        $orgService = new OrganizationService();
        $conn = $this->getMysqlConnect();
        $stmt = $conn->prepare("SELECT user_id, organization_id FROM user_organization WHERE user_id = :user_id AND organization_id = :organization_id");
        $stmt->execute(['user_id' => $user_id, 'organization_id' => $organization_id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return (bool) $result;

    }

    public function getUsersInOrganization($org_id): array{
        $conn = $this->getMysqlConnect();
        $stmt = $conn->prepare("SELECT uo.user_id, CONCAT(u.first_name, ' ', u.surname) AS name, uo.role FROM user_organization uo JOIN users u ON uo.user_id = u.id WHERE uo.organization_id = :org_id");
        $stmt->execute(['org_id' => $org_id]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }


}