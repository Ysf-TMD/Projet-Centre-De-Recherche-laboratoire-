<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Equipement>
 */
class EquipementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker=$this->faker ;
        return [
            "nom"=>$faker->name(),
            "disponibiliter"=>$faker->randomElement(["oui","non"]),
            "dt_achat"=>$faker->dateTime(),
            "responsable"=>$faker->name(),
            "imageEquipement"=>"ImageEquipement/default.png",
            "guide"=>$faker->randomElement([null,"GuideEquipement/default.docx"]),
        ];
    }
}
