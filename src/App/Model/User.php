<?php
namespace App\Model;

class User{
    private $id;
    private $name;
    private $surname;
    private $email;
    private $password;
    private $role;
    public function getId(){
        return $this->id;
    }
    public function getName(){
        return $this->name;
    }
    public function getSurname(){
        return $this->surname;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getPassword(){
        return $this->password;
    }
    public function getRole(){
        return $this->role;
    }
    public function setName($name){
        $this->name = $name;
    }
    public function setSurname($surname){
        $this->surname = $surname;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function setPassword($password){
        $this->password = $password;
    }
    public function setRole($role){
        $this->role = $role;
    }
}