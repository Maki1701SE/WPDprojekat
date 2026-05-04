<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::create([
            'name' => 'Roman',
            'description' => 'Književna vrsta dugačke proze.'
        ]);

        Category::create([
            'name' => 'Pripovijetka',
            'description' => 'Kratka prozna forma.'
        ]);

        Category::create([
            'name' => 'Poezija',
            'description' => 'Književnost u stihu.'
        ]);

        Category::create([
            'name' => 'Naučna fantastika',
            'description' => 'Žanr spekulativne fikcije.'
        ]);
    }
}
