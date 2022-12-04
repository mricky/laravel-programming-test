<?php

namespace App\Http\Controllers;

use App\Services\Impl\UserServiceImpl;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public $userService;

    public function __construct(UserServiceImpl $userService)
    {
        $this->userService = $userService;
    }
    public function login(string $user, string $password){
        
        $test = $this->userService($user,$password);
    }
}
