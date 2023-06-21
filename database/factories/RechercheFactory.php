<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recherche>
 */
class RechercheFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker=$this->faker;
        return [
            "Nom_recherche"=>$faker->name(),
            "documents"=>$faker->randomElement(["DocsChercheur/default.docx",null]),
            "etat"=>$faker->randomElement(["En Cour","Finalisé","Pas Encore"]),
            "created_at"=>$faker->dateTime(),
            "chercheur_id"=>$faker->numberBetween(1,20),
        ];
    }
}
