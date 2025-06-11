<?php

namespace App\Model;

class Organization
{
    private $id;
    private $name;
    private $identifier;
    private $created_by;
    private $created_at;

    public function __construct(int $id, string $name, string $identifier, string $created_by, string $created_at){
        $this->id = $id;
        $this->name = $name;
        $this->identifier = $identifier;
        $this->created_by = $created_by;
        $this->created_at = $created_at;
}
public function getId() : int{
        return $this->id;
}
public function getName() : string
{
    return $this->name;
}
public function getIdentifier() : string{
        return $this->identifier;
}
public function getCreatedBy() : string{
        return $this->created_by;
}
public function getCreatedAt() : string{
        return $this->created_at;
}

}