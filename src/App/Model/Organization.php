<?php

namespace App\Model;

class Organization
{
    private $id;
    private $name;
    private $created_by;
    private $created_at;
    private $identifier;
    private $logo_path;
    private $hashTag;


    public function __construct(int $id, string $name, string $identifier, string $created_by, string $created_at, string $hashTag, string $logo_path){
        $this->id = $id;
        $this->name = $name;
        $this->created_by = $created_by;
        $this->created_at = $created_at;
        $this->identifier = $identifier;
        $this->logo_path = $logo_path;
        $this->hashTag = $hashTag;

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
public function getHashTag() : string{
        return $this->hashTag;
}
public function getLogoPath() : string{
        return $this->logo_path;
}

}