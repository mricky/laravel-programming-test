<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testLoginPage()
    {
        $this->get('/login')
            ->assertSeeText("Login");
    
    }

    public function testLoginSuccess(){
        $this->post('/login',[
            "user" => "admin",
            "password" => "rahasia"
        ])->assertRedirect("/")
            ->assertSessionHas("user","admin");
    }

    public function testLoginValidationError(){
        $this->post("/login",[])
            ->assertSeeText("User or Password is required");
    }
    public function testLoginFailed(){
        $this->post("/login",[
            "user" => "admin",
            "password"=> "salah"
        ])->assertSeeText("User or password wrong");
    }

    public function testLogout(){
        $this->withSession([
            "user" => "admin"
        ])->post('/logout')
            ->assertRedirect("/")
            ->assertSessionMissing("user");
    }

    public function testLoginPageMemberOnly(){
        $this->withSession([
            "user" => "admin"
        ])->get('/login')
            ->assertSessionHas("user","admin");
    }

    public function testLoginForUserAlreadyLogin(){
        $this->withSession([
            "user" => "admin",
        ])->post('/login',[
            "user" => "admin",
            "password" => "rahasia"
        ])->assertRedirect("/");
    }
    public function testLogoutGuest(){
        $this->post('/logout')
            ->assertRedirect('/');
    }
}
