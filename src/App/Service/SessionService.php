<?php

namespace App\Service;

use App\Controller\ViewController;

class SessionService
{
    public function logout(){
        session_destroy();
        header('location: /login');
    }
}