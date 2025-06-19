<?php

namespace App\Service\PDO;

class InviteServiceSQL extends MysqlController{

    function addInvite($org_id, $email, $token, $invited_by, $status, $expires_at){
        $conn = $this->getMysqlConnect();
        $stmt = $conn->prepare("INSERT INTO organization_invites (organization_id, email, token, invited_by, status, expires_at) VALUES (:org_id, :email, :token, :invited_by, :status, :created_at, :expires_at)");
        return $stmt->execute([
            'org_id' => $org_id,
            'email' => $email,
            'token' => $token,
            'invited_by' => $invited_by,
            'status' => $status,
            'expires_at' => $expires_at
        ]);
    }

}