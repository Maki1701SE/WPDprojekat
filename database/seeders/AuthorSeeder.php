<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    public function run(): void
    {
        Author::create([
            'first_name' => 'Ivo',
            'last_name' => 'Andrić',
            'bio' => 'Nobelovac, jedan od najvećih pisaca Balkana.',
            'birth_date' => '1892-10-09'
        ]);

        Author::create([
            'first_name' => 'Mesa',
            'last_name' => 'Selimovic',
            'bio' => 'Bosanskohercegovački pisac.',
            'birth_date' => '1910-04-26'
        ]);

        Author::create([
            'first_name' => 'Dobrica',
            'last_name' => 'Cosic',
            'bio' => 'Srpski pisac i političar.',
            'birth_date' => '1921-12-29'
        ]);
    }
}
