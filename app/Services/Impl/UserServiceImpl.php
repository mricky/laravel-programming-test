<?php
namespace App\Services\Impl;

use App\Services\UserService;

class UserServiceImpl implements UserService {
    
    public $user = "admin";
    public $password = "rahasia";

    public function login(string $user, string $password) : bool {

      
        $correct = $this->password;
       
        return $password == $correct;

    }
}