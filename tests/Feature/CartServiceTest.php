<?php

namespace Tests\Feature;

use App\Services\Impl\CartServiceImpl;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Services\CartService;
use Tests\TestCase;

class CartServiceTest extends TestCase
{
    private $cartService;

    protected function setUp(): void {
        parent::setUp();

       $this->cartService = $this->app->make(CartServiceImpl::class);

    }
    // public function testService(){
        
    //     self::assertTrue(true);
    // }
}
