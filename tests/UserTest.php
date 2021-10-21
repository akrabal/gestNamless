<?php

use App\classe\user as classUser;
use PHPUnit\Framework\TestCase;

class User extends TestCase
{
    /** @test */
    public function testAuth()
    {
        $user = new classUser();
        $this->assertInstanceOf(user::class, $user);
    }
    
}

   

