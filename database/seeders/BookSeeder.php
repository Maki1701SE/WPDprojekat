<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        Book::create([
            'title' => 'Na Drini cuprija',
            'author_id' => 1,
            'category_id' => 1,
            'isbn' => '978-86-331-0001-1',
            'year' => 1945,
            'quantity' => 3,
            'description' => 'Nobelom nagrađeni roman Ive Andrića.'
        ]);

        Book::create([
            'title' => 'Dervis i smrt',
            'author_id' => 2,
            'category_id' => 1,
            'isbn' => '978-86-331-0002-2',
            'year' => 1966,
            'quantity' => 2,
            'description' => 'Najpoznatiji roman Meše Selimovića.'
        ]);

        Book::create([
            'title' => 'Travnicka hronika',
            'author_id' => 1,
            'category_id' => 1,
            'isbn' => '978-86-331-0003-3',
            'year' => 1945,
            'quantity' => 4,
            'description' => 'Roman o životu u Travniku za vrijeme Napoleona.'
        ]);
    }
}
