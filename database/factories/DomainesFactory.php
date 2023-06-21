<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Domaines>
 */
class DomainesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "nom"=>$this->faker->name(),
            "description"=>$this->faker->text(100),
            "image"=>"img_domaine/agro_default.png",
            "genre"=>$this->faker->randomElement(
                ["Biologie Moléculaire",
                    "Culture In Vitro",
                    "Parasitologie",
                    "Séquensage D'ADN",
                    "Cultures Sur Champs",
                    "Cultures En Serres",
                    "Indefinit"

            ]),
            'created_at'=>$this->faker->datetime(),
        ];
    }
}
