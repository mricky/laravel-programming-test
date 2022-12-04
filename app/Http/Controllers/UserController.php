<?php

namespace App\Http\Controllers;

use App\Services\Impl\UserServiceImpl;
use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    public $userService;

    public function __construct(UserServiceImpl $userService)
    {
        $this->userService = $userService;
    }
    public function login(): Response {
        
        return response()
            ->view('user.login',[
                'title' => 'login'
            ]);
        //$test = $this->userService($user,$password);
    }

    public function doLogin(Request $request) {
        $user = $request->input('user');
        $password = $request->input('password');

        // validate move forwad using validate laravel
        if (empty($user) || empty($password)){
            return response()->view('user.login',[
                'title' => 'Login',
                'error' => 'User or Password is required'
            ]);
        }

        if($this->userService->login($user,$password)){
            $request->session()->put('user',$user);

            return redirect("/");
        }
        return response()->view('user.login',[
            'title' => "Login",
            "error" => "User or password wrong"
        ]);
    }

    public function doLogout(Request $request){
        
        $request->session()->forget("user");

        return redirect("/");
    }
}
