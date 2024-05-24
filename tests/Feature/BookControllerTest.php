<?php

namespace Tests\Feature;

use App\Models\Book;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BookControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_method_returns_view_with_books()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $books = Book::factory()->count(3)->create();

        $response = $this->get(route('books.index'));

        $response->assertStatus(200);
        foreach ($books as $book) {
            $response->assertSee($book->title);
        }
    }
}
