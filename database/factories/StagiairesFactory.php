<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class StagiairesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $date=$this->faker->datetime();
        return [

            'nom' => $this->faker->name(),
            'prenom' => $this->faker->name(),
            'tele' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'cin' => Str::random(7),
            "dt_naissance"=>$this->faker->unique()->date("Y-m-d H"),
            'periode_de_stage' =>$this->faker->randomNumber(1),
            "created_at"=>$date

        ];
    }
}
