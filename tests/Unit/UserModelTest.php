<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
//use Illuminate\Foundation\Testing\RefreshDatabase;
//use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

class UserModelTest extends TestCase
{
	//use DatabaseTransactions;
	use DatabaseMigrations;
    /**
     * @test
     */
    public function UserCreate()
    {
		/*$userArray = [
				'name' => 'Abolfazl Sabagh',
				'email' => 'me@asabagh.ir',
				'password' => 'secret'
				
			];
		$user = User::create($userArray);
		$this->assertEquals($userArray['name'],$user->name);*/
        $user = factory(User::class)->create();
		
		return  $this->assertRegExp('/^.+\@\S+\.\S+$/', $user->email);
    }
}
