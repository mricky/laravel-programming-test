<?php

namespace Tests\Feature;

use App\Services\UserService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserServiceTest extends TestCase
{
  
    protected $userService;

    protected function setUp(): void 
    {
        parent::setUp();

        $this->userService = $this->app->make(UserService::class);
    }

    public function testService(){
        self::assertTrue(true);
    }
    public function testLoginSuccess(){
        self::assertTrue($this->userService->login("admin","rahasia"));
    }

    public function testLoginUserNotFound(){
        self::assertFalse($this->userService->login("dadang","salah"));
    }
}
