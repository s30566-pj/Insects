<?php

namespace App\Service\PDO;

use App\Model\Organization;
use DateTime;
use PDO;

class OrganizationService extends MysqlController{
    public function createOrganization($name, $identifier, $hashTag, $target): void
    {
        $created_by = $_SESSION['user']->getId();

        $conn = $this->getMysqlConnect();
        $stmt = $conn->prepare("INSERT INTO organizations (`name`, `created_by`, `identifier`, `logo_path`, `hashTag`) VALUES (:name, :created_by, :identifier, :target, :hashTag)");
        $status = $stmt->execute([
            'name' => $name,
            'created_by' => $created_by,
            'identifier' => $identifier,
            'target' => $target,
            'hashTag' => $hashTag
        ]);
        $stmt->closeCursor();
        $orgId = $conn->lastInsertId();

        $stmt = $conn->prepare("INSERT INTO user_organization (user_id, organization_id, role) VALUES (:user_id, :organization_id, :role)");
        if($status === true) {
            $status = $stmt->execute([
                'user_id' => $created_by,
                'organization_id' => $orgId,
                'role' => 'owner'
            ]);
        }


        if($status === true){
            $_SESSION['organization'] = $this->getOrganizationByIdentifier($identifier);
            setcookie("organization", $_SESSION['organization']->getId(), time() + (86400 * 30));
        }
    }

    public function getOrganizationByIdentifier($identifier): Organization|false
    {
        $conn = $this->getMysqlConnect();
        $stmt = $conn->prepare("SELECT o.id, o.name, CONCAT(u.first_name, ' ', u.surname) AS created_by, o.created_at, o.identifier, o.logo_path, o.hashTag FROM organizations o JOIN users u ON o.created_by = u.id WHERE identifier = :identifier");
        $stmt->execute(['identifier' => $identifier]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result){
            return new Organization(
                $result['id'],
                $result['name'],
                $result['created_by'],
                new DateTime($result['created_at']),
                $result['identifier'],
                $result['logo_path'],
                $result['hashTag']
            );
        }
        return false;
    }

    public function getOrganizationsByUserId($id): array{
        $conn = $this->getMysqlConnect();
        $stmt = $conn->prepare("SELECT o.id, o.name, CONCAT(u.first_name, ' ', u.surname) AS created_by, o.created_at, o.identifier, o.logo_path, o.hashTag FROM organizations o JOIN user_organization uo ON o.id = uo.organization_id AND uo.user_id = :id JOIN users u ON o.created_by = u.id");
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $organizations = [];
        foreach ($result as $row){
            $organizations[] = new Organization(
                $row['id'],
                $row['name'],
                $row['created_by'],
                new DateTime($row['created_at']),
                $row['identifier'],
                $row['logo_path'],
                $row['hashTag']
            );
        }
        return $organizations;
    }

    public function getOrganizationById($id): Organization|false
    {
        $conn = $this->getMysqlConnect();
        $stmt = $conn->prepare("SELECT o.id, o.name, CONCAT(u.first_name, ' ', u.surname) AS created_by, o.created_at, o.identifier, o.logo_path, o.hashTag FROM organizations o JOIN users u ON o.created_by = u.id WHERE o.id = :id");
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result){
            return new Organization(
                $result['id'],
                $result['name'],
                $result['created_by'],
                new DateTime($result['created_at']),
                $result['identifier'],
                $result['logo_path'],
                $result['hashTag']
            );
        }
        return false;
    }
}