<?php

namespace Tests\Feature;

use App\Services\Impl\UserServiceImpl;
use App\Services\UserService;
use Tests\TestCase;

class UserServiceTest extends TestCase
{
    
    
    private $userService;

    protected function setUp(): void {
        parent::setUp();

        $this->userService = $this->app->make(UserServiceImpl::class);

    }
    public function testService(){
        
        self::assertTrue(true);
    }

    public function testLoginSuccess(){
      
        
        self::assertTrue(  $this->userService->login('admin',"rahasia"));
    }
    public function testLoginFailed(){
    
        self::assertFalse(  $this->userService->login('admin',"salah"));
    }
   
}
