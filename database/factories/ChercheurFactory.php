<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ChercheurFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => $this->faker->name(),
            'prenom' => $this->faker->name(),
            'DomaineChercheur' => $this->faker->randomElement(
                ["Biologie Moléculaire",
                    "Culture In Vitro",
                    "Parasitologie",
                    "Séquensage D'ADN",
                    "Cultures Sur Champs",
                    "Cultures En Serres",
                    "Indefinit"
                ]),
            "dt_naissance"=>$this->faker->unique()->date("Y-m-d H"),
            'image' => "img_chercheur/default.jpg",
            'tele' => $this->faker->phoneNumber(10),
            'email' => $this->faker->unique()->safeEmail(),
            'cin' => $this->faker->randomLetter(7),
            'created_at'=>$this->faker->dateTime,
        ];
    }
}
