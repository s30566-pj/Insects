<?php

namespace App\Service\PDO;

use App\Model\Organization;
use PDO;

class OrganizationService extends MysqlController{
    public function createOrganization($name, $identifier, $hashTag, $target){
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
            $this->getOrganizationByIdentifier($identifier);
        }
    }

    public function getOrganizationByIdentifier($identifier){
        $conn = $this->getMysqlConnect();
        $stmt = $conn->prepare("SELECT * FROM organizations WHERE identifier = :identifier");
        $stmt->execute([
            'identifier' => $identifier
        ]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $_SESSION['organization'] = new Organization($result['id'],
            $result['name'],
            $result['identifier'],
            $result['created_by'],
            $result['created_at'],
            $result['logo_path'],
            $result['hashTag']);
    }
}