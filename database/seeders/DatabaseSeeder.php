<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Article;
use App\Models\Chercheur;
use App\Models\Domaines;
use App\Models\Equipement;
use App\Models\Recherche;
use App\Models\Stagiaires;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(1)->create();
                    Stagiaires::factory(20)->create();
                    Chercheur::factory(20)->create();
                    Domaines::factory(20)->create();
                    Article::factory(20)->create();
                    Equipement::factory(20)->create();
                    Recherche::factory(20)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
