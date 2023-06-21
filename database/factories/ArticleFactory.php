<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
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
            "Nom_article"=>$faker->name(),
            "piece_joint"=>$faker->randomElement([null , "DossierArticles/default.docx"]),
            "description"=>$faker->text(150),
            "created_at"=>$faker->datetime(),
            "updated_at"=>$faker->datetime(),
            "domaine_id"=>$faker->numberBetween(1,20),

        ];
    }
}
