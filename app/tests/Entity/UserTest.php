<?php

namespace App\Tests\Entity;

use App\Tests\DataBuilder\UserDataBuilder;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{

    protected function setUp(): void
    {
        
        $this->userDataBuilder = new UserDataBuilder();
        
    }

    public function testShouldCreateNewUser(){
      
        $newUser = $this->userDataBuilder->create();

        $this->assertEquals("123", $newUser->getPassword());
        $this->assertEquals("may", $newUser->getUsername());
        $this->assertEquals("may@example.com", $newUser->getEmail());

    }

}