<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Book;

class BookTest extends TestCase
{
	use DatabaseMigrations;

	protected $book;

	protected function setup()
	{
		parent::setUp();
		$this->book = factory(Book::class)->create();
	}
	/**
	* show books correctly
	* @test
	* @return void
	*/
	public function bookList()
	{
		//create book
		$book = $this->book;
		//get request to book
		$response = $this->get('/book');
		//check response status
		$response->assertStatus(200);
		//check response content
		$response->assertSee($book->name);
	}
	/**
	* show book single
	* @test
	* @return void
	*/
	public function bookSingle()
	{
		$book = $this->book;
		$response = $this->get('/book/' . $book->id);
		$response->assertStatus(200);
		$response->assertSee($book->name);
	}
	/**
	 * insert new book
	 * @test
	 * @return void
	 */
	public function saveBook()
	{
		$data = ['name' => 'untitled book','type' => 'computer'];
		$response = $this->post('/book',$data);
		$this->assertDatabaseHas('books',$data);
	}
}