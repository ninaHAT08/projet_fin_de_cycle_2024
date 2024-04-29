<?php

namespace Database\Factories;
use App\Models\sujets;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Testing\Fakes\Fake;
use Illuminate\Support\Facades\Faker;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class sujetsfactoryFactory extends Factory
{
    
    
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
 
    {   sujets::factory()->count(5)->create();
        $faker = Factory::create();
        return [
            'iduser' => \App\Models\User::factory(), // Utilisation de la factory pour créer un utilisateur
            'titre' => $faker->sentence,
            'description' => $faker->sentence,
            'mot_clé' => $faker->sentence,
            'état' => $faker->sentence
        ];
    }
}
