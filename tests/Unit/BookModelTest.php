<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Exceptions\CantBuyPornException;
use App\Book;
use App\User;

class BookModelTest extends TestCase
{
	use DatabaseMigrations;
    /**
     * @test
     *
     * @return void
     */
    public function BuyBookError()
    {
        $book = factory(Book::class)->create(['type'=>'porn']);
		$user = factory(User::class)->create(['age' => 15]);
		//user known as logged in
		$this->actingAs($user);
		//expect throw an exception
		$this->expectException(CantBuyPornException::class);
		
		$book->buy();
		
    }
}
