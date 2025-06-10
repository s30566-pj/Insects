<?php

namespace App\Service;
use App\Model\User;
use App\Service\PDO\UserController;
class RegisterService
{
    private string $name;
    private string $surname;
    private string $email;
    private string $password;

    public function __construct($name, $surname, $email, $password){
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    private function verifyData():string|null{
        $message=null;
        if(! $this->verifyEmail()){
            $message = "Email field invalid";
        }
        return $message;
    }

    private function verifyEmail():bool{
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            return false;
        }
        return true;
    }

    public function registerUser(User $user){
        $message = $this->verifyData();
        if ($this->verifyData()!==null){
            return $message;
        }
        (new UserController())->registerUser($this->name, $this->surname, $this->email, $this->password);
    }

}