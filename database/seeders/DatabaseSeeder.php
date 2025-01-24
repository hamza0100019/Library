<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categorie;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */

    public function run()
    {
        Categorie::create(['nom' => 'Roman', 'description' => 'Livres de fiction narrative.']);
        Categorie::create(['nom' => 'Science', 'description' => 'Livres scientifiques.']);
        Categorie::create(['nom' => 'Histoire', 'description' => 'Livres historiques.']);
    }

}
