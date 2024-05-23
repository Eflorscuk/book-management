<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('books')->insert([
            [
                'title' => 'O Grande Gatsby',
                'author' => 'F. Scott Fitzgerald',
                'description' => 'Uma novela que se passa na era do Jazz.',
                'isbn' => '9780743273565',
                'quantity' => 10,
            ],
            [
                'title' => 'O Sol é para todos',
                'author' => 'Harper Lee',
                'description' => 'Um romance sobre as graves questões de desigualdade racial.',
                'isbn' => '9780060935467',
                'quantity' => 15,
            ],
            [
                'title' => '1984',
                'author' => 'George Orwell',
                'description' => 'Um romance distópico de ficção científica social e um conto preventivo.',
                'isbn' => '9780451524935',
                'quantity' => 20,
            ]
        ]);
    }
}
