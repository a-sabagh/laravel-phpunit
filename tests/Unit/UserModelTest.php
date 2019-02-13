<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\User;

class UserModelTest extends TestCase
{
	use RefreshDatabase;
    /**
     * @test
     */
    public function UserCreate()
    {
		$userArray = [
				'name' => 'Abolfazl Sabagh',
				'email' => 'me@asabagh.ir',
				'password' => 'secret'
				
			];
		$user = User::create($userArray);
		$this->assertEquals($userArray['name'],$user->name);
        
    }
}
